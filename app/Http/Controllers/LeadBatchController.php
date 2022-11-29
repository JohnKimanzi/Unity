<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Concatenate;

class LeadBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('leads.batches.index', ['batches'=>LeadBatch::all()])->with('success', 'Showing all uploaded batches');
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
     * @param  \App\Models\LeadBatch  $leadBatch
     * @return \Illuminate\Http\Response
     */
    public function show(LeadBatch $leadBatch)
    {
         $leads = $leadBatch->leads;
    //     return view('leads.profile_redone.lead_list', compact('leads'));
        return view('leads.profile_redone.lead_list', ['leads' => $leads]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeadBatch  $leadBatch
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadBatch $leadBatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeadBatch  $leadBatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadBatch $leadBatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeadBatch  $leadBatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadBatch $leadBatch)
    {
        //
    }
}
