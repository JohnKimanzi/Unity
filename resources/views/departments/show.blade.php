@extends('layout.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>

                        <li class="breadcrumb-item active">Users</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="card ">
                @include('users.users_table')
            </div>

        </div>
    </div>