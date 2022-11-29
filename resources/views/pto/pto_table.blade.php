<table class="table custom-table mb-0 table-striped custom-data-table flex-fill">
    <thead>
        <tr>
            <th>ID.</th>
            <th>Name</th>
            <th>PTO Type</th>
            <th>Applied On</th>
            <th>Approved By</th>
            <th>Start</th>
            <th>End</th>
            <th>Status</th>
            <th>Attachment</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ptos->where('status', 'New') as $new_pto)
        <tr>
            <td>{{$new_pto->user_id}}</td>
            <td> <a href="#">{{$new_pto->user->name}}</a> </td>
            <td>{{$new_pto->pto_type->name}}</td>
            <td>{{($new_pto->created_at)->format('Y-m-d')}}</td>
            <td>
                <h2 class="table-avatar">
                    @if($new_pto->modified_by)
                        <a href="{{route('users.show', $new_pto->modified_by)}}"> {{$new_pto->modified_by->name}} <span>{{Carbon\Carbon::parse($new_pto->updated_at)->diffForHumans()}}</span></a>
                    @endif
                </h2>
            </td>
            <td>{{$new_pto->start_at}}</td>
            <td>{{$new_pto->end_at}}</td>
            <td>
                <div class="dropdown action-label">
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        @if (strtolower($new_pto->status)=='new')
                            <i class="fa fa-dot-circle-o text-purple"></i> {{$new_pto->status}}
                        @elseif (strtolower($new_pto->status)=='pending')
                            <i class="fa fa-dot-circle-o text-info"></i> {{$new_pto->status}}
                        @elseif (strtolower($new_pto->status)=='approved')
                            <i class="fa fa-dot-circle-o text-success"></i> {{$new_pto->status}}
                        @elseif (strtolower($new_pto->status)=='declined')
                            <i class="fa fa-dot-circle-o text-danger"></i> {{$new_pto->status}}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item " href="#"><i class="fa fa-dot-circle-o text-purple" ></i> New</a>
                        <a class="dropdown-item status-btn" href="#" data-toggle="modal" data-target="#approve-pto-modal" data-pto_id="{{$new_pto->id}}" data-status="Pending"><i class="fa fa-dot-circle-o text-info"  ></i> Pending</a>
                        <a class="dropdown-item status-btn" href="#" data-toggle="modal" data-target="#approve-pto-modal" data-pto_id="{{$new_pto->id}}" data-status="Approved"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                        <a class="dropdown-item status-btn" href="#" data-toggle="modal" data-target="#approve-pto-modal" data-pto_id="{{$new_pto->id}}" data-status="Declined"><i class="fa fa-dot-circle-o text-danger" ></i> Declined</a>
                    </div>
                </div>
            </td>
            <td></a>{{($new_pto->uploads->count() > 0) ? $new_pto->uploads->first()->document->filename : ''}}</td>
            
            <td class="text-right">
                <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('pto.edit', $new_pto)}}"><i class="la la-pencil"></i> Edit</a>
                            <form action="{{route('pto.destroy', $new_pto)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class=" dropdown-item"><i class="la la-trash"></i>Delete</button>
                            </form>
                            @if($new_pto->uploads->count() > 0)
                                    <a class="dropdown-item" href="{{route('doc_download', $new_pto->uploads->first()->document)}}">Download Attachment</button>
                            @endif
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>