<div class="form-group">
        <div class="card border">
            <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            Teams Info
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="col-form-label">Team Name <span class="text-danger">*</span></label>
                        <input class="name_input form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" required value="{{old('name', isset($team) ? $team->name : '')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">Country <span class="text-danger">*</span></label>
                        <select name="country_id" class="form-control" required>
                            <option value="" selected>--select--</option>
                            @forelse ($countries as $country)
                                <option  @if(old("country_id", isset($team) ? $team->country_id : '') == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                @empty
                                <option value="">--No Values, Contact admin--</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label"> Description <span class="text-danger">*</span></label>
                        <input class="name_input form-control @error('description') is-invalid @enderror" name="description" type="text" id="description" required value="{{old('description', isset($team) ? $team->description : '')}}">
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