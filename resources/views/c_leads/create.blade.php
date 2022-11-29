@extends('layout.mainlayout')

@section('content')
<div class="row">
    <div class="card">
        <button class="btn btn-primary"><i class="fa fa-plus">Add Lead</i></button>
                </div>
                <div class="card">
                </div>
                <div class="card">
                </div>
                <div class="modal custom-modal fade" role="dialog" id="edit_lead">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">On board Lead Here</h5>
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
                                            <input class="form-control" type="text"readonly name="business_type_id" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email </span></label>
                                            <input class="form-control floating" type="email"readonly name="email" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Primay Phone</label>
                                            <input class="form-control" type="phone" name="phone1">
                                            <button class="btn btn-success"><span class="fa fa-phone"></span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Secondary Phone</label>
                                            <input class="form-control" type="phone" name="phone2">
                                            <button class="btn btn-success"><span class="fa fa-phone"></span></a>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Status</label>
                                            <input id="status_color"class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">City</label>
                                            <input id="status_color"class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">On Board Date</label>
                                            <input class="form-control" type="text" name="created_at">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Source</label>
                                            <input class="form-control" type="text" name="created_at">
                                        </div>
                                    </div>   
                            </form>
                        </div>
                    </div>
                </div>
    </div>
            
</div>

@endsection