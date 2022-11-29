@csrf
<div class="form-group">
    <label for="doc_name">Document Type: <span class="text-danger">*</span> </label>
    <input type="text" name="document_type" class="form-control @error('document_type') is-invalid @enderror" id="newUpload" list="document_types">
    @error('document_type')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <datalist id="document_types">
        @forelse($document_types as $document_type)
        <option value="{{$document_type}}">{{$document_type}}</option>
        @empty
        @endforelse
    </datalist>
</div>
<div class="form-group">
    <label for="doc_name">Overide File Name: </label>
    <input type="text" name="filename" class="form-control @error('filename') is-invalid @enderror" id="newUpload" placeholder="leave blank to use original filename">
    @error('filename')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<input type="text" hidden name="uploadable" value="{{$uploadable}}">
<input type="text" hidden name="uploadable_id" value="{{$uploadable_id}}">

<div class="form-group">
    <label for="newUpload">Upload file: </label>
    <input type="file" name="uploaded_file" class="form-control-file @error('uploaded_file') is-invalid @enderror" id="newUpload">
    @error('uploaded_file')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>