@extends('layout.mainlayout')
@section('content')

        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- top navbar -->
            <div class="row">
                <div class="col-md-12">
                    <div class="welcome-box">

                        <div class="welcome-det">
                            <ul class="nav nav-tabs text-white col-md-12" id="mark_page_menu">
                                <li class="nav-item">
                                    <a class="nav-link " href="#">Active</a>
                                </li>

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
                    </div>
                </div>
            </div>
            <!-- end top Navbar -->

            <div class="row">
                <div class="col-md-10 ">
                    <!-- start of second Menu -->
                    <ul class="nav nav-tab" id="mark_prof_head_nav_card">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>

                    </ul>
                    <!-- end of second emenu -->
                    <!-- lead info cards -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex ">
                            {{-- @foreach ($lead as $leads) --}}
                            <div class="card col md-4 d-flex">
                                <div class="card-header">
                                    <ul>
                                        <li>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Category</span>
                                                </div>
                                                <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                                                    value="57489">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Category</span>
                                                </div>
                                                <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                                                    value="75849">
                                            </div>
                                        </li>
                                    </ul>
                                    
                                </span>
                                </div>
                                <div class="card-body">
                                    @include('debtors.debtor_bio')
                                </div>
                            </div>
                            <div class="card col md-4">
                                <div class="card-header">Lead Address<span><i
                                            class="fa fa-pencil float-right"></i></span></div>
                                <div class="card-body">

                                    @include('debtors.lead_address')
                                </div>
                            </div>
                            <div class="card col md-4">
                                <div class="card-header">Lead Contact Persons<span><i
                                            class="fa fa-pencil float-right"></i></span></div>
                                <div class="card-body">
                                    @include('debtors.contact_persons')
                                </div>
                            </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <!-- right side bar -->
                <div class="col-md-2 ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="btn btn-primary col-md-12" id="mark_nav_links">Reminders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-success col-md-12" id="mark_nav_links">Chat Box</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-warning col-md-12" id="mark_nav_links">Action Codes</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-danger col-md-12" id="mark_nav_links">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-secondary col-md-12" id="mark_nav_links">ID Status</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-primary col-md-12" id="mark_nav_links">To be Determined</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-success col-md-12" id="mark_nav_links">To be Determined</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-danger col-md-12" id="mark_nav_links">To be Determined</a>
                        </li>


                    </ul>
                </div>
                <!-- end of right sidebar -->
            </div>
            <div class="row">
                <div class="col-md-10">
                    <ul class="nav nav-tab" id="mark_prof_head_nav_card">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-plus"></i></a>
                        </li>


                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="col-md-12 d-flex">
                        <div class="col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" value="">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" value="">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" value="">
                            </div>
                            <div class="input-group date input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Date</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" value=""><i class="fa fa-calendar"></i>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <textarea maxlength="50px" class="form-control"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 d-flex">
                    <ul class="nav nav-tab col-md-12" id="mark_prof_head_nav_card">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <ul class="nav nav-tab col-md-12" id="">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card-body">
                        <p>coming up soon. Suggest Content</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Page Content -->
@endsection
