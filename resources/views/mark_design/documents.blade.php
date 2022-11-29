<table class="table table-stripped responsive  col-md-12 col-sm-12 col-lg-12" id="lead_docs" style="display: none;">
<thead>
<tr>
    <th>Name<th>Category<th>Uploaded By<th>Date Uploaded<th>Action</th>
</tr>
</thead>
<tbody>
    @php

    
    $directory=$leads->name;
    $uploads=$leads->uploads;
    // $docs=App\Models\Document::where('lead_id',$leads->id)->get();
    // $file = Storage::disk('public')->files($directory);
        
    @endphp
    @foreach($uploads as $upload)
    <tr>
        <td>{{$upload->name}}</td>
        <td>{{$upload->document->type}}</td>
        <td>{{$upload->document->user->name}}</td>
        <td>{{date('m-d-Y h:i')}}</td>
        <td><a href="javascript:void()" ><i class="fa fa-eye-slash float-right"></i></a></td>
    </tr>
    @endforeach
</tbody>
</table>