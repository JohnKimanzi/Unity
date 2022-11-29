<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\DataTables\Lead_listDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function index()
     { 
        //  dd(Auth::user()->id);
        $leads=null;
        $logs=DB::table('calls')->get(); 
        
        $user=Auth::user();
       
       if ($user->hasRole('admin')) {
        $leads=Lead::all();
      
       } 
       elseif ($user->hasRole('team leader')) {
        $leads=Lead::all();
      
       } 
       else
       if($user->hasRole('closer')) {
        $leads=Lead::where('status','hot')->orderBy('id','desc')->get();
       }
        else if
        ($user->hasRole('agent')) {
            $leads=Lead::where('sales_rep_id',Auth::user()->id)->orderBy('id','desc')->get();
       }
       else{
           dd('That didnt work');
       }
       
        return view('leads.profile_redone.lead_list', ['leads'=>$leads]);
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show($lead)
    {
        
        $leads=Lead::findOrFail($lead);

     
    //    return view('leads.profile.index')->with('data',$data);
       return view('leads.profile_redone.account_profile')->with('leads',$leads);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update_address(Request $request, $lead)
    {
      
        
        $update = Lead::find($lead);
            $update->phone1= $request->get('primary_phone');
            $update->phone2= $request->get('alt_phone');
            $update->email =$request->get('email');
            $update->address =$request->get('address');
            $update->zip_code =$request->get('zip_code');
            
            $update->save();
        
    return redirect::back()->with('success','Lead Address details update successful');
    }

    public function update_bio(Request $request, $lead)
    {
        
        $update = Lead::find($lead);
          
            $update->name =$request->get('lead_name');
            // $update->address =$request->get('physical_address');
            // $update->s =$request->get('zip_code');
            $update->date_onboarded =$request->get('onboard_date');
            // $update->business_type_id =$request->get('category');
            $update->save();
        
    return redirect::back()->with('success','Lead Bio details update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        dd("This action has been disabled");
    }

public function change_lead_status($id, $status)
    {
        $lead=Lead::findOrFail($id);
        $lead->status=$status;
        $lead->save();
        return Redirect::back()->with('success', "Status updated successfully");
    }
    
    public function leads_import(Request $request) 

    {
        $path1 = $request->file('file_to_import')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        $data = Excel::import(new LeadsImport,$path);
    //    dd($request->file_to_import);
    //    Excel::import(new LeadsImport,$request->import_file,'xlsx');
        // Excel::import(new LeadsImport, $file_path);
        
        return redirect::back()->with('success', 'All good!');
    }
    public function leads_import2($file_path,Request $request) 

    {
       dd($request->file_to_import);
       
        Excel::import(new LeadsImport, $file_path);
        
        return redirect::back()->with('success', 'All leads have been uploaded. All good!');
    }
    public function get_template()
    {
        return Storage::download('templates/lead_upload_template.xlsx');
 
    }
    
}

