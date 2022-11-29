@extends('layout.mainlayout',  ['title'=>"PTO"])
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">
        
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">User time-off Tracker</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">User time-off tracker</li>
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
                            <a href="#" class="dash-card text-info">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon">
                                        <i class="la la-unlink"></i>
                                        {{-- <i class="fa fa-clock"></i> --}}
                                    </div>
                                    <div class="dash-card-content">
                                        <p>PTO record  </p> 
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
           var res=data.results;
           res.forEach(function(element, index) {
               $('#pto-table').dataTable().fnAddData([ 
                    element.u_id,
                    element.u_name,
                    0.0,
                    0.0,
                    0.0,
                    0.0,
                    0.0,
                    0.0,
                    
                    element.action
               ]); 
           });
           
       } 
       
       
    };



    
</script>
@endsection