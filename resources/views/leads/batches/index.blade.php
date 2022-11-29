@extends('layout.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Lead Batches</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lead Batches</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leads"><i class="fa fa-plus"></i> Add Batch</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead class="bg-inverse-primary">
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Uploaded By</th>
                                <th>Source</th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($batches as $batch)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$batch->name}}</td>
                                <td>{{$batch->count}}</td>
                                <td>{{$batch->user->name}}</td>
                                <td>{{$batch->source}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('lead_batches.show', $batch)}}"><i class="fa fa-download m-r-5"></i> View Pool</a>
                                            <a class="dropdown-item" href=""><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_policy"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <div>
                                No records
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    
    <!-- Add Lead Batch Modal -->
    @include('leads.lead_upload')
    
    <!-- /Add Lead Batch  Modal -->

@endsection