    {{-- <div class="table-responsive"> --}}
    <table class="table table-striped custom-data-table mb-0 ">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Phone #</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('users.show',$user->id)}}"> {{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{implode(', ', $user->roles()->pluck('name')->toArray())}}</td>
                <td>{{$user->phone1}}</td>
                <td class="text-right">
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye m-r-5"></i> View</a>
                            <a class="dropdown-item" href="{{route('users.edit', $user)}}"><i class="la la-pencil"></i> Edit</a>
                            @if($user->trashed())
                            <a class="dropdown-item" href="{{ route('users.restore', $user->id) }}"><i class="la la-undo"></i> Restore</a>
                            @else
                            <form action="{{route('users.destroy', $user->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>Delete</button>
                                <!-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#delete_user"><i class="fa fa-pencil m-r-5"></i>Delete User</a> -->
                            </form>
                            @endif
                        </div>
                    </div>
                </td>
                @endforeach
        </tbody>
    </table>
        <!-- <script type="text/javascript">
            $('.show_confirm').click(function(e) {
                if (!confirm('Are you sure you want to delete this?')) {
                    e.preventDefault();
                }
            });
        </script> -->
    {{-- </div> --}}