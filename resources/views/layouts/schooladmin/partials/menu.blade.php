    <!-- Dashboard Nav Start -->
    <div id="offcanvasDashboard" class="dashboard-nav offcanvas offcanvas-start">

        <!-- Dashboard Nav Wrapper Start -->
        <div class="dashboard-nav__wrapper">
            <!-- Dashboard Nav Header Start -->
            <div class="offcanvas-header dashboard-nav__header dashboard-nav-header">

                <div class="dashboard-nav__toggle d-xl-none">
                    <button class="toggle-close" data-bs-dismiss="offcanvas"><i class="fal fa-times"></i></button>
                </div>

                <div class="dashboard-nav__logo">
                    <a class="logo" href="#"><img src="assets/images/sd-logo.png" alt="Logo" width="148"
                            height="62"></a>
                </div>

            </div>
            <!-- Dashboard Nav Header End -->

            <!-- Dashboard Nav Content Start -->
            <div class="offcanvas-body dashboard-nav__content navScroll">

                <!-- Dashboard Nav Menu Start -->
                <div class="dashboard-nav__menu">
                    <ul class="dashboard-nav__menu-list">
                        <li>
                            <a href="school-admin.php">
                                <i class="edumi edumi-layers"></i>
                                <span class="text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="school-admin-schools.php">
                                <i class="edumi edumi-heart"></i>
                                <span class="text">My Schools<span class="text-primary"> (2)</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('schooladmin.notifications') }}>
                                <i class="edumi
                                edumi-star"></i>
                                <span class="text">Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="school-admin-support.php">
                                <i class="edumi edumi-user-support"></i>
                                <span class="text">Support</span>
                            </a>
                        </li>

                    </ul>
                    <ul class="dashboard-nav__menu-list">
                        <li>
                            <span class="dashboard-nav__title text-primary">Leads Centre</span>
                        </li>
                        <!-- <li>
                            <a href="school-admin-lead-center.php">
                                <i class="edumi edumi-users"></i>
                                <span class="text">New Leads</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="school-admin-lead-center.php">
                                <i class="edumi edumi-youtuber"></i>
                                <span class="text">All Leads <span class="text-primary">(3 New)</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="school-admin-lead-export.php">
                                <i class="edumi edumi-checklist"></i>
                                <span class="text">Export Leads</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="dashboard-nav__menu-list">
                        <li>
                            <span class="dashboard-nav__title text-primary">Renewals & Billings</span>
                        </li>
                        <!-- <li>
                            <a href="school-admin-lead-center.php">
                                <i class="edumi edumi-users"></i>
                                <span class="text">New Leads</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="school-admin-billing.php">
                                <i class="edumi edumi-open-book"></i>
                                <span class="text">Subscriptions</span>
                            </a>
                        </li>
                        <li>
                            <a href="school-admin-subscription-history.php">
                                <i class="edumi edumi-wallet"></i>
                                <span class="text">Payment History</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="dashboard-nav__menu-list">
                        <li>
                            <span class="dashboard-nav__title text-primary">Account Setting</span>
                        </li>
                        <li>
                            <a href="school-admin-users.php">
                                <i class="edumi edumi-group"></i>
                                <span class="text">Manage Users</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="school-admin-edit-profile.php">
                                <i class="edumi edumi-content-writing"></i>
                                <span class="text">Edit Profile</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="school-admin-edit-profile.php">
                                <i class="edumi edumi-settings"></i>
                                <span class="text">Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php">
                                <i class="edumi edumi-sign-out"></i>
                                <span class="text">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Nav Menu End -->

            </div>
            <!-- Dashboard Nav Content End -->

            <div class="offcanvas-footer"></div>
        </div>
        <!-- Dashboard Nav Wrapper End -->

    </div>
    <!-- Dashboard Nav End -->
