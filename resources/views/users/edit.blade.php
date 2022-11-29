@extends('layout.mainlayout')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                       
                        <li class="breadcrumb-item active">Edit User</li>
                    </ul>
                </div>
                @role('admin')
                <div class="col-auto float-right ml-auto">
                    {{-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_user"><i class="fa fa-plus"></i> Add User</a>  --}}
                </div>
                @endrole

            </div>
        </div>
        {{-- /Page header --}}
        <div class="row d-flex justify-content-center">
        <div class="card-body">
            <form method='POST' action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')
                @include('users.user_form')
                {{-- @include('users.pto_allocation') --}}
                @include('inc.user_roles_form')
                @include('inc.user_perms_form')
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        </div>
    </div>
    <div class="modal custom-modal fade" role="dialog" id="create_user">
        <div class="modal-dialog modal-dialog-left modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit New User</h5>
                    @include('layout.partials.flash')
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('users.create_modal')   
                </div>
            </div>
        </div>
    </div>
@endsection