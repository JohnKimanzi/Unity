<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Note;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'debt_id'=>'required|',
            'amount'=>'required|double',
            'payment_method'=>'required|string',
            'payment_date'=>'required|date|before_or_equal:today',
            'paid_by'=>'nullable|string',
        ]);

        $request->paid_by = ($request->paid_by) ? $request->paid_by : 'self';
        $debt=Debt::findOrFail($request->debt_id);

        $debt->payments()->save(new Payment([
            'amount'=>$request->amount,
            'payment_method'=>$request->payment_method,
            'payment_date'=>$request->payment_date,
            'paid_by'=>$request->paid_by,
        ]));

        $debt->notes()->save(new Note([
            'subject'=>'Payment',
            'note'=>'New payment made on '.$request->payment_date.' by '.$request->paid_by,
            'user_id'=>Auth::user()->id,
        ]));

        // We might need to update balance add updatable field for bal on payment table
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
