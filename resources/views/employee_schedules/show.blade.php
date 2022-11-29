@extends('layout.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Schedule : {{$schedule->name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                        <li class="breadcrumb-item ">Schedules</li>
                        <li class="breadcrumb-item active">{{$schedule->name}}</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#allocate_employees"><i class="fa fa-plus"></i> Add employee to this schedule</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class=" card">
            <div class="card-header">
                <h4> <i class="fa fa-users"></i>    Users</h4> 
                <button class="btn-primary btn" data-toggle="modal" data-target="#allocate_employees"><i class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-data-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Employee Name </th>
                                <th>Designation </th>
                                <th>Department </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedule->users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->designation->name}}</td>
                                <td>{{$user->department->name}}</td>
                                <td class="text-right">
                                   <button class="btn btn-primary" id="re_allocation_btn" role="button" data-toggle="modal" data-target="#re_allocation_modal" data-id="{{$user->id}}">Re-allocate Employee</button>
                                </td>
                            </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class=" card">
            <div class="card-header">
                <h4><i class="fa fa-clock"></i> Breaks</h4> 
                <button class="btn-primary btn" data-toggle="modal" data-target="#add_break"><i class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Name </th>
                                <th>Time Out </th>
                                <th>Hours/break </th>
                                <th>Breaks/day</th>
                                <th class="text-right">Move Up<i class="fa fa-arrow-up"></i> </th>
                                <th class="text-left">Move down<i class="fa fa-arrow-down"></i> </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedule->breaks()->get() as $break)
                            <tr>
                                <td>{{$break->position ?? 'Not set'}}</td>
                                <td>{{$break->time_record_type->name}}</td>
                                <td>{{$break->earliest_time_out}}</td>
                                <td>{{$break->total_number_of_hours}}</td>
                                <td>{{$break->max_breaks_daily}}</td>
                                <td class="text-right">
                                    @unless($loop->first)
                                        <form action="{{route('break_position',$break)}}" method="post">
                                            @csrf
                                            <input type="text" hidden value="up" name="direction">
                                            <button class="btn btn-success btn-sm" role="button"  data-id="{{$break->id}}"><i class="fa fa-arrow-up"></i></button>
                                        </form>
                                    @endUnless
                                </td>
                                <td class="text-left">
                                    @unless ($loop->last)
                                        <form action="{{route('break_position',$break)}}" method="post">
                                            @csrf
                                            <input type="text" hidden value="down" name="direction">
                                            <button class="btn btn-danger btn-sm" role="button"  data-id="{{$break->id}}"><i class="fa fa-arrow-down"></i></button>
                                        </form>
                                    @endunless
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('employee_schedules.edit',$break)}}"><i class="la la-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_policy"><i class="la la-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Allocate Employees Modal -->
    <div id="allocate_employees" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Select employees to allocate to the {{$schedule->name}} schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('employee_schedules.allocate_employees', $schedule)}}"  method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-success" for="">Tip: use 'ctrl'+click or click an drag to select multiple</label>
                            <select class="form-control" name="user_ids[]" id="" required multiple>
                                @forelse ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @empty
                                    <option value="">No options! Contact Admin</option>
                                @endforelse
                            </select>
                           
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Allocate Selected</button>
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <div class="col-md-6">
                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-warning cancel-btn">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Allocate Employees Modal -->

    <!-- Re-allocate Schedule Modal -->
    @include('employee_schedules.reallocate_modal')
    <!-- Add Schedule Modal -->

    <!--  Schedule Break Modal -->
    <div class="modal custom-modal fade" id="add_break" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Add breaks</h3>
                        <p>Select breaks to schedule</p>
                    </div>
                    <div class="modal-btn">
                        <form method="POST" action="{{route('schedule_breaks.store')}}">
                            @csrf
                            <input type="text" hidden name="schedule_id" value="{{$schedule->id}}" id="">
                            <div class=" form-group">
                                <label class="text-success" for="">Tip: use 'ctrl'+click or click an drag to select multiple</label>
                                <select class="form-control" name="break_ids[]" multiple id="" required>
                                    <option value=""  disabled> __ Select multiple __</option>
                                    @forelse ($all_break_types as $one_break_type)
                                        <option value="{{$one_break_type->id}}">{{$one_break_type->name}}</option>
                                    @empty
                                        <option value="">No options! Contact Admin</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="submit-section">
                                <button role='submit' class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-6">
                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-warning cancel-btn">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Schedule Break Modal -->

@endsection

