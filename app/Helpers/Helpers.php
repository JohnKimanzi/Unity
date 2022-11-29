<?php
namespace App\Helpers;
use App\Models\Client;
use App\Models\Company;
use App\Models\Lead;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


function am_admin(){
    // return false;
}

function filterFunction_old($request){
    $leads=collect();
    if ($request->company_name <> null) {
       $leads=$leads->concat(Lead::where('name', 'like', '%'.$request->company_name.'%')->get());
    }
    if ($request->email <> null) {
        $leads=$leads->concat(Lead::where('email', 'like', '%'.$request->email.'%')->get());
       
    }
    if ($request->agent <> null) {
        $leads=$leads->concat(Lead::where('sales_rep_id', $request->agent)->get()); 
    }
    if ($request->closer <> null) {
        $leads=$leads->concat(Lead::where('closer_id', $request->closer)->get()); 
    }
    if ($request->phone <> null) {
        $leads=$leads->concat(Lead::where('phone1', 'like', '%'.$request->phone.'%')->orWhere('phone2', 'like', '%'.$request->phone.'%')->get());
    }
    if ($request->status <> null) {
        $leads=$leads->concat(Lead::where('status', $request->status)->get());
    }
    if ($request->bs_type <> null) {
        $leads=$leads->concat(Lead::where('business_type_id', $request->bs_type)->get());
    }
    if ($request->state <> null) {
        $leads=$leads->concat(Lead::where('state_id', $request->state)->get());
    }
    if ($request->batch <> null) {
        $leads=$leads->concat(Lead::where('batch_id', $request->batch)->get());
    }
    if ($request->date_from <> null || $request->date_to <> null) {
        if ($request->date_from <> null && $request->date_to <> null) {
            $from=Carbon::createFromFormat('d/m/Y', $request->date_from);
            $to=Carbon::createFromFormat('d/m/Y', $request->date_to);
            
            $leads=$leads->concat(Lead::where('created_at', '>', $from->startOfDay())->where('created_at', '<', $to->endOfDay())->get());
        }
        else
        {
            return back()->with('error', "Some issues were encountered during the search. You might have possibly specified an invalid date range.");
        }
    }
    return $leads->unique();
}

function filter_function($request){
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
            $users=User::where('name', 'like', '%'.$search_term.'%')->orWhere('email', 'like', '%'.$search_term.'%')->get();

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