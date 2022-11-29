@extends('layout.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{$user->name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>

                        <li class="breadcrumb-item ">Users</li>
                        <li class="breadcrumb-item active">{{$user->name}}</li>
                    </ul>
                </div>
            </div>
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-primary">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse " id="navbarNav">
                                <ul class="navbar-nav  ">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link " id="bio" onclick="display(this.id);"><i
                                                class="fa fa-user"></i>Biodata</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link " id="work" onclick="display(this.id);"><i
                                                class="fa fa-pie-chart"></i>Performance </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="earn" onclick="display(this.id);"><i
                                                class="fa fa-bank"></i>Earnings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="rest" onclick="display(this.id);"><i
                                                class="fa fa-coffee"></i>Request time-off</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="role" onclick="display(this.id);"><i
                                                class="fa fa-cog"></i>Role</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="uploads" onclick="display(this.id);"><i
                                                class="fa fa-upload"></i>Documents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link " id="logs" onclick="display(this.id);"><i
                                                class="fa fa-unlock"></i>User Activity</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                    </div>

                    <div class="card col-md-12">
                        <div class="card-header ">
                            {{-- <h4>Transaction Pane</h4> --}}
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 col-lg-12 col-sm-12" id="content">
                                @include('users.transactions.workload_Analysis')
                                @include('users.transactions.earnings')
                                @include('users.transactions.leave_app')
                                @include('users.transactions.roles')
                                
                                {{-- @include('users.transactions.assigned_leads') --}}
                                @include('users.transactions.uploads')
                                @include('users.transactions.user_logs')
                                @include('users.transactions.user_bio')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection