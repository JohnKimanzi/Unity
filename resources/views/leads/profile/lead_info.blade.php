 <div class="card mb-0 col-sm-12" id="lead_info">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0">{{$data->name}}</h3>
                                            <h5 class="company-role m-t-0 mb-0">{{$data->business_type->name}}</h5>
                                            <small class="text-muted">
                                                Medical:
                                                @if($data->business_type->is_medical==true)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </small>
                                            <div class="row">
                                            <div class="card col-sm-4">Contact Person
                                            <h5 class="user-name m-t-0">John Doe, C.E.O</h5>
                                            </div>
                                            <div class="row">
                                            <div class="card col-sm-4">
                                            
                                            </div>
                                            </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Primary phone:</span>
                                                <span class="text"><a href="">{{$data->phone1}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Secondary phone:</span>
                                                <span class="text"><a href="">{{$data->phone2}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="">{{$data->email}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Date added:</span>
                                                <span class="text">{{date('d-m-Y', strtotime($data->created_at))}}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{$data->address}}</span>
                                            </li>
                                            <li>
                                                <span class="title">City:</span>
                                                
                                                <span class="text">{{$data->town}}</span>
                                            </li>
                                            <li>
                                                <span class="title">State:</span>
                                                
                                                <span class="text">{{$data->state->name}}</span>
                                            </li>
                                            
                                            <li>
                                                <span class="title">Zip code:</span>
                                                
                                                <span class="text">{{$data->zip_code}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

  