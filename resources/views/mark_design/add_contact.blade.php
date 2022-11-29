<div id="contact_infos" class="modal custom-modal fade"  role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Representative</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mark-design-dash-cards">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <form method="POST" action="{{url('addcontact')}}">
                                @csrf
                                <input type="hidden" name="lead_id" value="">
                                <div class="form-group">
                                   <select name="title" class="form-control">
                                   <option >Choose Title</option>
                                    <option value="CEO">Chief Executive officer</option>
                                    <option value="MD">Managing Director</option>
                                    <option value="CO-Rep">Other Company Representative</option>
                                    
                                   </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" id="contact_name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" id="contact_name" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="salutation" class="form-control" id="contact_name" placeholder="Salutation">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" id="contact_address" placeholder="Contact Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" id="contact_phone" placeholder="Contact's Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" id="contact_email" placeholder="Contact's Email Address">
                                </div>
                                <div class="form-group">
                                    <select name="contact_type" class="form-control">
                                    <option>Choose type of Contact</option>
                                    <option value="primary">Primary Contact</option>
                                    <option value="secondary">Secondary Contact</option>
                                    
                                    </select>
                                </div>
                                        <input type="submit" class="btn btn-custom float-right" id="add_state" onclick="" value="Add">
                                </form>

                            </div> 
                    
                    </div>
                </div>
            </div>
</div>
