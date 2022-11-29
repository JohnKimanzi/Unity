<div id="call_dialog" class="addable"  style="display:none">
    <form action="{{url('record_call')}}" method="GET" >
        @csrf
        <h4>Call Details</h4>
        <input type="hidden" name="lead_id" value="{{$leads->id}}">
        <div class="form-group">
            <label for="subject">Subject of Call</label>
            <input type="text" name="subject_of_call" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Phone #</label>
            <input type="text" name="phone" class="form-control" value="{{$leads->phone1}}">
        </div>
        <div class="form-group">
            <label for="subject">Call duration</label>
            <input type="time" name="call_duration" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Contacted Representative</label>
            <span><a href="#" id="reps" data-toggle="modal" data-target="#contact_info" ><i class="fa fa-plus"></i></a></span>
            <select name="contact_person" id="contact_person" class="form-control">
                @php
                $contact=App\Models\ContactPerson::where('lead_id',$leads->id)->get();
                @endphp
                @foreach($contact as $contacts)
                <option value="{{$contacts->full_name}}">{{$contacts->full_name}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="subject">Call Status</label>
            <select name="status" class="form-control">
                <option value=""></option>
                <option value="reachable">Reachable</option>
                <option value="not_reachable">Not Reachable</option>
                <option value="hang_up">Hang up</option>

            </select>
        </div>
        <div class="form-group">
            <label for="summary">Call Summary</label>
            <textarea class="md-textarea form-control" placeholder="Notes from the Call" rows="3" name="description" id="mynote"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-success float-right" value="Save Call Details">
    </form>
</div>
@include('leads.profile_redone.edits.contact_info')