@extends('layout.mainlayout',  ['title'=>"Time-out"])
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
        </div>
        
            {{-- @include('c_leads.leads_filter') --}}

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <section class="dash-section">
                    
                    <div class="dash-sec-content">
                        <div class="dash-info-list">
                            <div class="card  flex-fill">
                                
                                <div class="card-body">
                                    {{-- <div class="table-responsive"> --}}
                                        <table class="table custom-table mb-0 table-striped custom-data-table">
                                            <thead>
                                                <tr>
                                                    <th>Emp. ID.</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th class="text-success"> In</th>
                                                    <th class="text-danger"> Out</th>
                                                    <th>HOL</th>
                                                    <th>SIC</th>
                                                    <th>VAC</th>
                                                    <th >Total</th>
                                                    <th>REG</th>
                                                    <th >OT</th>
                                                    <th> View details</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($users as $user)
                                                    @foreach (Carbon\CarbonPeriod::create($pay_period_start, now()) as $date)
                                                        
                                                        @forelse ($user->time_offs->unique([ 'record_date']) as $time_off)
                                                            <tr>
                                                                @php
                                                                    $time_in=now();
                                                                    $time_out=now()->subHours(7)->subMinutes(50);
                                                                    $minutes=($time_in)->diffInMinutes($time_out);
                                                                    $hours = round($minutes/60 ,1);
                                                                @endphp
                                                                <td>{{$time_off->user->id}}</td>
                                                                <td><a href="{{route('users.show', $time_off->user)}}"> {{$time_off->user->name}}</a></td>
                                                                <td>{{$time_off->record_date}}</td>

                                                                @if ($date->format('Y-m-d') !=  $time_off)
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                @else
                                                                    <td class="text-success">{{'08:00 am'}}</td>
                                                                    <td class="text-danger">{{'05:00 pm'}}</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                @endif   
                                                                    
                                                                    <td>{{$hours}}</td>
                                                                    <td>
                                                                        @if(isset($hours) && $hours>8)
                                                                            <span class='text-success'>{{$hours-8}} </span>
                                                                        @elseif(isset($hours) && $hours<8)
                                                                            <span class='text-primary'>{{0}} </span>
                                                                        @else
                                                                            <span class='text-primary'>0 </span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <button id='show-all-breaks-btn' class="btn btn-primary" data-toggle="modal" data-target="#all-breaks-modal" data-id="{{$time_off->user->id}}"><i class="fa fa-eye"></i> View all breaks</button>
                                                                    </td>
                                                                    <td >
                                                                        <div class="dropdown dropdown-action">
                                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item" href="{{route('end_time_off')}}"><i class="fa fa-link"></i> End break</a>
                                                                                <a class="dropdown-item" href="#"><i class="la la-pencil"></i> Adjust break</a>
                                                                                <a class="dropdown-item" href="{{route('time_offs.destroy', $time_off)}}"><i class="fa fa-trash"></i> Remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                            </tr> 
                                                        @empty
                                                            {{-- <div class="bg-danger text-white"  style="text-align:center">
                                                                No records.
                                                        </div> --}}
                                                        @endforelse
                                                        
                                                    @endforeach
                                                @empty
                                                    
                                                @endforelse

                                            </tbody>
                                            {{-- <tbody>

                                                @forelse ($time_offs as $time_off)
                                                    <tr>
                                                        @php
                                                            $time_in=now();
                                                            $time_out=now()->subHours(7)->subMinutes(50);
                                                            $minutes=($time_in)->diffInMinutes($time_out);
                                                            $hours = round($minutes/60 ,1);
                                                        @endphp
                                                        <td>{{$time_off->user->id}}.</td>
                                                        <td><a href="{{route('users.show', $time_off->user)}}"> {{$time_off->user->name}}</a></td>
                                                        <td>{{now()->format('D Y-m-d')}}.</td>
                                                        <td class="text-success">{{'08:00 am'}}</td>
                                                        <td class="text-danger">{{'05:00 pm'}}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        
                                                        <td>{{$hours}}</td>
                                                        <td>
                                                            @if(isset($hours) && $hours>8)
                                                                <span class='text-success'>{{$hours-8}} </span>
                                                            @elseif(isset($hours) && $hours<8)
                                                                <span class='text-primary'>{{0}} </span>
                                                            @else
                                                                <span class='text-primary'>0 </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button id='show-all-breaks-btn' class="btn btn-primary" data-toggle="modal" data-target="#all-breaks-modal" data-id="{{$time_off->user->id}}"><i class="fa fa-eye"></i> View all breaks</button>
                                                        </td>
                                                        <td >
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="end-time-off"><i class="fa fa-link"></i> End break</a>
                                                                    <a class="dropdown-item" href="#"><i class="la la-pencil"></i> Adjust break</a>
                                                                    <a class="dropdown-item" href="{{route('time_offs.destroy', $time_off)}}"><i class="fa fa-trash"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <div class="bg-danger text-white"  style="text-align:center">
                                                        No records.
                                                   </div>
                                                @endforelse
                                            </tbody> --}}
                                        </table>
                                    {{-- </div> --}}
                                </div>
                            
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
  
    <!-- Status Modal -->
    {{-- <div id="status_change" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Subject of call <span class="text-danger">*</span></label>
                            <input class="form-control @error('subject') is-invalid @enderror"  value="{{ old('subject') }}" required name="subject" autocomplete="subject"  type="text" id="subject">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Status Modal -->

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
                                                <th class="text-danger">Time off</th>
                                                <th class="text-success">Time Back</th>
                                                <th class="text-dark">Time (Hrs)</th>
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

    


@endsection
@section('custom_script')
<script>
    $('body').on('click', '#show-all-breaks-btn', function(){
        var user_id = $(this).data('id');
        // alert (user_id);
        popupate_user_time_offs_table(user_id);
    });
    function popupate_user_time_offs_table(user_id) {
       
        
        var dataUrl = "/get-user-time-offs/"+user_id;
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
            var res=data.results;
            res.forEach(function(element, index) {
                $('#all-user-time-offs').dataTable().fnAddData([ 
                    // result.first_name,
                    // result.last_name, 
                    // result.occupation, 
                    // result.email_address

                    ++index,
                    element.type,
                    element.start_time,
                    element.end_time,
                    element.length
                    ,
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



    
</script>
@endsection