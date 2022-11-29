<div class="form-group">
    <div class="card border">
        <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            PTO Types Info
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input class="name_input form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" required value="{{old('name', isset($pto_type) ? $pto_type->name : '')}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Max. Hours<span class="text-danger">*</span></label>
                    <input class="form-control @error('max_hours') is-invalid @enderror" name="max_hours" type="number" id="max_hours" required value="{{old('max_hours', isset($pto_type) ? $pto_type->max_hours : '')}}">
                    @error('max_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Max. Rollover <span class="text-danger">*</span></label>
                    <input class="form-control @error('max_roll_over') is-invalid @enderror" name="max_roll_over" type="number" id="max_roll_over" required value="{{old('max_roll_over', isset($pto_type) ? $pto_type->max_roll_over : '')}}">
                    @error('max_roll_over')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Status <span class="text-danger">*</span></label>
                    <input class="name_input form-control @error('status') is-invalid @enderror" name="status" type="text" id="status" required value="{{old('status', isset($pto_type) ? $pto_type->status : '')}}">
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>