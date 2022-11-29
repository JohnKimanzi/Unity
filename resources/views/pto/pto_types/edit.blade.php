@extends('layout.mainlayout')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">PTO Types</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                       
                        <li class="breadcrumb-item active">Edit PTO Type</li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="row d-flex justify-content-center">
        <div class="card-body">
            <form method='POST' action="{{ route('pto_types.update', $pto_type) }}">
                @csrf
                @method('PUT')
                @include('pto.pto_types.pto_types_form')
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        </div>
    </div>
@endsection