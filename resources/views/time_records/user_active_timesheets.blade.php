<div>
    <div class="card card-table flex-fill">
        <div class="card-header">My Time Records Today {{now()->format('d M Y')}}</div>
        <div class="card-body">
            {{-- <div class="table-responsive"> --}}
               @include('time_records.timesheets_table')
            {{-- </div> --}}
        </div>
        <hr>
    </div>
    <hr>
     
            {{-- <button type="submit" class="btn btn-primary btn-lg" id="allowed_time_record_type_btn">{{($allowed_time_record_type->action_name)??'Break type not specified'}}</button> --}}
            <div class="card-body">
            @if(Auth::user()->is_clocked_in)
                @if(Auth::user()->has_active_break)
                    <form style ='display:inline-block;' action="{{route('close_time_record', Auth::user()->active_break)}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="time_record_type_id" value="{{($allowed_time_record_types->toQuery()->where('name','like', '%clock%')->first()->id)??''}}"> --}}
                        <button type="submit" class="btn btn-danger  allowed_time_record_type_btn"><i class="la la-sign-out"></i>End {{Auth::user()->active_break->name}}</button>
                    </form>
                @else
                    {{-- Show all allowed breaks --}}
                    @forelse(Auth::user()->allowed_break_types as $allowed_break_type)
                        <form style ='display:inline-block;' action="{{route('time_records.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="time_record_type_id" value="{{($allowed_break_type->id)??''}}">
                            <button type="submit" class="btn btn-primary  allowed_time_record_type_btn"><i class="fa fa-coffee"></i>{{$allowed_break_type->name}}</button>
                        </form> 
                    @empty

                    @endforelse
        
                    {{-- not a form. this is to toggle custom input section on/off --}}
                    <button type="button" class="btn btn-warning  " id="custom_break_btn"><i class="la la-cog"></i>Custom break</button>
                    
                    {{-- Clock out always available --}}
                    <form style ='display:inline-block;' action="{{route('close_time_record', Auth::user()->active_time_records->first())}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="time_record_type_id" value="{{($allowed_time_record_types->toQuery()->where('name','like', '%clock%')->first()->id)??''}}"> --}}
                        <button type="submit" class="btn btn-danger  allowed_time_record_type_btn"><i class="la la-sign-out"></i>Clock Out</button>
                    </form>
                @endif
            @else
                {{-- Clock in shown only when user is not clocked in--}}
                <form style ='display:inline-block;' action="{{route('time_records.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="time_record_type_id" value="{{($allowed_time_record_types->toQuery()->where('name','like', '%clock%')->first()->id)??''}}">
                    <button type="submit" class="btn btn-success  allowed_time_record_type_btn"><i class="la la-sign-in"></i>Clock In</button>    
                </form>
            @endif
            </div>
        <hr>
        <div class="row form-group">
            <div class="col-md-12 form-group d-none" id="custom_break_input_section">
                <form action="{{route('time_records.store')}}" method="POST">
                    @csrf
                    <div class="form-group col-md-8">
                        <label class="col-form-label">Specify Reason for Break</label>
                        {{-- {{dd(10)}} --}}
                        <input type="hidden" name="time_record_type_id" value="{{($allowed_time_record_types->toQuery()->where('name','like', '%custom%')->first()->id)??''}}">
                        <input class="form-control" type="text" name="break_description">
                    </div>
                    <div class="form-group col-md-4">    
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>        
    
    <div class="col-sm-12 modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div>
</div>
@push('scripts')
<script>
    $('#custom_break_btn').on('click', function(){
        if($('#custom_break_input_section').hasClass('d-none')){
            $('#custom_break_input_section').removeClass('d-none');
            $('#custom_break_btn').html('Hide section <i class="fa fa-eye-slash"></i>');
            // $('.allowed_time_record_type_btn').attr('disabled', true);

        } else{
            $('#custom_break_input_section').addClass('d-none');
            $('#custom_break_btn').html('Custom break');
            // $('.allowed_time_record_type_btn').attr('disabled', false);
        }
    });
</script>
@endpush