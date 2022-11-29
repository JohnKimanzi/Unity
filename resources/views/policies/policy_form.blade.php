<div class="col-sm-12">
    <div class="form-group">
        <label class="col-form-label">Policy Name<span class="text-danger">*</span></label>
        <input class="form-control @error('name') is-invalid @enderror" value="{{old('name',isset($editable_policy->name) ? $editable_policy->name : '' )}}" required type="text" name="name">
        @include('layout.partials.error', ['name'=>'name'])
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
        <label class="col-form-label">Description<span class="text-danger">*</span></label>
        <textarea rows="3" cols="5" class="form-control @error('description') is-invalid @enderror" name="description">{{old('description',isset($editable_policy->description) ? $editable_policy->description : '' )}} </textarea>
        @include('layout.partials.error', ['name'=>'description'])
    </div>
</div>
<div class="form-group">
    <label class="col-form-label">Department</label>
    <input class="form-control @error('group') is-invalid @enderror" name="group" required list="dpt" value="{{old('group',isset($editable_policy->group) ? $editable_policy->group : '' )}} ">
    <datalist  id="dpt">
        <option>All Departments</option>
        <option>Collection</option>
        <option>Sales and Marketing</option>
        <option>IT</option>
    </datalist>
    @include('layout.partials.error', ['name'=>'group'])
</div>
<div class="form-group">
    <div class="form-group">
        <label class="col-form-label">Effective Date<span class="text-danger">*</span></label>
        <input class="form-control @error('effective_date') is-invalid @enderror" value="{{old('effective_date', isset($editable_policy->effective_date) ? $editable_policy->effective_date : ''   )}}" required type="date" name="effective_date">
        @include('layout.partials.error', ['name'=>'effective_date'])
    </div>
</div>
@if(!isset($editable_policy))
<div class="form-group">
    <label>Upload Policy Document <span class="text-danger">*</span></label>
    <div class="custom-file">
        <input type="file" class="custom-file-input @error('doc') is-invalid @enderror" id="policy_upload" required name="doc">
        <small class="text-muted">PDF files ony|Max size:5mb</small>
        <label class="custom-file-label" for="policy_upload">Choose file</label>
    </div>
    @include('layout.partials.error', ['name'=>'doc'])
</div>
@endif