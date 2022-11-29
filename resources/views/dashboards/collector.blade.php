@extends('layout.mainlayout', ['title'=>"Dashboard"])
@section('content')

	<!-- Page Content -->
	<div class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="welcome-box">
					<div class="welcome-img">
						<img alt="user image" src="img/user.jpg">
					</div>
					<div class="welcome-det">
						<h3>My dashboard</h3>
						<p>{{date('D d M Y', strtotime(now()))}}</p>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="card col-md-6  border-info">
				<div class="card-header row text-white bg-info">
					Call Summary
				</div>
				<div class=" card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="card dash-widget">
								<div class="card-body bg-info">
									<span class="dash-widget-icon"><i class="fa fa-headset"></i></span>
									<div class="dash-widget-info" id="view_leads">
										2370<small>/42179</small></a><hr>
										<span>All-time Calls</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card dash-widget">
								<div class="card-body bg-success">
									<span class="dash-widget-icon"><i class="fa fa-headset"></i></span>
									<div class="dash-widget-info" id="view_leads">
										170<small>/170</small></a><hr>
										<span>Yesterday  Calls</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card dash-widget">
								<div class="card-body bg-danger">
									<span class="dash-widget-icon"><i class="fa fa-headset"></i></span>
									<div class="dash-widget-info" id="view_leads">
										10<small>/180</small></a><hr>
										<span> Today Calls</span>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6 ">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-phone-volume"></i></span>
									<div class="dash-widget-info">
										<h3>{{App\Models\Lead::All()->where('business_types','=','medical')->Count()}}</h3>
										<span>Reachable Yesterday</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 ">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-phone-volume"></i></span>
									<div class="dash-widget-info">
										<h3>{{App\Models\Lead::All()->where('business_types','=','medical')->Count()}}</h3>
										<span>Reachable Today</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-phone-slash"></i></span>
									<div class="dash-widget-info">
										<h3>{{App\Models\Lead::All()->where('business_types','=','medical')->Count()}}</h3>
										<span>Unreachable Yesterday</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-phone-slash"></i></span>
									<div class="dash-widget-info">
										<h3>{{App\Models\Lead::All()->where('business_types','=','medical')->Count()}}</h3>
										<span>Unreachable Today</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="card col-md-3 border-primary">
				<div class="card-header row text-white bg-primary">
					Collections Overview
				</div>
				<div class="card-body ">
					<div class="col-md-12">
						<div class="card dash-widget">
							<div class="card-body bg-warning">
								<span class="dash-widget-icon"><i class="la la-dollar"></i></span>
								<div class="dash-widget-info">
									<h3><i class='fa fa-dollar text-bold'></i> 110 <small>/200</small></h3>
									<span>Last Month Total</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="card dash-widget">
							<div class="card-body bg-danger">
								<span class="dash-widget-icon"><i class="la la-dollar"></i></span>
								<div class="dash-widget-info">
									<h3><i class='fa fa-dollar text-bold'></i> 50<small>/500</small></h3>
									<span>Yesterday</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="card dash-widget">
							<div class="card-body bg-success">
								<span class="dash-widget-icon"><i class="la la-dollar"></i></span>
								<div class="dash-widget-info">
									<i class='fa fa-dollar text-bold'></i> 400<small>/200</small><hr>
									<span>Today</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="card dash-widget">
							<div class="card-body bg-purple">
								<span class="dash-widget-icon"><i class="la la-trophy"></i></span>
								<div class="dash-widget-info">
									<i class='fa fa-dollar text-bold'></i> 5000<small>/10000</small>
									<hr>
									<span>Monthly  target</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card col-md-3 border-info">
				<div class="card-header row text-white bg-info">
					Accounts Notated
				</div>
				<div class="card-body">
					<div class="col-md-12 ">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
								<div class="dash-widget-info">
									<h3>1223</h3>
									<span>All-time Notations</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
								<div class="dash-widget-info">
									<h3>242</h3>
									<span>Notations Yesterday</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
								<div class="dash-widget-info">
									<h3>23</h3>
									<span>Notations Today</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<div class="card dash-widget">
							<div class="card-body bg-purple">
								<span class="dash-widget-icon"><i class="la la-trophy"></i></span>
								<div class="dash-widget-info">
									600
									<hr>
									<span>Monthly  target</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row" id="statistics">
			<div class="col-md-12 col-lg-6 col-xl-6 d-flex">
				<div class="card flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<h4 class="card-header">WorkLoad Analysis - {{now()->format('M Y')}} </h4>
							</div>
							<div class="col-md-4 form-group">
								<select class='form-control' name="" id="">
									<option value="now()" selected>This month</option>
									<option value="now()->subMonth(1)">Last month</option>
									<option value='{{now()->subMonth(2)}}'>{{now()->subMonth(2)->format('M Y')}}
									</option>
									<option value='{{now()->subMonth(3)}}'>{{now()->subMonth(3)->format('M Y')}}
									</option>
									<option value='{{now()->subMonth(4)}}'>{{now()->subMonth(4)->format('M Y')}}
									</option>
									<option value='{{now()->subMonth(5)}}'>{{now()->subMonth(5)->format('M Y')}}
									</option>


								</select>
							</div>
						</div>

						<div class="statistics">
							<div class="row">
								<div class=" col-md-4 col-sm-6 text-center text-dark">
									<div class="stats-box mb-4">
										<p>Total Interactions</p>
										<h3><i class="la la-tasks"></i> 300</h3>
									</div>
								</div>
								<div class=" col-md-4 col-sm-6 text-center text-success">
									<div class="stats-box mb-4">
										<p>Reachables</p>
										<h3><i class="la la-phone"></i> 200</h3>
									</div>
								</div>
								<div class=" col-md-4 col-sm-6 text-center text-primary">
									<div class="stats-box mb-4">
										<p>Total Collections</p>
										<h3><i class="fa fa-dollar"></i> 100</h3>
									</div>
								</div>
								
							</div>
						</div>
						<div class="progress mb-4">
							<div class="progress-bar bg-success" role="progressbar" style="width: 6%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">6%</div>
							<div class="progress-bar bg-primary" role="progressbar" style="width: 47%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">47%</div>
							<div class="progress-bar bg-purple" role="progressbar" style="width: 12%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">12%</div>
							<div class="progress-bar bg-warning" role="progressbar" style="width: 23%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">23%</div>
							<div class="progress-bar bg-danger" role="progressbar" style="width: 34%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">12%</div>
						</div>
						<div>
							<p class="text-dark text-bold">Assigned Accounts <span class="float-right">100</span></p>
							<p class="text-success"></i>Closed Accounts <small>(fully collected)</small>  <span class="float-right">6</span></p>
							<p class="text-primary">Active Accounts <small>(still paying)</small> <span class="float-right">47</span></p>
							<p class="text-purple"></i>Escalations <small>(presented for review)</small><span class="float-right">12</span></p>
							<p class="text-warning"></i>Not Reachable <span class="float-right">23</span></p>
							<p class="text-danger"></i>Not Touched <span class="float-right">12</span></p>
							<hr>
							<div class="stats-info">
								<p>Average Collection <small>(Amount/account)</small>  <strong> 200$</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
										aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 ">
				<div class="card border-warning">
					<div class="card-header bg-warning">
							<h3 class=" text-center">My collections summary</h3>

						</div>
					<div class="card-body ">
						
						<div class="table-responsive">
							<table class="table table-nowrap custom-table mb-0 overflow-y text-center">
								<thead class="text-primary">
									<tr>
										<th>Month</th>
										<th><small>number of</small> <br>Interactions</th>
										<th><small>(amount in USD)</small><br>Collected  </th>
										<th><small>(amount/interaction)</small><br>Average </th>
								</thead>
								<tbody>

									@for ($i=0; $i<12; $i++)
										<tr>
											<td>{{now()->subMonths($i)->format('M Y')}}</td>
											<td>567<small>/500</small></td>
											<td>245<small>/500</small></td>
											<td>453<small>/500</small></td>
										</tr>
									@endfor
									
									
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection