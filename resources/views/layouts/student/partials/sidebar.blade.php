<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{ route('schools.index') }}" class="logo logo-large"><img src="{{asset('assets')}}/images/logo1.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
            <a href="{{ route('schools.index') }}" class="logo logo-small"><img src="{{asset('assets')}}/images/small_logo.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('student.home') }}">
                        <img src="{{asset('assets')}}/images/svg-icon/dashboard.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{asset('assets')}}/images/svg-icon/basic.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Query</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ url('student/query')}}/{{Auth::user()->id}}">All Queries</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{asset('assets')}}/images/svg-icon/ecommerce.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>History</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ url('student/history/list')}}/{{Auth::user()->id}}">Your History</a></li>
                    </ul>
                </li>
                @if(!auth()->user()->login_panel=='facebook'||!auth()->user()->login_panel=='google')
                <li>
                    <a href="javaScript:void();">
                        <img src="{{asset('assets')}}/images/svg-icon/ecommerce.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Profile Settings</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('student.password.view')}}">Change Password</a></li>
                        <li><a href="{{ url('student/changedetail/')}}/{{Auth::user()->id}}">Change Details</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->
<!-- Start Rightbar -->