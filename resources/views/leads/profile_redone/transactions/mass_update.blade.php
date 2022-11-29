
<form id="mass-update-form" action="{{route('leads_mass_update')}}" method="POST">
    @csrf
    <div class="card border-info">
        <div class="bg-info card-header">
            Filter criteria <i class="la la-filter"></i>
        </div>
        <div class="card-body">
            <div class="row  filter-row">
                
                <div class="col-md-3">  
                    <div class="form-group form-focus select-focus">
                        <input type="text" class="mass-update-filter-field form-control floating" name="company_name" id="company_name" value="{{old('company_name')}}">
                        <label class="focus-label">Company Name</label>
                    </div>
                </div>
                <div class="col-md-3">  
                    <div class="form-group form-focus select-focus">
                        <input type="text" class="mass-update-filter-field form-control floating" name="email" id="email">
                        <label class="focus-label">Email</label>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        @php
                            $agents=App\Models\User::role('agent')->get();
                        @endphp
                        <select class="mass-update-filter-field form-control floating" name='agent' id="agent"> 
                            <option value=""> -- Select -- </option>
                            @foreach ($agents as $agent)
                                <option value='{{$agent->id}}'> {{$agent->name}} </option>
                            @endforeach
                        </select>
                        <label class="focus-label">Agent</label>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        @php
                            $closers=App\Models\User::role('closer')->get();
                        @endphp
                        <select class="mass-update-filter-field form-control floating" name='closer' id="closer"> 
                            <option value=""> -- Select -- </option>
                            @foreach ($closers as $closer)
                                <option value='{{$closer->id}}'> {{$closer->name}} </option>
                            @endforeach
                        </select>
                        <label class="focus-label">Account manager</label>
                    </div>
                </div>

                <div class="col-md-3">  
                    <div class="form-group form-focus select-focus">
                        <input type="text" class="mass-update-filter-field form-control floating" name="phone" id="phone">
                        <label class="focus-label">Phone</label>
                    </div>
                </div>

                <div class="col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select class="mass-update-filter-field form-control floating"  name="status" id="status"> 
                            <option value=""> -- Select -- </option>
                            <option value="hot"> Hot </option>
                            <option value="cold"> Cold </option>
                            <option value="active"> Active </option>
                        </select>
                        <label class="focus-label">Account status</label>
                    </div>
                </div>
                
                <div class="col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        @php
                            $bs_types=App\Models\BusinessType::all();
                        @endphp
                        <select class="mass-update-filter-field form-control floating" name='bs_type' id="bs_type"> 
                            <option value=""> -- Select -- </option>
                            @foreach ($bs_types as $bs_type)
                                <option value='{{$bs_type->id}}'> {{$bs_type->name}} </option>
                            @endforeach
                        </select>
                        <label class="focus-label">Business Type</label>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        @php
                            $states=App\Models\State::all();
                        @endphp
                        <select class="mass-update-filter-field form-control floating" name='state' id="state"> 
                            <option value=""> -- Select -- </option>
                            @foreach ($states as $state)
                                <option value='{{$state->id}}'> {{$state->name}} </option>
                            @endforeach
                        </select>
                        <label class="focus-label">State</label>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        @php
                            $batches=App\Models\LeadBatch::all();
                        @endphp
                        <select class="mass-update-filter-field form-control floating" name='batch' id="batch"> 
                            <option value=""> -- Select -- </option>
                            @foreach ($batches as $batch)
                                <option value='{{$batch->id}}'> {{$batch->name}} </option>
                            @endforeach
                        </select>
                        <label class="focus-label">Upload Batch</label>
                    </div>
                </div>
                <div class="col-md-3">  
                    <div class="form-group form-focus select-focus">
                        <div class="cal-icon">
                            <input class="mass-update-filter-field form-control floating datetimepicker" type="text"  name="date_from" id="date_from">
                        </div>
                        <label class="focus-label">Uploaded from</label>
                    </div>
                </div>
                <div class="col-md-3">  
                    <div class="form-group form-focus select-focus">
                        <div class="cal-icon">
                            <input class="mass-update-filter-field form-control floating datetimepicker" type="text" name="date_to" id="date_to">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="card border-success">
        <div class="bg-success card-header">
            Values to update <i class="la la-pencil"></i>
        </div>
        <div class="card-body">
            <div class="row  filter-row">
                <div class="col-md-4"> 
                    <div class="form-group form-focus select-focus">
                        @php
                            $agents=App\Models\User::role('agent')->get();
                        @endphp
                        <select class="form-control floating" name='new_agent' id="new_agent"> 
                            <option value=""> -- Select -- </option>
                            @foreach ($agents as $agent)
                                <option value='{{$agent->id}}'> {{$agent->name}} </option>
                            @endforeach
                        </select>
                        <label class="focus-label">Agent</label>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group form-focus select-focus">
                        @php
                            $closers=App\Models\User::role('closer')->get();
                        @endphp
                        <select class="form-control floating" name='new_closer' id="new_closer"> 
                            <option value=""> -- Select -- </option>
                            @foreach ($closers as $closer)
                                <option value='{{$closer->id}}'> {{$closer->name}} </option>
                            @endforeach
                        </select>
                        <label class="focus-label">Account manager</label>
                    </div>
                </div>

                <div class="col-md-4"> 
                    <div class="form-group form-focus select-focus">
                        <input class="form-control floating"  list="status_list" name="new_status" id="new_status"> 
                        {{-- <select class="form-control floating"  name="new_status">  --}}
                            <datalist id= 'status_list'>
                                <option selected> -- Select -- </option>
                                <option > Hot </option>
                                <option> Cold </option>
                                <option> Active </option>
                            </datalist>
                        <label class="focus-label">Account status</label>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="float-right">
        
            <button id='mass-update-btn' role="submit" class="btn btn-info btn-block " disabled> Update Records | <span id="count-records-to-update" class="text-danger">0</span> </button>  
        
    </div>
</form>