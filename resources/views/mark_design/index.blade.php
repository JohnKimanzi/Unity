@extends('layout.mainlayout')
@section('content')


    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- top navbar -->
        
        <div class="sticky-bar col-md-12">
            <ul class="nav nav-bar text-white col-md-12" id="mark_page_menu">
                <li class="nav-item">
                    <a class="nav-link " href="#">Active</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">File</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Automations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Admin</a>
                </li>
            </ul>
        </div>
       
        <div class="col-md-12 col-sm-12 col-lg-12" id="mark-body-main">
            <div class="col-md-10">
                <div class="card-body" id="display">
                    <ul class="nav nav-tab" id="mark_prof_head_nav_card">

                        @php
                        $action_codes=App\Models\Client::first()->action_codes

                        @endphp
                        @forelse ($action_codes as $action_code)
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="@if($action_code->is_blinking) blinking @endif
                                                @if($action_code->is_bold) font-weight-bold @endif
                                                @if($action_code->is_strike_through) strike-through @endif
                                                @if($action_code->is_underline) underline @endif"
                                    style="color:'{{$action_code->text_color}}';background-color: '{{$action_code->bg_color}}' !important;">
                                    {{$action_code->name}}
                                </span>
                            </a>
                        </li>
                        @empty
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void()">No action codes!</a>
                        </li>
                        @endforelse


                    </ul>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="row d-flex" id="mark_design_contents">
                        <div class="card-body">
                            @include('mark_design.mark_design_profile')
                        </div>
                        @include('mark_design.mark_reminders')
                        @include('mark_design.action_codes')

                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <ul class="nav  col-md-12" id="mark_prof_head_nav_card">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Customizable Tab</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-dark" href="#">Customizable Tab</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-dark" href="#">Customizable Tab</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-dark" href="#">Customizable Tab</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-dark" href="#"><i class="fa fa-plus fa-sm"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="row d-flex" id="mark-design-dash-cards">
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" value="">
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" value="">
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" value="">
                                    </div>
                                    <div class="input-group date input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Date</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" value=""><i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea maxlength="50px" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <ul class="nav nav-tab col-md-12" id="mark_prof_head_nav_card">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#display_content_area" id="notes" onclick="transaction(this.id)">Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark " href="#display_content_area" id="doc_folder" onclick="transaction(this.id)">Doc
                                        Folder</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#display_content_area" id="activity"
                                        onclick="transaction(this.id)">Activity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#display_content_area" id="finances"
                                        onclick="transaction(this.id)">Finances</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#display_content_area"><i class="fa fa-plus fa-sm"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class=" row d-flex" id="mark-design-dash-cards">
                    
                            <div class="card-body" id="display_content_area">
                                @include('mark_design.documents')
                                @include('mark_design.notes_history')
                    
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            {{--Right Bar Quick links --}}
            <div class="col-md-2 ">
                <div class="card-body border-warning" id="mark-design-dash-cards">
                    <div class="card-header bg-warning">Quick Links</div>
                    <ul class="navbar-nav " >
                        <li class="nav-item">
                            <a href="#" class="btn3d btn btn-success col-md-12 " id="mark_nav_links"
                                data-target="#check-list-modal" data-toggle="modal">Activate Client</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class=" btn3d btn btn-success col-md-12 " id="mark_nav_links-reminder"
                                data-toggle="modal" data-target="#mark_reminders">Reminders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class=" btn3d btn btn-success col-md-12 " id="mark_nav_links-chat"
                                onclick="changeDisplay(this.id);">Chat Box</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class=" btn3d btn btn-success col-md-12 " data-toggle="modal"
                                data-target="#action_codes" data-id="{{$leads->id}}" id="mark_nav_links">Action Codes</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class=" btn3d btn btn-success col-md-12 " data-toggle="modal"
                                data-target="#lead_conversion" data-id="1" id="mark_nav_links">Conversion</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class=" btn3d btn btn-success col-md-12 " id="mark_nav_links">ID Status</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn3d btn btn-success col-md-12 " id="mark_nav_links" data-toggle="modal"
                                data-target="#docs-upload">Upload Docs</a>
                        </li>
                        
    
    
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- !Page Content -->
    
    {{-- docs upload modal --}}
    <div class="modal fade" id="docs-upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('doc_upload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="lead_id" value="{{$leads->id}}">
                                    <label>Company Name </span></label>
                                    <input class="form-control" type="text" readonly name="company_name"
                                        value="{{$leads->name}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>File Type </span></label>
                                    <input name="document_type" list='doc_type' class="form-control">
                                    @php
                                    $file_types=App\Models\DocumentType::get('name');
                                    @endphp
                                    <datalist id="doc_type">
                                        @foreach($file_types as $filetype)
                                        <option value="{{$filetype->name}}">{{$filetype->name}}</option>
                                        @endforeach

                                    </datalist>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="file" name="lead_doc" id="lead_doc" class="form-control">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" role="submit" class="btn btn-primary"><i class="la la-upload"></i>
                            Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- !docs upload modal --}}

    {{-- check-list-modal modal --}}
    <div class="modal fade" id="check-list-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Active status requirements</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="was-validated" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                        name="1" required>
                                    <label class="custom-control-label" for="customControlValidation1">Upload service
                                        agreement</label>
                                    <div class="invalid-feedback">This requirement has not been met</div>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation2"
                                        name="2" required>
                                    <label class="custom-control-label" for="customControlValidation2">Has at least one
                                        contact person</label>
                                    <div class="invalid-feedback">This requirement has not been met</div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" role="submit" class="btn btn-primary"><i class="la la-check"></i>
                            Activate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- !check-list-modal modal --}}

    @include('mark_design.view_contact')
    @include('mark_design.add_contact')
    @include('mark_design.lead_conversion')


@endsection