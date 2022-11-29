@extends('layout.mainlayout', ['title'=>'Debtor profile'])
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row allign-items-center">
                <div class="col">
                    <h3 class="page-title">{{$debt->primary_debtors->first()->name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                        <li class="breadcrumb-item active">Debtor Profile</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#transaction_modal"><i class="fa fa-usd"></i> New Payment</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#adjustment_modal"><i class="fa fa-sliders"></i> Adjust balance</a>
                    
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="card col-md-4 border-secondary">

                        <div class="card-header bg-secondary text-white">
                            <div class="chat-body">
                                <div class="chat-bubble">
                                    <div class="chat-content">
                                        <span class="card-heding">Princiapl: {{$debt->principal}}</span> <span class="chat-time">8:35 am</span>
                                        <p>Linked Balance: $300</p>
                                        <p>Will you tell me something about yourself? </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            
                            <ul class="list-unstyled">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipiscing elit</li>
                                <li>Integer molestie lorem at massa</li>
                                <li>Facilisis in pretium nisl aliquet</li>
                                <li>Nulla volutpat aliquam velit
                                    <ul>
                                        <li>Phasellus iaculis neque</li>
                                        <li>Purus sodales ultricies</li>
                                        <li>Vestibulum laoreet porttitor sem</li>
                                        <li>Ac tristique libero volutpat at</li>
                                    </ul>
                                </li>
                                <li>Faucibus porta lacus fringilla vel</li>
                                <li>Aenean sit amet erat nunc</li>
                                <li>Eget porttitor lorem</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card col-md-4">
                        2
                    </div>
                    <div class="card col-md-4">
                        3
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{$debt->debtors->first()->first_name}}</h3>
                                            <h6 class="text-muted">{{'d'}}</h6>
                                            <p class="text-muted">{{"fg"}}</p>
                                            <div class="staff-id">Collector : {{'gfname'}}</div>
                                            <div class="small doj text-muted">Birth date : {{date('d M Y', strtotime($debt->debtors->first()->dob))}}</div>
                                            <div class="staff-msg"><a class="btn btn-custom" href="chat">Send Message</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Primary phone:</div>
                                                <div class="text"><a href="">{{'$debtor->primary_phone->number'}}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Secondary phone:</div>
                                                <div class="text"><a href="">{{'$debtor->primary_phone->number'}}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Personal email:</div>
                                                <div class="text"><a href=""></a>{{'$debtor->primary_email->address'}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">{{'$debtor->primary_address->address'}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Gender:</div>
                                                <div class="text">{{'$debtor->gender'}}</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit">
                                <a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active"><span>Trasactions</span></a></li>
                        <li class="nav-item"><a href="#log" data-toggle="tab" class="nav-link">Notes <small class="text-danger">(Activity log)</small></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="tab-content">
            <!-- Transactions Info Tab -->
            <div id="emp_profile" class="pro-overview tab-pane fade show active">
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-header">
                                <h3 class="card-title">Transaction details </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th >Date</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Collector</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Principal</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Interest</th>
                                        <th scope="col">Att. fee</th>
                                        <th scope="col">Overpayment</th>
                                        <th scope="col">3rd party</th>
                                        <th scope="col">Advanced</th>
                                        <th scope="col">Agency</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    @php
                                        $transactions=App\Models\Transaction::all();
                                    @endphp
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <th scope="row">{{$transaction->transaction_date}}</th>
                                                <td>{{$transaction->transaction_type->name}}</td>
                                                <td>{{$transaction->Note}}</td>
                                                <td>{{$transaction->collector->name}}</td>
                                                <td>{{$transaction->amount}}</td>
                                                <td>{{$transaction->cost_distribution['principal']}}</td>
                                                <td>{{$transaction->Cost}}</td>
                                                <td>{{$transaction->Interest}}</td>
                                                <td>{{$transaction->Att}}</td>
                                                <td>{{$transaction->Overpayment}}</td>
                                                <td>{{0}}</td>
                                                <td>{{$transaction->Advanced}}</td>
                                                <td>{{$transaction->Agency}}</td>
                                                <td>{{$transaction->Client}}</td>
                                                <td>{{$transaction->debt->balance}}</td>
                                                <td>{{'Action'}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Transactions Info Tab -->

            <!-- Notes Info Tab -->
            <div id="log" class="pro-overview tab-pane fade ">
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-header">
                                <h3 class="card-title">Notes <a href="#" class="edit-icon" data-toggle="modal" data-target="#employment_info_modal"><i class="fa fa-pencil"></i></a></h3>
                            </div>
                            <div class="card-body">
                                No notes
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
            <!-- /notes Info Tab -->            
        </div>
    </div>
    <!-- Transaction Modal -->
    <div id="transaction_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('transactions.new_transaction_form')
                </div>
            </div>
        </div>
    </div>
    <!-- /Transaction Modal -->
    <!-- Transaction Modal -->
    <div id="adjustment_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Balance Adjustment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adjustment
                </div>
            </div>
        </div>
    </div>
    <!--Transaction Modal -->
    <!-- /Page Content -->

@endsection