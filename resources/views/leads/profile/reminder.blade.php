<div id="reminder" class="modal custom-modal fade"  role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reminder Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="row">
                            <form method="GET" action="">
                                <div class="form-group col-md-12">
                                    <label>Mode</label>
                                    <select name="reminder_mode" class="form-control">
                                    <option value="">Email</option>
                                    <option value="">SMS</option>
                                    <option value="">Call</option>
                                    </select>
                                    
                                    <label>Minutes before Meeting</label>
                                    <select name="reminder_time" class="form-control">
                                    <option value="">10 Mins</option>
                                    <option value="">20 Mins</option>
                                    <option value="">30 Mins</option>
                                    </select>
                            
                                <input type="submit" class="btn btn-custom" id="add_state" onclick="AddCallState();" value="Add">
                                </div>
                            </form>

                            </div> 
                    
                    </div>
                 </div>
            </div>
</div>