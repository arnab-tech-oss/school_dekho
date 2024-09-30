<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{ route('schools.index') }}" class="logo logo-large"><img src="{{ asset('assets') }}/images/logo1.svg"
                    class="img-fluid"
                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
            <a href="{{ route('schools.index') }}" class="logo logo-small"><img
                    src="{{ asset('assets') }}/images/small_logo.svg" class="img-fluid"
                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('lead.dashboard') }}">
                        <img src="{{ asset('assets') }}/images/svg-icon/dashboard.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Counselors</span><i
                            class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('lead.counselor.list') }}">View All counselors</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>
                            Leads</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('lead.lead.list') }}">View All Leads</a></li>
                        <li><a href="{{ route('lead.location.list') }}">Lead By Location</a></li>
                        <li><a href="{{ route('lead.lead.assign') }}">Assign leads</a></li>
                        <li><a href="{{ route('lead.interested.list') }}">Interested Leads</a></li>
                        <li><a href="{{ route('lead.lead.admission') }}">Admitted Leads</a></li>
                        <li><a href="{{ route('lead.lead.schoolwise') }}">School Wise Leads</a></li>
                        <li><a href="{{ route('lead.notinterested.list') }}">Not Interested Leads</a></li>
                        <li><a href="{{ route('lead.transfer') }}">Transferred Leads</a></li>
                        <li><a href="{{ route('lead.lead.pending') }}">Pending Leads</a></li>
                        <li><a href="{{ route('lead.school.applications') }}">School Application Leads</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets') }}/images/svg-icon/ecommerce.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Schools</span><i
                            class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('lead.schooldashboard.list') }}">View All Dashboards</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets') }}/images/svg-icon/ecommerce.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Profile</span><i
                            class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Change Password</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->
<!-- Start Rightbar -->
