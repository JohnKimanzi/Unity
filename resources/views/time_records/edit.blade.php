@extends('layout.mainlayout')
@section('content')
    <div class="content container-fluid">
        <div class="card mt-5 mr-5 ml-5">
            <div class="card-body">


                <div class="card border">
                    <div class="card-title border-bottom"
                        style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
                        Adjust Timesheet
                    </div>
                    <div class="card-body">
                        <form action="{{ route('time_records.update', $time_record) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 form-group ">
                                    <label>User name</label>
                                    <input readonly class="form-control" type="text" value="{{ old('started_at', isset($time_record) ? $time_record->user->name : '') }}">
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label>Record Date</label>
                                    <div class="cal-icon">
                                        <input readonly class="form-control" type="text" value="{{ old('started_at', isset($time_record) ? $time_record->started_at->format('Y-m-d') : '') }}">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 form-group ">
                                    <label class="col-form-label">Time In <span class="text-danger">*</span></label>
                                    <input class="form-control @error('started_at') is-invalid @enderror" name="started_at"
                                        type="datetime-local" id="started_at" required
                                        value="{{ old('started_at', isset($time_record) ? $time_record->started_at->format('Y-m-d\TH:i') : '') }}">
                                    {{-- <input class=" form-control @error('started_at') is-invalid @enderror"
                                name="started_at" type="datetime" id="started_at" required
                                value="{{ old('started_at', isset($time_record) ? $time_record->started_at : '') }}"> --}}
                                    @error('started_at')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Time Out <span class="text-danger">*</span></label>
                                    <input class="form-control @error('ended_at') is-invalid @enderror" name="ended_at"
                                        type="datetime-local" id="ended_at" required
                                        value="{{ old(
                                            'ended_at',
                                            isset($time_record) ? ($time_record->ended_at ? $time_record->ended_at->format('Y-m-d\TH:i') : '') : '',
                                        ) }}">

                                    {{-- <input class=" form-control @error('ended_at') is-invalid @enderror"
                                name="ended_at" type="datetime" id="ended_at" required
                                value="{{ old('ended_at', isset($time_record) ? $time_record->ended_at : '') }}"> --}}
                                    @error('ended_at')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="submit-section">
                                <a href="{{url()->previous()}}"  class="btn btn-danger submit"><i class="fa fa-chevron-circle-left"></i>Back</a>
                                <button type="submit"  class="btn btn-success submit"><i class="fa fa-check"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
