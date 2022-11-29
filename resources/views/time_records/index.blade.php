@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Time Sheets</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Time Sheets</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card justify-content-center flex-fill">
            <div class="card-body">
                {{-- <div class="table-responsive   "> --}}
                    @include('time_records.time_records_table')
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection