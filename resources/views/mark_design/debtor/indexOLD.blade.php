@extends('layout.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="sticky-bar col-md-12">
            <ul class="nav nav-bar text-white col-md-12" id="mark_page_menu">
                <li class="nav-item">
                    <a class="nav-link " href="#">Active</a>
                </li>
                @php
                $debt=App\Models\Debt::first();
                @endphp

                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">File</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Automations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Admin</a>
                </li>
            </ul>
        </div>
        
        <div class="card-body">

            <div class="card-body">
                <ul class="nav nav-tab" id="mark_prof_head_nav_card">

                    @php
                    $action_codes=App\Models\Client::first()->action_codes

                    @endphp
                    @forelse ($action_codes as $action_code)
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="@if($action_code->is_blinking) blinking @endif
                                                                    @if($action_code->is_bold) font-weight-bold @endif
                                                                    @if($action_code->is_strike_through) strike-through @endif
                                                                    @if($action_code->is_underline) underline @endif"
                                style="color:'{{$action_code->text_color}}';background-color: '{{$action_code->bg_color}}' !important;">
                                {{$action_code->name}}
                            </span>
                        </a>
                    </li>
                    @empty
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void()">No action codes!</a>
                    </li>
                    @endforelse
                </ul>

                <div class="row">
                    <div class="col-md-4" id="mark-design-dash-cards">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Debtor's Name</span>
                            </div>
                            {{-- <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="{{$debt->primary_debtor->name}}"> --}}
                            {{-- <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm"
                                value="{{dd($debt->debtors()->withPivot('tag')->where('tag', 'like', '%primary%')->first()->name)}}">
                            --}}
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm"
                                value="{{$debt->primary_debtor->first()->name}}">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Co Debtor(s)</span>
                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Category</span>
                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="">
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm wrap">Date Onboarded</span>

                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-md" value="">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Status</span>
                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Account Number</span>
                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="">
                        </div>

                    </div>
                    <div class="col-md-4" id="mark-design-dash-cards">

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Client</span>
                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="">
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm wrap">Collector</span>

                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-md" value="">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Current Claim Status</span>
                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Legal Standing</span>
                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" value="">
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm wrap">Current Balance Due</span>

                            </div>
                            <input type="text" class="form-control" readonly aria-label="Small"
                                aria-describedby="inputGroup-sizing-md" value="">
                        </div>
                    </div>
                    <div class="col-md-2" id="mark-design-dash-cards">
                        <h5>Account Summary <a href="#" data-toggle="modal" data-target="#detailed_account_summary"><i
                                    class="fa fa-eye" title="Account Summary Details"></i></a></h5>
                        <table class="table-striped table-responsive">
                            <thead>
                                <tr id="mark_design_table_th">
                                    <th>Description
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Principal
                                    <th>${{$debt->principal}}</th>
                                </tr>
                                <tr>
                                    <th>Interest
                                    <th>$1,200</th>
                                </tr>
                                <tr>
                                    <th>Sub Total
                                    <th>$46,200</th>
                                </tr>
                                <tr>
                                    <th>Paid
                                    <th>$40,000</th>
                                </tr>
                                <tr>
                                    <th>Balance
                                    <th>$6,200</th>
                                </tr>

                            </tbody>
                        </table>
                        <div class="card">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#transaction_modal"><i
                                    class="fa fa-usd"></i> New Payment</a>
                        </div>
                        <div class="card">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#adjustment_modal"><i
                                    class="fa fa-sliders"></i> Adjust balance</a>
                        </div>
                    </div>

                    {{-- RIGHT BAR --}}
                    <div class="col-md-2">
                        <ul class="navbar-nav account_menu" id="mark-design-dash-cards">
                            <li class="nav-item">
                                <a href="#" class=" btn3d btn btn-primary col-md-12" id="mark_nav_links-reminder"
                                    data-toggle="modal" data-target="#mark_reminders">Reminders</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class=" btn3d btn btn-warning col-md-12" data-toggle="modal"
                                    data-target="#action_codes" data-id="1" id="mark_nav_links">Action Codes</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class=" btn3d btn btn-success col-md-12" id="mark_nav_links-chat"
                                    onclick="changeDisplay(this.id);">To be determined</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class=" btn3d btn btn-success col-md-12" id="mark_nav_links-chat"
                                    onclick="changeDisplay(this.id);">To be determined</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class=" btn3d btn btn-success col-md-12" id="mark_nav_links-chat"
                                    onclick="changeDisplay(this.id);">To be determined</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
       

            <div class="card-body">
                <div class="row">
                    <ul class="nav nav-tab col-md-12" id="mark_prof_head_nav_card">

                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards" id="summary"
                                onclick="debtorTransaction(this.id)">Account At a Glance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards" id="debtor_account_notes"
                                onclick="debtorTransaction(this.id)">Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards" id="credit_card"
                                onclick="debtorTransaction(this.id)">Credit Card Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards" id="pay_plan"
                                onclick="debtorTransaction(this.id)">Payment Plan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards" id="transactions"
                                onclick="debtorTransaction(this.id)">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards" id="claims"
                                onclick="debtorTransaction(this.id)">Claims</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards" id="set_/_judgement"
                                onclick="debtorTransaction(this.id)">Settings/Judgements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#mark-design-dash-debtor-cards"><i
                                    class="fa fa-plus fa-sm"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="row d-flex mark-design-dash-cards" id="mark-design-dash-debtor-cards">
                    @include('mark_design.debtor.transaction')
                    @include('mark_design.debtor.account_at_a_glance')
                    @include('mark_design.debtor.claims')
                    @include('mark_design.debtor.credit_card_info')
                    @include('mark_design.debtor.notes')
                </div>
            </div> 
        </div>
    </div>
    @include('mark_design.debtor.account_summary')
    @include('mark_design.mark_reminders')
    @include('mark_design.action_codes')
    @endsection