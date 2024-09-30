<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="#" class="logo logo-large"><img src="{{ asset('assets') }}/images/logo1.svg" class="img-fluid"
                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
            <a href="#" class="logo logo-small"><img src="{{ asset('assets') }}/images/small_logo.svg"
                    class="img-fluid"
                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('whatsapp.dashboard') }}">
                        <img src="{{ asset('assets') }}/images/svg-icon/dashboard.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Whatsapp
                            Message</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('whatsapp.list_message') }}">View All Messages</a></li>
                        <li><a href="{{ route('whatsapp.send') }}">Send Message</a>
                        </li>
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
