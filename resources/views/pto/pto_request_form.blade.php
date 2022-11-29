<div>
    <div class="row form-group">
        <div class="form-group col-sm-12">
            <label class="col-form-label">Edit PTO Application <span class="text-danger">*</span></label>
            <select name="pto_type_id" class="form-control" id="select_pto_type">
                <option value="" selected>--select--</option>
                @foreach ($pto_types as $pto_type)
                <option value="{{ $pto_type->id }}" @if( old("pto_type_id", (isset($pto->pto_type) ? $pto->pto_type->id : '')) == $pto_type->id) selected @endif>{{ $pto_type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <label class="col-form-label">Start Time <span class="text-danger">*</span></label>
            <input class="form-control @error('start_at') is-invalid @enderror" name="start_at" type="datetime-local" id="start_at" required value="{{old('start_at', isset($pto) ? $pto->start_at->format('Y-m-d\TH:i') : '')}}">
            @error('start_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-sm-4">
            <label class="col-form-label">End Time <span class="text-danger">*</span></label>
            <input class="form-control @error('end_at') is-invalid @enderror" name="end_at" type="datetime-local" id="end_at" required value="{{old('end_at', isset($pto) ? $pto->end_at->format('Y-m-d\TH:i') : '')}}">
            @error('end_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @if(!isset($pto))
        <div class=" col-sm-4">
            <label class="col-form-label @error('attachment') is-invalid @enderror">Upload attachment <span id="pto_attachment_span" class="text-danger"></span></label>
            <input class="form-control" name="attachment" type="file" id="pto_attachment_input">
            @error('attachment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @endif
    </div>
    <div class="row form-group col-sm-12">
        <label class="col-form-label">Comments Update</label>
        <textarea class="form-control @error('comments') is-invalid @enderror" name="comments">{{old('comments', isset($pto) ? $pto->comments : '')}}</textarea>
        @error('comments')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


@push('scripts')
<script>
    //Add 'required' attribute to file input only for pto_types that must have file attachments. 
    $('body').on('change', '#select_pto_type', function() {
        var pto_type_id = $('#select_pto_type').val();
        $.ajax({
            type: 'GET',
            url: 'get_pto_type_attachment_required/' + pto_type_id,
            contentType: "text/plain",
            dataType: 'json',
            success: function(attachment_required) {
                if (attachment_required) {
                    $('#pto_attachment_input').attr('required', 'true');
                    $('#pto_attachment_span').html('*');
                } else {
                    $('#pto_attachment_input').removeAttr('required');
                    $('#pto_attachment_span').html('');
                }
            },
            error: function(e) {
                console.log("There was an error with your request...");
                console.log("error: " + JSON.stringify(e));
                alert("Sorry, an error occured...");
            }
        });
    });
</script>
@endpush