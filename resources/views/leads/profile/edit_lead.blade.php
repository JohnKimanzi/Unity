<form action="{{url('edit_profile', $data->id)}}" method="GET" id="edit_lead" style="display:none"> 
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Lead #</label>
                <input class="form-control" readOnly value="{{ $data->id}}" required name="client_id" >
                
            </div>
        </div>
        <div class="col-sm-6">
           
            <div class="form-group">
                <label class="col-form-label">Category<span style="float-right">
                </label><a href="" data-toggle="modal" data-target="#add_category" class="btn btn-success float-right"><i class="fa fa-plus"></i></a>
       
                <select class="select @error('business_type_id') is-invalid @enderror" id="category" name='business_type_id' required>
                    <option @if(old('role')=='1') selected @endif value="1">Medical</option>
                    <option @if(old('role')=='0') selected @endif value="2">Non Medical</option> 
                </select>
                @error('business_type_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @include('leads.profile.add_category')
            </div>
       
        </div>
        
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Primary Phone</label>

                <input class="form-control @error('phone1') is-invalid @enderror"  value="{{ $data->phone1 }}" name="phone1"   type="phone">
                @error('phone1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                                        
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Alternative Phone</label>

                <input class="form-control @error('phone2') is-invalid @enderror" name="phone2"  value="{{ $data->phone2 }}"   type="phone" >
                @error('phone2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                                        
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Email</label>

                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email}}"  type="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                                        
            </div>
        </div>
        
        <div class="col-sm-6">
            
                <div class="form-group">
                <label class="col-form-label">State</label><a href="#" data-toggle="modal" data-target="#add_state" class="btn btn-success float-right"><i class="fa fa-plus"></i></a>
                <select class="select @error('state') is-invalid @enderror" name='state' id="state" required>
                    <option @if(old('role')=='1') selected @endif value="1">{{$data->town}}</option>
                    @foreach(App\Models\State::All() as $states)
                    <option @if(old('role')=='1') selected @endif value="{{$states->id}}">{{$states->name}}</option>
                    @endforeach
                </select>
                @error('business_type_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                 @include('leads.profile.add_category')
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Status</label>

                <input class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $data->status}}"  readOnly type="text">
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                                        
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Physical Address</label>

                <input class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $data->address}}"  type="text">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                                        
            </div>
        </div>
         <div class="col-sm-6"> 
        <button type="submit" class="btn btn-custom col-sm-4 float-right" id="edit_lead" ><i class="fa fa-edit">Edit</i></button>
        </div>
    </div>
    
    
    
</form>
