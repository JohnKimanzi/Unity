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
            <div class="row">
                <div class="col-md-10 col-sm-10 col-lg-10">
                    <ul class="nav nav-tab" id="mark_prof_head_nav_card">
                              
                        @php
                        $action_codes=App\Models\Client::first()->action_codes
                            
                        @endphp
                        @forelse ($action_codes as $action_code)
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span
                                        class="@if($action_code->is_blinking) blinking @endif
                                            @if($action_code->is_bold) font-weight-bold @endif
                                            @if($action_code->is_strike_through) strike-through @endif
                                            @if($action_code->is_underline) underline @endif" 
                                        style="color: {{$action_code->text_color}};background-color: {{$action_code->bg_color}} !important;">
                                        {{$action_code->name}}
                                    </span>
                                </a>
                            </li>
                        @empty
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void()">No action codes!</a>
                        </li>
                        @endforelse
                                                            
                                                                                        
                    </ul><br>
                    <div class="row col-md-12" id="mark_design_contents">
                        @include('mark_design.mark_design_profile')
                        @include('mark_design.mark_reminders')
                    
                            
                                <ul class="nav nav-tab col-md-12" id="mark_prof_head_nav_card">                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Customizable Tab</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Customizable Tab</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Customizable Tab</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Customizable Tab</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-plus fa-sm"></i></a>
                                        </li>                                                   
                                </ul>
                        
                    
                            </div>
                        <div class="row col-md-12">    
                            <div class=" col-md-12" id="mark-design-dash-cards">
                                        <div class="row col-md-12">
                                            <div class="col-md-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                                    </div>
                                                    <input type="text" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="">
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                                    </div>
                                                    <input type="text" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="">
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                                    </div>
                                                    <input type="text" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="">
                                                </div>
                                                <div class="input-group date input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Date</span>
                                                    </div>
                                                    <input type="text" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value=""><i class="fa fa-calendar"></i>
                                                </div>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                                    </div>
                                                    <input type="text" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea maxlength="50px" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        
                            </div>
                        </div>
                            
                         <div class="row col-md-12">   
                            <div class="col-md-12">
                                <div class="row col-md-12">
                                    <ul class="nav nav-tab col-md-12" id="mark_prof_head_nav_card">                        
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Notes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Doc Folder</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Activity</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Finances</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"><i class="fa fa-plus fa-sm"></i></a>
                                            </li>
                                                
                                                                                                
                                    </ul><hr>
                                </div>
                            </div>
                         </div>
                            
                            <div class="col-md-12 col-sm-12 d-flex " id="mark_profile" style="display:none">
                                                
                               
                                <div class="card col md-10 d-flex" id="mark-design-dash-cards" >
                                   
                                        <div class="card-body" >
                                            <div class="section col-md-12" >
                                                <ul class="nav nav-tab col-md-12" id="mark_prof_head_nav_cards">                        
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Client</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Account</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Admin</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Finances</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Custom Field</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Custom Field</a>
                                                    </li>
                                                
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><i class="fa fa-plus fa-sm"></i></a>
                                                    </li>
                                                    
                                                                                                    
                                                </ul>
                                            </div>
                                            <div class="section col-md-12" id="content-bottom">

                                            </div>
                                        </div>
                                </div>
                                               
                            </div>

                       
                            
                      
                    </div> 
                </div>   
                    <div class="col-md-2" > 

                            <ul class="navbar-nav" id="mark-design-dash-cards">
                                <li class="nav-item">
                                    <a href="#" class="btn btn-primary col-md-12"id="mark_nav_links-reminder" onclick="changeDisplay(this.id);" >Reminders</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-success col-md-12"id="mark_nav_links-chat" onclick="changeDisplay(this.id);">Chat Box</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-warning col-md-12"id="mark_nav_links" >Action Codes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-danger col-md-12"id="mark_nav_links" >Transactions</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-secondary col-md-12"id="mark_nav_links" >ID Status</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-primary col-md-12"id="mark_nav_links" >To be Determined</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-success col-md-12"id="mark_nav_links" >To be Determined</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-danger col-md-12"id="mark_nav_links" >To be Determined</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-primary col-md-12"id="mark_nav_links" >To be Determined</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-success col-md-12"id="mark_nav_links" >To be Determined</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="btn btn-danger col-md-12"id="mark_nav_links" >To be Determined</a>
                                </li>
                                
                                            
                            </ul>  
                    </div>
                    
                </div> 
                    
            </div>
                
               
            
            
            
        </div>
        
        
    </div>
@include('mark_design.view_contact')
@include('mark_design.add_contact')
@endsection