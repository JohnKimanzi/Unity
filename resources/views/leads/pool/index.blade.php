@extends('layout.mainlayout', ['title'=>"Leads Pool"])
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leads Pool</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item ">Leads</li>
                        <li class="breadcrumb-item active">Pool</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    @hasrole('admin')
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_leads"><i class="fa fa-plus"></i> Bulk Upload</a>
                    @endhasrole  
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#mass-edit"><i class="fa fa-pencil"></i> Mass Update</a>
                    {{-- <a href="{{route('massupdatepage', serialize(array($leads)))}}" class="btn add-btn"><i class="fa fa-pencil"></i> Mass update page</a> --}}
                
                
                    <div class=" col-auto float-left">
                        <a href="#" id="show-search-bar-btn" class="btn btn-primary" ><i class="la la-chevron-right"></i> Show Seach Bar</a> 
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div class="form-group form-focus select-focus">
                            <select id="select-pool" class="form-control floating"  name="pool"> 
                                <option selected value=""> -- Select -- </option>
                                <option value="unassigned"> Unassigned leads </option>
                                <option value="latest"> Latest Upload </option>
                                <option value="hot"> Hot leads awaiting closure </option>
                            </select>
                            <label class="focus-label">Select pool</label>
                            
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        <!-- /Page Header -->
       {{-- @include('layouts.partials.search_filter') --}}

        <div class="card mb-0">
            <div class="card-body">
                
                <div class="row col-md-12 profile-view"> 
                    <div id="pool-filter-section" class="col-md-3 d-none">
                        <div class="card profile-box border-secondary flex-fill"> 
                            <div class="card-header">
                                <h3 class="card-title">Leads Filter<br> </a> </h3>
                            </div>
                            <div class="card-body">   
                                
                                <div class="col-md-12">
                                    <form id='pool-filter-form' >
                                    {{-- <form id='pool-filter-form' action="{{route('leads-pool-filter')}}" method="POST"> --}}
                                        @csrf
                                        
                                            <div class=" col-12">  
                                                <div class="form-group form-focus select-focus">
                                                    <input type="text" class="form-control floating" name="company_name" value="{{old('company_name')}}">
                                                    <label class="focus-label">Company Name</label>
                                                </div>
                                            </div>
                                            <div class=" col-12">  
                                                <div class="form-group form-focus select-focus">
                                                    <input type="text" class="form-control floating" name="email">
                                                    <label class="focus-label">Email</label>
                                                </div>
                                            </div>
                                            
                                            <div class=" col-12">  
                                                <div class="form-group form-focus select-focus">
                                                    <input type="text" class="form-control floating"  name="account_manager">
                                                    <label class="focus-label">Account manager</label>
                                                </div>
                                            </div>
                                            <div class=" col-12">  
                                                <div class="form-group form-focus select-focus">
                                                    <input type="text" class="form-control floating" name="phone">
                                                    <label class="focus-label">Phone</label>
                                                </div>
                                            </div>
                                            <div class=" col-12"> 
                                                <div class="form-group form-focus select-focus">
                                                    @php
                                                        $agents=App\Models\User::role('agent')->get();
                                                    @endphp
                                                    <select class="form-control floating" name='agent'> 
                                                        <option value=""> -- Select -- </option>
                                                        @foreach ($agents as $agent)
                                                            <option value='{{$agent->id}}'> {{$agent->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    <label class="focus-label">Agent</label>
                                                </div>
                                            </div>
                                            <div class=" col-12"> 
                                                <div class="form-group form-focus select-focus">
                                                    <select class="form-control floating"  name="status"> 
                                                        <option value=""> -- Select -- </option>
                                                        <option value="hot"> Hot </option>
                                                        <option value="cold"> Cold </option>
                                                        <option value="active"> Active </option>
                                                    </select>
                                                    <label class="focus-label">Account status</label>
                                                </div>
                                            </div>
                                            
                                            <div class=" col-12"> 
                                                <div class="form-group form-focus select-focus">
                                                    @php
                                                        $bs_types=App\Models\BusinessType::all();
                                                    @endphp
                                                    <select class="form-control floating" name='bs_type'> 
                                                        <option value=""> -- Select -- </option>
                                                        @foreach ($bs_types as $bs_type)
                                                            <option value='{{$bs_type->id}}'> {{$bs_type->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    <label class="focus-label">Business Type</label>
                                                </div>
                                            </div>
                                            <div class=" col-12"> 
                                                <div class="form-group form-focus select-focus">
                                                    @php
                                                        $states=App\Models\State::all();
                                                    @endphp
                                                    <select class="form-control floating" name='state'> 
                                                        <option value=""> -- Select -- </option>
                                                        @foreach ($states as $state)
                                                            <option value='{{$state->id}}'> {{$state->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    <label class="focus-label">State</label>
                                                </div>
                                            </div>
                                            <div class=" col-12"> 
                                                <div class="form-group form-focus select-focus">
                                                    @php
                                                        $batches=App\Models\LeadBatch::all();
                                                    @endphp
                                                    <select class="form-control floating" name='batch'> 
                                                        <option value=""> -- Select -- </option>
                                                        @foreach ($batches as $batch)
                                                            <option value='{{$batch->id}}'> {{$batch->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    <label class="focus-label">Upload Batch</label>
                                                </div>
                                            </div>
                                            <div class=" col-12">  
                                                <div class="form-group form-focus select-focus">
                                                    <div class="cal-icon">
                                                        <input class="form-control floating datetimepicker" type="text"  name="date_from">
                                                    </div>
                                                    <label class="focus-label">Uploaded from</label>
                                                </div>
                                            </div>
                                            
                                            <div class=" col-12">  
                                                <div class="form-group form-focus select-focus">
                                                    <div class="cal-icon">
                                                        <input class="form-control floating datetimepicker" type="text" name="date_to">
                                                    </div>
                                                    <label class="focus-label">To</label>
                                                </div>
                                            </div>
                                            <div class=" col-12">  
                                                <button role="submit" class=" btn btn-primary btn-block"><i class="fa fa-check"> Apply filter</i></button>
                                            </div>     
                                        
                                    </form>
                                </div>
                            </div>
                                   
                        </div>
                    </div>
                    <div id="pool-content" class="col-auto d-flex ">
                        
                        <div class=" card">
                           
                            <div class="card-body profile-box flex-fill contentTab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap custom-table mb-0 custom-data-table" id="leads-pool-table">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Agent</th>
                                                        <th>Status</th>
                                                        <th>Created</th>
                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($leads as $lead)
                                                      <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="{{route('re_design_ui', $lead->id)}}">{{$lead->name}}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{$lead->email}}</td>
                                                        <td>{{$lead->phone1}}</td>
                                                        <td>
                                                            {{isset($lead->agent) ? $lead->agent->name : ''}}
                                                        </td>
                                                        <td>{{$lead->status}}</td>
                                                        <td>{{date('d-m-Y', strtotime($lead->created_at))}}</td>
                                                        @include('leads.pool.leads_table_actions')
                                                    </tr>  
                                                    
                                                    @endforeach
                                                   
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
        </div>
    </div>
    <div id="mass-edit" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mass update values</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('leads.profile_redone.transactions.mass_update')
                    {{-- @include('c_leads.leads_filter') --}}

                </div>
            </div>
        </div>
    </div>
    @include('leads.lead_upload')

@endsection

@section('custom_script')
    <script>
        // select pool
        $('body').on('change', '#select-pool', function(){
            $.ajax({
                url : "select-pool",
                type : "POST",
                data : {
                    pool : $("#select-pool").val(),
                    _token : "{{ csrf_token() }}",
                },
                success : function(response){
                    if (response) {
                        populateDataTable(response.leads)
                    }
                },
                error: function (e) { console.log("error " )     }
                
            }); 
        });

        
        // filter pool
        $('#pool-filter-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url : "ajaxfilter",
                type : "POST",
                data : {
                    company_name : $("input[name=company_name]").val(),
                    email : $("input[name=email]").val(),
                    agent : $("input[name=agent]").val(),
                    closer : $("input[name=closer]").val(),
                    phone : $("input[name=phone]").val(),
                    phone : $("input[name=phone]").val(),
                    status : $("input[name=status]").val(),
                    bs_type : $("input[name=bs_type]").val(),
                    state : $("input[name=state]").val(),
                    batch : $("input[name=batch]").val(),
                    date_to : $("input[name=date_to]").val(),
                    date_from : $("input[name=date_from]").val(),
                    _token : $("input[name= _token]").val(),
                },
                success : function(response){
                    if (response) {
                        populateDataTable(response.leads);
                    }
                },
                error: function (e) { console.log("error " )     }
                
            }); 
        });

        $(document).on('submit', '.delete-form', function(e){
            e.preventDefault();
            if(confirm("You are about to delete this item! Are you sure you want to proceed?"))
            {
                e.target.submit();
            }
        });

        function populateDataTable(leads)
        {
            const table=$("#leads-pool-table");
            $(table).DataTable().clear();
            $(table).DataTable().destroy();
            leads.forEach(element => {
                $("#leads-pool-table").prepend(
                    "<tr>\
                        <td>"+element.name+"</td>\
                        <td>"+element.email+"</td>\
                        <td>"+element.phone1+"</td>\
                        <td>"+element.agent_name+"</td>\
                        <td>"+element.status+"</td>\
                        <td>"+element.date_created+"</td>"+
                        "<td class='text-right'>\
                            <div class='dropdown dropdown-action'>\
                                <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>\
                                <div class='dropdown-menu dropdown-menu-right'>\
                                    <a class='dropdown-item' href='{{route("c_leads.edit", isset($lead)?$lead->id : '')}}'><i class='fa fa-pencil m-r-5'></i> Edit</a>\
                                    <form class='delete-form' action='{{route("c_leads.destroy", isset($lead)?$lead->id : '')}}' method='POST'>\
                                        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>\
                                        <input type='hidden' name='_method' value='delete'>\
                                        <button id='delete-lead-btn' type='submit' class='dropdown-item'><i class='fa fa-trash-o m-r-5'></i> Delete</button>\
                                    </form>\
                                </div>\
                            </div>\
                        </td>\
                    </tr>"
                );
            });
            table.DataTable();
        }
    </script>
@endsection
