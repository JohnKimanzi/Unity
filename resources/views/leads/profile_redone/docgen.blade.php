<form method="POST" action="{{url('doc_upload')}}" enctype="multipart/form-data" style="display:none" id="docgen">
            @csrf  
          
<div class="form-group">
    <input type="hidden" name="lead_id" value="{{$leads->id}}">
    <label for="file_to_upload">File to Upload </span></label>
    <input name="file_to_upload" list='file_to_upload' class="form-control">
        @php
        $file_types=App\Models\DocumentType::get('name');
        @endphp
    <datalist id="file_to_upload">
        @foreach($file_types as $filetype)
            <option value="{{$filetype->title}}">
        @endforeach
        
    </datalist>
    <input type="file" name="lead_doc" id="lead_doc" class="form-control">
</div>
<input type="submit" class="btn btn-custom" value="Upload">
</form>
@include('leads.profile_redone.edits.add_file_to_upload')
