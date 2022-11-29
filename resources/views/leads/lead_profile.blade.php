<div class="modal custom-modal fade" role="dialog" id="edit_lead">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$lead->name}}'s Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Business Category</label>
                                <input class="form-control" type="text" readonly name="business_type_id" value="{{App\Models\BusinessType::find($lead->business_type_id)->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Email </label>
                                <input class="form-control floating" type="email" readonly name="email" value="{{$lead->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Primay Phone</label>
                                <input class="form-control" type="phone" name="phone1" readonly value="{{$lead->phone1}}">
                                <button class="btn btn-success"><span class="fa fa-phone"></span></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Secondary Phone</label>
                                <input class="form-control" type="phone" name="phone2" readonly value="{{$lead->phone2}}" <i class="fa fa-phone"></i>
                                <button class="btn btn-success"><span class="fa fa-phone"></span></a>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <input id="status_color" class="form-control" type="text" readonly name="status" value="{{$lead->status}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">City</label>
                                <input id="status_color" class="form-control" type="text" readonly name="town" value="{{$lead->town}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">On Board Date</label>
                                <input class="form-control" type="text" name="created_at" readonly value="{{$lead->created_at}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Source</label>
                                <input class="form-control" type="text" name="created_at" readonly value="{{$lead->name}}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/lead_status.js"></script>