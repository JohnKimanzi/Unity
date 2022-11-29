<div class="form-group">
        <div class="card border">
            <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            Country Info
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="col-form-label">Name <span class="text-danger">*</span></label>
                        <input class="name_input form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" required value="{{old('name', isset($department) ? $department->name : '')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">Iso2 <span class="text-danger">*</span></label>
                        <textarea class="name_input form-control @error('description') is-invalid @enderror" name="description" id="description" >{{old('description', isset($department) ? $department->description : '')}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">Iso3 <span class="text-danger">*</span></label>
                        <textarea class="name_input form-control @error('description') is-invalid @enderror" name="description" id="description" >{{old('description', isset($department) ? $department->description : '')}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">Number Code <span class="text-danger">*</span></label>
                        <textarea class="name_input form-control @error('description') is-invalid @enderror" name="description" id="description" >{{old('description', isset($department) ? $department->description : '')}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">Phone Code<span class="text-danger">*</span></label>
                        <textarea class="name_input form-control @error('description') is-invalid @enderror" name="description" id="description" >{{old('description', isset($department) ? $department->description : '')}}</textarea>
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