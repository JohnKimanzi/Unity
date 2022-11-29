@extends('layout.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Permissions</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

                        <li class="breadcrumb-item active">Permissions</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_permissions"><i
                            class="fa fa-plus"></i> Add Permission</a>
                    @include('permissions.create_modal')
                </div>


            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-stripped-bordered">
                    <thead>
                        <tr>
                            <th>Permission No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>No of Users</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td><a href="{{ $permission->id }}" data-toggle="modal"
                                        data-target="#user_profile">{{ $permission->name }}</a></td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ App\Models\User::permission($permission->name)->count() }}</td>
                                <td>
                                    <button type="button" class="btn " data-toggle="modal"
                                        data-id="{{ $permission->id }}" data-target="#edit_roles"><i
                                            class="fa fa-pencil fa-lg"></i></button>
                                    <a href=""><i class="fa fa-trash fa-lg"></i></a>
                                    <a href=""><i class="fa fa-eye fa-lg"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{-- @include('users.user_profile') --}}
                </table>
                @include('permissions.edit_modal')

            </div>
        </div>
    </div>
@endsection
