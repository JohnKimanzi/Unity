@push('styles')
<style>
 
.modal
{
    z-index : 1051 ;
}
</style>
@endpush
<div class="form-group">
    <div class="card border">
        <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            User Bio
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                    <input class="name_input form-control @error('fname') is-invalid @enderror" name="fname" type="text" id="fname" required value="{{old('fname', isset($user) ? $user->fname : '')}}">
                    @error('fname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Middle Name </label>
                    <input class="name_input form-control @error('mname') is-invalid @enderror" name="mname" type="text" id="mname" value="{{old('mname',isset($user) ? $user->mname : '')}}">
                    @error('mname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class=" col-form-label">Last Name <span class="text-danger">*</span></label>
                    <input class="name_input form-control @error('lname') is-invalid @enderror" name="lname" type="text" id='lname' required value="{{old('lname', isset($user) ? $user->lname : '')}}">
                    @error('lname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">SSN/ID <span class="text-danger">*</span></label>
                    <input class="name_input form-control @error('id') is-invalid @enderror" name="id" type="text" id="id" required value="{{old('id', isset($user) ? $user->id : '')}}">
                    @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">D.O.B <span class="text-danger">*</span></label>
                    <input class="form-control @error('dob') is-invalid @enderror" name="dob" type="date" required value="{{old('dob', isset($user) ? $user->dob->format('Y-m-d') : '')}}">
                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="col-sm-4">
                    <label class="col-form-label">Gender <span class="text-danger">*</span></label>
                    <select name="gender" class="form-control" required>
                        <option value="">-- select -- </option>
                        <option @if(old("gender", isset($user) ? strtolower($user->gender) : '') == 'male') selected @endif value="male">Male</option>
                        <option @if(old("gender", isset($user) ? strtolower($user->gender) : '')=='female') selected @endif value="female">Female</option>
                        <option @if(old("gender", isset($user) ? strtolower($user->gender) : '')=='other') selected @endif value="other">Other</option>
                    </select>

                </div>

                <div class="col-sm-4">
                    <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                    <input class="form-control @error('phone1') is-invalid @enderror" name="phone1" type="phone" required value="{{old('phone1', isset($user) ? $user->phone1 : '')}}">
                    @error('phone1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Alternate Phone </label>
                    <input class="form-control @error('phone2') is-invalid @enderror" name="phone2" type="phone" value="{{old('phone2', isset($user) ? $user->phone2 : '')}}">
                    @error('phone2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <label class="col-form-label">Work Email <span class="text-danger">*</span></label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" id="email" required value="{{old('email', isset($user) ? $user->email : '')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Personal Email <span class="text-danger">*</span></label>
                    <input class="form-control @error('personal_email') is-invalid @enderror" name="personal_email" type="email" id="personal_email" required value="{{old('personal_email', isset($user) ? $user->personal_email : '')}}">
                    @error('personal_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Date Hired <span class="text-danger">*</span></label>
                    <input class="form-control @error('doj') is-invalid @enderror" name="doj" type="date" id="doj" required value="{{old('doj', isset($user) ? $user->doj->format('Y-m-d') : '')}}">
                    @error('doj')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Pay Rate <span class="text-danger">*</span></label>
                    <input class="form-control @error('pay_rate') is-invalid @enderror" name="pay_rate" type="number" min="0" step="any" id="pay_rate" required value="{{old('pay_rate', isset($user) ? $user->pay_rate : '')}}">
                    @error('pay_rate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Designation <span class="text-danger">*</span></label>
                    @role('admin')
                    <a data-toggle="modal" href="#addDesignationBtn" class="btn btn-primary btn-sm" data-dismiss="modal"> Add</a>
                    @endrole
                    <select name="designation_id" class="form-control" required>
                        <option value="" selected>--select--</option>
                        @forelse ($designations as $designation)
                        <option @if(old("designation_id", isset($user) ? $user->designation_id : '') == $designation->id) selected @endif value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @empty
                        <option value="">--No Values, Contact admin--</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Team <span class="text-danger">*</span></label>
                    @role('admin')
                    <a data-toggle="modal" href="#addTeamModal" class="btn btn-primary btn-sm" data-dismiss="modal"> Add</a>
                    @endrole
                    <select name="team_id" class="form-control" required id="team_id">
                        <option value="" selected>--select--</option>
                        @forelse ($teams as $team)
                        <option @if(old("team_id", isset($user) ? $user->team_id : '') == $team->id) selected @endif value="{{ $team->id }}">{{ $team->name }}</option>
                        @empty
                        <option value="">--No Values, Contact admin--</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>

    </div>

    <div class="card border">
        <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            Address
        </div>
        <div class="card-body">
            <div class="row form-group">
                <div class="form-group col-sm-8">
                    <label class="col-form-label">Country </label>
                    @role('admin')
                    <a data-toggle="modal" href="#addCountryBtn" class="btn btn-primary btn-sm" data-dismiss="modal"> Add</a>
                    @endrole
                    <select name="country_id" class="form-control editableBox">
                        <option value=""></option>
                        @forelse ($countries as $country)
                        <option @if(old("country_id", isset($user) ? $user->country_id : '') == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                        @empty
                        <option value="">--No Values, Contact admin--</option>
                        @endforelse
                    </select>

                </div>
                <div class="col-sm-6">

                    <label class="col-form-label">Address <span class="text-danger">*</span></label>
                    <input class="form-control @error('address') is-invalid @enderror" name="address" type="text" required value="{{old('address', isset($user) ? $user->address : '')}}">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">City <span class="text-danger">*</span></label>
                    <input class="form-control @error('city') is-invalid @enderror" name="city" type="text" required value="{{old('city', isset($user) ? $user->city : '')}}">
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label class="col-form-label">State </label>
                    <select name="state_id" class="form-control editableBox">
                        <option value=""></option>
                        @forelse ($states as $state)
                        <option @if(old("state_id", isset($user) ? $user->state_id : '') == $state->id) selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                        @empty
                        <option value="">--No Values, Contact admin--</option>
                        @endforelse
                    </select>

                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Zip code</label>
                    <input class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" type="text" value="{{old('zip_code', isset($user) ? $user->zip_code : '')}}">
                    @error('zip_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card border">
        <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
            User Account
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <label class="col-form-label">Default Password </label>
                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="text" placeholder="Leave blank to use phone number" value="{{old('password')}}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="col-form-label">Prompt password change</label>
                        </div>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked name="change_password" value="yes"> <span class="text-success">Yes</span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="change_password" value="no" value="{{old('change_password', isset($user) ? $user->change_password : '')}}"> <span class="text-danger">No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
    $("#addTeamForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(), // serializes the form's elements.
            success: function(team) {
                $('#addTeamModal').modal('hide');
                $("#create_user").modal('show');
             $('#team_id').append("<option value='"+team.id+"' >"+team.name+"</option>");
            },
            error: function(error) {
                console.log('An error occurred.');
                console.log(error);
            },
        });

    });

    $("#addDesignationForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(), // serializes the form's elements.
            success: function(designation) {
                $('#designation_id').append("<option value='"+designation.id+"' >"+designation.name+"</option>");
            },
            error: function(error) {
                console.log('An error occurred.');
                console.log(error);
            },
        });

    });
</script>
@endpush