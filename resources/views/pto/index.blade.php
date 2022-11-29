@extends('layout.mainlayout', ['title'=>"PTO"])
@push('styles')
<style>
    .badge-blinking {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        20% {
            opacity: 0;
        }
    }
</style>
@endpush
@section('content')
<!-- Page Content -->
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Employee time-off Tracker</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                    <li class="breadcrumb-item active">User time-off tracker</li>
                </ul>
            </div>
            <ul class="nav nav-tabs justify-content-end mt-0 text-light" role="tablist">
                    <li class="nav-item" role="tab"><a class="nav-link active btn btn-primary" href="#pto-applications" aria-controls="pto-applications" data-toggle="tab" aria-expanded="true" aria-labelledby="pto-applications-tab">Applications
                        <span class=" top-0 start-100 translate-middle badge rounded-pill badge-blinking bg-danger">
                            {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-blinking bg-danger"> --}}
                            {{count($ptos->where('status', 'like', 'New'))}}
                            {{-- <span class="visually-hidden">new applications</span> --}}
                        </span>
                    </a></li>
                    <li class="nav-item" role="tab"><a class="nav-link btn btn-primary" href="#pto-records" aria-controls="pto-records"  data-toggle="tab" aria-expanded="false" aria-labelledby="pto-records-tab">PTO Record</a></li>
                    <li class="nav-item" role="tab"><a class="nav-link btn btn-primary" href="#pto-types" aria-controls="pto-types" data-toggle="tab" aria-expanded="false" aria-labelledby="pto-types-tab">PTO types</a></li>
                    <li class="nav-item" role="tab"><a class="nav-link btn btn-primary" href="#" aria-controls="pto-balance" data-toggle="tab" aria-expanded="false" aria-labelledby="pto-balance-tab">PTO balances</a></li>
                    <li class="nav-item" role="tab"><a class="nav-link btn btn-primary" href="#pto-request" aria-controls="pto-request" data-toggle="tab" aria-expanded="false" aria-labelledby="pto-request-tab">Request PTO</a></li>
                </ul>
      </div>  
    </div>
    <div class="card">
        
        <div class="card-body">
           <div class="tab-content">
               
                <!-- PTO applications Tab -->
                <div id="pto-applications" class="tab-pane show active" role="tabpanel">
                    <div class="card">
                        <div class="card-header"> PTO Applications </div>
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @include('pto.pto_table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / PTO applications Tab-->
                
                <!--PTO Records Tab -->
                <div class="tab-pane" id="pto-records">
                    <section class="dash-section">
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <a href="#" class="dash-card text-info">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="la la-unlink"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>PTO record </p>
                                        </div>
                                    </div>
                                </a>
                                @include('pto.pto_employee_list')
                            </div>
                        </div>
                    </section>
                </div>
                <!-- / PTO Records Tab-->

                <!--   PTO Types Tab-->
                <div id="pto-types" class="tab-pane" role="tabpanel">
                    <div class="card">
                        <div class="card-header"> PTO Types </div>
                        <div class="card-body row">
                            <div class="col-sm-12">
                                @include('pto.pto_types.pto_types_table')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / PTO Types Tab-->

                <!--   PTO Request Tab-->
                <div id="pto-request" class="tab-pane" role="tabpanel">
                    <div class="card">
                        <div class="card-header"> Request PTO</div>
                        <div class="card-body row">
                            <div class="col-sm-12">
                                <form action="{{route('pto.store')}}" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    @include('pto.pto_request_form')
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- / PTO Request Tab-->
        </div> 
        </div>
    </div>
</div>
<!-- End of Page Content-->
<!-- approve-pto-modal Modal -->
<div id="approve-pto-modal" class="modal custom-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <form action="{{route('pto_status')}}" method='POST'>
                        @csrf

                        <div class="form-header">
                            <h3>PTO Applications Status</h3>
                            <p>Are you sure want to update status for this PTO Application?</p>
                        </div>
                        <input type="text" hidden name="pto_id" id="pto_id">
                        <div class="form-group">
                            <label>Status <span class="text-danger ">*</span></label>
                            <select id="new_status" class="form-control @error ('new_status') is-invalid @enderror" required name="new_status">
                                <option value="Declined">Declined</option>
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                            </select>
                            @error('new_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Comments <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control @error ('comments') is-invalid @enderror" name="comments">{{old('comments', '')}}</textarea>
                            @error('comments')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn">Update</button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- approve-pto-modal Modal -->
@endsection
@push('scripts')
<script>
    $(document).on("click", ".status-btn", function() {
        var status = $(this).data('status');
        var id = $(this).data('pto_id');
        document.getElementById('new_status').value = status;
        document.getElementById('pto_id').value = id;
    
    });    
</script>
@endpush