@extends('layout.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Roles</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

                        <li class="breadcrumb-item active">Roles</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_roles"><i
                            class="fa fa-plus"></i> Add Role</a>
                    @include('roles.create_role')
                </div>


            </div>
        </div>

        <div class="card justify-content-center flex-fill">
            <div class="card-body">
                {{-- Use div.table-responsive for increased responsiveness --}}

                <table class="table table-stripped-bordered custom-data-table">
                    <thead>
                        <tr>
                            <th>Role No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>No of Users</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td><a href="{{$role->id}}" data-toggle="modal"
                                    data-target="#user_profile">{{$role->name}}</a></td>
                            <td>{{$role->description}}</td>
                            <td>{{App\Models\User::role($role->name)->count()}}</td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="la la-pencil "></i> Edit</a>
                                        <form action="{{route('roles.destroy', $role)}}"method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"> <i class="fa fa-trash fa-lg"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    {{-- @include('users.user_profile') --}}
                </table>
                @include('roles.edit_roles')

            </div>
        </div>
    @endsection