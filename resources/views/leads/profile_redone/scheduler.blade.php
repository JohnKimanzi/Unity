<form method="POST" action="{{url('schedule_meeting')}}" id="meeting_scheduler" style="display:none">
    @csrf
    <h4>Meeting Scheduler</h4>
    <input type="hidden" name="lead_id" value="{{$leads->id}}">
<div class="form-group">
        <label for="meeting_title">Title</label>
        <input type="text" name="title" class="form-control" >

    </div>
    <div class="form-group">
        <label for="meeting_desc">Description</label>
        <input type="text" name="description" class="form-control">     
    </div>
    <div class="form-group">
        <label for="meeting_start">From</label>
        <input type="datetime-local" name="meeting_starts" class="form-control">
        <label for="meeting_ends">To</label>
        <input type="datetime-local" name="meeting_ends" class="form-control">
    </div>
    <div class="form-group">
        <h4>Reminder</h4>
        <label for="mode">Mode</label>
        <select name="reminder_mode" class="form-control">
            <option value="call">Call</option>
            <option value="sms">SMS</option>
            <option value="email">Email</option>
        </select>
        <label for="mode">Time Before Meeting</label>
        <select name="reminder_time" class="form-control">
            <option value="10">10 Minutes</option>
            <option value="20">20 Minutes</option>
            <option value="30">30 Minutes</option>
        </select>         
    </div>
    
    <div class="form-group">
        <input type="submit" name="submit" value="Schedule Meeting" class="btn btn-success float-right">
    </div>
</form>