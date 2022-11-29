<?php

use App\Http\Controllers\PtoController;
use App\Models\Company;
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

//Home
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

//Time off PTO time_records_filter
Route::resource('time_offs', App\Http\Controllers\TimeOffController::class)->middleware('admin');
Route::get('time-off', [App\Http\Controllers\TimeOffController::class, 'timeOff'])->name('time-off');
Route::get('end-time-off', [App\Http\Controllers\TimeOffController::class, 'endTimeOff'])->name('end-time-off')->middleware(['auth','clocked_in']);;
Route::get('get-user-time-records/{user}', [App\Http\Controllers\TimeOffController::class, 'get_user_time_records'])->name('get-user-time-records');
Route::get('get-pto-data', [App\Http\Controllers\TimeOffController::class, 'get_pto_data'])->name('get-pto-data')->middleware(['auth','clocked_in']);

//Pto
Route::resource('pto', PtoController::class)->middleware(['auth','clocked_in']);
Route::post('pto_status', [App\Http\Controllers\PtoController::class, 'pto_status'])->middleware(['auth','clocked_in'])->name('pto_status');

// Route::get('/clients', function () {
//     return view('clients.clients');
// });
// Route::get('/client-profile', function () {
//     return view('clients.client-profile');
// });
// Route::get('/clients-list', function () {
//     return view('clients.clients-list');
// });

//Client
Route::resource('clients', App\Http\Controllers\ClientController::class)->middleware(['auth','clocked_in']);
Route::get('clients-grid-view', [App\Http\Controllers\ClientController::class, 'grid_view'])->name('clients-grid-view')->middleware(['auth','clocked_in']);
Route::get('my_clients', [App\Http\Controllers\ClientController::class, 'my_clients'])->name('my_clients')->middleware(['auth','clocked_in']);

//ContactPerson
Route::post('addcontact', [App\Http\Controllers\ContactPersonController::class, 'store'])->middleware(['auth','clocked_in']);

//Lead
Route::get('lead_list', [App\Http\Controllers\LeadController::class, 'index'])->middleware(['auth','clocked_in']);
Route::get('lead_profile/{id}', [App\Http\Controllers\LeadController::class, 'show'])->middleware(['auth','clocked_in']);
Route::get('account_profile/{id}', [App\Http\Controllers\LeadController::class, 'show'])->middleware(['auth','clocked_in']);

//Meetings
Route::post('schedule_meeting', [App\Http\Controllers\MeetingsController::class, 'store'])->middleware(['auth','clocked_in']);

//User account
Route::post('check_email_exists', [App\Http\Controllers\UserController::class, 'check_email_exists'])->name('check_email_exists');
Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'showUser'])->middleware(['auth','clocked_in']);
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('admin');

//employees
Route::resource('employees', App\Http\Controllers\EmployeeController::class)->middleware(['auth','clocked_in']);

//MarkDesign
Route::get('re_design_ui/{id}', [App\Http\Controllers\MarkDesignController::class, 'show'])->middleware(['auth','clocked_in']);

//Action Codes
Route::post('action_code_new', [App\Http\Controllers\ActionCodeController::class, 'store'])->middleware(['auth','clocked_in']);
Route::post('assign_action_code/{actionCode}/{slug}/{id}', [App\Http\Controllers\ActionCodeController::class, 'assign_action_code'])->middleware(['auth','clocked_in']);
Route::get('delete_action/{id}', [App\Http\Controllers\ActionCodeController::class, 'destroy'])->middleware(['auth','clocked_in']);

// Uploads
Route::resource('uploads', App\Http\Controllers\UploadController::class)->middleware(['auth','clocked_in']);

//Document
Route::post('doc_upload', [App\Http\Controllers\DocumentController::class, 'DocumentUpload'])->middleware(['auth','clocked_in']);
Route::get('doc_download/{document}', [App\Http\Controllers\DocumentController::class, 'download'])->middleware(['auth','clocked_in'])->name('doc_download');

//Chat
Route::get('chat_room', [App\Http\Controllers\ChatController::class, 'index'])->middleware(['auth','clocked_in']);
Route::post('chat_post', [App\Http\Controllers\ChatController::class, 'store'])->middleware(['auth','clocked_in'])->name('chat_store');
Route::get('chat_post/{id}', [App\Http\Controllers\ChatController::class, 'show'])->middleware(['auth','clocked_in'])->name('chat_show');

