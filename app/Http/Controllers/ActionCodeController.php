<?php

namespace App\Http\Controllers;

use App\Models\ActionCode;
use App\Models\Client;
use App\Models\Debt;
use App\Models\Lead;
use Illuminate\Http\Request;

class ActionCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        ActionCode::create([

            'name'=>$request->get('action_code_name'),
            'status'=>$request->get('status'),
            'text_color'=>$request->get('fontcolor'),
            'bg_color'=>$request->get('bgcolor'),
            'is_blinking'=>$request->get('blink'),
            'is_strike_through'=>$request->get('linethro'),
            'is_underline'=>$request->get('underline'),
            'is_bold'=>$request->get('bold'),
        ]);
        return back()
                ->with('success','Action Code Added')
                 ;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActionCode  $actionCode
     * @return \Illuminate\Http\Response
     */
    public function show(ActionCode $actionCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActionCode  $actionCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ActionCode $actionCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActionCode  $actionCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActionCode $actionCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActionCode  $actionCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActionCode $id)
    {
        $id->delete();
        return back()
                ->with('success','Action Code deleted')
                 ;

    }
    public function assign_action_code(ActionCode $actionCode, $slug, $id)
    {
        $model= $slug->find($id);
        $model->action_codes()->save($actionCode);
        //
    }
    public function lead_action_code(ActionCode $actionCode, Lead $lead)
    {
        $lead->action_codes()->save($actionCode);
        //
    }
    public function client_action_code(ActionCode $actionCode, Client $client)
    {
        $client->action_codes()->save($actionCode);
        //
    }
    public function debt_action_code(ActionCode $actionCode, Debt $debt)
    {
        $debt->action_codes()->save($actionCode);
        //
    }
}
