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
						<h5>Deposit to Savings</h5>
						<span>Please enter all fields to quickly deposit into your savings wallet.</span>
					</div>
					<div class="card-body">
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
									  <input type="text" class="form-control">
									</div>
								  </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Select Payment Method</label>
                  <select class="form-select">
                  <option>--Select option --</option>
                  <option>Credit/Debit Cards</option>
                  <option>Cash Payment</option>
                  <option>Bank Transfer</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Upload Payment Receipt <small style="color:red;">if you made a bank transfer</small></label>
                <input type="file" class="form-control">
              </div>
            </div>
            </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-success pull-right">Deposit Now</button>
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
