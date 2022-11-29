<div id="add_leads" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Leads</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('leads_import')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div>
                        <div class="form-group row">
                            <a href="{{route('get_lead_template')}}" class="btn btn-primary "> <i class="fa fa-download"></i> Get template</a>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Batch ID</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" readonly required name="name" value="{{date('ymdHis')}}">
                            </div>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Leads source </label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" required name="source">
                            </div>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Select file to upload </label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" required name="file_to_import">
                            </div>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>