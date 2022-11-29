<form method="POST" action="{{url('edit_profile',$leads->id)}}" id="lead_info_editable" style="display: none;"> 
                                 @csrf
                            <input type="hidden" value="{{$leads->id}}">
                           <div class="form-group">
                               <label>Primary Phone</label>
                                <input type="phone" name="primary_phone" value="{{$leads->phone1}}" class="form-control">
                           </div>     
                           <div class="form-group">
                               <label>Alternate Phone</label>
                                <input type="phone" name="alt_phone" value="{{$leads->phone1}}" class="form-control">
                           </div>     
                           <div class="form-group">
                               <label>Email Address</label>
                                <input type="email" name="email" value="{{$leads->email}}" class="form-control">
                           </div>     
                           <div class="form-group">
                               <label>Physical Address</label>
                                <input type="text" name="physical_address" value="{{$leads->address}}" class="form-control">
                           </div>     
                           <div class="form-group">
                               <label>Zip Code</label>
                                <input type="text" name="zip_code" value="{{$leads->zip_code}}" class="form-control">
                           </div>     
                           <div class="form-group">
                               <label>State</label>
                                <select name="state" class="form-control">
                                    
                                    @php
                                    $state=App\Models\State::all();
                                    $selected_state=App\Models\State::find($leads->state_id);
                                    @endphp
                                    <option value="{{$selected_state->id}}" bg-color="gray">{{$selected_state->name}}</option>
                                    @foreach($state as $states)
                                    <option value="{{$states->id}}">{{$states->name}}</option>
                                    @endforeach
                                </select>
                           </div>     
                           <div class="form-group">
                               <label>Category</label>
                               <select name="category" class="form-control">
                               @php
                                    $businessTypes=App\Models\BusinessType::all();
                                    $selected_biz=App\Models\BusinessType::find($leads->business_type_id);
                                    @endphp
                                    <option value="{{$selected_biz->id}}" bg-color="gray">{{$selected_biz->name}}</option>
                                    @foreach($businessTypes as $biztypes)
                                    <option value="{{$biztypes->id}}">{{$biztypes->name}}</option>
                                    @endforeach
                                </select>
                           </div>     
                           
                                   
                            <input type="submit" class="btn btn-danger float-right" name="submit" value="Edit">
                        </form>