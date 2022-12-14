<div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="<?php echo e(route('index')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/capitalwise_L.png')); ?>"   alt=""></a></div>
      <!-- <div class="dark-logo-wrapper"><a href="<?php echo e(route('index')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/capitalwise_L.png')); ?>" alt=""></a></div> -->
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
    </div>
    <div class="left-menu-header col">
      <ul class="visib">
      <b>CAPITAL WISE DYNAMIC PAY LIMITED</b>
      </ul>
    </div>
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <!-- <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li> -->

        <li class="onhover-dropdown">
          <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
          <ul class="notification-dropdown onhover-show-div">
            <li>
              <p class="f-w-700 mb-0">You have 3 Notifications<span class="pull-right badge badge-primary badge-pill">4</span></p>
            </li>
            <li class="noti-primary">
              <div class="media">
                <span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                <div class="media-body">
                  <p>Payment processing </p>
                  <span>10 minutes ago</span>
                </div>
              </div>
            </li>
            <li class="noti-secondary">
              <div class="media">
                <span class="notification-bg bg-light-secondary"><i data-feather="check-circle"> </i></span>
                <div class="media-body">
                  <p>Loan Request</p>
                  <span>1 hour ago</span>
                </div>
              </div>
            </li>
            <li class="noti-success">
              <div class="media">
                <span class="notification-bg bg-light-success"><i data-feather="file-text"> </i></span>
                <div class="media-body">
                  <p>Withdrawal Initiated</p>
                  <span>3 hours ago</span>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <!-- <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li> -->
        <li class="onhover-dropdown p-0">
          <button class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Log out</button>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
<?php /**PATH /home/okandeji/Documents/Projects/cap_wise/resources/views/layouts/admin/partials/header.blade.php ENDPATH**/ ?>