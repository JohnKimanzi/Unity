@extends('layout.mainlayout', ['title'=>"Dashboard"])
@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="welcome-box">
                    <div class="welcome-img">
                        <img alt="" src="img/user.jpg">
                    </div>
                    <div class="welcome-det">
                        <h3>My dashboard </h3>
                        <p>{{ date('D d M Y', strtotime(now())) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 ">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-bullseye"></i></span>
                        <div class="dash-widget-info">
                            <h3><a href="{{ url('lead_list') }}">{{ App\Models\Lead::All()->Count() }}</a></h3>
                            <span>Leads</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 ">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                        <div class="dash-widget-info">
                            <h3><a
                                    href="{{ url('users') }}">{{ App\Models\User::All()->where('role', 'agent')->Count() }}</a>
                            </h3>
                            <span>Agents</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Total Revenue</h3>
                                <div id="bar-charts">
                                    <h3>$3,249,043</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Sales Overview</h3>
                                <div id="line-charts">

                                    <h3>Closed Deals <span>354</span></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->

        <!-- Statistics Widget -->
        <div class="row">
            <div class="col-md-6 col-lg-6  d-flex">
                <div class="card flex-fill dash-statistics">
                    <div class="card-body">
                        <h5 class="card-title">Statistics<span><button class="btn btn-success float-right"
                                    onclick="printContent('print_stats');" id="printer"><i
                                        class="fa fa-print"></i></button></span></h5>
                        <div class="stats-list" id="print_stats">
                            <div class="stats-info">
                                <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
                                        aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 31%"
                                        aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Completed Campaigns <strong>85 <small>/ 112</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                        aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Closed Deals <strong>190 <small>/ 212</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 62%"
                                        aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Open Deals <strong>22 <small>/ 212</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 22%"
                                        aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6  d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h4 class="card-title">Task Statistics <span><button class="btn btn-success float-right"
                                    id="printer" onclick="printContent('print_tasks');"><i
                                        class="fa fa-print"></i></button></span></h4>
                        <div id="print_tasks">
                            <div class="statistics">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>Total Tasks</p>
                                            <h3>385</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>Overdue Tasks</p>
                                            <h3>19</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30"
                                    aria-valuemin="0" aria-valuemax="100">30%</div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 22%"
                                    aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 24%"
                                    aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14"
                                    aria-valuemin="0" aria-valuemax="100">21%</div>
                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14"
                                    aria-valuemin="0" aria-valuemax="100">10%</div>
                            </div>
                            <div>
                                <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Completed Tasks <span
                                        class="float-right">166</span></p>
                                <p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Inprogress Tasks <span
                                        class="float-right">115</span></p>
                                <p><i class="fa fa-dot-circle-o text-success mr-2"></i>On Hold Tasks <span
                                        class="float-right">31</span></p>
                                <p><i class="fa fa-dot-circle-o text-danger mr-2"></i>Pending Tasks <span
                                        class="float-right">47</span></p>
                                <p class="mb-0"><i class="fa fa-dot-circle-o text-info mr-2"></i>Review Tasks
                                    <span class="float-right">5</span></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">

            <div class="col-md-12 col-lg-12  d-flex">
                <div class="card col md-12">
                    <div class="card-body">
                        <h3 class="card-title">Lead conversion rates<span><button class="btn btn-success float-right"
                                    id="printer" onclick="printContent('print_rates');"><i
                                        class="fa fa-print"></i></button></span></h3>
                        <div class="table-responsive" id="print_rates">
                            <table class="table table-nowrap custom-table mb-0 overflow-y">
                                <thead>
                                    <tr>
                                        <th>Month
                                        <th>Medicals No
                                        <th>Rate
                                        <th>Non Medical No
                                        <th>Rate</th>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>January
                                        <td>30
                                        <td>25%
                                        <td>45
                                        <td>55%</td>
                                    </tr>
                                    <tr>
                                        <td>February
                                        <td>30
                                        <td>25%
                                        <td>45
                                        <td>55%</td>
                                    </tr>
                                    <tr>
                                        <td>March
                                        <td>30
                                        <td>25%
                                        <td>45
                                        <td>55%</td>
                                    </tr>
                                    <tr>
                                        <td>April
                                        <td>30
                                        <td>25%
                                        <td>45
                                        <td>55%</td>
                                    </tr>
                                    <tr>
                                        <td>May
                                        <td>30
                                        <td>25%
                                        <td>45
                                        <td>55%</td>
                                    </tr>
                                    <tr>
                                        <td>June
                                        <td>30
                                        <td>25%
                                        <td>45
                                        <td>55%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
@endsection
