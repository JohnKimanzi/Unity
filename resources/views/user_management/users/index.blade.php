@extends('layouts.smart-hr', ['title'=>'Employees'])
@section('content')


    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                    {{ Breadcrumbs::render('users.index') }}

                </div>

            </div>
        </div>
        <div class="row">
            @can('Manage Users')
                <div style="float:right;padding-right:20px;"><a href="{{ route('users.create') }}" title="Add New User"><i
                            class="fa fa-plus-circle fa-2x"></i></a><br /><br /></div>
            @endcan
            <div class="card-body">
                @if (count($users))
                    <table id="users" class="table table-hover datatable table-responsive-sm table-sm compact">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('Manage Users')
                                            {{-- <a href="{{ route('users.show', ['user' => $user->id]) }}" title="View User Details"><i class="fa fa-info-circle fa-2x"></i></a>&nbsp;&nbsp; --}}
                                        @endcan
                                        @can('Manage Users')
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                title="Edit User Details"><i class="fa fa-pencil-square fa-2x"></i></a>
                                        @endcan
                                        @can('Manage Users')
                                            <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                style="display:inline;">@csrf @method('DELETE') <a
                                                    onclick="if(confirm('Really delete this user?')) { this.parentNode.submit(); }"
                                                    title="Delete this User"><i class="fa fa-trash fa-2x"
                                                        style="color:red;"></i></a></form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <span>No Records Found...</span>
                @endif
            </div>
        </div>
    </div>
@section('custom_js')
    <script>
        $('#users').DataTable({
        	"searching": true,
        });
    </script>
@endsection
