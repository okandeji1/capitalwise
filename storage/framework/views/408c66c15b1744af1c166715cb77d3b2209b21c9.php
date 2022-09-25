<?php $__env->startSection('title'); ?>Advance init
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
		<?php $__env->endSlot(); ?>

	<?php echo $__env->renderComponent(); ?>

	<div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header pb-0">
                <h5>Savings History</h5>
                <div class="box-header with-border">
                  <br>
                  <h6 class="box-title">Current Savings Balance:N105,000.00</h6>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="display" id="advance-1">
                    <thead>
                      <tr class="text-dark">
                        <th>Date</th>
                        <th>Amount(N)</th>
                        <th>Savings Category</th>
                        <th>Payment Method</th>
                        <th>Verified by</th>
                        <th>Payment type</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2022/03/24</td>
                        <td class="text-dark">20,000</td>
                        <td>Normal Savings</td>
                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Deposit</td>
                        <td style="color:green;">Successful</td>
                      </tr>
                      <tr>
                        <td>2022/02/27</td>
                        <td class="text-dark">34,000</td>
                        <td>Normal Savings</td>
                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Deposit</td>
                        <td style="color:red;">Pending</td>
                      </tr>
                      <tr>
                        <td>2022/02/26</td>
                        <td class="text-dark">20,000</td>
                        <td>Target Savings</td>
                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Withdrawal</td>
                        <td style="color:green;">Successful</td>
                      </tr>
                      <tr>
                        <td>2022/03/25</td>
                        <td class="text-dark">18,000</td>
                        <td>Normal Savings</td>
                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Deposit</td>
                        <td style="color:green;">Successful</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


            </div>
          </div>
        </div>
    </div>

	<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/okandeji/Documents/Projects/cap_wise/resources/views/admin/apps/savings-history.blade.php ENDPATH**/ ?>