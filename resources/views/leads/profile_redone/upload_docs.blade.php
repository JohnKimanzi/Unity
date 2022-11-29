<form method="POST" action="{{url('doc_upload')}}" enctype="multipart/form-data" style="display:none" id="upload_file">
            @csrf  
          
<div class="form-group col-md-12">
    <input type="hidden" name="lead_id" value="{{$leads->id}}">
    <label for="file_to_upload">File to Upload </span></label>
    <input name="document_type" list='doc_type' class="form-control">
        @php
        $file_types=App\Models\DocumentType::get('name');
        @endphp
    <datalist id="doc_type" >
        @foreach($file_types as $filetype)
        <option value="{{$filetype->name}}">{{$filetype->name}}</option>
        @endforeach
        
    </datalist>
    {{-- <select name="file_to_upload" class="form-control">
        @php
        $file_type=App\Models\Document::where('lead_id',$leads->id)->get('title');
        @endphp
        @foreach($file_type->unique('title') as $filetype)
        <option value="{{$filetype->title}}">{{$filetype->title}}</option>
        @endforeach
        
    </select> --}}
    <input type="file" name="lead_doc" id="lead_doc" class="form-control">
</div>
<input type="submit" class="btn btn-custom" value="Upload">
</form>
@include('leads.profile_redone.edits.add_file_to_upload')
