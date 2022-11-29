<div class="card justify-content-center flex-fill">
    <div class="card-body">
        {{-- <div class="table-responsive"> --}}
            <table id="" class="table custom-table mb-0 table-striped custom-data-table">
                <thead>
                    <tr>
                        <th>ID No.</th>
                        <th>Name</th>
                        @foreach($pto_types as $pto_type)
                        <th>{{$pto_type->name}} </th>
                        @endforeach
                    </tr>
                </thead>
                <!-- <th class="text-right">Action</th> -->
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        @foreach($pto_types as $pto_type)
                        <th>{{0}} </th>
                        @endforeach
                    </tr>
                    @endforeach
                


                    {{-- @forelse ($time_offs as $time_off)
                        <tr>
                            <td>{{$loop->iteration}}.</td>
                    <td><a href="{{route('users.show', $time_off->user)}}"> {{$time_off->user->name}}</a></td>
                    <td>{{$time_off->time_off_type->name}}</td>
                    <td>{{date('Y-m-d H:i',strtotime($time_off->start))}}</td>
                    <td>
                        @if(isset($time_off->end))
                        <span class='text-dark'>{{date('Y-m-d H:i', strtotime($time_off->end)) }} </span>
                        @else
                        <span class='text-primary'>Active </span>
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="end-time-off"><i class="fa fa-link"></i> End break</a>
                                <a class="dropdown-item" href="#"><i class="la la-pencil"></i> Adjust break</a>
                                <button id='show-all-breaks-btn' class="dropdown-item" data-toggle="modal" data-target="#all-breaks-modal" data-id="{{$time_off->user->id}}"><i class="fa fa-eye"></i> View all breaks</button>
                                <a class="dropdown-item" href="{{route('time_offs.destroy', $time_off)}}"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                    </td>
                    </tr>
                    @empty
                    <div class="bg-danger text-white" style="text-align:center">
                        No records.
                    </div>
                    @endforelse --}}
                </tbody>
            </table>
        {{-- </div> --}}
    </div>