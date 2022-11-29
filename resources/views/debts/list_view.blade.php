
			
<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-striped custom-data-table ">
			<thead>
				<tr>
					<th>Name</th>
					<th>Amount owed</th>
					<th>Email</th>
					<th>Mobile</th>
					<th class="text-nowrap">Deliquency Date</th>
					<th class="text-nowrap">Received Date</th>
					<th class="text-right no-sort">Action</th>
				</tr>
			</thead>
			<tbody>
				@if(count($debts)>0)
					@foreach($debts as $debt)		
						<tr>
							<td>
								<h2 class="table-avatar">
									{{-- <a href="{{route('debts.show', $debt)}}">{{$debt->primary_debtor->first()->name}} </a> --}}
									<a href="{{url('debts', $debt)}}">{{$debt->primary_debtor->first()->name}} </a>
								</h2>
							</td>
							<td>{{$debt->principal}}</td>
							<td>{{isset($debt->primary_debtor->first()->primary_email) ? $debt->primary_debtor->first()->primary_email->address : ''}}</td>
							<td>{{isset($debt->primary_debtor->first()->primary_phone) ? $debt->primary_debtor->first()->primary_phone->number : ''}}</td>
							<td>{{$debt->deliquency_date}}</td>
							<td>{{$debt->received_date}}</td>
							
							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
					@endforeach
				@else
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							{{('There are no records at this time')}}
						</div>
					</div>
				@endif	
			</tbody>
		</table>
	</div>
</div>
			

			