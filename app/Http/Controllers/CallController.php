<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\ContactPerson;
use App\Models\Lead;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calls.index', ['calls'=>Call::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   dd($request);
        // $rules=array([
        //     'user_id'=>'required|string',
        //     'subject'=>'required|string',
        //     'lead_id'=>'required|string',
        //     'call_duration'=>'nullable|string',
        //     'call_back'=>'nullable|string',
        //     'status'=>'required|string',
        //     'action_codes'=>'nullable|string',
        //     'description'=>'required|string',
        //     'contact_person'=>'required|numeric|min:1',
        //     'phone'=>'required|string',
        // ]);

        // $this->validate($request, $rules);
        // dd('validated');
        // $contact_person=ContactPerson::firstOrCreate([
        //     'full_name'=>$request->contact_person,
        //     'lead_id'=>$request->lead_id,
        // ]);
        $call = Call::create([
                'user_id'=>Auth::user()->id,
                'lead_id'=>$request->lead_id,
                  'duration'=>$request->duration,
                 'call_back'=>date('Y-m-d',strtotime($request->call_back)),
                'status'=>$request->status,
                'action_codes'=>$request->action_codes,
                'description'=>$request->description,
                'contact_person_id'=>$contact_person->id,
                'phone'=>$request->phone,
                'subject'=>$request->subject,
                //  'user_id'=>Auth::user(),

            ]);
        Note::create([
            'notable_id'=>$call->id,
            'notable_type'=>'Call',
            'user_id'=>Auth::user()->id,
            'note'=>'Outgoing call to '.Lead::find(2)->name
        ]);
        return redirect::back()->with('success', 'Call details have been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Call $call)
    {
        //
        return view('calls.show', $call);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        return view('calls.edit', $call);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        $rules=array([
            'user_id'=>'required|string',
            'lead_id'=>'required|string',
            'duration'=>'nullable|string',
            'call_back'=>'nullable|date',
            'status'=>'required|string',
            'action_codes'=>'nullable|string',
            'description'=>'required|string',
            'contact_person_id'=>'required|numeric|min:1',
            'phone'=>'required|string',
        ]);
        $this->validate($request, $rules);
        
        $call->user_id = $request->user_id;
        $call->lead_id = $request->lead_id;
        $call->duration = $request->duration;
        $call->call_back = $request->call_back;
        $call->status = $request->status;
        $call->action_codes = $request->action_codes;
        $call->description = $request->description;
        $call->contact_person_id = $request->contact_person_id;
        $call->phone = $request->phone;
        $call->user_id = Auth::user();

        $call->save();
        Note::create([
            'notable_id'=>$call->id,
            'notable_type'=>'Call',
            'user_id'=>Auth::user(),
            'note'=>'Edited outgoing call to '.Lead::find($request->lead_id)->name
        ]);
        return redirect::back()->with('success', 'Changes saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        $call->delete();
        return Redirect::back()->with('success', 'Call has been deleted');
    }
}
