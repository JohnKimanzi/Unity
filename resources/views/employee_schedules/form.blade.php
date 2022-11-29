<div class="col-sm-12">
    <div class="form-group">
        <label class="col-form-label">Schedule Name<span class="text-danger">*</span></label>
        <input class="form-control @error('name') is-invalid @enderror" value="{{old('name',isset($editable_schedule->name) ? $editable_schedule->name : '' )}}" required type="text" name="name">
        @include('layout.partials.error', ['name'=>'name'])
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
        <label class="col-form-label">Description<span class="text-danger">*</span></label>
        <textarea rows="3" cols="5" class="form-control @error('description') is-invalid @enderror" name="description">{{old('description',isset($editable_schedule->description) ? $editable_schedule->description : '' )}} </textarea>
        @include('layout.partials.error', ['name'=>'description'])
    </div>
</div>
{{-- <div class="form-group">
    <label class="col-form-label">Department</label>
    <input class="form-control @error('group') is-invalid @enderror" name="group" required list="dpt" value="{{old('group',isset($editable_schedule->group) ? $editable_schedule->group : '' )}} ">
    <datalist  id="dpt">
        <option>All Departments</option>
        <option>Collection</option>
        <option>Sales and Marketing</option>
        <option>IT</option>
    </datalist>
    @include('layout.partials.error', ['name'=>'group'])
</div> --}}
<div class="form-group">
    <div class="form-group">
        <label class="col-form-label">Effective From<span class="text-danger">*</span></label>
        <input class="form-control @error('effective_from') is-invalid @enderror" name="effective_from" type="date" required value="{{old('effective_from', isset($editable_schedule) ? $editable_schedule->effective_from->format('Y-m-d') : '')}}" id="effective_from" >
        @include('layout.partials.error', ['name'=>'effective_from'])
    </div>
</div>
<div class="form-group">
    <div class="form-group">
        <label class="col-form-label">Effective To<span class="text-danger">*</span></label>
        <input class="form-control @error('effective_to') is-invalid @enderror" value="{{old('effective_to', isset($editable_schedule->effective_to) ? $editable_schedule->effective_to->format('Y-m-d') : ''   )}}" required type="date" name="effective_to">
        @include('layout.partials.error', ['name'=>'effective_to'])
    </div>
</div>
@if(!isset($editable_schedule))
<div class="form-group">
    <label>Upload File Attachment <span class="text-danger">*</span></label>
    <div class="custom-file">
        <input type="file" class="custom-file-input @error('doc') is-invalid @enderror" id="schedule_upload"  name="doc">
        <small class="text-muted">PDF files ony|Max size:5mb</small>
        <label class="custom-file-label" for="schedule_upload">Choose file</label>
    </div>
    @include('layout.partials.error', ['name'=>'doc'])
</div>
@endif