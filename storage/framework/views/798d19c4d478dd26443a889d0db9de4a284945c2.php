

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


  <?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/form-wizard/form-wizard.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\theme\resources\views/admin/apps/create-user.blade.php ENDPATH**/ ?>