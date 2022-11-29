<div class="form-group">
    <div class="card border">
        <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            Break info 
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <label class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input class="name_input form-control @error('name') is-invalid @enderror" name="name"
                        type="text" id="name" required
                        value="{{ old('name', isset($timeRecordType) ? $timeRecordType->name : '') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Paid status <span class="text-danger">*</span></label>
                    <select class="form-control @error('is_paid') is-invalid @enderror" name="is_paid" id="">
                        <option value="1" selected>Paid</option>
                        <option value="0" @if(isset($timeRecordType) && $timeRecordType->status==false) selected @endif>Not Paid</option>
                    </select>
                    @error('is_paid')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label class="col-form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="name_input form-control @error('description') is-invalid @enderror" required name="description" id="" >{{ old('description', isset($timeRecordType) ? $timeRecordType->description : '') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
