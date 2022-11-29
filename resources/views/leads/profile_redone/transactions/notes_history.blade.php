<table class="table table-stripped responsive" id="notes_table" style="display: none;">
<thead>
<tr><th>#<th>Date<th>From<th>Subject<th>Message<th>Action</th></tr>
</thead>
<tbody>
@php
$docs=App\Models\Note::where('notable_id',$leads->id)->get();
@endphp
@foreach($docs as $notes)
<tr><td><td>{{$notes->created_at}}<td>{{$notes->user->name}}<td>{{$notes->notable_type}}<td>{{$notes->note}}<td><a href="#" type="btn btn-danger"><i class="fa fa-pencil"></i></a></td><tr>
@endforeach
</tbody>
</table>