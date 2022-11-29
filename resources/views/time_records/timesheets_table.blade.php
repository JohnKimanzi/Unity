<table class="table custom-table mb-0 table-striped ">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Description</th>
            <th class="text-success"> In</th>
            <th class="text-danger"> Out</th>
            <th>Total</th>
            @can('Manage Time Records')
                <th>Action</th>
            @endCan
        </tr>
    </thead>
    <tbody>
        @forelse (Auth::user()->time_records()->where('started_at', '>=', now()->startOfDay())->orderBy('started_at', 'asc')->get() as $time_record)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$time_record->time_record_type->action_name}}</td>
            <td>{{$time_record->description}}</td>
            <td>{{Carbon\Carbon::make($time_record->started_at)->format('H:i')}}</td>
            <td>{{(!$time_record->is_active)? Carbon\Carbon::make($time_record->ended_at)->format('H:i') : 'Active now'}}</td>
            <td>
                {{$time_record->hours}}
            </td>
            {{-- <td>
                @if($time_record->is_active)
                <form id='close-time-record' action="{{route('close_time_record', $time_record)}}" method="POST">
                    @csrf
                    <button class="btn btn-success">{{(Str::contains(strtolower($time_record->time_record_type->name), 'break')) ? 'End' : 'Clock out'}}</button>
                </form>
                @endif
            </td> --}}
            @can('Manage Time Records')
                <td>
                    <div class='dropdown dropdown-action float-right'>
                        <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                        <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item' href="{{route('time_records.edit', $time_record)}}"><i class='la la-pencil'></i> Edit</a>
                    <form action="{{route('time_records.destroy', $time_record)}}" method='POST'>   
                        @method('DELETE')
                        @csrf
                        <button type='submit' class='dropdown-item'><i class='fa fa-trash'></i> Delete</button>
                    </form> 
                        </div>
                    </div>
                </td>
            @endcan
        </tr>
        @empty
        No records today
        @endforelse
    </tbody>
</table>