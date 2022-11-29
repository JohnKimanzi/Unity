<?php

namespace App\Http\Controllers;

use App\Models\PtoType;
use App\Models\Pto;
use Illuminate\Http\Request;

class PtoTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pto.pto_types.index', ['pto_types'=>PtoType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pto.pto_types.create_modal');
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
            'name'       => 'required|string',
            'max_hours'       => 'required|numeric|max:255|min:0',
            'max_roll_over' => 'required|numeric|max:255|min:0',
            'status' => 'required|boolean'
         ]);
 
         $pto_type = PtoType::create([
             'name' => $request->name,
             'max_hours' => $request->max_hours,
             'max_roll_over' => $request->max_roll_over,
             'status' => $request->status
         ]);
      
         if ($pto_type != null) {
             return redirect()->back()->with('success', 'Success! PTO Type Saved');
         }
         return redirect()->back()->with('fail', 'Oops! PTO Type already exist!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PtoType  $ptoType
     * @return \Illuminate\Http\Response
     */
    public function show(PtoType $pto_type)
    {
        return view('pto.pto_types.show', ['pto_type'=>$pto_type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PtoType  $ptoType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $pto_type = PtoType::findOrFail($id);
        return view('pto.pto_types.edit', ['pto_type'=>$pto_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PtoType  $ptoType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PtoType $pto_type)
    {
        $pto_type->update(request()->validate([
            'name' => 'required',
            'max_hours' => 'required',
            'max_roll_over' => 'required',
            'status' => 'required'
        ]));
        return redirect()->route('pto_types.index')->with('success', 'PTO Type has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PtoType  $ptoType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PtoType $pto_type)
    {
        $pto_type->delete();
        return back()->with('error', 'PTO Type deleted successfully!');
    }
    public function get_pto_type_attachment_required(PtoType $pto_type){
        // dd($pto_type);
        return json_encode($pto_type->attachment_required);
        if($pto_type->attachment_required){
            return true;
        }else return false;
        // return $pto_type->attachment_required;
    }
}
