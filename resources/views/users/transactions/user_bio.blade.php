<div class=" col-md-12 col-sm-12 col-lg-12" id="biodata" style="display:block;">
    <div class="row">
                        <div class="card col-md-12 col-sm-12 col-lg-12"> 
                                <div class="card-header">
                                    <h4> Bio<span><i class="fa fa-pencil float-right"></i></span></h4>
                                </div>
                                <div class="card-body">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="100">
                                            <h4 id="iduser"></h4>
                                            <p class="text-secondary mb-1">{{$user->role}}</p>
                                            <p class="text-muted font-size-sm">{{$user->address}}</p>
                                    
                                            <ul class="personal-info" id="lead_info_no_edit">
                                            <li>
                                            <span class="title">Date of Birth</span>
                                            <span class="text">{{$user->dob}}</span></li>
                                            <li>
                                            <span class="title">Gender</span>
                                            <span class="text">{{$user->gender}}</span></li>
                                        
                                            <li>
                                            <span class="title">Email</span>
                                            <span class="text">{{$user->email}}</span></li>
                                        
                                            <li>
                                            <span class="title">Phone</span>
                                            <span class="text">{{$user->phone1}}</span></li>
                                       
                                            <li>
                                            <span class="title">Alternate Phone</span>
                                            <span class="text">{{$user->phone2}}</span></li>
                                        
                                            <li>
                                            <span class="title">Direct Supervisor</span>
                                            <span class="text">"None"</span></li>
                                       
                                            <li>
                                            <span class="title">Team</span>
                                            <span class="text">{{$user->team_id}}</span></li>
                                            <li>  
                                        </ul>  
                                </div>   
                        </div>
                    <!-- <div class="card col-md-6 col-sm-6 col-lg-6">
                        <div class="card-header">
                            <h4>Payroll Details</h4>
                        </div>
                        <div class="card-body">
                            
                        <ul class="personal-info" id="lead_info_no_edit">
                                            <li>
                                            <span class="title">Date of Birth</span>
                                            <span class="text">{{$user->dob}}</span></li>
                                            <li>
                                            <span class="title">Gender</span>
                                            <span class="text">{{$user->gender}}</span></li>
                                        
                                            <li>
                                            <span class="title">Email</span>
                                            <span class="text">{{$user->email}}</span></li>
                                        
                                            <li>
                                            <span class="title">Phone</span>
                                            <span class="text">{{$user->phone1}}</span></li>
                                       
                                            <li>
                                            <span class="title">Alternate Phone</span>
                                            <span class="text">{{$user->phone2}}</span></li>
                                        
                                            <li>
                                            <span class="title">Direct Supervisor</span>
                                            <span class="text">"None"</span></li>
                                       
                                            <li>
                                            <span class="title">Team</span>
                                            <span class="text">{{$user->team_id}}</span></li>
                                            <li>  
                                        </ul> 
                        </div>
                    </div> -->
    </div>
</div>