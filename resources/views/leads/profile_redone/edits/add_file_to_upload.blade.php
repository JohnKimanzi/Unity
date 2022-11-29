<div id="file_to_upload" class="modal custom-modal fade"  role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add File to upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  id="fileUpload">
                        @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="file_to_upload" placeholder="file to upload">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-custom" id="add_file_type" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>