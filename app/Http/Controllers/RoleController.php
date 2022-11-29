<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller {

   public function __construct() {
      $this->middleware('admin'); // requires authentication
   }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
// dd('hj');
		$this->check_permission('Manage Roles');

        
		$roles = Role::all();
		return view('user_management.roles.index', ['roles'=>$roles, 'permissions'=>Permission::all()]);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$this->check_permission('Manage Roles');

		$permissions = Permission::all();
		return view('user_management.roles.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->check_permission('Manage Roles');

		$this->validate($request, [
		   'name'       => 'required|string',
		   'dscription' => 'nullable|string'
		]);

		// Role::create([
		// 	'name'=>$request->role_name,
		// 	'description'=>$request->role_desc,
		// ]);
		
		$permissions      = $request->permissions;
		$role             = new Role;
		$role->name       = $request->input('name');
		$role->description = $request->input('description');
		$role->save();
		
		$permissions = $request->get('permissions', []);
		$role->syncPermissions($permissions);

		return redirect()->back()->with('success', 'Role Created Successfully!');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, Role $role)
	{
		$permission = $role->permissions;
	    return view('user_management.roles.show', ['role'=>$role, 'permission'=>$permission]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, int $id) {

		$this->check_permission('Manage Roles');

		$role        = Role::findOrFail($id);
		$permissions = Permission::all();

		return view('user_management.roles.edit', compact('role', 'permissions'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, int $id) {

		$this->check_permission('Manage Roles');

		$role             = Role::findOrFail($id);
		$role->name       = $request->name;
		$role->guard_name = $request->guard_name;
		$role->save();

		$permissions = $request->get('permissions', []);
		$role->syncPermissions($permissions);

		return redirect()->back()->with('success', 'Role Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role)
	{
	
	    if (count($role->users) ){
			return back()->with('error', 'Fail! There are users assigned to this role');
		}else {
			$role->delete;
			return back()->with('success', 'Role deleted successfully!');
		}
	}

	public function revoke_role (Request $request, Role $role)
	{
		$request->validate([
         'user_id' => 'required',
		 'role_id' => 'required'
		]);

		$role = Role::findOrFail($request->role_id);
		$user = User::findOrFail($request->user_id);

		$user->removeRole($role);
  
		return redirect()->back()->with('success', 'User has been removed from Role successfully!');
	}
}
