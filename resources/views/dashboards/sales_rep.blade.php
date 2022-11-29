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
						<h3>My dashboard</h3>
						<p>{{date('D d M Y', strtotime(now()))}}</p>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-4 col-sm-4 col-lg-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
						<div class="dash-widget-info" id="view_leads" onclick="View_leads()">
							<h3>{{App\Models\Lead::All()->where('status','!=','hot')->Count()}}</h3></a>
							<span>Total interactions</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 ">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
						<div class="dash-widget-info">
							<h3>{{App\Models\Lead::All()->where('business_types','=','medical')->Count()}}</h3>
							<span>Untouched leads from previous months</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 ">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
						<div class="dash-widget-info">
							<h3>2</h3>
							<span>My active clients</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 ">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
						<div class="dash-widget-info">
							<h3>110</h3>
							<span>Warm leads</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 ">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
						<div class="dash-widget-info">
							<h3>50</h3>
							<span>Hot deals</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 ">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
						<div class="dash-widget-info">
							<h3>40</h3>
							<span>Closed Hot deals</span>
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
								<h4 class="card-title">WorkLoad Analysis - {{now()->format('M Y')}} </h4>
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
								<div class="col-lg-3 col-md-3 col-sm-6 text-center text-dark">
									<div class="stats-box mb-4">
										<p>Total Interactions</p>
										<h3><i class="la la-tasks"></i> 300</h3>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 text-center text-success">
									<div class="stats-box mb-4">
										<p>Reachables</p>
										<h3><i class="la la-phone"></i> 200</h3>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 text-center text-primary">
									<div class="stats-box mb-4">
										<p>Warm conversion</p>
										<h3><i class="fa fa-mug-hot"></i> 100</h3>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 text-center text-danger">
									<div class="stats-box mb-4">
										<p>Hot Conversion</p>
										<h3><i class="la la-fire"></i> 50</h3>
									</div>
								</div>

							</div>
						</div>
						<div class="progress mb-4">
							<div class="progress-bar bg-success" role="progressbar" style="width: 33%"
								aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
							<div class="progress-bar bg-warning" role="progressbar" style="width: 33%"
								aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
							<div class="progress-bar bg-danger" role="progressbar" style="width: 34%" aria-valuenow="14"
								aria-valuemin="0" aria-valuemax="100">21%</div>
						</div>
						<div>
							<p class="text-dark">Assigned Leads <span class="float-right">166</span></p>
							<p class="text-success">Closed interactions <span class="float-right">109</span></p>
							<p class="text-warning"></i>Pending interactions <span class="float-right">47</span></p>
							<p class="text-danger"></i>Not touched <span class="float-right">12</span></p>
							<hr>
							<div class="stats-info">
								<p>Conversion rate <strong> 20%</small></strong></p>
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
				<div class="card">
					<div class="card-body">
						<h3 class="card-title text-center">My Lead conversion rates</h3>
						<div class="table-responsive">
							<table class="table table-nowrap custom-table mb-0 overflow-y text-center">
								<thead>
									<tr>
										<th>Month</th>
										<th>Warm conversions</th>
										<th>% Rate</th>
										<th>Hot conversions</th>
										<th>% Rate</th>
								</thead>
								<tbody>

									<tr>
										<td>{{now()->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(1)->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(2)->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(3)->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(4)->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(5)->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(6)->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(7)->format('M Y')}}
										<td>30
										<td>25%
										<td>45
										<td>55%</td>
									</tr>
									<tr>
										<td>{{now()->subMonth(8)->format('M Y')}}
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
		</div>
	</div>


@endsection