//EngageLead
Route::get('call_lead/{id}', [App\Http\Controllers\EngageLeadController::class, 'show'])->middleware(['auth','clocked_in']);
Route::get('add_status/{id}', [App\Http\Controllers\EngageLeadController::class, 'update'])->middleware(['auth','clocked_in']);

//Note
Route::post('sys_notes', [App\Http\Controllers\NoteController::class, 'store'])->middleware(['auth','clocked_in']);

//Call
Route::get('record_call', [App\Http\Controllers\CallController::class, 'store'])->middleware(['auth','clocked_in']);
Route::resource('calls', App\Http\Controllers\CallController::class)->middleware(['auth','clocked_in']);

//Lead
Route::post('edit_lead_address/{id}', [App\Http\Controllers\LeadController::class, 'update_address'])->middleware(['auth','clocked_in']);
Route::post('edit_lead_bio/{id}', [App\Http\Controllers\LeadController::class, 'update_bio'])->middleware(['auth','clocked_in']);
Route::get('get_lead_template', [App\Http\Controllers\LeadController::class, 'get_template'])->middleware(['auth','clocked_in']);

//Status
Route::post('status/{id}', [App\Http\Controllers\StatusController::class, 'update'])->middleware(['auth','clocked_in']);

//Role
Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware(['auth','clocked_in']);
Route::post('revoke_role', [App\Http\Controllers\RoleController::class, 'revoke_role'])->name('revoke_role')->middleware(['auth','clocked_in']);
// Route::get('roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware(['auth','clocked_in']);

//Permission
Route::resource('permissions', App\Http\Controllers\PermissionController::class)->middleware(['auth','clocked_in']);
Route::post('revoke_permission', [App\Http\Controllers\PermissionController::class, 'revoke_permission'])->name('revoke_permission')->middleware(['auth','clocked_in']);

//FileManager
Route::get('files', [App\Http\Controllers\FileManagerController::class, 'index']);
Route::post('file_to_upload', [App\Http\Controllers\FileManagerController::class, 'update']);

//Debt
Route::resource('debts', App\Http\Controllers\DebtController::class)->middleware(['auth','clocked_in']);

//Debtor
Route::resource('debtors', App\Http\Controllers\DebtorController::class)->middleware(['auth','clocked_in']);
Route::get('debtors_list_view', [App\Http\Controllers\DebtorController::class, 'list_view'])->name('debtors_list_view')->middleware(['auth','clocked_in']);
// Route::resource('schedule_meeting', App\Http\Controllers\MeetingController::class)->middleware(['auth','clocked_in']);

//My Test routes
Route::get('test-collector', function(){
    return view('dashboards.collector');
});
Route::get('test-sales', function(){
    return view('dashboards.sales_rep');
});
Route::get('test', function(){
    dd(App\Models\User::find(2)->my_clients);
    // return view('dashboard.agent');
});

//Template
Route::resource('templates', App\Http\Controllers\TemplateController::class)->middleware(['auth','clocked_in']);
Route::get('download_template/{template}', [App\Http\Controllers\TemplateController::class, 'download'])->name('download_template')->middleware(['auth','clocked_in']);

//Policy
Route::get('download_policy/{policy}', [App\Http\Controllers\PolicyController::class, 'download'])->name('download_policy')->middleware(['auth','clocked_in']);
Route::resource('policies', App\Http\Controllers\PolicyController::class)->middleware(['auth','clocked_in']);

