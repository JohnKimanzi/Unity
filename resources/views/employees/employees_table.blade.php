{{-- <div class="table-responsive"> --}}
    <table  class="table table-striped custom-data-table mb-0 ">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Designation</th>
                <th>Country</th>
                <th>Team</th>
                <th>Supervisor</th>
                <th>DOJ</th>
                <th>Pay Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr><td>{{$user->id}}</td>
                    <td><a href="{{route('users.show',$user->id)}}"> {{$user->name}}</a></td>
                    <td>{{$user->dob}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{($user->designation->name) ?? ''}}</td>
                    <td>{{($user->country->name) ?? ''}}</td>
                    <td>{{($user->team->name) ?? ''}}</td>
                    <td>{{($user->supervisor->name) ?? ''}}</td>
                    <td>{{$user->doj}}</td>
                    <td>{{$user->pay_rate}}</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye m-r-5"></i> View</a>
                                <a class="dropdown-item" href="{{route('users.edit', $user)}}"><i class="la la-pencil"></i> Edit</a>
                                <form action="{{route('users.destroy', $user->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>Delete</button>
                                    <!-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#delete_user"><i class="fa fa-pencil m-r-5"></i>Delete User</a> -->
                                </form>
                            </div>
                        </div>
                    </td>
            @endforeach
        </tbody>
            
    </table>
{{-- </div> --}}