<div class="modal custom-modal fade" role="dialog" id="create_roles">
    <div class="modal-dialog modal-dialog-left modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Role</h5>
                @include('layout.partials.flash')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="container">
                    <form method='POST' action="{{route('roles.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="code">Role Name</label>
                            <input type="text" name="name" value="" class='form-control' placeholder='Role Name'>
                        </div>
                        <div class="form-group">
                            <label for="description"> Description</label>
                            <textarea maxlength="250" id="description" name="description" class="form-control"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <div class="card border">
                                <div class="card-title border-bottom"
                                    style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
                                    Give Permissions
                                </div>
                                <div class="card-body">
                                    <table id="permissions"
                                        class="table table-hover table-responsive-sm table-sm compact">
                                        <thead>
                                            <tr>
                                                <th>Activate</th>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Created</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($permissions as $permission )
                                            <tr>
                                                <td><input type="checkbox" name="permissions[]" value="Manage Users"></td>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$permission->name}}</td>
                                                <td>{{date('Y-m-d', strtotime($permission->created_at))}}</td>
                                                <td>{{$permission->description}}</td>
                                            </tr>
                                            @empty
                                               No permissions 
                                            @endforelse
                                           
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        @include('inc.role_perms_form')
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

    </div>