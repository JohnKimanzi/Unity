<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $departments = Department::all();
            return DataTables::of($departments)
            ->addIndexColumn()
            ->addColumn('actions', function($department) { 
                $btn = "
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item' href='".route('departments.show', $department->id)."'><i class='fa fa-eye'></i> View</a>
                        <a class='dropdown-item' href='".route('departments.edit', $department->id)."'><i class='la la-pencil'></i> Edit</a>
                        <form action='".route('departments.destroy', $department->id)."' method='POST'>   
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
        return view('departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create_modal');
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
 
         $department = Department::create([
             'name' => $request->name,
             'description' => $request->description
         ]);
      
         if ($department != null) {
             return redirect()->back()->with('success', 'Success! Department Saved');
         }
         return redirect()->back()->with('fail', 'Oops! Department already exist!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show', ['users'=>$department->users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', ['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->update(request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]));
        return redirect()->route('departments.index')->with('success', 'Department has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return back()->with('danger', 'Department deleted successfully!');
    }
}
