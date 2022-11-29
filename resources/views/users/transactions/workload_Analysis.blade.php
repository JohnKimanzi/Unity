<div class="col-md-12 col-lg-12 col-sm-12" style="display: none" id="workload">
                                                <table class="table table-striped responsive " id="workload_table" >
                                                    <thead>
                                                    <tr><th>Leads Assigned<th>
                                                   
                                                    @php
                                                    if($user->hasRole('agent')){
                                                    $lead_count=$user->leads->count();
                                                    }
                                                    else{
                                                        $lead_count=$user->closed_deals->count();
                                                    }
                                                    @endphp
                                                   
                                                    {{$lead_count}}

                                                    </th><tr>
                                                    <tr><th>Leads worked on<th>0</th><tr>
                                                    <tr><th>Pending Leads<th>0</th><tr>
                                                    </thead>
                                                </table>  
                                            </div>