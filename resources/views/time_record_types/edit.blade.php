@extends('layout.mainlayout')
@section('content')

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Time Record Types</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                       
                        <li class="breadcrumb-item active">Edit TimeRecordType</li>
                    </ul>
                </div>
                @role('admin')
                <div class="col-auto float-right ml-auto">
                   <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_time_record_types-datatable"><i class="fa fa-plus"></i> Add TimeRecordType</a> 
                </div>
                @endrole

            </div>
        </div> 
        <div class="row d-flex justify-content-center">
        <div class="card-body">
            <form method='POST' action="{{ route('time_record_types.update', $timeRecordType) }}">
                @csrf
                @method('PUT')
                @include('time_record_types.time_record_types_form')
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        </div>
    </div>
    <div class="modal custom-modal fade" role="dialog" id="create_time_record_types-datatable">
        <div class="modal-dialog modal-dialog-left modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit TimeRecordType</h5>
                    @include('layout.partials.flash')
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('time_record_types.create_modal')   
                </div>
            </div>
        </div>
    </div>
@endsection