<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactPerson;


class ContactPersonController extends Controller
{
    public function store(Request $request){
        // dd($request);
        ContactPerson::create([
            'lead_id'=>$request->get('lead_id'),
            'title'=>$request->get('title'),
            'contact_type'=>$request->get('contact_type'),
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email'),
            'physical_address'=>$request->get('address'),
            'phone'=>$request->get('phone'),
        ]);

        return back()->with('success','Contact Added.');
}
}
