<div id="edit_lead_bio" class="modal custom-modal fade"  role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Lead Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        <form method="POST" action="{{url('sys_notes')}}" id="mynotes"> 
                                 @csrf
                           <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Lead details">
                           </div>     
                           <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Lead details">
                           </div>     
                           <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Lead details">
                           </div>     
                           <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Lead details">
                           </div>     
                           <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Lead details">
                           </div>     
                           <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Lead details">
                           </div>     
                                   
                            <input type="submit" class="btn btn-danger float-right" name="submit" value="Edit">
                        </form>

                            </div> 
                    
                    </div>
                </div>
            </div>
</div>
