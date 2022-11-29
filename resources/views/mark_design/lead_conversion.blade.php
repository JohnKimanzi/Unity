
<div class="modal fade" id="lead_conversion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lead Conversion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mark-design-dash-cards">
                <form  method="POST" action="{{url('status',$leads->id)}}">
                @csrf
                
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
      </div>
      
    </div>
  </div>
</div>