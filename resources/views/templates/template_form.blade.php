<div class="form-group">
    <div class="form-group">
        <label class="col-form-label">Template Name<span class="text-danger">*</span></label>
        <input class="form-control @error('doc_name') is-invalid @enderror" value="{{old('doc_name',isset($editable_template->name) ? $editable_template->name : '' )}}" required type="text" name="doc_name">
        @include('layout.partials.error', ['name'=>'doc_name'])
    </div>
</div>
<div class="form-group">
    <label class="col-form-label">Category</label>
    <input class="form-control @error('category') is-invalid @enderror" name="category" required list="category" value="{{old('category',isset($editable_template->category) ? $editable_template->category : '' )}} ">
    <datalist  id="category">
        @foreach (App\Models\Template::pluck('category')->unique()->all() as $category)
            <option value="{{$category}}">
        @endforeach
    </datalist>
    @include('layout.partials.error', ['name'=>'group'])
</div>

@if(!isset($editable_template))
<div class="form-group">
    <label>Upload Template <span class="text-danger">*</span></label>
    <div class="custom-file">
        <input type="file" class="custom-file-input @error('template') is-invalid @enderror" id="template" required name="template">
        <small class="text-muted">PDF files ony|Max size:5mb</small>
        <label class="custom-file-label" for="template">Choose file</label>
    </div>
    @include('layout.partials.error', ['name'=>'template'])
</div>
@endif