//CLead
Route::resource('c_leads', App\Http\Controllers\CLeadController::class)->middleware(['auth','clocked_in']);
Route::get('change_lead_status/{id}/{status}', [App\Http\Controllers\CLeadController::class, 'change_lead_status'])->name('change_lead_status')->middleware(['auth','clocked_in']);
Route::post('leads_import', [App\Http\Controllers\CLeadController::class, 'leads_import'])->name('leads_import')->middleware(['auth','clocked_in']);
Route::post('leads_filter', [App\Http\Controllers\CLeadController::class, 'filter'])->name('leads_filter_post')->middleware(['auth','clocked_in']);
Route::get('leads_filter', [App\Http\Controllers\CLeadController::class, 'filter'])->name('leads_filter')->middleware(['auth','clocked_in']);
Route::get('get_lead_template', [App\Http\Controllers\CLeadController::class, 'get_template'])->name('get_lead_template')->middleware(['auth','clocked_in']);
Route::post('leads_mass_update',[App\Http\Controllers\CLeadController::class, 'mass_update'])->name('leads_mass_update')->middleware(['auth','clocked_in']);
Route::post('email_lead/{lead}',[App\Http\Controllers\CLeadController::class, 'email'])->name('email_lead')->middleware(['auth','clocked_in']);

//Chat
Route::get('get_newest_chats/{user_id}', [App\Http\Controllers\ChatController::class, 'fetch_newest_chats'])->name('get_newest_chats')->middleware(['auth','clocked_in']);

//LeadsPool
Route::post('ajaxfilter', [App\Http\Controllers\LeadsPoolController::class, 'filter_ajax'])->name('ajaxfilter')->middleware(['auth','clocked_in']);
Route::post('select-pool', [App\Http\Controllers\LeadsPoolController::class, 'select_pool'])->name('select-pool')->middleware(['auth','clocked_in']);
Route::post('leads-pool-filter', [App\Http\Controllers\LeadsPoolController::class, 'filter'])->name('leads-pool-filter')->middleware('admin');
Route::get('leads-pool', [App\Http\Controllers\LeadsPoolController::class, 'index'])->name('leads-pool')->middleware('admin');

//MailMerge
Route::get('merger', [App\Http\Controllers\MailMerge::class, 'merge']);
Route::get('docgen', [App\Http\Controllers\MailMerge::class, 'docgen'])->name('docgen');

//GlobalSearch
Route::post('global-search', [App\Http\Controllers\GlobalSearchController::class, 'index'])->name('global-search');

// Transactions
Route::resource('transactions', App\Http\Controllers\TransactionController::class)->middleware(['auth','clocked_in']);

//Lead Batches
Route::resource('lead_batches', App\Http\Controllers\LeadBatchController::class)->middleware(['auth','clocked_in']);

//Departments
Route::resource('departments', App\Http\Controllers\DepartmentController::class)->middleware(['auth','clocked_in']);

//Teams
Route::resource('teams', App\Http\Controllers\TeamController::class)->middleware(['auth','clocked_in']);
Route::post('add_team', [App\Http\Controllers\TeamController::class, 'add_team'])->name('add-team')->middleware(['auth','clocked_in']);

//Countries
Route::resource('countries', App\Http\Controllers\CountryController::class)->middleware(['auth','clocked_in']);

//Designations
Route::resource('designations', App\Http\Controllers\DesignationController::class)->middleware(['auth','clocked_in']);
Route::post('add_designation', [App\Http\Controllers\DesignationController::class, 'add_designation'])->name('add-designation')->middleware(['auth','clocked_in']);


// Time Records
Route::resource('time_records', App\Http\Controllers\TimeRecordController::class)->middleware(['auth']);
Route::get('time_tracker', [App\Http\Controllers\TimeRecordController::class, 'time_tracker'])->name('time_tracker')->middleware(['auth']);
Route::post('close_time_record/{time_record}', [App\Http\Controllers\TimeRecordController::class, 'close_time_record'])->name('close_time_record')->middleware(['auth']);
Route::post('time_records_filter', [App\Http\Controllers\TimeRecordController::class, 'time_records_filter'])->name('time_records_filter')->middleware(['auth']);

//Time-Record Types PTO
Route::resource('time_record_types', App\Http\Controllers\TimeRecordTypeController::class)->middleware(['auth','clocked_in']);

//test modals
Route::get('/modal', function (){
return view('users.nai');
});

//PTO Types
Route::resource('pto_types', App\Http\Controllers\PtoTypeController::class)->middleware(['auth','clocked_in']);
Route::get('get_pto_type_attachment_required/{pto_type}',[App\Http\Controllers\PtoTypeController::class, 'get_pto_type_attachment_required']);

