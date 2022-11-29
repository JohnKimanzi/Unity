<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
class StatusController extends Controller
{
    public function update(Request $request, $lead){

        $input = $request->get('new_status');

        Lead::where('id', $lead)->update(['status' => $input]);

    return back()->with('success','Lead conversion successful');
    }
    
}
