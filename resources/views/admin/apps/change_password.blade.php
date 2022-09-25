@extends('layouts.admin.master')

@section('title')Change Password
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
						<h5>Change Password</h5>
						<span>Please enter all fields before changing your password.</span>
					</div>
					<div class="card-body">
            <form class="form">
							<div class="box-body">
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Enter Current Password</label>
									  <input type="password" class="form-control input-air-primary">
									</div>
								  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Enter New Password</label>
									  <input type="password" class="form-control input-air-primary">
									</div>
								  </div>

                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Confirm New Password</label>
									  <input type="password" class="form-control input-air-primary">
									</div>
								  </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-danger">Cancel</button> -->
                <button type="submit" class="btn btn-success pull-right">Change Password</button>
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
