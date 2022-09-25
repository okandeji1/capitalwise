

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


  <?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/form-wizard/form-wizard.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\theme\resources\views/admin/apps/apply.blade.php ENDPATH**/ ?>