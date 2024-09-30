@extends('layouts.frontend.app')
@push('css')
@endpush
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-04">
        <div class="page-banner__wrapper">
            <div class="page-banner__shape-01"></div>
            <div class="page-banner__shape-02"></div>
            <div class="page-banner__shape-03"></div>
            <div class="container">
                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('blog.list') }}">Blogs</a></li> --}}
                        <li class="breadcrumb-item active">Blogs</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->
                <!-- Page Banner Caption Start -->
                <div class="page-banner__caption-02">
                    <h2 class="page-banner__main-title-02">All Blogs</h2>
                </div>
                <!-- Page Banner Caption End -->
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->
    <!-- Offcanvas Start -->
    <div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu"
        style="background-image: url(assets/images/mobile-bg.jpg);">
        <div class="offcanvas-header bg-white">
            <div class="offcanvas-logo">
                <a class="offcanvas-logo__logo" href="#"><img src="assets/images/dark-logo.png" alt="Logo"></a>
            </div>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i class="fal fa-times"></i></button>
        </div>
        <div class="offcanvas-body">
            <nav class="canvas-menu">
                <ul class="offcanvas-menu">
                    <li><a class="active" href="#"><span>Home</span></a>
                        {{-- <ul class="mega-menu"> <li> <!-- Mega Menu Content Start --> <div class="mega-menu-content"> <div class="row"> <div class="col-xl-3"> <div class="menu-content-list"> <a href="index-main.html" class="menu-content-list__link">Main Demo <span class="badge hot">Hot</span></a> <a href="index-course-hub.html" class="menu-content-list__link">Course Hub</a> <a href="index-online-academy.html" class="menu-content-list__link">Online Academy <span class="badge hot">Hot</span></a> <a href="index-university.html" class="menu-content-list__link">University</a> <a href="index-education-center.html" class="menu-content-list__link">Education Center <span class="badge hot">Hot</span></a> </div> </div> <div class="col-xl-3"> <div class="menu-content-list"> <a href="index-language-academic.html" class="menu-content-list__link">Language Academic</a> <a href="index-single-instructor.html" class="menu-content-list__link">Single Instructor</a> <a href="index-dev.html" class="menu-content-list__link">Dev <span class="badge new">New</span></a> <a href="index-online-art.html" class="menu-content-list__link">Online Art <span class="badge new">New</span></a> </div> </div> <div class="col-xl-6"> <div class="menu-content-banner" style="background-image: url(assets/images/home-megamenu-bg.jpg);"> <h4 class="menu-content-banner__title">Achieve Your Goals With EduMall</h4> <a href="#" class="menu-content-banner__btn btn btn-primary btn-hover-secondary">Purchase now</a> </div> </div> </div> </div> <!-- Mega Menu Content Start --> </li> </ul> --}}
                    </li>
                    <li>
                        <a href="#"><span>Courses</span></a>
                        {{-- <ul class="sub-menu"> <li><a href="course-grid-01.html"><span>Grid Basic Layout</span></a></li> <li><a href="course-grid-02.html"><span>Grid Modern Layout</span></a></li> <li><a href="course-grid-left-sidebar.html"><span>Grid Left Sidebar</span></a></li> <li><a href="course-grid-right-sidebar.html"><span>Grid Right Sidebar</span></a></li> <li><a href="course-list.html"><span>List Basic Layout</span></a></li> <li><a href="course-list-left-sidebar.html"><span>List Left Sidebar</span></a></li> <li><a href="course-list-right-sidebar.html"><span>List Right Sidebar</span></a></li> <li><a href="course-category.html"><span>Category Page</span></a></li> <li> <a href="#"><span>Single Layout</span></a> <ul class="sub-menu"> <li><a href="course-single-layout-01.html"><span>Layout 01</span></a></li> <li><a href="course-single-layout-02.html"><span>Layout 02</span></a></li> <li><a href="course-single-layout-03.html"><span>Layout 03</span></a></li> <li><a href="course-single-layout-04.html"><span>Layout 04</span></a></li> </ul> </li> </ul> --}}
                    </li>
                    <li>
                        <a href="#"><span>Blog</span></a>
                        {{-- <ul class="sub-menu"> <li><a href="blog-grid-01.html"><span>Grid Basic Layout</span></a></li> <li><a href="blog-grid-02.html"><span>Grid Wide</span></a></li> <li><a href="blog-grid-left-sidebar.html"><span>Grid Left Sidebar</span></a></li> <li><a href="blog-grid-right-sidebar.html"><span>Grid Right Sidebar</span></a></li> <li><a href="blog-list-style-01.html"><span>List Layout 01</span></a></li> <li><a href="blog-list-style-02.html"><span>List Layout 02</span></a></li> <li> <a href="#"><span>Single Layouts</span></a> <ul class="sub-menu"> <li><a href="blog-details-left-sidebar.html"><span>Left Sidebar</span></a></li> <li><a href="blog-details-right-sidebar.html"><span>Right Sidebar</span></a></li> <li><a href="blog-details.html"><span>No Sidebar</span></a></li> </ul> </li> </ul> --}}
                    </li>
                    <li>
                        <a href="#"><span>Pages</span></a>
                        {{-- <ul class="sub-menu"> <li><a href="become-an-instructor.html"><span>Become an Instructor</span></a></li> <li> <a href="instructors.html"><span>Instructor</span></a> <ul class="sub-menu"> <li><a href="dashboard-my-courses.html"><span>My Courses</span></a></li> <li><a href="dashboard-announcement.html"><span>Announcements</span></a></li> <li><a href="dashboard-withdraw.html"><span>Withdrawals</span></a></li> <li><a href="dashboard-quiz-attempts.html"><span>Quiz Attempts</span></a></li> <li><a href="dashboard-question-answer.html"><span>Question & Answer</span></a></li> <li><a href="dashboard-assignments.html"><span>Assignments</span></a></li> <li><a href="dashboard-students.html"><span>My Students</span></a></li> </ul> </li> <li><a href="about.html"><span>About us</span></a></li> <li><a href="about-02.html"><span>About us 02</span></a></li> <li><a href="contact-us.html"><span>Contact us</span></a></li> <li><a href="contact-us-02.html"><span>Contact us 02</span></a></li> <li><a href="membership-plans.html"><span>Membership plans</span></a></li> <li><a href="faqs.html"><span>FAQs</span></a></li> <li><a href="404-page.html"><span>404 Page</span></a></li> <li> <a href="#"><span>Dashboard</span></a> <ul class="sub-menu"> <li><a href="dashboard-index.html"><span>Dashboard</span></a></li> <li><a href="dashboard-student-index.html"><span>Dashboard Student</span></a></li> <li><a href="dashboard-profile.html"><span>My Profile</span></a></li> <li><a href="dashboard-all-course.html"><span>Enrolled Courses</span></a></li> <li><a href="dashboard-wishlist.html"><span>Wishlist</span></a></li> <li><a href="dashboard-reviews.html"><span>Reviews</span></a></li> <li><a href="dashboard-my-quiz-attempts.html"><span>My Quiz Attempts</span></a></li> <li><a href="dashboard-purchase-history.html"><span>Purchase History</span></a></li> <li><a href="dashboard-settings.html"><span>Settings</span></a></li> </ul> </li> </ul> --}}
                    </li>
                    <li>
                        <a href="#"><span>Features</span></a>
                        {{-- <ul class="sub-menu"> <li><a href="#"><span>Events</span></a> <ul class="sub-menu"> <li><a href="event-grid-sidebar.html"><span>Event Listing 01</span></a></li> <li><a href="event-grid.html"><span>Event Listing 02</span></a></li> <li><a href="event-list.html"><span>Event Listing 03</span></a></li> <li><a href="event-list-sidebar.html"><span>Event Listing 04</span></a></li> <li> <a href="#"><span>Single Layouts</span></a> <ul class="sub-menu"> <li><a href="event-details-layout-01.html"><span>Layout 01</span></a></li> <li><a href="event-details-layout-02.html"><span>Layout 02</span></a></li> </ul> </li> </ul> </li> <li><a href="#"><span>Shop</span></a> <ul class="sub-menu"> <li><a href="shop-default.html"><span>Shop – Default</span></a></li> <li><a href="shop-left-sidebar.html"><span>Shop – Left Sidebar</span></a></li> <li><a href="shop-right-sidebar.html"><span>Shop – Right Sidebar</span></a></li> <li><a href="my-account.html"><span>My account</span></a></li> <li><a href="wishlist.html"><span>Wishlist</span></a></li> <li><a href="cart.html"><span>Cart</span></a></li> <li><a href="cart-empty.html"><span>Cart Empty</span></a></li> <li><a href="checkout.html"><span>Checkout</span></a></li> <li> <a href="#"><span>Single Layouts</span></a> <ul class="sub-menu"> <li><a href="shop-single-list-left-sidebar.html"><span>List – Left Sidebar</span></a></li> <li><a href="shop-single-list-right-sidebar.html"><span>List – Right Sidebar</span></a></li> <li><a href="shop-single-list-no-sidebar.html"><span>List – No Sidebar</span></a></li> <li><a href="shop-single-tab-left-sidebar.html"><span>Tabs – Left Sidebar</span></a></li> <li><a href="shop-single-tab-right-sidebar.html"><span>Tabs – Right Sidebar</span></a></li> <li><a href="shop-single-tab-no-sidebar.html"><span>Tabs – No Sidebar</span></a></li> </ul> </li> </ul> </li> <li><a href="zoom-meetings.html"><span>Zoom Meetings</span></a></li> <li><a href="zoom-meetings-single.html"><span>Zoom Meeting Single</span></a></li> </ul> --}}
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Header User Button Start -->
        <div class="offcanvas-user d-lg-none">
            <div class="offcanvas-user__button">
                <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys" data-bs-toggle="modal"
                    data-bs-target="#loginModal">Log In</button>
            </div>
            <div class="offcanvas-user__button">
                <button class="offcanvas-user__signup btn btn-primary btn-hover-primary" data-bs-toggle="modal"
                    data-bs-target="#registerModal">Sign Up</button>
            </div>
        </div>
        <!-- Header User Button End -->
    </div>
    <!-- Offcanvas End -->
    <!-- Blog Start -->
    <div class="blog-section section-padding-01">
        <div class="container custom-container">
            <div class="row gy-10">
                <div class="col-lg-8">
                    <!-- Blog Item Start -->
                    <div class="blog-list-items">
                        @foreach ($blogs as $blog)
                            <!-- Blog Item Start -->
                            <div class="blog-list-item-02" data-aos="fade-up" data-aos-duration="1000">
                                <div class="blog-list-item-02__image">
                                    <a href="{{ route('blog.details', $blog->slug) }}"><img src="{{ $blog->image }}"
                                            alt="School Dekho" width="270" height="170"></a>
                                    {{-- <div class="blog-list-item__categories">
                                        <a href="#">Video & Tips</a>
                                    </div> --}}
                                </div>
                                <div class="blog-list-item-02__content">
                                    <h3 class="blog-list-item-02__title"><a
                                            href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                    <div class="blog-list-item-02__meta">
                                        <span class="meta-action"><i class="far fa-calendar"></i>
                                            {{ App\Core\Helper::GetDate($blog->created_at) }}</span>
                                        <span class="meta-action"><i class="far fa-eye"></i> {{ $blog->view_count }}
                                            views</span>
                                    </div>
                                    <p>{{ $blog->short_description }}</p>
                                    <a class="blog-list-item-02__more" href="{{ route('blog.details', $blog->slug) }}">Read
                                        More <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <!-- Blog Item End -->
                        @endforeach
                    </div>
                    <!-- Blog Item End -->
                    <!-- Page Pagination Start -->
                    <style>
                        .pagination-injection {}

                        .pagination-injection nav ul {
                            gap: 8px;
                            display: flex;
                            flex-wrap: wrap;
                        }

                        .pagination-injection nav ul .disabled {
                            display: none;
                        }

                        .pagination-injection nav ul:first-child a::after {
                            content: :"Previous"
                        }

                        .pagination-injection nav ul:last-child a::after {
                            content: :"Next"
                        }

                        .pagination-injection nav ul .active span {
                            border-radius: 9999999px;
                            color: #dee2e6;
                            font-weight: 700;
                            height: 40px;
                            width: 40px;
                            justify-content: center;
                            align-items: center;
                            margin-left: auto;
                            margin-right: auto;
                        }
                    </style>
                    <div class="page-pagination pagination-injection justify-content-center">
                        {{ $blogs->links() }}
                    </div>
                    <!-- Page Pagination End -->
                </div>
                <div class="col-lg-4">
                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-weap-02 ps-xl-6">
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Search</h4>
                            <!-- Sidebar Widget Search Start -->
                            <div class="sidebar-widget-02-search">
                                <form method="get" action="{{ route('blog.list') }}">
                                    <input type="search" name="title" class="sidebar-widget-02-search__field"
                                        placeholder="Search…">
                                    <button type="submit" class="sidebar-widget-02-search__submit">
                                        <span class="search-btn-icon fas fa-search"></span>
                                    </button>
                                </form>
                            </div>
                            <!-- Sidebar Widget Search End -->
                        </div>
                        <!-- Sidebar Widget End -->
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Categories</h4>
                            <!-- Sidebar Widget Search Start -->
                            <ul class="sidebar-widget-02__link">
                                @foreach ($blogcategories as $category)
                                    <li><a href="/blog/list?title={{ $category->name }}"">
                                            {{ $category->name }}
                                            <span class="count">({{ $category->blog_categories->count() }})</span> </a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Sidebar Widget Search End -->
                        </div>
                        <!-- Sidebar Widget End -->
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Latest Posts</h4>
                            <!-- Sidebar Widget Search Start -->
                            <ul class="sidebar-widget-02__psot">
                                @foreach ($popular_blogs as $popular_blog)
                                    <li>
                                        <div class="sidebar-widget-02__psot-item">
                                            <div class="sidebar-widget-02__psot-thumbnail ">
                                                <a href="{{ route('blog.details', $popular_blog->slug) }}">
                                                    <img src="{{ $popular_blog->image }}" alt="Blog" width="100"
                                                        height="80">
                                                    {{-- <div class="sidebar-widget-02__categories">
                                                        <span>{{ $popular_blog->blog_category_maps[0]->name }}</span>
                                                    </div> --}}
                                                </a>
                                            </div>
                                            <div class="sidebar-widget-02__psot-info">
                                                <h5 class="sidebar-widget-02__psot-title"><a
                                                        href="{{ route('blog.details', $popular_blog->slug) }}">{{ $popular_blog->title }}</a>
                                                </h5>
                                                <span
                                                    class="sidebar-widget-02__psot-date">{{ App\Core\Helper::GetDate($popular_blog->created_at) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Sidebar Widget Search End -->
                        </div>
                        <!-- Sidebar Widget End -->
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Popular Tags</h4>
                            <!-- Sidebar Widget Search Start -->
                            <ul style="gap:8px" class="sidebar-widget-02__tags">
                                @foreach ($blogtags as $tag)
                                    <li><a href="#">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                            <!-- Sidebar Widget Search End -->
                        </div>
                        <!-- Sidebar Widget End -->
                    </div>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showRecommends);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showRecommends(position) {
                var url = `/recommend?latitude=${position.coords.latitude}&longitude=${position.coords.longitude}`;
                console.log("url ----> " + url);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        if (data) {
                            $("#trends").html(data);
                        }
                    }
                });
            }
        });

        function getNearBySchools() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(openNearbySchool);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function openNearbySchool(position) {
            var url = `/searchin?latitude=${position.coords.latitude}&longitude=${position.coords.longitude}`;
            window.location.href = url;
        }

        function showSchools(x, y) {
            var url = `/searchin?latitude=${x}&longitude=${y}`;
            window.location.href = url;
        }
    </script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyBtWE84XIIE6anZBgc6KMiefOpYnsWVArE&libraries=places&callback=initAutocomplete">
    </script>
    <script>
        google.maps.event.addDomListener(autocomplete, 'keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
        });
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            const options = {
                componentRestrictions: {
                    country: "in"
                },
            };
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                // $('#latitude').val(place.geometry['location'].lat());
                // $('#longitude').val(place.geometry['location'].lng());
                var url =
                    `/searchin?latitude=${place.geometry['location'].lat()}&longitude=${place.geometry['location'].lng()}`;
                window.location.href = url;
            });
        }
    </script>
@endpush
