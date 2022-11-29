@extends('layout.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Employee Schedules</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                        <li class="breadcrumb-item active">Schedules</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_schedule"><i class="fa fa-plus"></i> Add Schedule</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-data-table mb-0">
                        <thead class="bg-inverse-primary">
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Schedule Name </th>
                                <th>Effective From </th>
                                <th>Effective To </th>
                                <th>Description </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('employee_schedules.show', $schedule)}}">{{$schedule->name}}</a></td>
                                <td>{{"{$schedule->effective_from->format("Y-m-d")}"}}</td>
                                <td>{{"{$schedule->effective_to->format("Y-m-d")}"}}</td>
                                <td>{{$schedule->description}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('employee_schedules.show', $schedule)}}"><i class="fa fa-eye m-r-5"></i> View</a>
                                            <a class="dropdown-item" href="{{route('employee_schedules.edit',$schedule)}}"><i class="la la-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" id = 'delete_schedule_btn' href="#" data-toggle="modal" data-id="{{$schedule->id}}" data-target="#delete_schedule"><i class="la la-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Schedule Modal -->
    <div id="add_schedule" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('employee_schedules.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @include('employee_schedules.form')
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Schedule Modal -->

    <!-- Edit Schedule Modal -->
    <div id="edit_schedule" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Schedule Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="Leave Schedule">
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Department</label>
                            <input class="form-control" list="dpt">

                        </div>
                        <div class="form-group">
                            <label>Upload Attachment<span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="edit_policy_upload">
                                <label class="custom-file-label" for="edit_policy_upload">Choose file</label>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Schedule Modal -->

    <!-- Delete Schedule Modal -->
    <div class="modal custom-modal fade" id="delete_schedule" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Schedule</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <form id="schedule_delete_form" method="POST" >
                                @csrf
                                @method('DELETE')
                                    <div class="col-md-6">
                                        <button role='submit' class="btn btn-primary continue-btn">Delete</button>
                                    </div>
                                </form>
                            
                            <div class="col-md-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Schedule Modal -->

@endsection
@push('scripts')
<script>
    $('#delete_schedule_btn').on('click', function(){
        let schedule_id = $(this).data('id');
        try{

            $('#schedule_delete_form').get(0).setAttribute('action', "employee_schedules/"+schedule_id)
        }catch (error){
            alert('That didnt work');
        }
    });
</script>
@endpush