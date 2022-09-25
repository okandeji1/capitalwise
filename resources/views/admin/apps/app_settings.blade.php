@extends('layouts.admin.master')

@section('title')Website Settings
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
						<h5>Website Settings</h5>
						<span>Edit Mobile App settings</span>
					</div>
					<div class="card-body">
            <form class="form">
							<div class="box-body">
								<div class="row">

								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Update Loan percentage interest (N)</label>
									  <input type="text" value="8%" class="form-control input-air-primary">
									</div>
								  </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Update Max loan tenor</label>
                  <input type="text" value="1 month" class="form-control input-air-primary">

                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Update Min loan tenor</label>
                <input type="text" value="4 months" class="form-control input-air-primary">
              </div>
            </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-danger">Cancel</button> -->
                <button type="submit" class="btn btn-success pull-right">Update</button>
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
