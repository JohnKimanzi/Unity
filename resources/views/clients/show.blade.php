@extends('layout.mainlayout')
@section('content')
	<!-- Page Wrapper -->
    
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Client Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="">
                                                <img src="img/profiles/avatar-19.jpg" alt="logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0">{{$client->company->name}}</h3>
                                                    <h5 class="company-role m-t-0 mb-0">Business type: {{$client->company->business_type->name}}</h5>
                                                    <small class="text-muted">State: {{$client->company->state->name}}</small>
                                                    <div class="staff-id">Collector : {{$client->collector->name}}</div>
                                                    <div class="staff-msg"><a href="javascript:void()" class="btn btn-custom">Email</a></div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <span class="title">Phone:</span>
                                                        <span class="text"><a href="">{{($client->primary_phone) ? $client->primary_phone->number : 'Not available'}}</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Email:</span>
                                                        <span class="text"><a href="">{{($client->primary_email) ? $client->primary_email->address: 'Not available'}}</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Date onboarded:</span>
                                                        <span class="text">{{$client->date_onboarded}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Address:</span>
                                                        <span class="text">{{($client->primary_address) ? $client->primary_address->address : 'Not available'}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Is Commercial:</span>
                                                        <span class="text">@if($client->company->is_commercial== true) Yes @elseif ($client->company->is_commercial== false) No @else Unspecified @endif</span>
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
                <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#notes">Notes</a></li>
                                <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#myprojects">Accounts <small>({{count($debts=$client->debts)}})</small></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="tab-content profile-tab-content">
                            
                            <!-- Projects Tab -->
                            <div id="myprojects" class="tab-pane fade ">
                                <div class="row">
                                    
                                    @include('debts.list_view')
                                </div>
                            </div>
                            <!-- /Projects Tab -->
                            
                            <!-- Notes Tab -->
                            <div id="notes" class="tab-pane fade show active">
                                <div class="project-task">
                                    <ul class="nav  nav-tabs nav-tabs-bottom text-white mb-0">
                                        <li class="nav-item "><a class="nav-link active" href="#all-notes" data-toggle="tab" aria-expanded="true"> All</a></li>
                                        <li class="nav-item "><a class="nav-link " href="#call-notes" data-toggle="tab" aria-expanded="false"> Calls</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#docs" data-toggle="tab" aria-expanded="false">Docs</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#accounts-upload" data-toggle="tab" aria-expanded="false">Accounts upload</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#profile-activity" data-toggle="tab" aria-expanded="false">Profile Activity</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#custom-notes" data-toggle="tab" aria-expanded="false">Custom</a></li>
                                    </ul>
                                    @php
                                        $notes=App\MOdels\Note::all();
                                    @endphp
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="all-notes">
                                            <div class="card card-table flex-fill">
                                                <div class="card-body">
                                                    @include('notes.notes_list_table' , ['filtered_notes'=> $notes])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="call-notes">                                            
                                            <div class="card card-table flex-fill">
                                                <div class="card-body">
                                                    @include('notes.notes_list_table' , ['filtered_notes'=> $notes->where('subject', 'call')])
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="accounts-upload">                                            
                                            <div class="card card-table flex-fill">
                                                <div class="card-body">
                                                    @include('notes.notes_list_table' , ['filtered_notes'=> $notes->where('subject', 'accounts upload')])
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="docs">                                            
                                            <div class="card card-table flex-fill">
                                                <div class="card-body">
                                                    @include('notes.notes_list_table' , ['filtered_notes'=> $notes->where('subject', strtolower('Docs'))])
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="profile-activity">                                            
                                            <div class="card card-table flex-fill">
                                                <div class="card-body">
                                                    @include('notes.notes_list_table', ['filtered_notes'=> $notes->where('subject', 'profile activity')])
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="custom-notes">                                            
                                            <div class="card card-table flex-fill">
                                                <div class="card-body">
                                                    @include('notes.notes_list_table', ['filtered_notes'=> $notes->where('subject', 'custom')])
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Notes Tab -->
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
@endsection