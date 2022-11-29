<div id="lead_address">
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">Primary Phone</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{$leads->phone1}}">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">Alternate Phone</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{$leads->phone2}}">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{$leads->email}}">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">Zip Code</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{$leads->zip_code}}">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{$leads->address}}">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">State</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{App\Models\State::find($leads->state_id)->name}}">
  </div>
</div>