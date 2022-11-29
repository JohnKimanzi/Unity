@extends('layout.mainlayout',  ['title'=>"CALLS"])
@section('content')

    <div class="content container-fluid">
    <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item"><a href="index">Engage</a></li>
                        <li class="breadcrumb-item active">{{$call->name}}</li>
                    </ul>
                </div>
                
            </div>
        </div>
                <form action="{{url('record_call')}}" method="GET"> 
                    @csrf
                    <input type="text" hidden name="lead_id" value="{{$call->id}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Lead #<span class="text-danger">*</span></label>
                                <input class="form-control @error('client_name') is-invalid @enderror"  value="{{$call->id}}" readonly required name="lead_name" autocomplete="client_name"  type="text" id="client_name">
                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Subject of call <span class="text-danger">*</span></label>
                                <input class="form-control @error('subject') is-invalid @enderror"  value="{{ old('subject') }}" required name="subject" autocomplete="subject"  type="text" id="subject">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone <span class="text-danger">*</span></label>

                                <input class="form-control @error('phone') is-invalid @enderror"  value="{{ $call->phone1 }}" readonly required name="phone" autocomplete="phone"  type="text" id="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                        
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Contacted Person</label>
                                <span><a href="#" data-toggle="modal" data-target="#add_call_status" class="btn btn-success float-right"><i class="fa fa-plus"></i></a></span>
                                <select class="select @error('contact_person') is-invalid @enderror form-control" name='contact_person' id="call_state" required>
                                   
                                    @foreach(App\Models\ContactPerson::where('lead_id', $call->id)->get() as $cont_p)
                                        <option  value="{{$cont_p->name}}">{{$cont_p->full_name}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                                {{-- <input class="form-control @error('contact_person') is-invalid @enderror"  value="{{ old('contact_person') }}" required name="contact_person" autocomplete="contact_person"  type="text" id="contact_person"> --}}
                                @error('contact_person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                        
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Call duration</label>

                                <input class="form-control @error('call_duration') is-invalid @enderror"  value="{{ old('call_duration') }}" required name="call_duration" autocomplete="call_duration"  type="time" id="call_duration">
                                @error('call_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                        
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Call back date<span class="text-danger">*</span></label>
                                {{-- <div class="cal-icon"><input class="form-control datetimepicker @error('call_back') is-invalid @enderror" value="{{ old('call_back')}}" name='call_back' type="text"></div> --}}
                                <input class="form-control @error('call_back') is-invalid @enderror"  value="{{ old('call_back') }}" required name="call_back" autocomplete="call_back"  type="datetime-local" id="call_back">

                                @error('call_back')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Call status</label>
                                <span><a href="#" data-toggle="modal" data-target="#add_call_status" class="btn btn-success float-right"><i class="fa fa-plus"></i></a></span>
                                <select class="select @error('status') is-invalid @enderror" name='call_status' id="call_state" required>
                                    <option @if(old('role')=='Unreachable') selected @endif value="Unreachable">Unreachable</option>
                                    <option @if(old('role')=='Reachable') selected @endif value="Reachable">Reachable</option>
                                    <option @if(old('role')=='Hungup') selected @endif value="Hungup">Hungup</option>
                                    <option @if(old('role')=='Voicemail') selected @endif value="Voicemail">Voicemail</option>
                                    <option @if(old('role')=='Callback') selected @endif value="Callback">Callback</option>
                                    
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @include('leads.profile.add_callState')
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                                <label class="col-form-label">Change Lead status</label>
                                <span><a href="#" data-toggle="modal" data-target="#add_status" class="btn btn-success float-right"><i class="fa fa-plus"></i></a></span>
                                <select class="select @error('status') is-invalid @enderror" name='lead_status'  id="lead_state" required>
                                    <option @if(old('role')=='Unreachable') selected @endif value="Unreachable">Cold</option>
                                    <option @if(old('role')=='Reachable') selected @endif value="Reachable">Hot</option>
                                    <option @if(old('role')=='Hungup') selected @endif value="Hungup">Warm</option>
                                    
                                    </select>
                                    
                                    
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @include('leads.profile.add_status')
                            </div>
                        </div>
                    <div>
                        <div>
                            <label for=""></label>
                        </div>
                    </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Call Notes </label>
                                {{-- <textarea name="" id="" cols="" rows="10"></textarea> --}}
                                <textarea rows='3'class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') }}" required name="description" autocomplete="description"  id="description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>
                    
                    <div class="submit-section">
                        <button class="btn btn-danger submit-btn">Save</i></button>
                        
                    </div>
                </form>
</div>
@endsection