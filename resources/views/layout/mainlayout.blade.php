<!DOCTYPE html>
<html lang="en">
	<head>
    	@include('layout.partials.head')
		@stack('styles')
  	</head>

  	<body class="mini-sidebar">
		<div class="page-wrapper">
			@include('layout.partials.flash')
			{{-- 
				<-- Activate for loading animation -->
				<div class="page-loading">
					<img src="{{asset('img/loading.gif')}}" alt="">
				</div>
			--}}

			{{-- <div id="pre-loader" role="status"></div> --}}
			
			@include('layout.partials.nav-min')
			@include('layout.partials.header')

			@yield('content')

			<div class="modal" tabindex="-1" id="time-record-modal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Time Tracker</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							@include('time_records.user_active_timesheets', ['allowed_time_record_types'=>App\Models\TimeRecordType::all()])
						</div>
							
					</div>
				</div>
			</div>
		</div>
		@include('chat.chat_init')
		@include('layout.partials.footer-scripts')
	
		@yield('custom_script') {{--remove this in future so as to use stack--}}
  	</body>
</html>