<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Team;
use Illuminate\Http\Request;
use DataTables;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()) {
            $teams = Team::with('country:id,name')->orderBy('id');
            return DataTables::of($teams)
            ->addColumn('actions', function($team) { 
                $btn = "
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item' href='".route('teams.show', $team->id)."'><i class='fa fa-eye'></i> View</a>
                        <a class='dropdown-item' href='".route('teams.edit', $team->id)."'><i class='la la-pencil'></i> Edit</a>
                        <form action='".route('teams.destroy', $team->id)."' method='POST'>   
                            <input type='hidden' name='_method' value='delete' />
                            <input type='hidden' name='_token' value=' ".csrf_token()." '>
                            <button type='submit' class='dropdown-item'><i class='fa fa-trash'></i> Delete</button>
                        </form>  
                    </div>
                </div>
            ";
            return $btn;
            })
            ->addColumn('members', function(Team $team) {
                return count($team->users);
            })
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('teams.index',[
            'countries' => Country::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('teams.create_modal');
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
           'code'       => 'nullable|string',
           'country_id' => 'required|numeric|max:255|min:0',
		   'description' => 'nullable|string'
		]);

        $team = Team::create([
            'name' => $request->name,
            'code' => $request->name,
            'country_id' => $request->country_id,
            'description' => $request->description
        ]);
     
        if ($team != null) {
            return redirect()->back()->with('success', 'Success! Team Saved');
        }
        return redirect()->back()->with('fail', 'Oops! Team already exist!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', ['users'=>$team->users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $team = Team::findOrFail($id);
        return view('teams.edit',['team'=>$team, 'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->update(request()->validate([
            'name' => 'required',
            'code' => 'required',
            'country_id' => 'required',
            'description' => 'required'
        ]));
        return redirect()->route('teams.index')->with('success', 'Team has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return back()->with('error', 'Team deleted successfully!');
    }

    //ajax add team
    public function add_team (Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|string',
            'code'       => 'nullable|string',
            'country_id' => 'required|numeric|max:255|min:0',
            'description' => 'nullable|string'
         ]);
 
         $team = Team::create([
             'name' => $request->name,
             'code' => $request->name,
             'country_id' => $request->country_id,
             'description' => $request->description
         ]);
      
         if ($team != null) {
             return $team;
         }
        //  return redirect()->back()->with('fail', 'Oops! Team already exist!');
    }
}
