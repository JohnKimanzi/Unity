<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('isAgent', function (User $user) {
        //     // dd(strtolower($user->role) == 'team_leader' );
        //     return strtolower($user->role) == 'agent' ;
        // }); 

        // $this->registerPolicies();
        // Gate::define('isTeamLeader', function (User $user) {
        //     // dd(strtolower($user->role) == 'team_leader' );
        //     return  strtolower($user->role) == 'team_leader' ;
        // }); 
        // $this->registerPolicies();
        // Gate::define('isAdmin', function (User $user) {
        //     // dd(strtolower($user->role) == 'team_leader' );
        //     return strtolower($user->role) == 'admin' ;
        // }); 

       
        // Gate::define('admin', function (User $user) {
        //     return $user->permissions->contains('role.code','ADMIN') ;
        // }); 
        // Gate::define('agent', function (User $user) {
        //     return $user->permissions->contains('role.code',"AGENT") ;
        // }); 
        // Gate::define('team_leader', function (User $user) {
        //     dd( $user->permissions->contains('role.code','TEAMLEADER'));
        //     return $user->permissions->contains('role.code',"TEAMLEADER") ;
        // }); 
        // Gate::define('closer', function (User $user) {
        //     return $user->permissions->contains('role.code',"CLOSER") ;
        // }); 
       
    }
}
