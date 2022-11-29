<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\TimeRecordType;
use Illuminate\Http\Request;

use DataTables;

class TimeRecordTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $timeRecordtypes = TimeRecordType::all();
            $i=0;
            return DataTables::of($timeRecordtypes)
            ->editColumn('id',  function($timeRecordType) use ($i){ return ++$i; })
            ->addColumn('actions', function($timeRecordType) { 
                $btn = "
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item' href='".route('time_record_types.show', $timeRecordType->id)."'><i class='fa fa-eye'></i> View</a>
                        <a class='dropdown-item' href='".route('time_record_types.edit', $timeRecordType->id)."'><i class='la la-pencil'></i> Edit</a>
                        <form action='".route('time_record_types.destroy', $timeRecordType->id)."' method='POST'>   
                            <input type='hidden' name='_method' value='delete' />
                            <input type='hidden' name='_token' value=' ".csrf_token()." '>
                            <button type='submit' class='dropdown-item'><i class='fa fa-trash'></i> Delete</button>
                        </form>  
                    </div>
                </div>
            ";
            return $btn;
            })
            ->editColumn('description', function($request){
                return $request->description = isset($request->description) ? $request->description : 'N/A';
            })
            ->editColumn('is_paid', function($request){
                return $request->is_paid =($request->is_paid) ? "Paid" : 'Not Paid';
            })
            ->rawColumns(['actions'])
            ->addIndexColumn() 
            ->make(true);
        }
        return view('time_record_types.index', ['timerecordtypes' => TimeRecordType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('time_record_types.create_modal');
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
            'description' => 'nullable|string',
            'is_paid' => 'required|boolean',
         ]);

         #ensuring we have the right phrases  in place
         if(Str::contains(strtolower($request->name), ['clock', 'custom'])){
            return back()->with('error', "Fail! Usage of the word <strong>{$request->name}</strong> as part of break name is disallowed.");
         }else if (! Str::contains(strtolower($request->name), 'break')) {
            return back()->with('error', 'Fail! Please be sure to use the word "break" as part of break name.');
         }
 
         $timeRecordType = TimeRecordType::create([
             'name' => $request->name,
             'description' => $request->description,
             'is_paid' => $request->is_paid,
         ]);
      
         if ($timeRecordType != null) {
             return redirect()->back()->with('success', 'Success! TimeRecordType Saved');
         }
         return redirect()->back()->with('fail', 'Oops! TimeRecordType already exist!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeRecordType  $time_record_type
     * @return \Illuminate\Http\Response
     */
    public function show(TimeRecordType $timeRecordType)
    {
        return view('time_record_types.show', ['users'=>$timeRecordType->users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeRecordType  $time_record_type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timeRecordType = TimeRecordType::findOrFail($id);
        return view('time_record_types.edit',['timeRecordType'=>$timeRecordType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeRecordType  $time_record_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeRecordType $timeRecordType)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'is_paid' => 'required',
        ]);

        #ensuring we have the right phrases  in place
        if(Str::contains(strtolower($request->name), ['clock', 'custom'])){
            return back()->with('error', "Fail! Usage of the word <strong>{$request->name}</strong> as part of break name is disallowed.");
        }else if (! Str::contains(strtolower($request->name), 'break')) {
        return back()->with('error', 'Fail! Please be sure to use the word "break" as part of break name.');
        }
        $timeRecordType->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_paid' => $request->is_paid,
        ]);
        return redirect()->route('time_record_types.index')->with('success', 'TimeRecordType has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeRecordType  $time_record_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeRecordType $timeRecordType)
    {
        $timeRecordType->delete();
        return back()->with('error', 'TimeRecordType deleted successfully!');
    }
}
