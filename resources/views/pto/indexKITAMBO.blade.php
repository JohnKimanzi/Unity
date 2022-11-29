@extends('layout.mainlayout', ['title'=>"PTO"])
@push('styles')
<style>
    .badge-blinking {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {
        20% {
            opacity: 0;
        }
    }
</style>
@endpush
@section('content')
<!-- Page Content -->
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Employee time-off Tracker</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                    <li class="breadcrumb-item active">User time-off tracker</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                @can('Manage PTO')
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pto-types"><i class="fa fa-list"></i> PTO types</a>
                <button type="button" class="btn btn-primary position-relative" data-toggle="modal" data-target="#pto-applications">
                    Applications
                    <span class=" top-0 start-100 translate-middle badge rounded-pill badge-blinking bg-danger">
                        {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-blinking bg-danger"> --}}
                        {{count($ptos->where('status', 'like', 'New'))}}
                        {{-- <span class="visually-hidden">new applications</span> --}}
                    </span>
                </button>
                {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pto-applications-modal"><i class="la la-pencil"></i> PTO Applications <span class="badge badge-light float-right bg-danger text-warning badge-blinking badge-lg">{{count($ptos->where('status', 'like', 'New'))}}</span></a> --}}
                @endcan
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pto-balances-modal"><i class="fa fa-calculator"></i> PTO Balances</a>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pto-request"><i class="la la-plus-circle"></i> Request PTO</a>

                <!--PTO Tabs -->
                <ul class="nav nav-tabs nav-tabs-top nav-justified mt-0">
                <li class="nav-item"><a class="nav-link" href="#pto-types" data-toggle="tab" aria-expanded="false">PTO types</a></li>
                <li class="nav-item"><a class="nav-link" href="#pto-applications" data-toggle="tab" aria-expanded="false">Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab" aria-expanded="false">PTO balances</a></li>
                <li class="nav-item"><a class="nav-link" href="#pto-request" data-toggle="tab" aria-expanded="false">Request PTO</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- @include('c_leads.leads_filter') --}}

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <section class="dash-section">

                <div class="dash-sec-content">
                    <div class="dash-info-list">
                        <a href="#" class="dash-card text-info">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="la la-unlink"></i>
                                    {{-- <i class="fa fa-clock"></i> --}}
                                </div>
                                <div class="dash-card-content">
                                    <p>PTO record </p>
                                </div>
                            </div>
                        </a>

                        @include('pto.pto_employee_list')

                    </div>
                </div>
            </section>
        </div>
    </div>

</div>
<!-- /Page Content -->

<!-- pto types Modal -->
<div id="pto-types" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> PTO Types</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    @include('pto.pto_types.pto_types_table')
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ pto types Modal -->

<!-- View ptos Modal -->
<div id="pto-applications" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> PTO Applications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">

                                @include('pto.pto_table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ View ptos Modal -->

<!-- pto request Modal -->
<div id="pto-request" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Request PTO </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="card ">
                        <div class="card-body">
                            <form action="{{route('pto.store')}}" method="POST" enctype='multipart/form-data'>
                                @csrf
                                @include('pto.pto_request_form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ pto request Modal -->

<!-- all-breaks-modal Modal -->
<div id="all-breaks-modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="user-name-span"></span> - All Breaks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="all-user-time-offs" class="table custom-table mb-0 table-striped custom-data-table flex-fill">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Break Type</th>
                                            <th>Time off</th>
                                            <th>Time Back</th>
                                            {{-- <th class="text-right">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- table populated by js --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- all-breaks-modal Modal -->

<!-- approve-pto-modal Modal -->
<div id="approve-pto-modal" class="modal custom-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <form action="{{route('pto_status')}}" method='POST'>
                        @csrf

                        <div class="form-header">
                            <h3>PTO Applications Status</h3>
                            <p>Are you sure want to update status for this PTO Application?</p>
                        </div>
                        <input type="text" hidden name="pto_id" id="pto_id">
                        <div class="form-group">
                            <label>Status <span class="text-danger ">*</span></label>
                            <select id="new_status" class="form-control @error ('new_status') is-invalid @enderror" required name="new_status">
                                <option value="Declined">Declined</option>
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                            </select>
                            @error('new_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Comments <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control @error ('comments') is-invalid @enderror" name="comments">{{old('comments', '')}}</textarea>
                            @error('comments')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn">Update</button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- approve-pto-modal Modal -->

@endsection
@push('scripts')
<script>
    $('body').on('click', '#show-all-breaks-btn', function() {
        var user_id = $(this).data('id');
        // alert (user_id);
        popupate_user_time_offs_table(user_id);
    });

    function popupate_user_time_offs_table(user_id) {


        var dataUrl = "/get-user-time-offs/" + user_id;
        $.ajax({
            type: 'GET',
            url: dataUrl,
            contentType: "text/plain",
            dataType: 'json',
            success: function(data) {
                myJsonData = data;
                populateDataTable(myJsonData);
            },
            error: function(e) {
                console.log("There was an error with your request...");
                console.log("error: " + JSON.stringify(e));
                alert("There was an error with your request...");
            }
        });
        // populate the data table with JSON data
        function populateDataTable(data) {
            console.log("populating data table...");
            console.log(data.results);
            // clear the table before populating it with more data
            $("#all-user-time-offs").DataTable().clear();
            var res = data.results;
            res.forEach(function(element, index) {
                $('#all-user-time-offs').dataTable().fnAddData([
                    // result.first_name,
                    // result.last_name, 
                    // result.occupation, 
                    // result.email_start_at

                    ++index,
                    element.type,
                    element.start,
                    element.end,
                ]);
            });
            $('#all-breaks-modal #user-name-span').html(data.uname);
            // var length = Object.keys(data.results).length;
            // for (var i = 1; i < length + 1; i++) { 
            //     var result=data.results['result' + i]; 
            //     // You could also use an ajax property on the data table initialization 

            // } 
        }


    };
    $(document).ready(popupate_pto_table());

    function popupate_pto_table() {
        var dataUrl = "/get-pto-data";
        $.ajax({
            type: 'GET',
            url: dataUrl,
            contentType: "text/plain",
            dataType: 'json',
            success: function(data) {
                myJsonData = data;
                populateDataTable(myJsonData);
            },
            error: function(e) {
                console.log("There was an error with your request...");
                console.log("error: " + JSON.stringify(e));
                alert("There was an error with your request...");
            }
        });
        // populate the data table with JSON data
        function populateDataTable(data) {
            console.log("populating data table...");
            console.log(data.results);
            // clear the table before populating it with more data
            $("#pto-table").DataTable().clear();
            var res = data.results;
            res.forEach(function(element, index) {
                $('#pto-table').dataTable().fnAddData([
                    element.u_id,
                    element.u_name,
                    0.0,
                    0.0,
                    0.0,
                    0.0,
                    element.action
                ]);
            });

        }


    };

    $(document).on("click", ".status-btn", function() {
        var status = $(this).data('status');
        var id = $(this).data('pto_id');
        document.getElementById('new_status').value = status;
        document.getElementById('pto_id').value = id;

    });
</script>
@endpush