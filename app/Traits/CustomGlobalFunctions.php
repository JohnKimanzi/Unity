<?php

namespace App\Traits;

use App\Models\Client;
use App\Models\Company;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Lead;
use App\Models\Note;
use App\Models\State;
use App\Models\TimeRecord;
use App\Models\TimeRecordType;
use App\Models\Upload;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

trait CustomGlobalFunctions{
    public function uploadFile($uploadable_type,$uploadable_id,DocumentType $document_type, $file, $filename=null ){
		$mime=$file->extension();
		$file_name = $filename.'.'.$mime ?? $file->getClientOriginalName();
		$storage_locaction= "{$uploadable_type}/{$uploadable_id}/{$document_type->name}";

		// dd($storage_locaction);

		$collection = collect();
		$check_docs = Document::where('filename', $file_name)->get();
		// dd($check_docs);
		foreach ($check_docs as $doc) {
			$up = ($doc->upload()->where('uploadable_type', $uploadable_type)->where('uploadable_id', $uploadable_type))->where('name', $document_type->name)->get();
			if ($up <> null) {
				$collection = collect($up);
				// dd($collection->count());
			}
		}
		if ($collection->count() > 0) {
			return Redirect::back()->with('error', 'A document with the same name already exists in this category');
		} else {
			$path = $file->storeAs('public/Uploads/' . $storage_locaction, $file_name);

			$document = Document::create([
				'filename' => $file_name,
				'document_type_id' => $document_type->id,
				'user_id' => Auth::user()->id,
				'mime' => $mime,
				'size' => $file->getSize(),
				'path' => $path,
			]);

			$upload = Upload::create([
				'name' => $document_type->name,
				'uploadable_type' => $uploadable_type,
				'uploadable_id' => $uploadable_id,
				'document_id' => $document->id,
			]);

			Note::create([
				'notable_id' => $uploadable_id,
				'notable_type' => $uploadable_type,
				'user_id' => Auth::user()->id,
				'note' => 'Uploaded document ' . $file_name . ' for ' . $uploadable_type,
			]);

			session()->flash('success', 'File has been uploaded.');
			return $upload;
		}
	}
	public function getDocumentTypes($model_name=null){
		if($model_name<>null){
			return Upload::where('uploadable_type', $model_name)->get()->pluck('document.document_type.name')->unique()->toArray();
		}else return DocumentType::all()->pluck('name')->toArray();
	}

	public function isWorkDay(Carbon $date, User $user){
		#assuming mon-frid
		if(! ($date->weekDay() > 5)){
			return true;
		} else {
			return false;
		}
	}

	public function startOfWorkDay(Carbon $date, User $user){
		#assuming 0800
		return $date->startOfDay()->addHours(8);
	}

	public function endOfWorkDay(Carbon $date , User $user){
		#assuming 1700
		// dd($date);
		return $date->startOfDay()->addHours(17);
	}

	public function workHours(){
		#assuming 8
		#can be specified through settings
		return 8;
	}

	public function construct_clock_in_out_record(CarbonImmutable $date, User $user){
		$records=$user->time_records()
			->where('started_at', '>=', $date->copy()->startOfDay())
			->where('started_at', '<=', $date->endOfDay())
			->whereHas('time_record_type', function ($x) {
					$x->where('name', 'like', '%clock%');
				})
			->latest('started_at')
			->get();
		// dd($records);
		$total_hours=0;
		$total_diff=new CarbonInterval(0);
		$records->each(function($timesheet)use($total_hours, $total_diff){
			$total_hours += $timesheet->hours;
			$total_diff->add($timesheet->diff);
		});
		// dd($total_hours);
		if($records && $records->count()>0){
			$tr = TimeRecord::make([
				'started_at' => $records->last()->started_at, #Consider startes_at time of earliest time sheet
				'ended_at' => $records->first()->ended_at, #Consider ended_at time of latest time sheet
				'user_id' => $user->id,
				'time_record_type_id' => TimeRecordType::where('name', 'like', "%clock%")->first()->id,	
			]);	
			$tr->total_hours=$total_hours; #append hours attribute
			$tr->total_diff=$total_diff; #append diff attribute
			return $tr;
		} else return null;
	}

	function array_flatten($array) { 
        if (!is_array($array)) { 
          return false; 
        } 
        $result = array(); 
        foreach ($array as $key => $value) { 
          if (is_array($value)) { 
            $result = array_merge($result, $this->array_flatten($value)); 
          } else { 
            $result = array_merge($result, array($key => $value));
          } 
        } 
        return $result; 
	}



