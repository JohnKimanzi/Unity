<div class="row col-md-12" id="lead_activity" style="display:none;">
<div class="card col-md-6">

    <button class="btn btn-info" onclick="call_schedule();">Call Scheduler</button>
    <div class="row" id="call_schedule" style="display:none">
        <form method="" action="" class="col-md-12" >
        <!-- <div class="form-group">
        <label>Agent</label>
        <input type="text" name="agent" value="{{$data->name}}" readOnly class="form-control">
        </div> -->
        <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" placeholder="Subject of the Meeting" class="form-control">
        </div>
        <div class="form-group">
        <label>Description</label>
        <input type="text" name="desc" placeholder="What is to be discussed" class="form-control">
        </div>
        <div class="form-group">
        <label>Scheduled date</label>
        <input type="datetime-local" class="form-control" name="schedule_date" >
        </div>
        <!-- <div class="form-group">
        <label>Scheduled time</label>
        <input type="time" class="form-control" name="schedule_time" >
        </div> -->
        <!-- <div class="form-group">
        <label>Lead Status</label>
        <input type="text" class="form-control" value="{{$data->status}}" name="lead_status" readOnly >
        </div> -->
        <div class="form-group">
        <!-- <label></label>
        <input type="text" class="form-control" name="category" value="{{App\Models\BusinessType::find($data->business_type_id)->name}}" > -->
        <a href="#" data-toggle="modal" data-target="#reminder"><i class="fa fa-plus"></i>Add Reminder</a>
        @include('leads.profile.reminder')
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-custom float-right" name="submit" value="Save Schedule"> 
        </div>
        </form>
    </div>

   
</div>

<div class="card col-md-6">
    
    <button class="btn btn-info" id="call_lead" onclick=" Call_lead();">Call Lead</button>
    <div class="row" id="caller" style="display: none;">
        <table class="table table-responsive-striped-bordered">
        <thead>
        <tr><th>Number to Call<th>Engage</th></tr>
        </thead>
        <tbody>
        <tr><th>Primary<td><a href="{{url('call_lead',$data->phone1)}}" class="btn btn-successs" type="submit"><i class="fa fa-phone"></i>{{$data->phone1}}</a></th></tr>
      

        <tr><th>Alternate<td><a href="{{url('calls')}}" class="btn btn-successs"data-toggle="modal" data-target="#call_leads"><i class="fa fa-phone"></i>{{$data->phone2}}</a></th></tr>
        </tbody>
        </table>
    </div>
    
    <button class="btn btn-secondary" id="email_lead" onclick=" Email_leads();">Email Lead</button>
    <form method="POST" action="/contact" id="emails" style="display: none;">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="email">Send To</label>
                    <input name="email" type="email" class="form-control" id="email" readOnly value="{{$data->email}}" aria-describedby="emailHelp"
                        placeholder="Enter your email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Subject</label>
                    <input name="name" type="text" class="form-control" id="subject" aria-describedby="subject" placeholder="Email Subject">
                    <span class="text-danger">{{ $errors->first('subject') }}</span>

                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="exampleInputPassword1">Message</label>
                    <textarea name="comment" type="widget"class="form-control" ShowToolBar="true"id="exampleFormControlTextarea1" rows="3"></textarea>
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                </div>
                <button type="submit" class="btn btn-custom float-right">Send</button>
    </form>
    
        <!-- <button class="btn btn-success" id="lead_doc" onclick=" Lead_docs();">Upload Lead Documents</button>
        <form id="lead_docs" method="POST" action="" enctype="multipart/form-data" style="Display:none;">
            <div class="form-group">
                <label for="doctype">Document Type</label>
                <select name="doc_type" class="form-control">
                    <option value="reg_cert">Company Registration Certificate</option>
                    <option value="">Company Registration Certificate</option>
                    </select>
                    <div class="form-group">
                    <input type="file" class="form-control" name="lead_document" id="file" />
                        <input type="submit" class="btn btn-success" name="submit" value="Submit" />
                    </div>
            </div>
        </form> -->
        
    </div>
</div>

