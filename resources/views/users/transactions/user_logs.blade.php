<div class="col-md-12 col-lg-12 col-sm-12"  id="user_logs" style="display: none;">

@php

$logs=App\Models\Note::where('user_id',$user->id)->get();


@endphp
<p>Recent User Activity in system</p>
<table class="table table-striped custom-table mb-0 Datatable" >
<thead>
<tr><th>Resource<th>Activity<th>Time<th class="text-right">Action</th></tr>
</thead>
<tbody>
@foreach($logs as $log)
<tr><td>{{$log->notable_type}}<td>{{$log->note}}<td>{{$log->created_at}}<td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fa fa-download m-r-5"></i> Download</a>
                                                <a class="dropdown-item" href="#" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_template"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td></tr>
@endforeach
</tbody>
</table>
</div>