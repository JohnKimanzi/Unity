@extends('layout.mainlayout')
@section('content')
       <!-- Page Content -->
       <div class="modal custom-modal fade" role="dialog" id="create_department">
            <div class="modal-dialog modal-dialog-left modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
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
       <div class="content container-fluid">
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Teams</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                       
                        <li class="breadcrumb-item active">Departments</li>
                    </ul>
                </div>
                @role('admin')
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_department"><i class="fa fa-plus"></i> Add Department</a> 
                </div>
                @endrole

            </div>
        </div>
        <div class="card justify-content-center flex-fill">
                    <div class="card-body">
                        <table class="table table-striped mb-0" id="departments-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div> 
       </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#departments-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "departments",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false,searchable:false},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'actions', name: 'actions',orderable:false,searchable:false}
                ]
            });
        })
    </script>
@endpush