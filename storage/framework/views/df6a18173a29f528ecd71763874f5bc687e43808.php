

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

	<?php if (isset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0)): ?>
<?php $component = $__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0; ?>
<?php unset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

	<div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header pb-0">
                <h5>Manage Users</h5>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="display" id="advance-1">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td>Cara Stevens</td>
                        <td>cara@gmail.com</td>
                        <td>07042717427</td>
                        <td>Admin</td>
                        <td>202212/06</td>
                        <td>
                          <button class="btn btn-success" type="button">view</button>
                        </td>
                      </tr>

                      <tr>
                        <td>Hermione Butler</td>
                        <td>Hermione@gmail.com</td>
                        <td>08026612698</td>
                        <td>Agent</td>
                        <td>2022/03/21</td>
                        <td>
                            <button class="btn btn-success" type="button">view</button>
                        </td>
                      </tr>
                      <tr>
                        <td>Lael Greer</td>
                        <td>lael@gmail.com</td>
                        <td>08037281229</td>
                        <td>Agent</td>
                        <td>2022/02/27</td>
                        <td>
                            <button class="btn btn-success" type="button">view</button>
                        </td>
                      </tr>
                      <tr>
                        <td>Jonas Alexander</td>
                        <td>Jonas@gmail.com</td>
                        <td>0902615281</td>
                        <td>Customer</td>
                        <td>2022/07/14</td>
                        <td>
                            <button class="btn btn-success" type="button">view</button>
                        </td>
                      </tr>
                      <tr>
                        <td>Shad Decker</td>
                        <td>ShadD@gmail.com</td>
                        <td>0812621809</td>
                        <td>Customer</td>
                        <td>2022/11/13</td>
                        <td>
                            <button class="btn btn-success" type="button">view</button>
                        </td>
                      </tr>
                      <tr>
                        <td>Michael Bruce</td>
                        <td>micheal@gmail.com</td>
                        <td>0712805412</td>
                        <td>Customer</td>
                        <td>2022/06/27</td>
                        <td>
                            <button class="btn btn-success" type="button">view</button>
                        </td>
                      </tr>
                      <tr>
                        <td>Donna Snider</td>
                        <td>donna@gmail.com</td>
                        <td>09162612809</td>
                        <td>Customer</td>
                        <td>2022/01/25</td>
                        <td>
                            <button class="btn btn-success" type="button">view</button>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\theme\resources\views/admin/apps/manage-users.blade.php ENDPATH**/ ?>