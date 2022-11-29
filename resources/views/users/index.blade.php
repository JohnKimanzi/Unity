@extends('layout.mainlayout')
@section('content')

<!--Add designation button Modal-->
<div class="modal" id="addDesignationBtn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Designation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container"></div>
            <form method='post' id="addDesignationForm" action="{{route('add-designation')}}">
                <div class="modal-body">
                    @csrf
                    @include('designations.designation_form')
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn">Close</a>
                    <button data-dismiss="modal" type="submit" value="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Add designation button Modal-->

<!--Add Team button Modal-->
<div class="modal" id="addTeamModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Team</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container"></div>
            <form method='post' id="addTeamForm" action="{{route('add-team')}}">
                <div class="modal-body">
                    @csrf
                    @include('teams.team_form')
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn">Close</a>
                    <button data-dismiss="modal" type="submit" value="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Add Team button Modal-->

<!--Add Country button Modal-->
<div class="modal" id="addCountryBtn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Country</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
                @csrf
                @include('countries.country_form')
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>
<!--Add Country button Modal-->

<!--Users index Page-->
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
            @role('admin')
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#create_user"><i class="fa fa-plus"></i> Add User</a>
                @if(request()->has('view_deleted'))
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">View All Users</a>
                    <a href="{{ route('users.restore.all') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('users.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-danger">View Deleted Records</a>
                @endif

            </div>
            @endrole
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('users.user_records_filter')
        </div>
    </div>

    <div class=" card justify-content-center flex-fill">
        <div class="card-body">
            @csrf
            @include('users.users_table')
        </div>
    </div>
</div>
<!--Users index Page-->

<!--Create User modal-->
<div class="modal fade" role="dialog" id="create_user">
    <div class="modal-dialog modal-dialog-left modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
<!--Create User modal-->
@endsection
@push('scripts')
<script>
    // $(document).ready(function () {
    //             $('#delete-project').on('click',function () {
    //                 var form =  $(this).closest("form");
    //                 event.preventDefault();
    //                 swal({
    //                     title: "Are you sure?",
    //                     text: "Once deleted, you will not be able to recover this project!",
    //                     icon: "warning",
    //                     buttons: true,
    //                     dangerMode: true,
    //                 })
    //                    .then((willDelete) => {
    //                         if (willDelete) {
    //                             form.submit();
    //                         } else {
    //                         }
    //                     });
    //             });
    //         })
    $('#addDesignationBtn').on("hidden.bs.modal", () => $('#create_user').modal("show"));
    $('#addTeamModal').on("hidden.bs.modal", () => $('#create_user').modal("show"));
</script>
@endpush