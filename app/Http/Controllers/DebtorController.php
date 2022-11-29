<?php

namespace App\Http\Controllers;

use App\Models\Debtor;
use Illuminate\Http\Request;

class DebtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debtors=Debtor::all();
        return view('mark_design.debtor.index', ['debtors'=>$debtors]);
        //
    }
    public function list_view()
    {
        $debtors=Debtor::has('debts')->get();
        return view('debtors.list_view', ['debtors'=>$debtors]);
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
        $request->validate([
          'first_name' => 'required',
          'last_name'  => 'required',
          'other_names' => 'required',
          'ssn' => 'required',
          'gender' => 'required',
          'dob' => 'required',
          'status' => 'required'
        ]);

        $debtor = Debtor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_names' => $request->other_names,
            'ssn' => $request->ssn,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'status' => $request->status
        ]);

        if(is_int($debtor->id))

        return redirect()->back()->with('success', 'Debtor has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function show(Debtor $debtor)
    {
        return view('debtors.show', ['debtor'=>$debtor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function edit(Debtor $debtor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debtor $debtor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debtor $debtor)
    {
        //
    }
}
