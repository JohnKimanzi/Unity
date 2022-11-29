@extends('layout.mainlayout', ['title'=>"Time-Record-Types"])
@section('content')
    <!-- Page Content -->
    <div class="modal custom-modal fade" role="dialog" id="create_timerecordtype">
        <div class="modal-dialog modal-dialog-left modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('time_record_types.create_modal')
                </div>
            </div>
        </div>
    </div>
    <div class="content container-fluid">
        <!--Page Header-->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Breaks</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>

                        <li class="breadcrumb-item active">Breaks</li>
                    </ul>
                </div>
                @role('admin')
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_timerecordtype"><i class="fa fa-plus"></i> Add Break</a>
                </div>
                @endrole

            </div>
        </div>
        <div class="card justify-content-center flex-fill">
                <div class="card-body">
                    <table class="table table-striped mb-0" id="time_record_types-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th> Paid Status</th>
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
        var table = $('#time_record_types-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "time_record_types",
            columns: [
                {
                    data: 'DT_RowIndex',
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'is_paid',
                    name: 'is_paid'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    })
</script>
@endpush