<div class="col-md-12 col-sm-12 col-lg-12" id="roles" style="display: none;">
    <table class="table table-striped custom-table mb-0 Datatable">
    <thead>
        
        <tr><th>#<th>Role<th>Guard Name<th>Created<th>Updated<th class="text-right">Assign</th></tr>
    </thead>
    <tbody>
    @php
    $roles=Spatie\Permission\Models\Role::all();
    @endphp
   
    @foreach($roles as $role)
    <tr><td>{{$role->id}}<td>{{$role->name}}<td>{{$role->guard_name}}<td>{{$role->created_at}}<td>{{$role->updated_at}}<td class="text-right"><input type="checkbox" name="role"></td></tr>
    @endforeach
    </tbody>
    </table>
</div>