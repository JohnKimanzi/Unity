<?php

use App\Http\Controllers\PtoController;
use App\Models\Company;
use App\Models\TimeRecordType;
use App\Notifications\Noti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function App\Helpers\isActivatable;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// })->name('dashboard')->middleware(['auth','clocked_in']);

Auth::routes();
Route::get('/register', function () {
    return redirect('/');
});
Noti::push();   

Route::group(['middleware' => ['auth', 'validate_password']], function () {
    Route::group(['middleware' => ['clocked_in']], function () { 
        #Home
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

        #Pto
        Route::get('get-pto-data', [App\Http\Controllers\TimeOffController::class, 'get_pto_data'])->name('get-pto-data');
        Route::resource('pto', PtoController::class);
        Route::post('pto_status', [App\Http\Controllers\PtoController::class, 'pto_status'])->name('pto_status');
        
        #clients
        Route::resource('clients', App\Http\Controllers\ClientController::class);
        Route::get('clients-grid-view', [App\Http\Controllers\ClientController::class, 'grid_view'])->name('clients-grid-view');
        Route::get('my_clients', [App\Http\Controllers\ClientController::class, 'my_clients'])->name('my_clients');
       
        #Contact
        Route::post('addcontact', [App\Http\Controllers\ContactPersonController::class, 'store']);
        
        #Meeting
        Route::post('schedule_meeting', [App\Http\Controllers\MeetingsController::class, 'store']);

        #Users
        Route::post('check_email_exists', [App\Http\Controllers\UserController::class, 'check_email_exists'])->name('check_email_exists');
        Route::post('user_records_filter', [App\Http\Controllers\UserController::class, 'user_records_filter'])->name('user_records_filter');
        Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'showUser']);
        Route::post('ajaxuserfilter', [App\Http\Controllers\UserController::class, 'user_filter_ajax'])->name('ajaxuserfilter');
        #Employees
        Route::resource('employees', App\Http\Controllers\EmployeeController::class);
        
        #Mark designs
        Route::get('re_design_ui/{id}', [App\Http\Controllers\MarkDesignController::class, 'show']);
        
        #Action codes
        Route::post('action_code_new', [App\Http\Controllers\ActionCodeController::class, 'store']);
        Route::post('assign_action_code/{actionCode}/{slug}/{id}', [App\Http\Controllers\ActionCodeController::class, 'assign_action_code']);
        Route::get('delete_action/{id}', [App\Http\Controllers\ActionCodeController::class, 'destroy']);
        
        #Documents
        Route::post('doc_upload', [App\Http\Controllers\DocumentController::class, 'DocumentUpload']);
        Route::get('doc_download/{document}', [App\Http\Controllers\DocumentController::class, 'download'])->name('doc_download');
        
        
        #Chat
        Route::get('chat_room', [App\Http\Controllers\ChatController::class, 'index']);
        Route::post('chat_post', [App\Http\Controllers\ChatController::class, 'store'])->name('chat_store');
        Route::get('chat_post/{id}', [App\Http\Controllers\ChatController::class, 'show'])->name('chat_show');
        
        #Uploads
        Route::resource('uploads', App\Http\Controllers\UploadController::class);
        
        #EngageLead
        Route::get('call_lead/{id}', [App\Http\Controllers\EngageLeadController::class, 'show']);
        Route::get('add_status/{id}', [App\Http\Controllers\EngageLeadController::class, 'update']);
        
        #Notes
        Route::post('sys_notes', [App\Http\Controllers\NoteController::class, 'store']);
        
        #Call
        Route::resource('calls', App\Http\Controllers\CallController::class);
        Route::get('record_call', [App\Http\Controllers\CallController::class, 'store']);

        #Status
        Route::post('status/{id}', [App\Http\Controllers\StatusController::class, 'update']);
        
        #Debts
        Route::resource('debts', App\Http\Controllers\DebtController::class);
        Route::resource('debtors', App\Http\Controllers\DebtorController::class);
        Route::get('debtors_list_view', [App\Http\Controllers\DebtorController::class, 'list_view'])->name('debtors_list_view');
        
        #Templates
        Route::resource('templates', App\Http\Controllers\TemplateController::class);
        Route::get('download_template/{template}', [App\Http\Controllers\TemplateController::class, 'download'])->name('download_template');
        
        #Policy
        Route::get('download_policy/{policy}', [App\Http\Controllers\PolicyController::class, 'download'])->name('download_policy');
        Route::resource('policies', App\Http\Controllers\PolicyController::class);
        
        #Leads
        Route::post('edit_lead_address/{id}', [App\Http\Controllers\LeadController::class, 'update_address']);
        Route::post('edit_lead_bio/{id}', [App\Http\Controllers\LeadController::class, 'update_bio']);
        Route::get('get_lead_template', [App\Http\Controllers\LeadController::class, 'get_template']);
        #Cleads
        Route::resource('c_leads', App\Http\Controllers\CLeadController::class);
        Route::get('change_lead_status/{id}/{status}', [App\Http\Controllers\CLeadController::class, 'change_lead_status'])->name('change_lead_status');
        Route::post('leads_import', [App\Http\Controllers\CLeadController::class, 'leads_import'])->name('leads_import');
        Route::post('leads_filter', [App\Http\Controllers\CLeadController::class, 'filter'])->name('leads_filter_post');
        Route::get('leads_filter', [App\Http\Controllers\CLeadController::class, 'filter'])->name('leads_filter');
        Route::get('get_lead_template', [App\Http\Controllers\CLeadController::class, 'get_template'])->name('get_lead_template');
        Route::post('leads_mass_update',[App\Http\Controllers\CLeadController::class, 'mass_update'])->name('leads_mass_update');
        Route::post('email_lead/{lead}',[App\Http\Controllers\CLeadController::class, 'email'])->name('email_lead');
        
        #Chat
        Route::get('get_newest_chats/{user_id}', [App\Http\Controllers\ChatController::class, 'fetch_newest_chats'])->name('get_newest_chats');
        
        #LeadsPool
        Route::post('ajaxfilter', [App\Http\Controllers\LeadsPoolController::class, 'filter_ajax'])->name('ajaxfilter');
        Route::post('select-pool', [App\Http\Controllers\LeadsPoolController::class, 'select_pool'])->name('select-pool');
        
        #Transaction
        Route::resource('transactions', App\Http\Controllers\TransactionController::class);
        
        #Leadbatches
        Route::resource('lead_batches', App\Http\Controllers\LeadBatchController::class);

        #department
        Route::resource('departments', App\Http\Controllers\DepartmentController::class);
        
        #team
        Route::resource('teams', App\Http\Controllers\TeamController::class);
        Route::post('add_team', [App\Http\Controllers\TeamController::class, 'add_team'])->name('add-team');
        
        #countries
        Route::resource('countries', App\Http\Controllers\CountryController::class);
        
        #designation
        Route::resource('designations', App\Http\Controllers\DesignationController::class);
        Route::post('add_designation', [App\Http\Controllers\DesignationController::class, 'add_designation'])->name('add-designation');
        
        #time reccord types
        Route::resource('time_record_types', App\Http\Controllers\TimeRecordTypeController::class);
        
        #Pto types
        Route::get('get_pto_type_attachment_required/{pto_type}',[App\Http\Controllers\PtoTypeController::class, 'get_pto_type_attachment_required']);
        Route::resource('pto_types', App\Http\Controllers\PtoTypeController::class);
        
        #Restore Deleted Users
        Route::get('users/restore/one/{id}', [App\Http\Controllers\UserController::class, 'restore'])->name('users.restore');
        Route::get('restoreAll', [App\Http\Controllers\UserController::class, 'restoreAll'])->name('users.restore.all');
        
        #MailMerge
        Route::get('merger', [App\Http\Controllers\MailMerge::class, 'merge']);
        Route::get('docgen', [App\Http\Controllers\MailMerge::class, 'docgen'])->name('docgen');
        
        #FileManager
        Route::get('files', [App\Http\Controllers\FileManagerController::class, 'index']);
        Route::post('file_to_upload', [App\Http\Controllers\FileManagerController::class, 'update']);
        
        #GlobalSearch
        Route::post('global-search', [App\Http\Controllers\GlobalSearchController::class, 'index'])->name('global-search');

            
        Route::group(['middleware' => ['admin']], function () {
            #Roles
            Route::resource('roles', App\Http\Controllers\RoleController::class);
            Route::post('revoke_role', [App\Http\Controllers\RoleController::class, 'revoke_role'])->name('revoke_role');
            
            #Permissions
            Route::resource('permissions', App\Http\Controllers\PermissionController::class);
            Route::post('revoke_permission', [App\Http\Controllers\PermissionController::class, 'revoke_permission'])->name('revoke_permission');
            
            #Time off PTO time_records_filter
            Route::resource('time_offs', App\Http\Controllers\TimeOffController::class);

            #User Account
            Route::resource('users', App\Http\Controllers\UserController::class);
        
            #Leads Pool
            Route::post('leads-pool-filter', [App\Http\Controllers\LeadsPoolController::class, 'filter'])->name('leads-pool-filter');
            Route::get('leads-pool', [App\Http\Controllers\LeadsPoolController::class, 'index'])->name('leads-pool');

            #Scheduler
            Route::resource('employee_schedules', App\Http\Controllers\EmployeeScheduleController::class);
            Route::post('employee_schedules/{employeeSchedule}', [App\Http\Controllers\EmployeeScheduleController::class,'allocate_employees'])->name('employee_schedules.allocate_employees');
            Route::post('employee_schedules/re_allocate_employee/{user}', [App\Http\Controllers\EmployeeScheduleController::class,'re_allocate_employee']);
            Route::post('employee_schedules/break_position/{scheduleBreak}', [App\Http\Controllers\ScheduleBreakController::class,'break_position'])->name('break_position');
            Route::resource('schedule_breaks', App\Http\Controllers\ScheduleBreakController::class);
        });
    });

    #This needs to be outside is_clocked_in scope to enable users to clock in 
    Route::resource('time_records', App\Http\Controllers\TimeRecordController::class)->only(['store', 'update']);
    Route::get('end-time-off', [App\Http\Controllers\TimeOffController::class, 'endTimeOff'])->name('end-time-off');
    

    # Time Records 
    Route::resource('time_records', App\Http\Controllers\TimeRecordController::class)->except(['store', 'update']);
    Route::get('time_tracker', [App\Http\Controllers\TimeRecordController::class, 'time_tracker'])->name('time_tracker');
    Route::post('close_time_record/{time_record}', [App\Http\Controllers\TimeRecordController::class, 'close_time_record'])->name('close_time_record');
    Route::post('time_records_filter', [App\Http\Controllers\TimeRecordController::class, 'time_records_filter'])->name('time_records_filter');
    Route::get('time_records_filter', fn()=>redirect(route('time_tracker')));
    Route::post('adjust_time_tracker', [App\Http\Controllers\TimeRecordController::class, 'adjust_time_tracker'])->name('adjust_time_tracker');

    #Time off 
    Route::get('time-off', [App\Http\Controllers\TimeOffController::class, 'timeOff'])->name('time-off');
    Route::post('get-user-time-records/{user}', [App\Http\Controllers\TimeOffController::class, 'get_user_time_records'])->name('get-user-time-records');
    
});

#My Test routes

// Route::get('test-collector', function(){
//     return view('dashboards.collector');
// });
// Route::get('test-sales', function(){
//     return view('dashboards.sales_rep');
// });

Route::get('test', function(){
  dd(Auth::user()->allowed_break_types);
});
Route::get('cal', function(){
    return view('full_calendar.cal');
});
Route::get('full_calendar', [App\Http\Controllers\FullCalendarController::class, 'index']);
Route::post('full_calendar/action', [App\Http\Controllers\FullCalendarController::class, 'action']);



