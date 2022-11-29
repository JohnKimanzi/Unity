<?php

namespace App\Http\Controllers;

use App\Models\GlobalSearch;
use App\Traits\CustomGlobalFunctions;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller
{
    use CustomGlobalFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leads=$this->global_search_fn($request->search_term);
        // return view('leads.profile_redone.lead_list', ['leads'=>$leads,'logs'=>$logs]);
        return view('leads.pool.index', ['leads'=>$leads]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GlobalSearch  $globalSearch
     * @return \Illuminate\Http\Response
     */
    public function show(GlobalSearch $globalSearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GlobalSearch  $globalSearch
     * @return \Illuminate\Http\Response
     */
    public function edit(GlobalSearch $globalSearch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GlobalSearch  $globalSearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GlobalSearch $globalSearch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GlobalSearch  $globalSearch
     * @return \Illuminate\Http\Response
     */
    public function destroy(GlobalSearch $globalSearch)
    {
        //
    }
}
