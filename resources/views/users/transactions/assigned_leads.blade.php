<div class="col-md-12 col-lg-12 col-sm-12" id="assigned_leads" style="display: none;">
@php
if($user->hasRole('agent')){
    $leads=$user->leads;
}else{
    $leads=$user->closed_deals;
}


@endphp
<h4>Leads Assigned</h4>
<table class="table table-striped custom-table mb-0 datatable">
<thead>

<tr><th>Lead ID<th>Name<th>Industry<th>Date Onboarded<th>Status</th></tr>
</thead>
<tbody>
@foreach($leads as $lead)
<tr><td>{{$lead->id}}<td>{{$lead->name}}<td>{{$lead->business_type->name}}<td>{{$lead->created_at}}<td>{{$lead->status}}</td></tr>
@endforeach
</tbody>
</table>
</div>