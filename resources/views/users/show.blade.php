@extends('layout.mainlayout', ['title'=>'Employee Profile'])
@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{$user->name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employees</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{route('users.edit', $user)}}" class="btn add-btn"><i class="fa fa-plus"></i> Edit User</a>
                    <a href="javascript:void()" class="btn btn-white float-right m-r-10" data-toggle="tooltip" title="Task Board"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-4">
                <div class="card border-warning">
                    <div class="card-header bg-warning">
                        <h5 class="m-b-15">User Bio</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-border">
                            <tbody>
                                <tr>
                                    <td>Full name:</td>
                                    <td class="text-left">{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td class="text-left @if($user->status) text-success @else text-danger @endif">@if($user->status) Active @else Inactive @endif</td>
                                </tr>
                                <tr>
                                    <td>DOB:</td>
                                    <td class="text-left">{{$user->dob}}</td>
                                </tr>
                                <tr>
                                    <td>Hired:</td>
                                    <td class="text-left">{{$user->doj}}</td>
                                </tr>
                                <tr>
                                    <td>Department:</td>
                                    <td class="text-left">{{($user->department) ? $user->department->name : ''}}</td>
                                </tr>
                                <tr>
                                    <td>Team:</td>
                                    <td class="text-left">{{($user->team) ? $user->team->name : ''}}</td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td class="text-left">{{$user->phone1.', '.$user->phone2}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td class="text-left">{{$user->email }}<br> {{ $user->personal_email}}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td class="text-left">{{$user->address}}</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="card project-user">
                            <div class="card-body">
                                <h6 class="card-header m-b-20">Schedule 
                                    <button role="button" class="float-right btn btn-primary btn-sm" id="re_allocation_btn" data-id="{{$user->id}}" data-toggle="modal" data-target="#re_allocation_modal"><i class="fa fa-exchange-alt"></i> Change</button>
                                   {{-- <button class="btn btn-primary" id="re_allocation_btn" role="button" data-toggle="modal" data-target="#re_allocation_modal" data-id="{{$user->id}}">Re-allocate Employee</button> --}}

                                </h6>
                                <ul class="list-box">
                                    <li>
                                        <a href="javascript:void()">
                                            <div class="list-item">
                                                
                                                <div class="list-body">
                                                    <span class="message-author">{{($user->schedule) ? $user->schedule->name : 'none'}}</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
        
                                </ul>
                            </div>
                        </div>
                        <div class="card project-user">
                            <div class="card-body">
                                <h6 class="card-header m-b-20">Supervisor <button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-exchange-alt"></i> Change</button></h6>
                                <ul class="list-box">
                                    <li>
                                        <a href="javascript:void()">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar"><img alt="" src="img/profiles/avatar-11.jpg"></span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">{{($user->supervisor) ? $user->supervisor->name : 'none'}}</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">{{ ($user->supervisor) ? $user->supervisor->department->name : 'none' }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
        
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="project-task">
                    <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                        <li class="nav-item"><a class="nav-link active" href="#documents" data-toggle="tab" aria-expanded="true">Documentation</a></li>
                        <li class="nav-item"><a class="nav-link" href="#time-sheets" data-toggle="tab" aria-expanded="false">Timesheets</a></li>
                        <li class="nav-item"><a class="nav-link" href="#user-pto" data-toggle="tab" aria-expanded="false">PTO</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane " id="all_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">

                                    </div>
                                    <div class="task-list-footer">
                                        <div class="new-task-wrapper">
                                            <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                            <span class="error-message hidden">You need to enter a task first</span>
                                            <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                            <span class="btn" id="close-task-panel">Close</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active" id="documents">
                           @include('uploads.file_list', ['uploadable'=>$user])
                        </div>

                        {{-- timesheets --}}
                        <div class="tab-pane" id="time-sheets">
                            <div class="card">
                                <div class="card-header">
                                    <p>User Timesheet</p>
                                </div>
                                <div class="card-body">
                                    @php
                                        $time_records=Auth::user()->time_records;   
                                    @endphp
                                    @include('time_records.time_records_table')
                                </div>
                            </div>
                        </div>
                        <!--//timesheets-->
                        
                        {{-- pto --}}
                        <div class="tab-pane" id="user-pto">
                            <div class="card">
                                <div class="card-body ">                                            
                                    @include('pto.pto_table')
                                </div>
                            </div>
                        </div>
                        {{-- pto --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Re-allocate Schedule Modal -->
    @include('employee_schedules.reallocate_modal')
    <!-- Re-allocate Schedule Modal -->

    <!-- Assign Leader Modal -->
    <div id="assign_leader" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Leader to this project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group m-b-30">
                        <input placeholder="Search to add a leader" class="form-control search-input" type="text">
                        <span class="input-group-append">
                            <button class="btn btn-primary">Search</button>
                        </span>
                    </div>
                    <div>
                        <ul class="chat-user-list">
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="img/profiles/avatar-09.jpg"></span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Richard Miles</div>
                                            <span class="designation">Web Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="img/profiles/avatar-10.jpg"></span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">John Smith</div>
                                            <span class="designation">Android Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar">
                                            <img alt="" src="img/profiles/avatar-16.jpg">
                                        </span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Jeffery Lalor</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Assign Leader Modal -->

    <!-- Assign User Modal -->
    <div id="assign_user" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign the user to this project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group m-b-30">
                        <input placeholder="Search a user to assign" class="form-control search-input" type="text">
                        <span class="input-group-append">
                            <button class="btn btn-primary">Search</button>
                        </span>
                    </div>
                    <div>
                        <ul class="chat-user-list">
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="img/profiles/avatar-09.jpg"></span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Richard Miles</div>
                                            <span class="designation">Web Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="img/profiles/avatar-10.jpg"></span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">John Smith</div>
                                            <span class="designation">Android Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar">
                                            <img alt="" src="img/profiles/avatar-16.jpg">
                                        </span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Jeffery Lalor</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Assign User Modal -->

    <!-- Edit Project Modal -->
    <div id="edit_project" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" value="Project Management" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select class="select">
                                        <option>Global Technologies</option>
                                        <option>Delta Infotech</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input placeholder="$50" class="form-control" value="$5000" type="text">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <select class="select">
                                        <option>Hourly</option>
                                        <option selected>Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <select class="select">
                                        <option selected>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Project Leader</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Leader</label>
                                    <div class="project-members">
                                        <a class="avatar" href="#" data-toggle="tooltip" title="Jeffery Lalor">
                                            <img alt="" src="img/profiles/avatar-16.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Team</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Members</label>
                                    <div class="project-members">
                                        <a class="avatar" href="#" data-toggle="tooltip" title="John Doe">
                                            <img alt="" src="img/profiles/avatar-02.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="Richard Miles">
                                            <img alt="" src="img/profiles/avatar-09.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="John Smith">
                                            <img alt="" src="img/profiles/avatar-10.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="Mike Litorus">
                                            <img alt="" src="img/profiles/avatar-05.jpg">
                                        </a>
                                        <span class="all-team">+2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Files</label>
                            <input class="form-control" type="file">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Project Modal -->
 

@endsection