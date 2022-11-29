<div class="modal custom-modal fade" role="dialog" id="create_permissions">
    <div class="modal-dialog modal-dialog-left modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Permission</h5>
                @include('layout.partials.flash')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('permissions')}}">
                    @csrf
                    <div class="form-group">
                        <label for="role_name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="description"> Description</label>
                        <textarea maxlength="250" id="description" name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>

    </div>