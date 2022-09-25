<header class="main-nav">
  <br>
  <br>
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">Change</span></div>
        <a href="profile/edit_profile"> <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6></a>
        <p class="mb-0 font-roboto">Customer</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <!-- <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li> -->
                    <li>
                        <a class="nav-link <?php echo e(prefixActive('/dashboard')); ?>" href="<?php echo e(route('index')); ?>"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/users')); ?>" href="javascript:void(0)"><i data-feather="users"></i><span>Users</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/users')); ?>;">
                          <li><a href="<?php echo e(route('create-user')); ?>" class="<?php echo e(routeActive('create-user')); ?>">Create Users</a></li>
                            <li><a href="<?php echo e(route('create-customer')); ?>" class="<?php echo e(routeActive('create-customer')); ?>">Create Customer</a></li>
                            <li><a href="<?php echo e(route('manage-users')); ?>" class="<?php echo e(routeActive('manage-users')); ?>">Manage Users</a></li>
                            <!-- <li><a href="<?php echo e(route('manage-users')); ?>" class="<?php echo e(routeActive('avatars')); ?>">User History</a></li> -->
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/savings')); ?>" href="javascript:void(0)"><i data-feather="edit"></i><span>Savings</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/savings')); ?>;">
                            <li><a href="<?php echo e(route('setup-savings')); ?>" class="<?php echo e(routeActive('setup-savings')); ?>">Setup Savings</a></li>
                            <li><a href="<?php echo e(route('deposit')); ?>" class="<?php echo e(routeActive('deposit')); ?>">Deposit Funds</a></li>
                            <li><a href="<?php echo e(route('savings-history')); ?>" class="<?php echo e(routeActive('savings-history')); ?>">Savings History</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/loans')); ?>" href="javascript:void(0)"><i data-feather="layers"></i><span>Loans</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/loans')); ?>;">
                            <li><a href="<?php echo e(route('apply')); ?>" class="<?php echo e(routeActive('apply')); ?>">Apply for Loans</a></li>
                            <li><a href="<?php echo e(route('repay_loan')); ?>" class="<?php echo e(routeActive('repay_loan')); ?>">Repay Loan</a></li>
                            <li><a href="<?php echo e(route('loan_history')); ?>" class="<?php echo e(routeActive('loan_history')); ?>">Loan History</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/profile')); ?>" href="javascript:void(0)"><i data-feather="edit-3"></i><span>Profile Management</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/profile')); ?>;">
                            <li><a href="<?php echo e(route('edit_profile')); ?>" class="<?php echo e(routeActive('edit_profile')); ?>">Edit Profile</a></li>
                            <li><a href="<?php echo e(route('change_password')); ?>" class="<?php echo e(routeActive('change_password')); ?>">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/settings')); ?>" href="javascript:void(0)"><i data-feather="settings"></i><span>Settings</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/settings')); ?>;">
                          <li><a href="<?php echo e(route('website_settings')); ?>" class="<?php echo e(routeActive('website_settings')); ?>">Website Settings</a></li>
                            <li><a href="<?php echo e(route('app_settings')); ?>" class="<?php echo e(routeActive('app_settings')); ?>">Mobile App Settings</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/reports')); ?>" href="javascript:void(0)"><i data-feather="trending-up"></i><span>Reports</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/animation')); ?>;">
                            <li><a href="<?php echo e(route('all_reports')); ?>" class="<?php echo e(routeActive('all_reports')); ?>">View all Reports</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link <?php echo e(prefixActive('/animation')); ?>" href="javascript:void(0)"><i data-feather="log-out"></i><span>Log Out</span></a>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<?php /**PATH /home/okandeji/Documents/Projects/cap_wise/resources/views/layouts/admin/partials/sidebar.blade.php ENDPATH**/ ?>