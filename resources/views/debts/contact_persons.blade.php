@php
    $leads=App\Models\Lead::find(1)
@endphp
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Primary Contact</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" readonly aria-describedby="inputGroup-sizing-sm" value="{{$leads->primary_contact->full_name}}"><i class="fa fa-pencil float-right" title="Change Primary Contact"></i>
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text col-md-12" id="inputGroup-sizing-sm">Other Contact Persons</span><i class="fa fa-plus fa-md" title="Add New Contact"></i>
  </div>
  <ul class="list-group col-md-12">
    @php
     $contact=App\Models\ContactPerson::where('lead_id',$leads->id)->get();
    @endphp
  @foreach($contact  as $contacts)
  <li class="list-group-item" aria-label="Small" aria-describedby="inputGroup-sizing-sm">{{$contacts->full_name}}<span class="badge badge-primary badge-pill float-right"><i class="fa fa-eye "title="View Contact Details"></i></span></li>
  @endforeach
</div>
