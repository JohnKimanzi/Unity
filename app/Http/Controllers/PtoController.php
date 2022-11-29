<?php

namespace App\Http\Controllers;

use App\Mail\PtoApplication;
use App\Mail\PtoModified;
use App\Models\DocumentType;
use App\Models\Pto;
use App\Models\PtoType;
use App\Models\User;
use App\Traits\CustomGlobalFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PtoController extends Controller
{
    use CustomGlobalFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pto.index', [
            'ptos'=>Pto::all(), 
            'pto_types'=>PtoType::all(),
            'users' => User::all()
        ]);
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
        // dd($request->all());
        try {
            //code...
            $this->validate($request,[
            'pto_type_id'=>'required|string',
            'start_at'=>'required|date|before:end_at',
            'end_at'=>'required|date',

            ]);
        } catch (\Throwable $th) {
            throw $th ;
        }
        
        // dd($request->all());

        // check for open applications of the same type.
        $ptos=Auth::user()->ptos()->where('status', 'like', '%New%')->where('pto_type_id', $request->pto_type_id)->get();

        if(count($ptos) ==0 ){
            $pto=Pto::create([
                'pto_type_id'=>$request->pto_type_id,
                // 'status'=>$request->status,
                'user_id'=>Auth::user()->id,
                'start_at'=>$request->start_at,
                'end_at'=>$request->end_at,
            ]);
            $this->sendNewPtoEmails($pto);
            
            if($request->attachment<>null){
               $document_type = DocumentType::firstOrCreate([
                    'name' => "PTO application"
                ]);
                $this->uploadFile('pto', $pto->id, $document_type, $request->file('attachment')); 
            }
            
            return back()->with('success', 'Done!');
        }else{
            return back()->with('warning', 'You already have an open PTO of the same type! No action has been taken');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pto  $pto
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $pto = Pto::findOrFail($id);
        // have propper code here
        return view('pto.edit',['pto'=>$pto, 'pto_types'=>PtoType::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pto  $pto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pto_types = PtoType::all();
        $pto = Pto::findOrFail($id);
        return view('pto.edit',['pto'=>$pto,'document_types'=>$this->getDocumentTypes('pto'), 'pto_types'=>$pto_types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pto  $pto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pto $pto)
    {
        $request->validate([
            'pto_type_id'=>'required',
            'start_at'=>'required|before:end_at',
            'end_at'=>'required',
            'comments'=>'required'
        ]);
       
        $pto->update([
            'pto_type_id'=>$request->pto_type_id,
            'start_at'=>$request->start_at,
            'end_at'=>$request->end_at,
            'comments'=>$request->comments,
        ]);
        $this->sendModifiedPtoEmails($pto);
        // Mail::to($pto->user->email)->send(new PtoModified($pto, $pto->user->name));
        return redirect()->route('pto.index')->with('success', 'PTO has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pto  $pto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pto $pto)
    {
        $pto->delete();
        return back()->with('success', 'PTO has been deleted successfully');
    }
    //update status of pto applications
    public function pto_status(Request $request) 
    {
        // dd($request->all());
        $request->validate([
            'comments' => 'nullable',
            'new_status' => 'required',
            'pto_id' => 'required'
        ]);
        $pto = Pto::findOrFail($request->pto_id);
        if($pto->user<>Auth::user()){
            $pto->update([
                'status' => $request->new_status,
                'comments' => $request->comments,
                'modified_by_user_id'=>Auth::user()->id,
            ]);
            $this->sendModifiedPtoEmails($pto);
        }else return back()->with('error', "Action Not allowed! You cannot approve your own application.");
        
        return back()->with('success', 'PTO application has been approved successfully');
    }
    private function sendNewPtoEmails(Pto $pto){
        Mail::to($pto->user->email)->send(new PtoApplication($pto, $pto->user->name));
        $hrm_users = User::role('Human Resource Manager')->get();
        foreach($hrm_users as $hrm_user){
            Mail::to($hrm_user->email)->send(new PtoApplication($pto, $hrm_user->name));

        }
    }
    private function sendModifiedPtoEmails(Pto $pto){
        Mail::to($pto->user->email)->send(new PtoModified($pto, $pto->user->name));
        $hrm_users = User::role('Human Resource Manager')->get();
        foreach($hrm_users as $hrm_user){
            Mail::to($hrm_user->email)->send(new PtoModified($pto, $hrm_user->name));

        }
    }

}
