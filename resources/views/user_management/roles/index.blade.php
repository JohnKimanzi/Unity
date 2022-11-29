@extends('layout.mainlayout')
{{-- {{ Breadcrumbs::render('roles.index') }} --}}

@section('content')
<div class="container">
	@can('Manage Roles')
	<a href="{{route('roles.create')}}" class="btn add-btn mt-2"><i class="fa fa-plus"></i> Add Role</a>
	@endcan
	<div class="card-body">
		@if (count($roles))
		<table id="roles" class="table table-hover table-responsive-sm table-sm compact">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Guard Name</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>{{ $role->guard_name }}</td>
					<td>{{ $role->created_at->toFormattedDateString() }}</td>
					<td>{{ $role->updated_at->toFormattedDateString() }}</td>
					<td>
						<form action="{{route('roles.destroy', $role)}}" method="POST">
							@csrf
							@method('DELETE')
							<a href="{{ route('roles.show', ['role' => $role->id]) }}" title="View Role Details"><i class="fa fa-eye fa-2x"></i></a>&nbsp;&nbsp; 
							@can('Manage Roles')
							<a href="{{ route('roles.edit', ['role' => $role->id]) }}" title="Edit Role Details"><i class="fa fa-pencil-square fa-2x"></i></a>&nbsp;&nbsp;
							@endcan
							<button title="Remove Role" type="submit"><i class="fa fa-trash fa-2x"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Guard Name</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
		@else
		<center>No Records Found...</center>
		@endif
	</div>
</div>
@endsection
@push('scripts')
<script>
	$('#roles').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		'columnDefs': [{
			'targets': [-1],
			'orderable': false
		}]
	});
</script>
@endpush