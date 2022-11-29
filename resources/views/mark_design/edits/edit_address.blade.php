<form id="edit_lead_address" class="edit_profile" style="display:none;" method="post" action="{{url('edit_lead_address',$leads->id)}}">
@csrf
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Primary Phone</span>
  </div>
  <input type="text" class="form-control" name="primary_phone" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{$leads->phone1}}">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Alternate Phone</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" name="alt_phone"aria-describedby="inputGroup-sizing-sm" value="{{$leads->phone2}}">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" name="email" aria-describedby="inputGroup-sizing-sm" value="{{$leads->email}}">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Zip Code</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" name="zip_code" aria-describedby="inputGroup-sizing-sm" value="{{$leads->zip_code}}">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" name="address" aria-describedby="inputGroup-sizing-sm" value="{{$leads->address}}">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">State</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" name="state" aria-describedby="inputGroup-sizing-sm" value="{{App\Models\State::find($leads->state_id)->name}}">
</div>
<input type="submit" class="btn btn-danger btn-sm form-control" value="Edit">
</form>