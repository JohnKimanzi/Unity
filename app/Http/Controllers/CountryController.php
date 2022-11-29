<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $countries = Country::latest();
            return DataTables::of($countries)
            ->addColumn('actions', function($country) { 
                $btn = "
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item' href='".route('countries.show', $country->id)."'><i class='fa fa-eye'></i> View</a>
                        <a class='dropdown-item' href='".route('countries.edit', $country->id)."'><i class='fa fa-pencil'></i> Edit</a>
                        <form action='".route('countries.destroy', $country->id)."' method='POST'>   
                            <input type='hidden' name='_method' value='delete' />
                            <input type='hidden' name='_token' value=' ".csrf_token()." '>
                            <button type='submit' class='dropdown-item'><i class='fa fa-trash'></i> Delete</button>
                        </form>  
                    </div>
                </div>
            ";
            return $btn;
            })
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('countries.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('countries.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {

        $country->delete();

        return back()->with('error', 'Country deleted successfully!');
    }
}
