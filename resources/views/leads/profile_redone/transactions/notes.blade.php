
<div id="notes" class="modal custom-modal fade"  role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Note</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        <form method="POST" action="{{url('sys_notes')}}" id="mynotes"> 
                                 @csrf
                                <input type="hidden" name="notable id" value="{{$leads->id}}">
                                <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                                <div class="form-group">
                                        <select name="notable_type" class="form-control">
                                            <option value="call">Call</option>
                                            <option value="upload">Upload</option>
                                        
                                        </select> 
                                    </div>
                                    <div class="form-group">
                                        <textarea class="md-textarea form-control" placeholder="what do you want to note down?" rows="3" name="note" id="mynote"></textarea> 
                                    </div>
                            <input type="submit" class="btn btn-danger float-right" name="submit" value="Post">
                        </form>

                            </div> 
                    
                    </div>
                </div>
            </div>
</div>
