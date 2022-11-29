@extends('layout.mainlayout', ['title'=>"Time Tracker"])
@section('content')

<!-- Page Content -->
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Time Tracker</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                    <li class="breadcrumb-item active">User time tracker</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                {{-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-phone"></i> Call</a>
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leads"><i class="fa fa-plus"></i> Add leads</a>
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#mass-edit"><i class="fa fa-pencil"></i> Mass update</a> --}}
                {{-- <a href="{{route('massupdatepage', serialize(array($leads)))}}" class="btn add-btn"><i class="fa fa-pencil"></i> Mass update page</a> --}}

            </div>
        </div>
        @include('time_records.time_records_filter')
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <section class="dash-section">

                <div class="dash-sec-content">
                    <div class="dash-info-list">
                        <div class="card  flex-fill">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-data-table mb-0  " id="time-tracker-table">
                                        <thead>
                                            {{-- <tr style="background-color: antiquewhite">
                                                <th>Staff ID.</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th class="text-success"> In</th>
                                                <th class="text-danger"> Out</th>
                                                @foreach ($pto_types as $pto_type)
                                                    <th>{{$pto_type->name}}</th>
                                                @endforeach
                                                <th>Total</th>
                                                <th>REG</th>
                                                <th>OT</th>
                                                <th> Action</th>
                                            </tr> --}}
                                            <tr style="background-color: antiquewhite">
                                                <th>Staff ID.</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th class="text-success"> In</th>
                                                <th class="text-danger"> Out</th>
                                                <th>REG</th>
                                                <th>OT</th>
                                                <th>Other</th>
                                                @foreach ($pto_types as $pto_type)
                                                    <th>{{$pto_type->name}}</th>
                                                @endforeach
                                                <th>Total</th>
                                                <th> Action</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        @forelse ($datasets as $dataset)
                                            <tbody>

                                                @forelse ($dataset['records'] as $record)
                                                    <tr @if(!($loop->parent->iteration%2)) style="background-color: aliceblue" @endif>
                                                        @php
                                                        $time_in=now();
                                                        $time_out=now()->subHours(7)->subMinutes(50);
                                                        $minutes=($time_in)->diffInMinutes($time_out);
                                                        $hours = round($minutes/60 ,1);
                                                        @endphp
                                                        <td>{{$dataset['user']->id}}</td>
                                                        <td><a href="{{route('users.show', $dataset['user'])}}"> {{$dataset['user']->name}}</a></td>
                                                        <td>{{$record['date']->copy()->format('Y-m-d')}}</td>
                                                        <td>{{($record['clock_in_out']) ? Carbon\Carbon::make($record['clock_in_out']->started_at)->format('h:i a') : ''}}</td>
                                                        <td>{{($record['clock_in_out']->ended_at) ? Carbon\Carbon::make($record['clock_in_out']->ended_at)->format('h:i a') : ''}}</td>
                                                        <td>{{($record['regular_time']) ? round($record['regular_time']->totalHours, 1) : ''}}</td>
                                                        <td>{{($record['over_time']) ? round($record['over_time']->totalHours, 1) : ''}}</td>
                                                        @foreach ($pto_types as $pto_type)
                                                            <th>
                                                                @if(isset($record[$pto_type->name]))
                                                                    @php
                                                                    
                                                                    @endphp
                                                                    {{$record[$pto_type->name]}}
                                                                    @else
                                                                    0   
                                                                @endif
                                                            </th>
                                                        @endforeach
                                                        <td>0</td>
                                                        <td>{{($record['total_time']) ? round($record['total_time']->totalHours,1) : ''}}</td>
                                                        <td>
                                                            <button id='show-all-breaks-btn' class="btn btn-primary" data-toggle="modal" data-target="#all-breaks-modal" data-record_date="{{$record['date']->copy()}}" data-user_id="{{$dataset['user']->id}}"><i class="fa fa-eye"></i> View all breaks</button>
                                                        </td>
                                                        {{-- <td>
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#adjust-record-modal"><i class="la la-pencil"></i> Adjust</a>
                                                                    <a class="dropdown-item" href="#"><i class="la la-cog"></i> Override</a>
                                                                    <a class="dropdown-item" href=""><i class="fa fa-trash"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                @empty
                                                {{-- <div class="bg-danger text-white"  style="text-align:center">
                                                                    No records.
                                                            </div> --}}
                                                @endforelse
                                                
                                            </tbody>
                                            <th>
                                                <tr  style="background-color: antiquewhite" >
                                                    <td colspan='5'>
                                                        Totals
                                                    </td>
                                                    <td>{{round($dataset['regular_time']->totalHours, 1)}}</td>
                                                    <td>{{round($dataset['over_time']->totalHours, 1)}}</td>
                                                    <td>0</td>
                                                    @foreach ($pto_types as $pto_type)
                                                        <th>
                                                            @if(isset($dataset[$pto_type->name]))
                                                                {{$dataset[$pto_type->name]}}
                                                                @else
                                                                0   
                                                            @endif
                                                        </th>
                                                    @endforeach
                                                    
                                                    <td>{{round($dataset['total_time']->totalHours, 1)}}</td>
                                                    
                                                    <td colspan="2"> <button class="btn btn-warning"><i class="la la-pencil"></i>Edit All Breaks</button> </td>
                                                </tr> 
                                            </th>
                                        @empty


                                        @endforelse


                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>
    {{-- edit-time-sheet-modal --}}
    <div id="edit-time-sheet-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Time Sheet <span id="record-date-span"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="adjust_time_tracker" method="POST">
                                    @csrf
                                    <div class="row">
                                            <div class="col-sm-6 form-group ">
                                                <label>Record Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text"  name="record_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label>User name</label>
                                                <input class="form-control" type="text"  name="record_date">
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label>Time in</label>
                                                <input class="form-control @error('time_in') is-invalid @enderror" type="text"  name="time_in">
                                                @error('time_in')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label>Time out</label>
                                                <input class="form-control @error('time_out') is-invalid @enderror" type="text"  name="time_out">
                                                @error('time_out')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="modal-footer">
                                        <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                        <button class="btn btn-danger submit-btn" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                           
                            
                            {{-- <div class="modal-footer">
                                 
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /edit-time-sheet-modal --}}

    {{-- adjust-record-modal --}}
    <div id="adjust-record-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adjust Time Records <span id="record-date-span"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="adjust_time_tracker" method="POST">
                                    @csrf
                                    <div class="row">
                                            <div class="col-sm-6 form-group ">
                                                <label>Record Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text"  name="record_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label>User name</label>
                                                <input class="form-control" type="text"  name="record_date">
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label>Time in</label>
                                                <input class="form-control @error('time_in') is-invalid @enderror" type="text"  name="time_in">
                                                @error('time_in')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label>Time out</label>
                                                <input class="form-control @error('time_out') is-invalid @enderror" type="text"  name="time_out">
                                                @error('time_out')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="modal-footer">
                                        <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                        <button class="btn btn-danger submit-btn" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                           
                            
                            {{-- <div class="modal-footer">
                                 
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /adjust-record-modal --}}

    <div id="all-breaks-modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="user-name-span"></span> - All Breaks on <span id="record-date-span"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="all-user-time-offs" class="table custom-table mb-0 table-striped  flex-fill">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Type</th>
                                                <th class="text-danger">Start Time</th>
                                                <th class="text-success">End Time</th>
                                                <th class="text-dark">Time (Hrs)</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- table populated by js --}}
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                            <hr>
                            <div class="modal-footer bg-warning">
                                <h3>Total : <span id="total-hours-span"></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- all-breaks-modal Modal -->

@endsection
@section('custom_script')
<script>
    $('body').on('click', '#show-all-breaks-btn', function() {
        var user_id = $(this).data('user_id');
        var record_date = $(this).data('record_date');
        var token = 
        // alert (record_date);
        popupate_user_time_sheets_table(user_id, record_date);
    });

    function popupate_user_time_sheets_table(user_id, record_date) {

        var dataUrl = "/get-user-time-records/" + user_id;
        $.ajax({
            type: 'post',
            url: dataUrl,        
            // contentType: "text/plain",
            dataType: 'json',
            data : {'_token': '{{ csrf_token() }}','user_id':user_id, 'record_date':record_date},
            success: function(data) {
        // alert('hi');

                myJsonData = data;
                populateDataTable(myJsonData);
            },
            error: function(e) {
        // alert('low');

                console.log("There was an error with your request...");
                console.log("error: " + JSON.stringify(e));
                alert("There was an error with your request...");
            }
        // alert('hi2');
            
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
                    ++index,
                    element.type,
                    element.start_time,
                    element.end_time,
                    element.length,
                    element.action
                ]);
            });
            $('#all-breaks-modal #user-name-span').html(data.uname);
            $('#all-breaks-modal #record-date-span').html(data.record_date);
            $('#all-breaks-modal #total-hours-span').html(data.total_hours);

        }


    };

    //datatable
    $(document).ready( function () {
    $('#time-tracker-table').DataTable({
        retrieve: true,
        searching: true,
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-copy"></i> Copy',
                titleAttr: 'Copy table',
                exportOptions: {
                    columns:  ':visible' 
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Export to Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Print',
                titleAttr: 'print table',
                exportOptions: {
                    columns: ':visible'
                }
                // customize: function (win) {
                //     $(win.document.body).find('table').find('td:last-child, th:last-child').remove();
                // }
            },
            'colvis', 
        ],
        "pageLength": 100,
        "lengthMenu" : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]] 
    });
} );
</script>
@endsection