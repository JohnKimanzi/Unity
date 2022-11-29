<div class="modal fade" id="mark_reminders" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Reminders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row col-md-12">
                    <div class="col-md-6 reminder_table" id="mark-design-dash-cards">
                    <table class="table table-striped  table-bordered">
                        <thead class="thead-primary">
                            <tr><th>Due<th>Priority<th>Description<th>Collector<th>Completed</th></tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $content=App\Models\Reminder::all();
                            @endphp
                            
                            @foreach
                            <tr><td>{{$content->due_date}}<td>{{$content->priority}}<td>{{$content->desc}}<td>{{$content->collector}}<td>{{$content->date_completed}}<td></tr> 
                            @endforeach--}}
                        </tbody>
                    </table>
                    </div>
                    <div class="col-md-6 reminder_form" id="mark-design-dash-cards">
                        <form>
                            <!-- <div class="row col-md-12" id="mark_design_cards"> -->
                                <div class="form-group">
                                    <label>Description</label><span><a href="#"><i class="fa fa-plus" title="Add Description"></i></a><a href="#"><i class="fa fa-pencil" title="Edit Description"></i></a></span>
                                    <select name="reminder_desc" class="form-control">
                                        <option value="call debtor">call debtor</option>
                                        <option value="call back">call back</option>
                                        <option value="change card">change card</option>
                                        <option value="bill client">bill client</option>
                                        <option value="assign attorney">assign attorney</option>
                                        <option value="qualify legal">qualify legal</option>
                                        <option value="payment missed">payment missed</option>
                                        <option value="print ULG">print ULG"</option>

                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Collector</label>
                                    @php
                                    $collectors=App\Models\User::where('team_id',2)->get();
                                    @endphp
                                    <select class="form-control" name="collector">
                                    @foreach($collectors as $collector)
                                    <option value="{{$collector->name}}">{{$collector->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label>Priority</label> 
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="very Important" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Very important
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="important" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            important
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="none" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            None
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input type="date" name="due_date" class="form-control">
                                    <label>Time</label>
                                    <input type="datetime-local" name="due_time" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Completed</label>
                                    <input type="date" name="date_completed" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Repeats</label>
                                    <select name="reminder_repeat" class="form-control">
                                        <option value="None">None</option>
                                        <option value="daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Bi-Weekly">Bi-Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Quarterly">Quarterly</option>
                                        <option value="Semi-Annual">Semi-Annual</option>
                                        <option value="Annual">Annual</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="reminder_notes" class="form-control"></textarea>
                                    
                                </div>
                                <input type="submit" class="btn btn-success form-control" value="Insert New Reminder">

                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>