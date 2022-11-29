<table class="table table-stripped" id="lead_meets" style="display: none;">
<thead>
<tr><th>#<th>Date<th>Meeting Title<th>Start<th>Ends<th>Action</th></tr>
</thead>
<tbody>
    @php
    $meetings=App\Models\Meeting::all();
    
    @endphp

    @foreach($meetings as $meet)
    <tr><td>{{$meet->id}}<td>{{$meet->created_at}}<td>{{$meet->title}}<td>{{$meet->from}}<td>{{$meet->to}}<td><td><a href="#"><i class="fa fa-pencil"></i></a></td></tr>
    @endforeach
</tbody>
</table>