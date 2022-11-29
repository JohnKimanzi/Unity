<table class="table table-striped responsive col-md-12 col-sm-12 col-lg-12" id="contact_list" style="display: none;">
<thead>
<tr><th>Contact ID<th>Name<th>Title<th>Type<th>Email<th>Action</th></tr>
</thead>
<tbody>
    @php

    $contact=App\Models\ContactPerson::where('lead_id',$leads->id)->get();  
    @endphp
    @foreach($contact as $contacts)
    <tr><td>{{$contacts->id}}<td>{{$contacts->full_name}}<td>{{$contacts->title}}<td>{{$contacts->contact_type}}<td>{{$contacts->email}}<td><a href="" class="btn btn-danger"><i class="fa fa-pencil"></i></a></td></tr>
    @endforeach
</tdbody>
</table>