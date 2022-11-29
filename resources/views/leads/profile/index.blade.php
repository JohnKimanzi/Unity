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
                        <li class="breadcrumb-item active">{{$data->name}}'s Profile </li>
                    </ul>
                </div>
               
               
               
            </div>
        </div>
      
   <div class="row">
        <!-- <div class="card col-sm-4 float-right" >
            <h3> {{$data->name}}' Profile</h3>
        </div> -->
       <button class="btn btn-warning col-sm-12"  onclick="Lead_info()">Lead Information <i class="fa fa-caret-down float-right"></i></button>
       @include('leads.profile.lead_info')
   </div>
   <div class="row">
        <!-- <select class="selectpicker form-control col-md-12">
        <optgroup label="Lead Details">
            <option>@include('leads.profile.edit_lead')</option>
            <option>Ketchup</option>
            <option>Relish</option>
        </optgroup>
        <optgroup label="Camping">
            <option>Tent</option>
            <option>Flashlight</option>
            <option>Toilet Paper</option>
        </optgroup>
        </select> -->

       <button class="btn btn-info col-sm-12" id="lead_info_btn" onclick="Edit_lead()" > Edit Lead details<i class="fa fa-caret-down float-right"></i></button>
       @include('leads.profile.edit_lead')
   </div>
   <div class="row">
    
       <button class="btn btn-secondary col-sm-12" onclick="Lead_activity()">Lead Engagement<i class="fa fa-caret-down float-right"></i></button>
       @include('leads.profile.lead_activity')
       {{--@include('leads.profile.add_category')--}}
   </div>
   <div class="row">
    
       <button class="btn btn-custom col-sm-12" onclick="Lead_Conversations()">Recent Conversations<i class="fa fa-caret-down float-right"></i></button>
       @include('leads.profile.call_log')
       
   </div>
   
   
    
   
  
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