@extends('layout.mainlayout')
@section('content')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="page-title">{{$role->name}} Role </h3>
            </div>
        </div>
    </div>
        <div class="col-auto">
            <div class="card">
            <div class="card-header">
            <h3>Users with <b>{{$role->name}}</b> Role</h3>
            </div>
                <div class="card-body">
                    @include('user_management.roles.users_table')
                </div>
            </div>
        </div>
        <div class="col-auto mt-5">
            <div class="card">  
                <div class="card-header">
                <h3>Permissions for <b>{{$role->name}}</b> Role</h3>
                </div> 
                <div class="card-body">
                    @include('user_management.roles.permissions_table')
                </div>
            </div>
        </div>
    </div>
    @endsection