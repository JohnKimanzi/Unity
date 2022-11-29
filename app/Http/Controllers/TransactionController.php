<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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
        try {
            $this->validate($request, [
                'amount'=>'required|numeric',
                'transacted_by'=>'nullable|string',
                'transaction_type_id'=>'required|UUID',
                'collector_id'=>'nullable|numeric',
                'co_collector_id'=>'nullable|numeric',
                'co_co_collector_id'=>'nullable|numeric',
                'debt_id'=>'required|numeric',
                'note'=>'nullable|string',
                'transaction_date'=>'nullable|date|before_or_equal:today',
            ]);
        } catch (\Throwable $th) {
            dd($th);
            // throw $th;
        }

        $request->transacted_by = ($request->transacted_by) ? $request->transacted_by : 'self';
        $request->transaction_date = ($request->transaction_date) ? Carbon::create($request->transaction_date)->format('Y-m-d') : now()->format('Y-m-d');
        // dd($request->transaction_date);
        $debt=Debt::findOrFail($request->debt_id);

        $debt->transactions()->save(new Transaction([
            'amount'=>$request->amount,
            'transacted_by'=>$request->transacted_by,
            'transaction_type_id'=>$request->transaction_type_id,
            'user_id'=>Auth::user()->id,
            'collector_id'=>$request->collector_id,
            'co_collector_id'=>$request->co_collector_id,
            'co_co_collector_id'=>$request->co_co_collector_id,
            'transaction_date'=>$request->transaction_date,
            'note'=>$request->note,
        ]));

        return back()->with('success', 'Transaction has been recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
