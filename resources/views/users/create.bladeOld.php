<div class="modal custom-modal fade" role="dialog" id="create_user">
    <div class="modal-dialog modal-dialog-left modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                @include('layout.partials.flash')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('users.user_form')  
                @include('inc.user_roles_form')
                @include('inc.user_perms_form')     
            </div>
        </div>
    </div>
</div>