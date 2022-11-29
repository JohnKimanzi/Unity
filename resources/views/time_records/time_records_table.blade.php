<table class="table table-stripped-bordered custom-data-table">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Time Record Type</th>
            @can('Manage Time Records')
                <th>Action</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($time_records as $time_record)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $time_record->user->name }} </td>
                <td> {{ $time_record->started_at }} </td>
                <td> {{ $time_record->ended_at }} </td>
                <td> {{ $time_record->time_record_type->name }} </td>
                @can('Manage Time Records')
                    <td class="text-left">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fa fa-download m-r-5"></i> Download</a>
                                <a class="dropdown-item" href="{{route("time_records.edit", $time_record)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#"><i
                                        class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>
