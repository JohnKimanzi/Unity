<div class="row">
    <form method="" action="" id="call_schedule" style="display:none">
    <div class="form-group">
        <label>Agent</label>
        <input type="text" name="agent" value="{{$data->name}}" readOnly class="form-control">
    </div>
    <div class="form-group">
        <label>Subject</label>
        <input type="text" name="agent" value="{{$data->name}}" readOnly class="form-control">
    </div>
    <div class="form-group">
        <label>Scheduled date</label>
        <input type="datetime-local" class="form-control" name="schedule_date" >
    </div>
    
    <div class="form-group">
        <label>Lead Status</label>
        <input type="text" class="form-control" value="{{$data->status}}" name="lead_status" readOnly >
    </div>
    <div class="form-group">
        <label>Category</label>
        <input type="text" class="form-control" name="category" value="{{$data->business_type_id}}" >
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-custom float-right" name="submit" value="Save Schedule"> 
    </div>
    </form>
</div>