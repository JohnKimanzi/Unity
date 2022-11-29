@extends('layout.mainlayout', ['title'=>'Debts'])
@section('content')
	
		<!-- Page Content -->
		<div class="content container-fluid">
		
			<!-- Page Header -->
			<div class="page-header">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">Debtors</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Debtors</li>
						</ul>
					</div>
					<div class="col-auto float-right ml-auto">
						{{-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_debtor"><i class="fa fa-plus"></i> Add debtor</a> --}}
						<a href="javascript:void(0)" class="btn add-btn" ><i class="fa fa-plus"></i> Add debtor</a>
						<div class="view-icons">
							<a data-toggle="tab" href="#grid" class="nav-link "><i class="fa fa-th"></i></a>
							<a data-toggle="tab" href="#list" class=" nav-link"><i class="fa fa-bars"></i></a>
						</div>
						
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			
			<!-- Search Filter -->
			<div class="row filter-row">
				<div class="col-sm-6 col-md-3">  
					<div class="form-group form-focus">
						<input type="text" class="form-control floating">
						<label class="focus-label">debtor ID</label>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">  
					<div class="form-group form-focus">
						<input type="text" class="form-control floating">
						<label class="focus-label">debtor Name</label>
					</div>
				</div>
				<div class="col-sm-6 col-md-3"> 
					<div class="form-group form-focus select-focus">
						<select class= "form-control floating"> 
							<option selected>--select--</option>
							<option>Below $500</option>
							<option>Between $500- $1000</option>
							<option>Between $1000- $5000</option>
							<option>Above $10000</option>
						</select>
						<label class="focus-label">Account balance</label>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">  
					<a href="#" class="btn btn-success btn-block"> Search </a>  
				</div>
			</div>
			<!-- Search Filter -->
			<div class="row">
				<div class="col-lg-12">
					<div class="tab-content profile-tab-content">
						{{-- Grid View --}}
						<div id="grid" class="tab-pane fade   ">
							<div  class="row staff-grid-row">
								@include('debts.grid_view')
							</div>
							{{-- <span style="text-align:center">{{$debtors->links("pagination::bootstrap-4")}}</span> --}}
						</div>
						{{-- /Grid View --}}

						{{-- List view --}}
						<div id="list" class="tab-pane fade show active">
							@include('debts.list_view')
						</div>
						{{-- /List view --}}
					</div>
				</div>
			</div>
			
		</div>
		<!-- /Page Content -->
		
		<!-- Add debtor Modal -->
		
		<!-- /Add debtor Modal -->
		
		<!-- Edit debtor Modal -->
		
		<!-- /Edit debtor Modal -->
		
		<!-- Delete debtor Modal -->
		<div class="modal custom-modal fade" id="delete_debtor" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-header">
							<h3>Delete debtor</h3>
							<p>Are you sure want to delete?</p>
						</div>
						<div class="modal-btn delete-action">      
							<div class="row">
								<div class="col-6">
									<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete disabled</a>
								</div>	
								<div class="col-6">
									<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete debtor Modal -->


	

@endsection			
       