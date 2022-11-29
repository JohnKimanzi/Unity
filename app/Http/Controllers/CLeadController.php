<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Imports\LeadsImport;
use App\Mail\LeadMail;
use App\Models\Lead;
use App\Models\LeadBatch;
use App\Models\Note;
use App\Models\Template;
use App\Traits\CustomGlobalFunctions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CLeadController extends Controller
{
    use CustomGlobalFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('c_leads.index', ['leads'=>Lead::all()]);
    }

    /**
     * Display a subset listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        // filterFunction_old('sa');
        $leads=$this->filterFunction($request);
        if ($leads->count()<1) {
            Session::flash('warning', 'The search returned an empty resultset!'); 
        }
        else{
            Session::flash('success', 'Showing '.$leads->count(). ' records.'); 
        }
        return view('c_leads.index', ['leads'=>$leads]);
    }
    
    private function filter_function($request){
        $leads=collect();
        if ($request->company_name <> null) {
           $leads=$leads->concat(Lead::where('name', 'like', '%'.$request->company_name.'%')->get());
        }
        if ($request->email <> null) {
            $leads=$leads->concat(Lead::where('email', 'like', $request->email)->get());
           
        }
        if ($request->agent <> null) {
            $leads=$leads->concat(Lead::where('sales_rep_id', $request->agent)->get()); 
        }
        if ($request->closer <> null) {
            $leads=$leads->concat(Lead::where('closer_id', $request->closer)->get()); 
        }
        if ($request->phone <> null) {
            $leads=$leads->concat(Lead::where('phone1', $request->phone)->orWhere('phone2', $request->phone)->get());
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
                return Redirect::back()->with('error', "Some issues were encountered during the search. You might have specified an invalid date range.");
            }
        }
        return $leads;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lead)
    {
        //
        $lead=Lead::findOrFail($lead);
        return view('c_leads.show', ['lead'=>$lead]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd('This action has been disabled');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }
    /**
     * Update the specified resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mass_update(Request $request)
    {
        $leads=$this->filterFunction($request);
        if ($leads->count()<1) {
           Session::flash('error', 'Oops! The filter criteria returned an empty resultset. No records were updated');
        }elseif($leads->count()==Lead::count()){
            return back()->with('error', 'Filter did not work');
        }else{
            if ($request->new_agent<>null) {
                $leads->each->update(['sales_rep_id'=>$request->new_agent]);
                Session::flash('success', 'Yey! Agent info has been updated for '.$leads->count().' records');
            } elseif($request->new_closer<>null) {
                $leads->each->update(['closer_id'=>$request->new_closer]);      
                Session::flash('success', 'Yey! Account manager info has been updated for '.$leads->count().' records');
            }elseif($request->new_status<>null){
                $leads->each->update(['status'=>$request->new_status]);    
                Session::flash('success', 'Yey! Account status has been updated for '.$leads->count().' records');
            }else {
                Session::flash('warning', '0 records affected');
            }
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('Action has been disabled');
    }
    public function change_lead_status($id, $status)
    {
        $lead=Lead::findOrFail($id);
        $oldStatus=$lead->status;
        $lead->status=$status;
        $lead->save();

        Note::create([
            'notable_id'=>$lead->id,
            'notable_type'=>'Lead',
            'user_id'=>Auth::user()->id,
            'note'=>'Change status from '.$oldStatus.' to '.$lead->status
        ]);
        return Redirect::back()->with('success', "Status updated successfully");
    }
    
    public function leads_import(Request $request) 

    {
        // dd($request);
        
        //create new batch
        $batch=LeadBatch::make([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id,
            'source'=>$request->source,
            'count'=>0,
            // 'count'=>$import->getRowCount(),
        ]);

        $import = new LeadsImport($batch);
        $path1 = $request->file('file_to_import')->store('temp'); 
        $path=storage_path('app').'/'.$path1; 
       
        try {
            Excel::import($import, $path);
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }

        // update count after import is done
        $batch->count=$import->getRowCount();
        $batch->save();
        Note::create([
            'notable_id'=>$batch->id,
            'notable_type'=>'LeadBatch',
            'user_id'=>Auth::user()->id,
            'note'=>'Uploaded '.$import->getRowCount().' leads from source '. $request->source
        ]);
        return redirect::back()->with('success', 'All leads have been uploaded. All good!');
    }
    
    public function get_template()
    {
        // dd('here');
        return Storage::download('templates/lead_upload_template.xlsx');
    }

    public function email(Lead $lead, Request $request)
    {
        $this->validate($request, [
            'email_body'=>'required',
            // 'lead_id'=>'required|numeric|min:1',
            'email_to'=>'required',
            'email_subject'=>'required',
            'attachment'=>'nullable|file',
            'template1'=>'nullable|numeric|min:1',
            'template2'=>'nullable|numeric|min:1',
        ]);
        
        // dd($request->all());
        $path =null;
        $merger1=null;
        $merger2=null;
        $template1_path = null;
        $template2_path = null;

        if ($request->attachment<>null) {
            $file=$request->file('attachment');
            $file_name=$request->file('attachment')->getClientOriginalName(); 
            $path = $file->storeAS('public/Uploads/.email-attachments', $file_name); 
        }
        if ($request->template1<>null) 
        {
            $document1=Template::find($request->template1)->document;
            // dd($document1);
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path('../'.$document1->path));
            $templateProcessor->setValue('salutation', $lead->primary_contact->salutation);
            $templateProcessor->setValue('firstname', $lead->primary_contact->first_name);
            $templateProcessor->setValue('lastname', $lead->primary_contact->last_name);
            $templateProcessor->setValue('username', Auth::user()->name);
            $filename=$lead->name.date('-Y_m_d_His').'.docx';
            $template1_path='Uploads/templates/doc-gen/'.$filename;
            $templateProcessor->saveAs(public_path($template1_path));
        }
        if ($request->template2 <> null && $request->template1 <> $request->template2) 
        {
            $document2=Template::find($request->template2)->document;
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path('../'.$document2->path));
            $templateProcessor->setValue('salutation', $lead->primary_contact->salutation);
            $templateProcessor->setValue('firstname', $lead->primary_contact->first_name);
            $templateProcessor->setValue('lastname', $lead->primary_contact->last_name);
            $templateProcessor->setValue('username', Auth::user()->name);
            $filename=$lead->name.date('-Y_m_d_His').'.docx';
            $template2_path='Uploads/templates/doc-gen/'.$filename;
            $templateProcessor->saveAs(public_path($template2_path));
            //convert to pdf
            
        }
        if ($request->download=='yes') {
            Storage::download('public/'.$template1_path);
            Storage::download('public/'.$template2_path);
        }

        Mail::to($request->email_to)->send(new LeadMail(['subject'=>$request->email_subject, 'from'=>$request->email_from, 'body'=>$request->email_body, 'file_path'=>$template1_path]));
        return Redirect::back()->with('success', 'Email has been sent');
    }
    
    
}
