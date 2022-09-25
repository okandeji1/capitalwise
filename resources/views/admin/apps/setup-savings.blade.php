@extends('layouts.admin.master')

@section('title')Create-Users
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
		@endslot
	@endcomponent

	<div class="container-fluid">
    <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Setup Savings</h5>
						<span>Please Make sure fill all the necessary info to begin saving your money.</span>
					</div>
					<div class="card-body">
						<form class="form-wizard" action="#" method="POST">
							<div class="tab">
                <div class="col-xl-12">

                   <div class="">
                     <div class="row">
               				<div class="col-lg-12 col-12">
               					  <div class="box">
               						<form class="form">
               							<div class="box-body">
               								<div class="row">
               								  <div class="col-md-6">
                                   <div class="form-group">
                                     <label class="form-label">Select Savings Category</label>
                                     <select class="form-select">
                                     <option>--Select option --</option>
                                     <option>Capwise Target Savings</option>
                                     <option>Capwise Savings Invest</option>
                                     </select>
                                   </div>
               								  </div>
               								  <div class="col-md-6">
               									<div class="form-group">
               									  <label class="form-label">Amount (N)</label>
               									  <input type="number" class="form-control" >
               									</div>
               								  </div>
               								</div>
               								<div class="row">
               								  <div class="col-md-6">
               									<div class="form-group">
               									  <label class="form-label">Savings Frequency</label>
                                   <select class="form-select">
                                   <option>--Select option --</option>
                                   <option>Daily</option>
                                   <option>Weekly</option>
                                   <option>Monthly</option>
                                   <option>Quarterly</option>
                                   </select>
               									</div>
               								  </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label">Enter Savings Period</label>
                                   <select class="form-select">
                                   <option>--Select option --</option>
                                   <option>30 days</option>
                                   <option>60 days</option>
                                   <option>90 days</option>
                                   <option>180 days</option>
                                   <option>360 days</option>
                                   </select>
                                </div>
                                </div>
               								</div>
               							</div>
               							<!-- /.box-body -->
               							<div class="box-footer">
               								<button type="button" class="btn btn-primary-light me-1">
               								  <i class="ti-trash"></i> Cancel
               								</button>
               								<button type="submit" class="btn btn-primary">
               								  <i class="ti-save-alt"></i> Start Saving
               								</button>
               							</div>
               						</form>
               					  </div>
               					  <!-- /.box -->
               				</div>
               		    </div>
                     </div>

                   </div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

	</div>


  @push('scripts')
	<script src="{{asset('assets/js/form-wizard/form-wizard.js')}}"></script>
	@endpush

@endsection
