<!-- Search Filter -->

	{{-- <form action="{{route('user_records_filter')}}" method="POST">
		@csrf
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="form-control floating" name='designation_id'> 
						<option value=""> -- Select -- </option>
						@foreach ($designations as $designation)
							<option value='{{$designation->id}}'> {{$designation->name}} </option>
						@endforeach
					</select>
					<label class="focus-label">Job</label>
				</div>
			</div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="form-control floating" name='user_id'> 
						<option value=""> -- Select -- </option>
						@foreach ($users as $user)
							<option value='{{$user->id}}'> {{$user->name}} </option>
						@endforeach
					</select>
					<label class="focus-label">User</label>
				</div>
			</div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="form-control floating" name='department_id'> 
						<option value=""> -- Select -- </option>
						@foreach ($departments as $department)
							<option value='{{$department->id}}'> {{$department->name}} </option>
						@endforeach
					</select>
					<label class="focus-label">Department</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating"  name="account_manager">
					<label class="focus-label">Manager</label>
				</div>
			</div>		
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" type="text"  name="doj_from">
					</div>
					<label class="focus-label">Joined From</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" type="text" name="doj_to">
					</div>
					<label class="focus-label">To</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<button role="submit" class="btn btn-success btn-block"> Search </button>  
			</div>     
		</div>
	</form> --}}
	<form action="{{route('user_records_filter')}}" method="POST">
		@csrf
		<!--Time Tracker Filter Form-->
		<div class="row">
			
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="form-control floating @error('designation_id') is-invalid @endError"  name="designation_id"> 
						<option disabled selected value=""> -- Select -- </option>
						@forelse($f_designations as $f_designation)
							<option value="{{$f_designation->id}}" @if($f_designation->id == (isset($designationId) ? $designationId : null)) selected @endIf> {{$f_designation->name}} </option>
							@empty
						@endforelse
					</select>
					<label class="focus-label">Job Title</label>
					@error('designation_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror       
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="form-control floating @error('user_id') is-invalid @endError"  name="user_id"> 
						<option disabled selected value=""> -- Select -- </option>
						@forelse($f_employees as $f_employee)
							<option value="{{$f_employee->id}}" @if($f_employee->id == (isset($employeeId) ? $employeeId : null)) selected @endIf> {{$f_employee->name}} </option>
							@empty
						@endforelse
					</select>
					<label class="focus-label">Select User</label>
					@error('user_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror   
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<input class="form-control floating @error('user_name') is-invalid @endError" type="text"  name="user_name" value="{{(isset($name)) ? $name : ''}}">
					<label class="focus-label">User Name</label>
				</div>
				@error('user_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror  
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<input class="form-control floating @error('user_email') is-invalid @endError" type="text"  name="user_email" value="{{(isset($email)) ? $email : ''}}">
					<label class="focus-label">User Email</label>
				</div>
				@error('user_email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror  
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<input class="form-control floating @error('user_phone') is-invalid @endError" type="text"  name="user_phone" value="{{(isset($phone)) ? $phone : ''}}">
					<label class="focus-label">User Phone</label>
				</div>
				@error('user_phone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror  
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="form-control floating @error('department_id') is-invalid @endError"  name="department_id"> 
						<option disabled selected value=""> -- Select -- </option>
						@forelse($f_departments as $f_department)
							<option value="{{$f_department->id}}" @if($f_department->id == (isset($departmentId) ? $departmentId : null)) selected @endIf> {{$f_department->name}} </option>
							@empty
						@endforelse
					</select>
					<label class="focus-label">Select department</label>
					@error('department_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror   
				</div>
			</div>
			
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="form-control floating @error('manager_id') is-invalid @endError"  name="manager_id"> 
						<option disabled selected value=""> -- Select -- </option>
						@forelse($f_managers as $f_manager)
							<option value="{{$f_manager->id}}" @if($f_manager->id == (isset($managerId) ? $managerId : null)) selected @endIf> {{$f_manager->name}} </option>
							@empty
						@endforelse
					</select>
					<label class="focus-label">Select Manager</label>
					@error('manager_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror   
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker @error('doj_from') is-invalid @endError" type="text"  name="doj_from" value="{{old('doj_from',(isset($start_date) ? $start_date->format('d/m/Y') : ''))}}">
					</div>
					<label class="focus-label">Date Joined From</label>
				</div>
				@error('doj_from')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror 
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker @error('doj_to') is-invalid @endError" type="text" name="doj_to" value="{{old('doj_to',(isset($end_date) ? $end_date->format('d/m/Y') : ''))}}">
					</div>
					<label class="focus-label">Date Joined To</label>
				</div>
				@error('doj_to')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror 
			</div>
			<div class='col-auto float-left mt-6'>
				<button class="btn btn-primary float-center" type="submit"><i class="fa fa-filter"></i>Apply Filter</button>
				<a class="btn btn-danger float-center" href="{{route('users.index')}}"><i class="fa fa-trash"></i>Clear All</a>
			</div>
		</div>
	
	</form>

<!-- /Search Filter -->