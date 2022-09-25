

<?php $__env->startSection('title'); ?>Create-Users
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
		<?php $__env->endSlot(); ?>
	<?php if (isset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0)): ?>
<?php $component = $__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0; ?>
<?php unset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

	<div class="container-fluid">
    <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Edit Profile Information</h5>
						<span>Please Make sure fill all the necessary info before clicking on Submit button</span>
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
                             <input type="text" value="Tomi" class="form-control">
                           </div>
                           </div>
                            <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Middle Name</label>
                             <input type="text" value="Idris" class="form-control">
                           </div>
                           </div>
                           <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Last Name</label>
                             <input type="text" value="Ikenna" class="form-control">
                           </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">E-mail</label>
                             <input type="text" value="ayosalako1@gmail.com" class="form-control">
                           </div>
                           </div>
                           <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Contact Number</label>
                             <input type="number" value="07042717242" class="form-control">
                           </div>
                           </div>
                            <div class="col-md-4">
                           <div class="form-group">
                             <label class="form-label">Date of Birth</label>
                             <input type="date" value="19/05/1999" class="form-control">
                           </div>
                           </div>
                           <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Enter Home address</label>
                            <input type="text" value="CLose 44 H100, Lekki Lagos" class="form-control">
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
                          <h6 class="box-title text-success mb-0">Business Info</h6>
                          <hr class="my-15">
                          <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Nature of Business</label>
                              <input type="text" value="IT" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Business address</label>
                              <input type="text" value="Lekki Lakes phase 1"class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                           <div class="form-group">
                             <label class="form-label">City</label>
                             <input type="text" value="Lagos" class="form-control">
                           </div>
                           </div>
                           <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" value="lagos" class="form-control">
                          </div>
                          </div>
                        </div>

                          <br>
                          <h6 class="box-title text-success mb-0">Next of Kin Info</h6>
                          <hr class="my-15">
                          <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Next of Kin First Name</label>
                              <input type="text" value="Tolu Adedoja" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Next of Kin Last Name</label>
                              <input type="text" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Next of Kin Address</label>
                              <input type="text" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                           <div class="form-group">
                             <label class="form-label">Relationship</label>
                             <select class="form-control">
                               <option>Sibling</option>
                               <option>Spouse</option>
                               <option>Parent</option>
                               <option>Guardian</option>
                               <option>Children</option>
                               <option>Friend</option>
                             </select>
                           </div>
                           </div>
                           <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control">
                          </div>
                          </div>
                        </div>

                       <!-- /.box-body -->
                       <!-- <div class="box-footer">
                         <button type="button" class="btn btn-primary-light me-1">
                           <i class="ti-trash"></i> Cancel
                         </button>
                         <button type="submit" class="btn btn-primary">
                           <i class="ti-save-alt"></i> Save
                         </button>
                       </div> -->
                     </div>
                     </div>

                   </div>
							</div>
							<div class="tab">
								<div class="form-group m-t-15">
									<label for="exampleFormControlInput1">Email address</label>
									<input class="form-control" id="exampleFormControlInput1" type="email" placeholder="name@example.com" />
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" />
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirm Password</label>
									<input class="form-control" id="exampleInputcPassword1" type="password" placeholder="Enter again" />
								</div>
							</div>
							<div class="tab">
								<div class="form-group">
									<label for="exampleFormControlInput1">Birthday:</label>
									<input class="form-control digits" type="date" />
								</div>
								<div class="form-group">
									<label class="control-label">Age</label>
									<input class="form-control digits" placeholder="Age" type="text" />
								</div>
								<div class="form-group">
									<label class="control-label">Have Passport</label>
									<input class="form-control digits" placeholder="Yes/No" type="text" />
								</div>
							</div>
							<div class="tab">
								<div class="form-group">
									<label class="control-label">Country</label>
									<input class="form-control mt-1" type="text" placeholder="Country" required="required" />
								</div>
								<div class="form-group">
									<label class="control-label">State</label>
									<input class="form-control mt-1" type="text" placeholder="State" required="required" />
								</div>
								<div class="form-group">
									<label class="control-label">City</label>
									<input class="form-control mt-1" type="text" placeholder="City" required="required" />
								</div>
							</div>
							<div>
								<div class="text-end btn-mb">
									<button class="btn btn-secondary" id="prevBtn" type="button" onclick="nextPrev(-1)">Previous</button>
									<button class="btn btn-primary" id="nextBtn" type="button" onclick="nextPrev(1)">Save Changes</button>
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


  <?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/form-wizard/form-wizard.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\theme\resources\views/admin/apps/edit_profile.blade.php ENDPATH**/ ?>