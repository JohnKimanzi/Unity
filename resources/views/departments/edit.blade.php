@extends('layout.mainlayout')
@section('content')

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Departments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                       
                        <li class="breadcrumb-item active">Edit Department</li>
                    </ul>
                </div>
                @role('admin')
                <div class="col-auto float-right ml-auto">
                   <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_department"><i class="fa fa-plus"></i> Add Department</a> 
                </div>
                @endrole

            </div>
        </div> 
        <div class="row d-flex justify-content-center">
        <div class="card-body">
            <form method='POST' action="{{ route('departments.update', $department) }}">
                @csrf
                @method('PUT')
                @include('departments.department_form')
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        </div>
    </div>
    <div class="modal custom-modal fade" role="dialog" id="create_department">
        <div class="modal-dialog modal-dialog-left modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit New Department</h5>
                    @include('layout.partials.flash')
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('departments.create_modal')   
                </div>
            </div>
        </div>
    </div>
@endsection