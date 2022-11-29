<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeSchedule;
use App\Models\Pto;
use App\Models\PtoType;
use App\Models\State;
use App\Models\Team;
use App\Models\User;
use App\Traits\CustomGlobalFunctions;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    use CustomGlobalFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('view_deleted')) {
            $users = User::onlyTrashed()->get();
        } else $users = User::all();
        return view('users.index', [
            'users' => $users,
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'designations' => Designation::all(),
            'departments' => Department::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'teams' => Team::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd(Role::all());
        return view('users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'fname' => 'required|string',
            'mname' => 'nullable|string',
            'lname' => 'required|string',
            'id' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'personal_email' => 'required|string|unique:users,personal_email',
            'password' => 'nullable|string|min:8',
            'phone1' => 'required|string|unique:users,phone1',
            'phone2' => 'nullable|string|unique:users,phone2',
            'dob' => 'required|date|before:yesterday',
            'gender' => 'required|string',
            'designation_id' => 'required|uuid',
            'country_id' => 'required|numeric|max:255|min:0',
            'address' => 'required|string',
            'state_id' => 'required|numeric|max:100|min:0',
            'zip_code' => 'nullable|string|min:5|max:9',
            'team_id' => 'required|numeric|max:255|min:0',
            'city' => 'required|string',
            'doj' => 'required|date',
            'pay_rate' => 'required|numeric|min:0'
        );

        try {
            $this->validate($request, $rules);
        } catch (\Throwable $th) {
            throw $th;
            // dd($th) ;
        }
        // dd($request->all());
        // dd('input has been validated!');

        if ($request->password == null) {
            $password = Hash::make($request->phone1);
        } else {
            $password = Hash::make($request->password);
        }

        isset($request->password) ?  $password = Hash::make($request->password) : $password = Hash::make($request->phone1);

        $user = User::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'ssn' => $request->id,
            'personal_email' => $request->personal_email,
            'email' => $request->email,
            'password' => $password,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'dob' => date('Y-m-d', strtotime($request->dob)),
            'gender' => $request->gender,
            'designation_id' => $request->designation_id,
            'country_id' => $request->country_id,
            'address' => $request->address,
            'city' => $request->city,
            'state_id' => $request->state_id,
            'zip_code' => $request->zip_code,
            'team_id' => $request->team_id,
            'pay_rate' => $request->pay_rate,
            'doj' => $request->doj
        ]);

        $this->syncPermissions($request, $user);
        //$this->ptoAllocation($request, $user);

        if ($user != null) {
            return Redirect::back()->with('success', 'User has been added');
        }
        return Redirect::back()->with('fail', 'Oops! User wasnt created');

        //    dd('Done!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function showUser(User $user)
    // {
    //     if(Auth::user()->id != $user->id || !Auth::user()->can('Manage Users')){
    //         abort(403);
    //     }

    //     return view('users.show', ['user' => $user]);
    // }
    public function show(User $user)
    {
        // dd($this->getDocumentTypes('user'));
        return view('users.show', [
            'user' => $user,
            'ptos' => $user->ptos,
            'document_types' => $this->getDocumentTypes('user'),
            'all_schedules'=>EmployeeSchedule::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user);
        // $user = $user->id;
        $designations = Designation::all();
        $teams = Team::all();
        $states = State::all();
        $countries = Country::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.edit', compact('user', 'designations',  'teams', 'states', 'roles', 'permissions', 'countries'));
        // return view('users.edit', ['user'=>$user,'designations'=>Designation::all(), 'departments'=>Department::all(),]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $rules = array(
            'fname' => 'required|string',
            'mname' => 'nullable|string',
            'lname' => 'required|string',
            'id' => 'required|string',
            'email' => 'required|string',
            'personal_email' => 'required|string',
            'password' => 'nullable|string|min:8',
            'phone1' => 'required|string',
            'phone2' => 'nullable|string',
            'dob' => 'required|date|before:yesterday',
            'gender' => 'required|string',
            'designation_id' => 'required|uuid',
            'country_id' => 'required|numeric|max:255|min:0',
            'address' => 'required|string',
            'city' => 'required|string',
            'state_id' => 'required|numeric|max:100|min:0',
            'zip_code' => 'nullable|string|min:5|max:9',
            'team_id' => 'required|numeric|max:255|min:0',
            'doj' => 'required|date',
            'pay_rate' => 'required|numeric|min:0'
        ); //Include town/city of residence and country for non-us guys
        $this->validate($request, $rules);

        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->id = $request->id;
        $user->email = $request->email;
        $user->personal_email = $request->personal_email;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->designation_id = $request->designation_id;
        $user->country_id = $request->country_id;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state_id = $request->state_id;
        $user->zip_code = $request->zip_code;
        $user->team_id = $request->team_id;
        $user->pay_rate = $request->pay_rate;
        $user->doj = $request->doj;

        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $this->syncPermissions($request, $user);
        return Redirect::route('users.index')->with('success', 'User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {

        $user->delete();
        return Redirect::route('users.index')->with('success', 'User has been deleted successfully');
    }
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return back();
    }
    public function restoreAll()
    {
        User::onlyTrashed()->restore();
        return back();
    }
    public function check_email_exists(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email'
            ]);
            try {
                $this->validate($request, ['email' => 'unique:users,email']);
                return response()->json(['exists' => false]);
            } catch (\Throwable $th) {
                return response()->json(['exists' => true]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        // $this->validate($request, [
        //     'email'=>'required|email|unique:users,email'
        // ]);
    }
    public function user_records_filter(Request $request)
    {
        $request->validate([
            'doj_from'=>(isset($request->doj_to)?'required':'nullable'),
            'doj_to'=>(isset($request->doj_from)?'required':'nullable'),
        ]);
        ( $request->doj_from ) ? $doj_from = Carbon::createFromFormat('d/m/Y', $request->doj_from)->format('Y-m-d') : null;
        ( $request->doj_to ) ? $doj_to = Carbon::createFromFormat('d/m/Y', $request->doj_to)->format('Y-m-d') : null;
        $request->merge([
            'formated_doj_from'=>$doj_from ?? null,
            'formated_doj_to'=>$doj_to ?? null,
        ]);
        $request->validate([
            'user_id'=>'nullable',
            'user_name'=>'nullable',
            'user_email'=>'nullable',
            'user_phone'=>'nullable',
            'designation_id'=>'nullable',
            'department_id'=>'nullable',
            'manager_id'=>'nullable',
            'formated_doj_from'=>'nullable|before_or_equal:formated_doj_to|before_or_equal:today',
            'formated_doj_to'=>'nullable|after_or_equal:formated_doj_from|before_or_equal:today',
        ]);
        // dd($request->all());

        $users=collect();
        if (isset($request->user_id)){
            $users=User::where('id', $request->user_id)->get();
        }
        if (count($users) <= 0){
            $users = $this->user_filter($request);
        }
        return view('users.index', [
            'users' => $users,
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'designations' => Designation::all(),
            'departments' => Department::all(),
            'countries' => Country::all(),
            'states' => State::all(),
            'teams' => Team::all(),

            'name' =>$request->user_name,
            'phone' =>$request->user_email,
            'email' =>$request->user_phone,
 
        ]);
    }
    public function user_filter_ajax(Request $request)
    {
        try {
            $users = $this->user_filter($request);
            $users->each(function (user $user) {
                $user->designation->name = isset($user->designation->name) ? $user->designation->name : '';
                $user->name = isset($user->name) ? $user->name : '';
                $user->department->name = isset($user->department->name) ? $user->department->name : '';
                $user->date_created = isset($user->created_at) ? date('d-m-Y', strtotime($user->created_at)) : '';
            });
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }

        // $users->dd();
        return response()->json(['users' => $users]);
    }


    // public function user_records_filter(Request $request, User $users)
    // {
    // dd($users);
    //  return $users->get();
    // }

    private function syncPermissions(Request $request, User $user)
    {

        // submitted roles / permissions
        $roles       = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {

            // reset all direct permissions for user
            // Bob - I have a potential problem with this - but we'll leave it for now
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }
        $user->syncRoles($roles);
        return $user;
    }

    private function ptoAllocation(Request $request, User $user)
    {

        $user->pto_allocations()->create([
            'record_year' => now()->format('Y'),
            'pto_type_id' => PtoType::where('name', 'like', '%personal%')->first()->id,
            'allocated_hours' => $request->personal_allocated_hours,
            'can_roll_over' => $request->personal_can_rollover,
            'max_roll_over' => $request->personal_rollover_hours,
        ]);
        $user->pto_allocations()->create([
            'record_year' => now()->format('Y'),
            'pto_type_id' => PtoType::where('name', 'like', '%medical%')->first()->id,
            'allocated_hours' => $request->medical_allocated_hours,
            'can_roll_over' => $request->medical_can_rollover,
            'max_roll_over' => $request->medical_rollover_hours,
        ]);
        $user->pto_allocations()->create([
            'record_year' => now()->format('Y'),
            'pto_type_id' => PtoType::where('name', 'like', '%vacation%')->first()->id,
            'allocated_hours' => $request->vacation_allocated_hours,
            'can_roll_over' => $request->vacation_can_rollover,
            'max_roll_over' => $request->vacation_rollover_hours,
        ]);
    }
}
