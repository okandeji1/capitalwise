

<?php $__env->startSection('title'); ?>Change Password
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


  <?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/form-wizard/form-wizard.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\theme\resources\views/admin/apps/change_password.blade.php ENDPATH**/ ?>