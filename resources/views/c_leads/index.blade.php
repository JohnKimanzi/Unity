@extends('layout.mainlayout',  ['title'=>"LEADS"])
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">
        
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-phone"></i> Call</a>
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leads"><i class="fa fa-plus"></i> Add leads</a>
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#mass-edit"><i class="fa fa-pencil"></i> Mass update</a>
                    {{-- <a href="{{route('massupdatepage', serialize(array($leads)))}}" class="btn add-btn"><i class="fa fa-pencil"></i> Mass update page</a> --}}
                    
                </div>
            </div>
        </div>
        
            @include('c_leads.leads_filter')

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <section class="dash-section">
                    
                    <div class="dash-sec-content">
                        <div class="dash-info-list">
                            <a href="#" class="dash-card text-info">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon">
                                        <i class="fa fa-address-card-o"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <p>All Leads  </p> 
                                    </div>
                                </div>
                            </a>
                            
                            <div class="card card-table flex-fill">
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table custom-table mb-0 custom-data-table">
                                            <thead>
                                                <tr>
                                                    <th>Company</th>
                                                    <th>email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Date added</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($leads==null || $leads->count()<1)
                                                   <div class="bg-danger text-white"  style="text-align:center">
                                                        The search returned an empty resultset
                                                   </div>
                                                @else
                                                    @foreach ($leads as $lead )
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="{{url('lead_profile', $lead->id)}}" class="avatar"><img alt="" src="img/user.jpg"></a>
                                                                <a href="{{url('lead_profile', $lead->id)}}">{{$lead->name}}<span>{{$lead->business_type->name}}</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>{{$lead->email}}</td>
                                                        <td><a href="{{route('calls.create')}}"> <i class="fa fa-phone"></i></a> {{ $lead->phone1}}  </td>
                                                        {{-- <td>{{$lead->status}}</td> --}}
                                                        <td>
                                                            <div class="dropdown action-label">
                                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                    @if(strtolower($lead->status)=='hot')
                                                                        <i class="fa fa-dot-circle-o text-danger"></i> Hot lead
                                                                    @elseif(strtolower($lead->status)=='warm')
                                                                        <i class="fa fa-dot-circle-o text-success"></i> Warm lead
                                                                    @elseif(strtolower($lead->status)=='cold')
                                                                        <i class="fa fa-dot-circle-o text-dark"></i> Cold lead
                                                                    @endif
                                                                    
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#status_change" data-status><i class="fa fa-dot-circle-o text-danger"></i> Hot lead</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#status_change" data-status><i class="fa fa-dot-circle-o text-success"></i> Warm lead</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#status_change" data-status><i class="fa fa-dot-circle-o text-dark"></i> Cold lead</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{date('d-m-Y', strtotime($lead->created_at))}}</td>
                                                        
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="show"><i class="fa fa-eye m-r-5"></i> View</a>
                                                                    <a class="dropdown-item" href="edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a class="dropdown-item" href="remove"><i class="fa fa-trash-o m-r-5"></i> Remove</a>
                                                                    
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
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
    <!-- /Page Content -->
    <!-- New call Modal -->
    <div id="add_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New call</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('calls.new_call_form')
                </div>
            </div>
        </div>
    </div>
    <!-- New call Modal -->

    <!-- Mass Edit Modal -->
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
                    @include('c_leads.mass_update')
                    {{-- @include('c_leads.leads_filter') --}}

                </div>
            </div>
        </div>
    </div>
    <!-- Mass Edit Modal -->

    <!-- Status Modal -->
    <div id="status_change" class="modal custom-modal fade" role="dialog">
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
    </div>
    <!-- Status Modal -->
    <!-- Leads upload Modal -->
    <div id="add_leads" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Leads</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('leads_import')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div>
                            <div class="form-group row">
                                <a href="{{route('get_lead_template')}}" class="btn btn-primary "> <i class="fa fa-download"></i> Get template</a> 
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Select file to upload </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" required name="file_to_import">
                                </div>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                        </div>
                    
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Leads upload Modal -->

<!-- /Page Wrapper -->
@endsection