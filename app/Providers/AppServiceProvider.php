<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('time_records.time_records_filter', function($view){
            $view->with([
                'f_designations'=>Designation::all(), 
                'f_departments'=>Department::all(), 
                'f_employees'=>User::all(),
                'f_managers'=>User::role('Team Leader')->get(),
                'f_pay_period'=>CarbonPeriod::create(now()->startOfMonth()->subMonths(11),'1 month', now()->startOfMonth()),
            ]);
        });

        view()->composer('users.user_records_filter', function($view){
            $view->with([
                'f_designations'=>Designation::all(), 
                'f_departments'=>Department::all(), 
                'f_employees'=>User::all(),
                'f_managers'=>User::role('Team Leader')->get(),
            ]);
        });


        
        #Morph map
        Relation::morphMap([
            'Call'=>'App\Models\Call',
            'Debtor'=>'App\Models\Debtor',
            'Debt'=>'App\Models\Debt',
            'Client'=>'App\Models\Client',
            'LeadBatch'=>'App\Models\LeadBatch',
            'GenDoc'=>'App\Models\GenDoc',
            'ContactPerson'=>'App\Models\ContactPerson',
            'Template'=>'App\Models\Template',
            'Lead'=>'App\Models\Lead',
            'Contact'=>'App\Models\Contact',
            'Company'=>'App\Models\Company',
            'ActionCode'=>'App\Models\ActionCode',
            'User'=>'App\Models\User',
            'Pto'=>'App\Models\Pto',
            'Document'=>'App\Models\Document',
            'EmployeeSchedule'=>'App\Models\EmployeeSchedule',
            
        ]);

        // Relation::enforceMorphMap([
        //     'ActionCode' => 'App\Models\ActionCode',
        // ]);

        #pass data to various views
        view()->composer('time_records.time_records_filter', function($view){
            $view->with([
                'designations'=>Designation::all(),
            ]);
        });

    }
}
