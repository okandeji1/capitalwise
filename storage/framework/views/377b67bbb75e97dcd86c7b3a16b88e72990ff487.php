<?php $__env->startSection('title'); ?>Create-Users
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>

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
                                     <option>Normal Savings</option>
                                     <option>Target Savings</option>
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


  <?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/form-wizard/form-wizard.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/okandeji/Documents/Projects/cap_wise/resources/views/admin/apps/setup-savings.blade.php ENDPATH**/ ?>