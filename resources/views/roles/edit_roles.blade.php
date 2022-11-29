        <div  class="modal custom-modal fade" role="dialog" id="edit_roles">
            <div class="modal-dialog modal-dialog-left modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            
                            <h4 col-md-12>Changing Roles may affect the entire system user mapping</h4>
                            
                        </div>
                       <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                {{-- {{dd($role->id)}} --}}
                                    <input class="form-control" placeholder="Enter Role" type="text" value="{{$role->id}}" name="edit_role" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>   
                    </div>
                </div>
                           
            </div>
        </div>