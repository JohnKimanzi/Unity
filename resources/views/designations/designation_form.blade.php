<div class="form-group">
        <div class="card border">
            <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            Designation Info
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="col-form-label">Designation Name <span class="text-danger">*</span></label>
                        <input class="name_input form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" required value="{{old('name', isset($designation) ? $designation->name : '')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">Department <span class="text-danger">*</span></label>
                        <select name="department_id" class="form-control" required id="designation_id">
                            <option value="" selected>--select--</option>
                            @forelse ($departments as $department)
                                <option  @if(old("department_id", isset($designation) ? $designation->department->id : '') == $department->id) selected @endif value="{{ $department->id }}">{{ $department ->name }}</option>
                                @empty
                                <option value="">--No Values, Contact admin--</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="col-form-label">Designation Description <span class="text-danger">*</span></label>
                        <textarea class="name_input form-control @error('description') is-invalid @enderror" name="description" id="description" >{{old('description', isset($designation) ? $designation->description : '')}}</textarea>
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