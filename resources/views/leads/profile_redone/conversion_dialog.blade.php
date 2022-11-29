<form id="conversion_dialog" style="display:none" method="POST" action="{{url('status',$leads->id)}}">
    @csrf
    <h4>Lead Conversion</h4>
    <div class="form-group">
        <label for="current_status">Current Status</label>
        <input type="text" class="form-control" name="current_status" value="{{$leads->status}}">
    </div>
    <div class="form-group">
        <label for="new_status">New Status</label>
        <select name="new_status" class="form-control">
            
            <option value="hot">Hot</option>
            <option value="warm">Warm</option>
            <option value="cold">cold</option>
            <option value="forget">Not Interested</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success float-right" value="Convert">
    </div>
</form>