	#==============================================================
	#From Helpers.php
	#==============================================================
	function filterFunction(Request $request){
		// if (count($request->all())) {
		//     $leads=collect();
		//     foreach($request->all() as $r){
		//         if ($r<>null) {
		//            return $leads=Lead::where('status', 'new');
		//         }
		//     }
		//     return $leads;
		// }
		$leads=Lead::where(function($query) use($request){        
			isset($request->company_name) ? $query=$query->where('name', 'like', '%'.$request->company_name.'%') : '';
			isset($request->email) ? $query=$query->where('email', 'like', '%'.$request->email.'%') : '';
			isset($request->agent) ? $query=$query->where('sales_rep_id', $request->agent) : '';
			isset($request->closer) ? $query=$query->where('closer_id', $request->closer) : '';
			isset($request->phone) ? $query=$query->where(function($query) use($request){
				$query->where('phone1', 'like', '%'.$request->phone.'%')->orWhere('phone2', 'like', '%'.$request->phone.'%');
			}) : '';
			isset($request->status) ? $query=$query->where('status', 'like', '%'.$request->status.'%') : '';
			isset($request->bs_type) ? $query=$query->where('business_type_id', 'like', '%'.$request->bs_type.'%') : '';
			isset($request->state) ? $query=$query->where('state_id', 'like', '%'.$request->state.'%') : '';
			isset($request->batch) ? $query=$query->where('batch_id', 'like', '%'.$request->batch.'%') : '';
			if (isset($request->date_from)) {
	
				$from=Carbon::createFromFormat('d/m/Y', $request->date_from);
				$to=isset($request->date_to) ? Carbon::createFromFormat('d/m/Y', $request->date_to) : now();
				$query=$query->where('created_at', '>', $from->startOfDay())->where('created_at', '<', $to->endOfDay());
			}
		})->get();
	
		return $leads->unique();

	}
	function user_filter(Request $request){
		$users=User::where(function($query) use($request){        
			if(isset($request->user_email)) {
				$query=$query->where('email',"like", "%{$request->user_email}%") ;
			}
			if(isset($request->user_phone)) {
				$query=$query->where('phone1',"like", "%{$request->user_phone}%")
					->orWhere('phone2',"like", "%{$request->user_phone}%") ;
			}
			if(isset($request->user_name)){
				$query=$query->where('fname', 'like', "%{$request->user_name}%")
					->orWhere('mname', 'like', "%{$request->user_name}%")
					->orWhere('lname', 'like', "%{$request->user_name}%") ;
			}
			if(isset($request->designation_id)){
				$query=$query->where('designation_id', $request->designation_id) ;
			}		
			// isset($request->user_id) ? $query=$query->where('user_id', $request->user) : '';
			if(isset($request->department_id)) {
				$query=$query->whereHas('designation', function($designation)use ($request){
					return $designation->whereHas('department', function($dpt)use ($request){
						$dpt->where('id',$request->department_id );
					});
				}) ;
			}
			// isset($request->manager) ? $query=$query->where('name', $request->manager) : '';

			if (isset($request->formated_dob_from)) {
				$from=Carbon::createFromFormat('d/m/Y', $request->dob_from);
				$to=isset($request->dob_to) ? Carbon::createFromFormat('d/m/Y', $request->date_to) : now();
				$query=$query->where('doj', '>', $from->startOfDay())->where('doj', '<', $to->endOfDay());
			}
		})->get();

		return $users->unique();
	}
	
	function global_search_fn($search_term){
		// $another_search = DB::table($table_name)
		//     ->where('col_name', 'LIKE', '%'.$query.'%');
		
		$search = DB::table('leads')
			->where('name', 'LIKE', '%'.$search_term.'%')
			->orWhere('email', 'LIKE', '%'.$search_term.'%')
			->orWhere('phone1', 'LIKE', '%'.$search_term.'%')
			->orWhere('phone2', 'LIKE', '%'.$search_term.'%')
			->orWhere('status', 'LIKE', '%'.$search_term.'%')
			->orWhere(function($query) use ($search_term){
				$users=User::where('fname', 'like', '%'.$search_term.'%')
				->orWhere('mname', 'LIKE', '%' . $search_term . '%')
				->orWhere('lname', 'LIKE', '%' . $search_term . '%')
				->orWhere('email', 'like', '%' . $search_term . '%')->get();
	
				$query->whereIn('sales_rep_id', $users->pluck('id'))->orWhereIn('closer_id', $users->pluck('id'));            
			})
			->orWhere(function($query) use ($search_term){
				$states=State::where('name', 'like', '%'.$search_term.'%')->orWhere('code', 'like', '%'.$search_term.'%')->get()->unique();
	
				$query->whereIn('state_id', $states->pluck('id'));            
			})
			// ->union($another_search)
			// ->union($another_search_again)
		->get()->unique();
	
		return $search;

		$search = DB::table('users')
			->where('designation', 'LIKE', '%'.$search_term.'%')
			->orWhere('name', 'LIKE', '%'.$search_term.'%')
			->orWhere('department', 'LIKE', '%'.$search_term.'%')
			// ->union($another_search)
			// ->union($another_search_again)
		->get()->unique();
	
		return $search;
	}
	
	function generateClientCode(Client $client){
		$client_name_arr=explode(' ', $client->name);
		return substr($client_name_arr[0],0,2).'-'.substr($client_name_arr[1],0,2);
	}
	function generateCode($string1, $string2){
		return substr($string1,0,2).'-'.substr($string2,0,2);
	}
	
	function isActivatable(Company $company){
		// $status=0;
		// dd(Company::first()->uploads);
		// Upload::all()->each($status=function($upload) use($status){
		$has_agreement = $company->uploads->whereIn('document.document_type.name', "Service agreement")->count();
		dd($has_agreement);
		// (function($upload) use($status){
		//     // echo $status;
		//     if (strtolower($upload->document->document_type->name)=='service agreement') {
		//        $status=1;
			   
		//     }else $status =1;
		//     return $status;
		// }) ;echo $status;
			# Service agreement
			# percentages
			# Address
			# Contact Person
			# Type  of business
			# Medical non medical
			# Creditor
			# Username and pass
		//     $status=true;
		echo 'done';
		// return $status;
	}
	#====================================================================
}