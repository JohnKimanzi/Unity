<?php

namespace App\Http\Controllers;

use App\Models\TimeOff;
use App\Models\TimeOffType;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class TimeOffTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $timeofftypes = TimeOffType::all();
            return DataTables::of($timeofftypes)
            ->addColumn('actions', function($timeOffType) { 
                $btn = "
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item' href='".route('time_off_types.show', $timeOffType->id)."'><i class='fa fa-eye'></i> View</a>
                        <a class='dropdown-item' href='".route('time_off_types.edit', $timeOffType->id)."'><i class='la la-pencil'></i> Edit</a>
                        <form action='".route('time_off_types.destroy', $timeOffType->id)."' method='POST'>   
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
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('time_off_types.index', ['timeofftypes' => TimeOffType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('time_off_types.create_modal');
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
            'description' => 'nullable|string'
         ]);
 
         $timeOffType = TimeOffType::create([
             'name' => $request->name,
             'description' => $request->description
         ]);
      
         if ($timeOffType != null) {
             return redirect()->back()->with('success', 'Success! TimeOffType Saved');
         }
         return redirect()->back()->with('fail', 'Oops! TimeOffType already exist!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeOffType  $timeOffType
     * @return \Illuminate\Http\Response
     */
    public function show(TimeOffType $timeOffType)
    {
        return view('time_off_types.show', ['users'=>$timeOffType->users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeOffType  $timeOffType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timeOffType = TimeOffType::findOrFail($id);
        return view('time_off_types.edit',['timeOffType'=>$timeOffType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeOffType  $timeOffType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeOffType $timeOffType)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                // 'paid_status' => 'required'
            ]);
        } catch (\Throwable $th) {
            throw ($th);
        }
        $timeOffType->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('time_off_types.index')->with('success', 'TimeOffType has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeOffType  $timeOffType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeOffType $timeOffType)
    {
        $timeOffType->delete();
        return back()->with('error', 'TimeOffType deleted successfully!');
    }
}
