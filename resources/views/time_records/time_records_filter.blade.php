<form action="{{route('time_records_filter')}}" method="POST">
    @csrf
    <!--Time Tracker Filter Form-->
    <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
            <div class="form-group form-focus select-focus">
                <select class="form-control floating @error('pay_period_start') is-invalid @endError"  name="pay_period_start"> 
                    <option disabled selected value=""> -- Select -- </option>
                    @forelse(array_reverse($f_pay_period->toArray()) as $mutable_instance)
                        @php($immutable_instance=Carbon\CarbonImmutable::make($mutable_instance))
                        @unless(now()->format('m') == $immutable_instance->format('m') && now()->format('d') <= 15)
                            <option value="{{$pp=$immutable_instance->startOfMonth()->addDays(15)}}" @if(isset($pay_period) && $pp->format('Y-d-m') == $pay_period->format('Y-d-m')) selected @endIf> {{"16 {$immutable_instance->format('M')} - 
                                {$immutable_instance->endOfMonth()->format('d M Y')}"}} </option>
                        @endUnless
                        <option value="{{$pp=$immutable_instance->startOfMonth()}}" @if(isset($pay_period) && $pp->format('Y-d-m') == $pay_period->format('Y-d-m')) selected @endIf> {{"01 {$immutable_instance->format('M')} - 
                            15 {$immutable_instance->format('M Y')}"}} </option>
                    @empty
                        <option disabled selected value=""> -- No options -- </option>
                    @endforelse
                </select>
                <label class="focus-label">Select Pay Period</label>
                @error('pay_period_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror       
            </div>
        </div>
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
                <select class="form-control floating @error('employee_id') is-invalid @endError"  name="employee_id"> 
                    <option disabled selected value=""> -- Select -- </option>
                    @forelse($f_employees as $f_employee)
                        <option value="{{$f_employee->id}}" @if($f_employee->id == (isset($employeeId) ? $employeeId : null)) selected @endIf> {{$f_employee->name}} </option>
                        @empty
                    @endforelse
                </select>
                <label class="focus-label">Select Employee</label>
                @error('employee_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
            <div class="form-group form-focus">
                <input class="form-control floating @error('employee_name') is-invalid @endError" type="text"  name="employee_name" value="{{(isset($name)) ? $name : ''}}">
                <label class="focus-label">Employee Name</label>
            </div>
            @error('employee_name')
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
                    <input class="form-control floating datetimepicker @error('date_from') is-invalid @endError" type="text"  name="date_from" value="{{old('date_from',(isset($start_date) ? $start_date->format('d/m/Y') : ''))}}">
                </div>
                <label class="focus-label">Custom Date From</label>
            </div>
            @error('date_from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
            <div class="form-group form-focus">
                <div class="cal-icon">
                    <input class="form-control floating datetimepicker @error('date_to') is-invalid @endError" type="text" name="date_to" value="{{old('date_to',(isset($end_date) ? $end_date->format('d/m/Y') : ''))}}">
                </div>
                <label class="focus-label">Custom Date To</label>
            </div>
            @error('date_to')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class='col-auto float-left mt-6'>
            <button class="btn btn-primary float-center" type="submit"><i class="fa fa-filter"></i>Apply Filter</button>
            <a class="btn btn-danger float-center" href="{{route('time_tracker')}}"><i class="fa fa-trash"></i>Clear All</a>
        </div>
    </div>

   <small class="text-success">If provided, a pay-period will take precedence over custom dates</small><br>
   <small class="text-success">Selecting a specific user from the dropdown will disable the following filters; Job title, Employee name, department and manager</small>
</form>