<style>
    .rounded {
        border-radius: 200%;
        color: aliceblue;
        background-color: #4040a1;
        width: 30px;
        height: 20px;
        text-align: center;
        margin-top: 5px;
    }

    .abc {
        display: flex;
    }
</style>
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{ route('schools.index') }}" class="logo logo-large"><img
                    src="{{ asset('assets') }}/images/logo1.svg" class="img-fluid"
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
                    <a href="{{ route('admin.home') }}">
                        <img src="{{ asset('assets') }}/images/svg-icon/dashboard.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>School</span><i
                            class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu"> 
                        <li><a href="{{ route('admin.school.list') }}">View All School</a></li>
                        @if (Auth::user()->role == 1)
                            <li><a href="{{ route('admin.school.applied.list') }}">Complete School</a></li>
                            <li><a href="{{ route('admin.school.incomplete.list') }}">Incomplete School</a></li>
                            <li><a href="{{ route('admin.school.claimed.list') }}">Claimed School</a></li>
                            <li><a href="{{ route('admin.school.verified.list') }}">Blue Tick Schools</a></li>
                            <li><a href="{{ route('admin.school.admission.list') }}">School Admission</a></li>
                            <li><a href="{{ route('admin.school.trending.list') }}">School Trending</a></li>
                            <li><a href="{{ route('admin.school.approved.list') }}">Approved School</a></li>
                            <li><a href="{{ route('admin.mou.list') }}">Mou Schools</a></li>
                            <li><a href="{{route('admin.mou.free.list')}}">Free Mou Schools</a></li>
                            <li style="display: flex;"><a href="{{ route('admin.claim.query.list') }}">Add School
                                    Queries</a></li>
                            <li style="display: flex;"><a href="{{ route('admin.claim.register.query.list') }}">Claim
                                    Registered Queries</a></li>
                            <li><a href="{{ route('admin.school.add.dashboard') }}"> dashboard for school</a></li>
                        @endif
                        {{-- <li><a href="{{ url('admin/addschool') }}">Add School</a>
                </li> --}}
                        {{-- <li><a href="basic-ui-kits-badges.html">Approved School</a></li>
                        <li><a href="basic-ui-kits-buttons.html">Pending School</a></li>
                        <li><a href="{{ url('admin/addschool') }}">Add School</a></li> --}}
                    </ul>
                </li>
                @if (Auth::user()->role == 1)
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/advanced.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Students</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.students.all') }}">View All Students</a></li>
                            <li><a href="{{ route('admin.student.query') }}">Student Queries </a></li>
                            <li><a href="{{ route('admin.student.website.query') }}">Website Enquiries</a></li>
                            {{-- <li><a href="{{ route('admin.queries.download') }}">Download Queries(xlsx)</a>
            </li> --}}
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/advanced.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Leads</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.leads.all') }}">View All Leads</a></li>
                            <li><a href="{{ route('admin.leads.location') }}">Leads By Location</a></li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="javaScript:void();">
                        <img src="{{ asset('assets') }}/images/svg-icon/ecommerce.svg" class="img-fluid"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Profile</span><i
                            class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ url('/admin/admin/changepassword') }}">Change Password</a></li>
                    </ul>
                </li>
                @if (Auth::user()->role == 1)
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Articles</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('admin.interview.index')}}">View All Interview</a></li>
                            <li><a href="{{ route('admin.article.list') }}">View All Articles</a></li>
                            <li><a href="{{route('admin.article.category.list')}}">Article Categories</a></li>
                            <li><a href="{{ route('admin.article.writer.list')}}">View All Article Writers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Supports</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.ticket.list') }}">View All Tickets</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Blogs</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.blog.list') }}">View All Blogs</a></li>
                            <li><a href="{{ route('admin.blog.tag.list') }}">Tags</a></li>
                            <li><a href="{{ route('admin.blog.category.list') }}">Categories</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/basic.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Careers</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.career.job.list')}}">View All Jobs</a></li>
                            <li><a href="{{ route('admin.career.job.add')}}">Add job</a></li>
                            <li><a href="{{ route('admin.career.job.applications')}}">Applications</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/advanced.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Enquiry</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.enquiry.front') }}">Front enquiry</a></li>
                            <li><a href="{{ route('admin.enquiry.councillor') }}">Councillor Enquiry</a></li>
                            <li><a href="{{ route('admin.contact.list') }}">Contact Enquiry</a></li>
                            <li><a href="{{ route('admin.blog.lead.list') }}">Blog Leads</a></li>
                            <li><a href="{{ route('admin.school.applications') }}">School Application Leads</a></li>
                            <li><a href="{{ route('admin.school.details.page.all.leads') }}">School Details Page Leads</a></li>
                            <li><a href="{{ route('admin.school.new.application.list')}}">School Application Leads <span style="background-color: aquamarine;border-radius: 5px;padding: 5px">New</span></a></li>
                            <li><a href="{{ route('admin.all.enquiry.manual.add')}}">All Enquiry Manual Update</a></li>
                        </ul>
                    </li>
                    <li> 
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/advanced.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Export</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.lead.export.schoolwise') }}">School Wise Export</a></li>
                            <li><a href="{{ route('admin.lead.export.location.wise') }}">Location Wise Export</a></li>
                            <li><a href="{{ route('admin.lead.export.schoolwise.autotransfer') }}">School Auto Lead Export</a></li>
                            <li><a href="{{ route('admin.lead.export.locationwise.autotransfer')}}">Location Wise Auto Lead Export</a></li>
                        </ul>
                    </li>
                    <li> 
                        <a href="javaScript:void();">
                            <img src="{{ asset('assets') }}/images/svg-icon/advanced.svg" class="img-fluid"
                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Event</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{ route('admin.complimentary.list') }}">Complimentary Event List</a></li>
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
