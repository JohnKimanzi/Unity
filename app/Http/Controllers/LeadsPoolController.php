<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Traits\CustomGlobalFunctions;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class LeadsPoolController extends Controller
{
    use CustomGlobalFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leads.pool.index', ['leads'=> Lead::all()]);
    }
    public function filter(Request $request)
    {
        
        return view('leads.pool.index', ['leads'=>$this->filter_function($request)]);
    }
    public function filter_ajax(Request $request)
    {
        try {
            $leads= $this->filter_function($request);   
            $leads->each(function(lead $lead){
                $lead->agent_name=isset($lead->agent->name) ? $lead->agent->name : '';
                $lead->date_created= isset($lead->created_at) ? date('d-m-Y', strtotime($lead->created_at)) : '';
            });
           
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()]);
        }
        
        // $leads->dd();
        return response()->json(['leads'=>$leads]);
    }

    public function select_pool(Request $request){
        $pool=$request->pool;
        $leads=collect();
        if ($pool=='latest') {
           $leads=Lead::where('batch_id', DB::table('lead_batches')->latest()->first()->id)->get(); 
        } 
        
        elseif($pool=='unassigned') {
            $leads=Lead::where('status', 'new')->where('sales_rep_id', null)->latest()->get();
        }
        
        elseif($pool=='hot') {
            $leads=Lead::where('status', 'hot')->where('closer_id', null)->latest()->get();
        }
        $leads->each(function(lead $lead){
            $lead->agent_name=isset($lead->agent->name) ? $lead->agent->name : '';
            $lead->date_created= isset($lead->created_at) ? date('d-m-Y', strtotime($lead->created_at)) : '';
        });
        return response()->json(['leads'=>$leads]);
        
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
    public function show($id)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
