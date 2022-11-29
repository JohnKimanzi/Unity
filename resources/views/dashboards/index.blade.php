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
							<span class="dash-widget-icon"><i class="fa fa-cog"></i></span>
							<div class="dash-widget-info" id="view_leads" onclick="View_leads()">
								<h3 class="text-danger">Error!</h3>
								<span>Your account is not well set up. Please see the admin so that your account can be set
									up correctly.<br> ...but if you are the admin, well, phew is what we say :-)</span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
@endsection