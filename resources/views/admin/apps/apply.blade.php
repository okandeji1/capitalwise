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
						<h5>Apply for a new Loan</h5>
						<span>Please enter all fields before applying for a new loan</span>
					</div>
					<div class="card-body">
            <form class="form">
							<div class="box-body">
								<div class="row">
								  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">Select loan type</label>
                      <select class="form-select input-air-primary">
                      <option> -- </option>
                      <option>Personal Loan</option>
                      <option>Payday Loan</option>
                      <option>MSME Loan</option>
                      <option>Auto Loan</option>
                      <option>Asset & Appliance Loan</option>
                      <option>Lpo Loan</option>
                      </select>
                    </div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Loan Amount (N)</label>
									  <input type="text" class="form-control input-air-primary">
									</div>
								  </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Select Loan Tenor</label>
                  <select class="form-select input-air-primary">
                  <option> -- </option>
                  <option>One Month</option>
                  <option>Two Months</option>
                  <option>Three Months</option>
                  <option>Four Months</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Enter reason for Loan</label>
                <input type="text" class="form-control input-air-primary">
              </div>
            </div>

            <div class="form-check mb-6">
              <input class="form-check-input" id="validationFormCheck1" type="checkbox" required="" />
              <label class="form-check-label" for="validationFormCheck1">I agree to the <a href="#">Terms & Conditions</a> of this loan</label>
            </div>
            </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-danger">Cancel</button> -->
                <button type="submit" class="btn btn-success pull-right">Apply Now</button>
              </div>
							</div>
							<!-- /.box-body -->
					  </div>
					</div>
				</div>
			</div>
		</div>

	</div>


  @push('scripts')
	<script src="{{asset('assets/js/form-wizard/form-wizard.js')}}"></script>
	@endpush

@endsection
