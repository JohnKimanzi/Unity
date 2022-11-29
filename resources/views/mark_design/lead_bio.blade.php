<div id="lead_bio">
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small"  value="{{$leads->name}}">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">Category</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small"  value="{{App\Models\BusinessType::find($leads->business_type_id)->name}}">
  </div>
  <div class="input-group input-group-sm mb-2">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm wrap">Date Onboarded</span>
    
    </div>
    <input type="text" class="form-control" readonly value="{{$leads->created_at}}">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="">Status</span>
    </div>
	{{-- should implement LeadStatus before this can work --}}
	{{-- <select class="form-control form-control-sm" name="" id="">
		<option value="$leads->status_id">$leads->status->name</option>
		@forelse ($lead_statuses as $lead_status)
			
		@empty
			
		@endforelse
		<option value="$lead_status->id">$lead_status->name</option>
	</select> --}}
    <input type="text" class="form-control" readonly aria-label="Small"  value="{{$leads->status}}">
  </div>
  
</div>