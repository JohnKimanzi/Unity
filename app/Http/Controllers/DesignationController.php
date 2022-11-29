<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use DataTables;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $designations = Designation::with('department:id,name')->get();
            return DataTables::of($designations)
            ->addIndexColumn()
            ->addColumn('actions', function($designation) { 
                $btn = "
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item' href='".route('designations.show', $designation->id)."'><i class='fa fa-eye'></i> View</a>
                        <a class='dropdown-item' href='".route('designations.edit', $designation->id)."'><i class='la la-pencil'></i> Edit</a>
                        <form action='".route('designations.destroy', $designation->id)."' method='POST'>   
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
            ->make(true);
        }
        return view('designations.index',['departments'=>Department::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designations.create_modal');
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
            'department_id'=>'nullable|string',
            'description' => 'nullable|string'
         ]);
 
         $designation = Designation::create([
             'name' => $request->name,
             'department_id'=>$request->department_id,
             'description' => $request->description
         ]);
      
         if ($designation != null) {
             return redirect()->back()->with('success', 'Success! Designation Saved');
         }
         return redirect()->back()->with('fail', 'Oops! Designation already exist!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        return view('designations.show', ['users'=>$designation->users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        return view('designations.edit', ['designation'=>$designation, 'departments'=>Department::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
        $designation->update(request()->validate([
            'name' => 'required',
            
            'description' => 'required'
        ]));
        return redirect()->route('designations.index')->with('success', 'Designation has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return back()->with('error', 'Designation deleted successfully!');
    }

    //ajax add designation
    public function add_designation (Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|string',
            'department_id' => 'nullable|string',
            'description' => 'nullable|string'
         ]);
 
         $designation = Designation::create([
             'name' => $request->name,
             'department_id' => $request->department_id,
             'description' => $request->description
         ]);
      
         if ($designation != null) {
             return $designation;
         }
        //  return redirect()->back()->with('fail', 'Oops! Team already exist!');
    }
}
