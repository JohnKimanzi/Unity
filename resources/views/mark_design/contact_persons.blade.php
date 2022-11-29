<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Primary Contact</span>
  </div>
  <input type="text" class="form-control form-md" aria-label="Small" readonly aria-describedby="inputGroup-sizing-md" value="{{($leads->primary_contact) ? $leads->primary_contact->full_name : ''}}"><i class="fa fa-pencil float-right" title="Change Primary Contact"></i>

</div>
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text " id="inputGroup-sizing-sm">Other Contact Persons</span><a href="#" data-toggle="modal"  data-target="#contact_infos"><i class="fa fa-plus fa-md" title="Add New Contact"></i></a>
  
  <ul class="list-group col-md-12">
    @php
     $contact=App\Models\ContactPerson::where('lead_id',$leads->id)->get();
    @endphp
  @foreach($contact  as $contacts)
  <li class="list-group-item" aria-label="Small" aria-describedby="inputGroup-sizing-sm">{{$contacts->full_name}}<span class="badge badge-primary badge-pill float-right"><a href="#"data-toggle="modal" data-id="{{$contacts->id}}" data-target="#contact_info"><i class="fa fa-eye "title="View Contact Details"></i></a></span></li>
  
  @endforeach
  </ul>
</div>
