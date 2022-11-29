<div class="card justify-content-center flex-fill">
    <div class="card-body">
        <table class="table custom-table mb-0 table-striped custom-data-table flex-fill">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Max. Hours</th>
                    <th>Roll-over</th>
                    <th>Status</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pto_types as $pto_type)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pto_type->name}}</td>
                    <td>{{$pto_type->max_hours}}</td>
                    <td>{{$pto_type->max_roll_over}}</td>
                    <td>{{$pto_type->status}}</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('pto_types.edit', $pto_type)}}"><i class="la la-pencil"></i> Edit</a>
                                <form action="{{route('pto_types.destroy', $pto_type)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="dropdown-item" ><i class="la la-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>