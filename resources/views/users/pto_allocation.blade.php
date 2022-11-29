<div class="form-group">
    <div class="card border">
        <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
        PTO Allocation
        </div>
        <div class="card-body">
            <div class="form-group col-sm-12">
                <label class="col-form-label"> Record Year</label>
                <input class=" form-control @error('pto_record_year') is-invalid @enderror" name="pto_record_year" type="month" id="pto_record_year" required>
                @error('pto_record_year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                    <label class="col-form-label">Medical</label>
                    <input class=" form-control @error('medical_allocated_hours') is-invalid @enderror" name="medical_allocated_hours" type="number" id="medical_allocated_hours" placeholder="Hours" required>
                    @error('medical_allocated_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <label class="col-form-label">Rollover</label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" checked name="medical_can_rollover" value="{{1}}"> <span class="text-success">Yes</span> 
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="medical_can_rollover" value="{{0}}"> <span class="text-danger">No</span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Maximum Rollover</label>
                    <input class=" form-control @error('medical_rollover_hours') is-invalid @enderror" name="medical_rollover_hours" type="number" id="medical_rollover_hours" placeholder="Hours" required>
                    @error('medical_rollover_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="col-form-label">Personal Leave</label>
                    <input class=" form-control @error('personal_allocated_hours') is-invalid @enderror" name="personal_allocated_hours" type="number" id="personal_allocated_hours" placeholder="Hours" required>
                    @error('personal_allocated_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <label class="col-form-label">Rollover</label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" checked name="personal_can_rollover" value="{{1}}"> <span class="text-success">Yes</span> 
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="personal_can_rollover" value="{{0}}"> <span class="text-danger">No</span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Maximum Rollover</label>
                    <input class=" form-control @error('personal_rollover_hours') is-invalid @enderror" name="personal_rollover_hours" type="number" id="personal_rollover_hours" placeholder="Hours" required>
                    @error('personal_rollover_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="col-form-label">Vacation</label>
                    <input class=" form-control @error('vacation_allocated_hours') is-invalid @enderror" name="vacation_allocated_hours" type="number" id="vacation_allocated_hours" placeholder="Hours" required>
                    @error('vacation_allocated_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <label class="col-form-label">Rollover</label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" checked name="vacation_can_rollover" value="{{1}}"> <span class="text-success">Yes</span> 
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="vacation_can_rollover" value="{{1}}"> <span class="text-danger">No</span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Maximum Roll-over</label>
                    <input class=" form-control @error('vacation_rollover_hours') is-invalid @enderror" name="vacation_rollover_hours" type="number" id="vacation_rollover_hours" placeholder="Hours" required>
                    @error('vacation_rollover_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
                         
        </div>
        
    </div>
</div>