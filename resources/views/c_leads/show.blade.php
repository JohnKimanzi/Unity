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
                        <li class="breadcrumb-item"><a href="index">Leads</a></li>
                        <li class="breadcrumb-item active">{{$lead->name}}</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-phone"></i> Call</a>
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-pencil"></i> Edit details</a>
                    
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0">{{$lead->name}}</h3>
                                            <h5 class="company-role m-t-0 mb-0">{{$lead->business_type->name}}</h5>
                                            <small class="text-muted">
                                                Medical:
                                                @if($lead->business_type->is_medical==true)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </small>
                                            <div class="row">
                                            <div class="card-body dropdown action-label">
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
                                                    
                                                    <a class="dropdown-item" href="{{route('change_lead_status',[$lead, 'Hot'])}}"><i class="fa fa-dot-circle-o text-danger"></i> Hot lead</a>
                                                    <a class="dropdown-item" href="{{route('change_lead_status',[$lead, 'Warm'])}}"><i class="fa fa-dot-circle-o text-success"></i> Warm lead</a>
                                                    <a class="dropdown-item" href="{{route('change_lead_status',[$lead, 'Cold'])}}"><i class="fa fa-dot-circle-o text-dark"></i> Cold lead</a>
                                                </div>
                                            </div></div>
                                            <div class="staff-msg"><a href="" class="btn btn-custom">Send Message</a></div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Primary phone:</span>
                                                <span class="text"><a href="">{{$lead->phone1}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Secondary phone:</span>
                                                <span class="text"><a href="">{{$lead->phone2}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="">{{$lead->email}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Date added:</span>
                                                <span class="text">{{date('d-m-Y', strtotime($lead->created_at))}}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{$lead->address}}</span>
                                            </li>
                                            <li>
                                                <span class="title">City:</span>
                                                
                                                <span class="text">{{$lead->town}}</span>
                                            </li>
                                            <li>
                                                <span class="title">State:</span>
                                                
                                                <span class="text">{{$lead->state->name}}</span>
                                            </li>
                                            
                                            <li>
                                                <span class="title">Zip code:</span>
                                                
                                                <span class="text">{{$lead->zip_code}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

@endsection