<?php $__env->startPush('breadcrumb'); ?>
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">Sample Page</li>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/chartist.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/date-picker.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/prism.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vector-map.css')); ?>">
<?php $__env->stopPush(); ?>
    <?php $__env->startSection('content'); ?>
      <?php echo $__env->yieldContent('breadcrumb-list'); ?>
      <!-- Container-fluid starts-->
      <div class="container-fluid dashboard-default-sec">
        <div class="row">
          <div class="col-xl-6 col-md-6 box-col-6 des-xl-50">
            <div class="card profile-greeting" style="border-radius:10px;">
              <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                <h3 class="font-light">Hello Timi</h3>
              <h6 class="font-light" style="font-size:15px;">You do not have an on-going savings plan at the moment. <br><br>Review all our savings plans to select one suitable for you.</h6>
               </div>
               <div class="col-md-4">
                 <img src="assets/images/17.png" class="lesb">
                 <br>
                 <br>
               </div>
               <button class="btn btn-light">Start Saving now</button>

              </div>
              </div>
              <div class="confetti">
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>

              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 box-col-6 des-xl-50">
            <div class="card o-hidden border-0">
              <div class="bg-primary b-r-4 card-body" style="background-color:#24695c !important">
                <div class="media static-top-widget">
                  <div class="align-self-center text-center"><i data-feather="briefcase"></i></div>
                  <div class="media-body">
                    <span class="m-0">Savings Balance</span>
                    <h4 class="mb-0">N<span class="counter">6,659</span></h4>
                    <i class="icon-bg" data-feather="briefcase"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-xl-3 col-md-6 box-col-6 des-xl-50" > -->
             <div class="card o-hidden border-0" style="border-radius:10px;">
                <div class="bg-danger b-r-4 card-body">
                  <div class="media static-top-widget">
                    <div class="align-self-center text-center"><i data-feather="layers"></i></div>
                    <div class="media-body">
                      <span class="m-0">Loan Balance</span>
                      <h4 class="mb-0">N<span class="counter">5,659</span></h4>
                      <i class="icon-bg" data-feather="layers"></i>
                    </div>
                  </div>
                </div>
              </div>
            <!-- </div> -->

          </div>
        </div>


        <div class="row">
          <div class="col-xl-12 box-col-12 des-xl-100 dashboard-sec">
            <div class="card income-card">
              <div class="card-header">
                <div class="header-top d-sm-flex align-items-center">
                  <h5>All Transaction Report</h5>
                  <div class="center-content">
                    <p class="d-sm-flex align-items-center"><span class="font-primary m-r-10 f-w-700">N859,000</span><i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>Total amount Overall</p>
                  </div>
                  <div class="setting-list">
                    <ul class="list-unstyled setting-option">
                      <li>
                        <div class="setting-primary"><i class="icon-settings"></i></div>
                      </li>
                      <li><i class="view-html fa fa-code font-primary"></i></li>
                      <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                      <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                      <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                      <li><i class="icofont icofont-error close-card font-primary"></i></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-12 box-col-12">
        				<div class="card">
        					<div class="card-body chart-block">
        						<div class="flot-chart-container">
        							<div class="flot-chart-placeholder" id="flot-categories"></div>
        						</div>
        					</div>
        				</div>
        			</div>
            </div>
          </div>

              <!-- <div class="col-xl-12 recent-order-sec">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <h5>All Payments</h5>
                      <table class="table table-bordernone">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Payment Category</th>
                            <th>Payment Method</th>
                            <th>Rate</th>
                            <th>
                              <div class="setting-list">
                                <ul class="list-unstyled setting-option">
                                  <li>
                                    <div class="setting-primary"><i class="icon-settings"></i></div>
                                  </li>
                                  <li><i class="view-html fa fa-code font-primary"></i></li>
                                  <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                                  <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                                  <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                                  <li><i class="icofont icofont-error close-card font-primary"></i></li>
                                </ul>
                              </div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="<?php echo e(asset('assets/images/dashboard/product-1.png')); ?>" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Yellow New Nike shoes</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>16 August</p>
                            </td>
                            <td>
                              <p>54146</p>
                            </td>
                            <td><img class="img-fluid" src="<?php echo e(asset('assets/images/dashboard/graph-1.png')); ?>" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$210326</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="<?php echo e(asset('assets/images/dashboard/product-2.png')); ?>" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Sony Brand New Headphone</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>2 October</p>
                            </td>
                            <td>
                              <p>32015</p>
                            </td>
                            <td><img class="img-fluid" src="<?php echo e(asset('assets/images/dashboard/graph-2.png')); ?>" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$548526</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="<?php echo e(asset('assets/images/dashboard/product-3.png')); ?>" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Beautiful Golden Tree plant</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>21 March</p>
                            </td>
                            <td>
                              <p>12548</p>
                            </td>
                            <td><img class="img-fluid" src="<?php echo e(asset('assets/images/dashboard/graph-3.png')); ?>" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$589565</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="<?php echo e(asset('assets/images/dashboard/product-4.png')); ?>" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Marco M Kely Handbeg</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>31 December</p>
                            </td>
                            <td>
                              <p>15495</p>
                            </td>
                            <td><img class="img-fluid" src="<?php echo e(asset('assets/images/dashboard/graph-4.png')); ?>" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$125424 </p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="<?php echo e(asset('assets/images/dashboard/product-5.png')); ?>" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Being Human Branded T-Shirt                                                    </span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>26 January</p>
                            </td>
                            <td>
                              <p>56625</p>
                            </td>
                            <td><img class="img-fluid" src="<?php echo e(asset('assets/images/dashboard/graph-5.png')); ?>" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$112103</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#recent-order" title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>


        </div>
      </div>
      <!-- Container-fluid Ends-->

      <?php $__env->startPush('scripts'); ?>
      <script src="<?php echo e(asset('assets/js/chart/flot-chart/excanvas.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/chart/flot-chart/jquery.flot.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/chart/flot-chart/jquery.flot.time.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/chart/flot-chart/jquery.flot.categories.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/chart/flot-chart/jquery.flot.stack.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/chart/flot-chart/jquery.flot.pie.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/chart/flot-chart/jquery.flot.symbol.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/chart/flot-chart/flot-script.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/chart/knob/knob.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/chart/knob/knob-chart.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/prism/prism.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\theme\resources\views/admin/dashboard/default.blade.php ENDPATH**/ ?>