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
						<h5>Create New User</h5>
						<span>Please Make sure fill all the necessary info before clicking on next button</span>
					</div>
					<div class="card-body">
						<form class="form-wizard" id="regForm" action="#" method="POST">
							<div class="tab">
                <div class="col-xl-12">

                   <div class="card">
                        <div class="box-body">
                         <h6 class="box-title text-success mb-0">Personal Info</h6>
                         <hr class="my-15">
                         <div class="row">
                           <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">First Name</label>
                             <input type="text"   class="form-control">
                           </div>
                           </div>
                            <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Middle Name</label>
                             <input type="text" class="form-control">
                           </div>
                           </div>
                           <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Last Name</label>
                             <input type="text" class="form-control">
                           </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">E-mail</label>
                             <input type="text" class="form-control">
                           </div>
                           </div>
                           <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Contact Number</label>
                             <input type="number" class="form-control">
                           </div>
                           </div>
                            <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Date of Birth</label>
                             <input type="date" class="form-control">
                           </div>
                           </div>
                           <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Enter Home address</label>
                            <input type="text" class="form-control">
                          </div>
                          </div>
                          <div class="col-md-6">
                         <div class="form-group">
                           <label class="form-label">Select Role</label>
                           <select class="form-control">
                             <option>--Select Role--</option>
                             <option>Admin</option>
                             <option>Agents</option>
                             <option>Accounts</option>
                             <option>Customer</option>
                           </select>
                         </div>
                         </div>
                         </div>
                          <br>


                     </div>
                     </div>

                   </div>
							</div>
							<div>
								<div class="text-end btn-mb">
									<button class="btn btn-primary" id="nextBtn" type="button" onclick="nextPrev(1)">Submit</button>
								</div>
							</div>
							<!-- Circles which indicates the steps of the form:-->
							<div class="text-center"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
							<!-- Circles which indicates the steps of the form:-->
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
