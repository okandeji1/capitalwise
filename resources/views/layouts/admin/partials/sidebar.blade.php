<header class="main-nav">
  <br>
  <br>
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
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
                        <a class="nav-link {{ prefixActive('/dashboard') }}" href="{{route('index')}}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/users') }}" href="javascript:void(0)"><i data-feather="users"></i><span>Users</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/users') }};">
                          <li><a href="{{ route('create-user')}}" class="{{routeActive('create-user')}}">Create Users</a></li>
                            <li><a href="{{ route('create-customer')}}" class="{{routeActive('create-customer')}}">Create Customer</a></li>
                            <li><a href="{{ route('manage-users')}}" class="{{routeActive('manage-users')}}">Manage Users</a></li>
                            <!-- <li><a href="{{ route('manage-users') }}" class="{{routeActive('avatars')}}">User History</a></li> -->
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/savings') }}" href="javascript:void(0)"><i data-feather="edit"></i><span>Savings</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/savings') }};">
                            <li><a href="{{ route('setup-savings')}}" class="{{routeActive('setup-savings')}}">Setup Savings</a></li>
                            <li><a href="{{ route('deposit')}}" class="{{routeActive('deposit')}}">Deposit Funds</a></li>
                            <li><a href="{{ route('savings-history') }}" class="{{routeActive('savings-history')}}">Savings History</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/loans') }}" href="javascript:void(0)"><i data-feather="layers"></i><span>Loans</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/loans') }};">
                            <li><a href="{{ route('apply') }}" class="{{routeActive('apply')}}">Apply for Loans</a></li>
                            <li><a href="{{ route('repay_loan') }}" class="{{routeActive('repay_loan')}}">Repay Loan</a></li>
                            <li><a href="{{ route('loan_history') }}" class="{{routeActive('loan_history')}}">Loan History</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/profile') }}" href="javascript:void(0)"><i data-feather="edit-3"></i><span>Profile Management</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/profile') }};">
                            <li><a href="{{ route('edit_profile') }}" class="{{routeActive('edit_profile')}}">Edit Profile</a></li>
                            <li><a href="{{ route('change_password') }}" class="{{routeActive('change_password')}}">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/settings') }}" href="javascript:void(0)"><i data-feather="settings"></i><span>Settings</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/settings') }};">
                          <li><a href="{{ route('website_settings') }}" class="{{routeActive('website_settings')}}">Website Settings</a></li>
                            <li><a href="{{ route('app_settings') }}" class="{{routeActive('app_settings')}}">Mobile App Settings</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/reports') }}" href="javascript:void(0)"><i data-feather="trending-up"></i><span>Reports</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/animation') }};">
                            <li><a href="{{ route('all_reports') }}" class="{{routeActive('all_reports')}}">View all Reports</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link {{ prefixActive('/animation') }}" href="javascript:void(0)"><i data-feather="log-out"></i><span>Log Out</span></a>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
