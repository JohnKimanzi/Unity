@extends('layout.mainlayout')
@section('content')
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
    <!--Add designation button-->
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
                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Team button-->
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
                        <input type="submit"  value="Submit" class="btn btn-primary submit-team">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Country button-->
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
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_user"><i class="fa fa-plus"></i> Add User</a>
                </div>
                @endrole

            </div>
        </div>

        <div class=" card justify-content-center flex-fill">
            <div class="card-body">
                @include('users.users_table')
            </div>

        </div>
    </div>

    {{-- @include('users.create_modal') --}}

    {{-- <div  class="modal custom-modal fade" role="dialog" id="create_user">
            <div class="modal-dialog modal-dialog-left modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('users.user_form')
                    </div>
                </div>         
            </div>
        </div> --}}
    </div>

@endsection
@section('custom_script')
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
    //                     .then((willDelete) => {
    //                         if (willDelete) {

    //                             form.submit();

    //                         } else {


    //                         }
    //                     });
    //             });


    //         })
</script>
<script>
    $(function() {
        $(".submit-team").on('click', function() {
            $("#create_user").modal('show');
        });
    });
</script>
@endsection