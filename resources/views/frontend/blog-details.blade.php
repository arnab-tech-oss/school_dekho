@extends('layouts.frontend.app')
<title>
    {{ $blogdetails->title }} | School Dekho
</title>

@php
    $showAds = true;
@endphp
@push('css')
    <meta property="og:image" content="{{ $blogdetails->image }}" />
    <meta property="og:image:secure_url" content="{{ $blogdetails->image }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:title" content="{{ $blogdetails->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.schooldekho.org/school/blog/details/{{ $blogdetails->slug }}" />
    <meta property="og:site_name" content="{{ $blogdetails->title }}" />
    <!-- HTML Meta Tags -->
    <meta name="description" content="{{ $blogdetails->title }}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.schooldekho.org/school/blog/details/{{ $blogdetails->slug }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $blogdetails->title }}">
    <meta property="og:description" content="{{ $blogdetails->title }}">
    <meta property="og:image" content="{{ $blogdetails->image }}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="schooldekho.org">
    <meta property="twitter:url" content="{{ $blogdetails->image }}">
    <meta name="twitter:title" content="{{ $blogdetails->title }}">
    <meta name="twitter:description" content="{{ $blogdetails->title }}">
    <meta name="twitter:image" content="{{ $blogdetails->image }}">
    <meta property="og:title" content="{{ $blogdetails->title }}">
    <meta property="og:description" content="{{ $blogdetails->title }}">
    <meta property="og:image" content="{{ $blogdetails->image }}">
    <meta property="og:url" content="https://www.schooldekho.org/school/blog/details/{{ $blogdetails->slug }}">
    <link rel="image_src" href="{{ $blogdetails->image }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <style>
        .landscape-image-wrapper {
            height: 100px;

            width: 100%;
            position: relative;
            margin: 0;

            margin-bottom: 10px;

            & .background-image {
                background: url("{{ asset('assets/images/ads/banner.webp') }}") no-repeat left center;
                background-size: cover;
                cursor: pointer;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                border-radius: 5px;

            }

            @media screen(max-width < 990px) {
                width: calc(100vw - 30px);
            }
        }

        .oneByOne-image-wrapper-1x1 {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 400px;

            & .background-image {
                background: url("{{ asset('assets/images/ads/1x1.webp') }}") no-repeat center center;
                background-size: cover;
                cursor: pointer;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                border-radius: 5px;
                z-index: 10;
            }
        }
    </style>
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
                        <li class="breadcrumb-item"><a href="{{ route('blog.list') }}">Blogs</a></li>
                        <li class="breadcrumb-item active">{{ $blogdetails->title }}</li>
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
    <div id="offcanvasMobileMenu" class="offcanvas offcanvas-end offcanvas-mobile"
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
                    </li>
                    <li>
                        <a href="#"><span>Courses</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Blog</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Pages</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Features</span></a>
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
        <div class="custom-container container">
            <div class="row gy-10">
                <div class="col-lg-8">
                    <!-- Blog Dtails Start -->
                    <div class="blog-details">
                        <div style=" max-height: 418px;" class="blog-details__image">
                            <img src="{{ $blogdetails->image }}" alt="{{ $blogdetails?->alt_image }}" width="770"
                                height="418">
                            {{-- <div class="blog-details__categories">
                                <a href="#">Video & Tips</a>
                            </div> --}}
                        </div>

                        <div class="blog-details__content">
                            <div class="blog-details__meta">
                                <a class="meta-action" href="#">
                                    <img class="meta-action__avatar" src="/assets/images/sd-s.png" alt="Avatar"
                                        width="32" height="32">
                                    <span class="meta-action__value">School Dekho</span>
                                </a>
                                <span class="meta-action"><i class="far fa-calendar"></i> <span
                                        class="meta-action__value">{{ App\Core\Helper::GetDate($blogdetails->created_at) }}</span></span>
                                <span class="meta-action"><i class="far fa-eye"></i> <span class="meta-action__value">
                                        {{ $blogdetails->view_count }} views</span></span>
                                <a class="meta-action" href="#"><i class="far fa-comment-alt-lines"></i> <span
                                        class="meta-action__value">

                                        <p>{{ sizeof($blog_comments) }} Comment</p>

                                    </span></a>
                            </div>
                            @if ($showAds)
                                <div class="tutor-course-segment tutor-course-wrap p-0">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div>
                            @endif
                            <h1 class="blog-details__title">{{ $blogdetails->title }}</h1>
                            {!! $blogdetails->blog_description !!} @if ($showAds)
                                <div class="tutor-course-segment tutor-course-wrap p-0 mt-3">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="blog-details__footer">
                            <div class="blog-details__tags">
                                <span class="blog-details__tags-label"><i class="fal fa-tags"></i></span>
                                <div class="blog-details__tags-list">
                                    <ul class="sidebar-widget-02__tags">
                                        @foreach ($blogtags as $tag)
                                            @if ($tag->name)
                                                <li><a href="#">{{ $tag->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-details__share">
                                <span class="blog-details__share-label">Share</span>
                                <div style="width: 100%" class="blog-details__share-media">
                                    <div style="display: flex; align-items: center; justify-items: center ;"
                                        class="blog-details__share-icon">
                                        <i style="margin-left: auto; margin-right: auto;" class="fas fa-share-alt"></i>
                                    </div>
                                    <ul class="blog-details__share-social">
                                        <li><a href="https://twitter.com/intent/tweet?text=schooldekho.org/school/blog/details/{{ $blogdetails->slug }}"
                                                data-bs-tooltip="tooltip" data-bs-placement="top" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.schooldekho.org/school/blog/details/{{ $blogdetails->slug }};src=sdkpreparse"
                                                data-bs-tooltip="tooltip" data-bs-placement="top" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://api.whatsapp.com/send?text=https://schooldekho.org/school/blog/details/{{ $blogdetails->slug }}"
                                                data-bs-tooltip="tooltip" data-bs-placement="top" title="Linkedin"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                        {{-- <li><a href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="Tumblr"><i class="fab fa-tumblr-square"></i></a></li>
                                        <li><a href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="Email"><i class="fas fa-envelope"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="blog-details__nav">
                            @if ($previous_blog_id)
                                <div class="blog-details__nav-item prev">
                                    <a class="blog-details__nav-link"
                                        href="{{ route('blog.details', $previous_blog_details?->slug) }}">
                                        <div class="blog-details__hover-bg"
                                            style="background-image: url({{ $previous_blog_details?->image }} );"></div>
                                        <span class="text">{{ $previous_blog_details?->title }}</span>
                                    </a>
                                </div>
                            @endif
                            @if ($next_blog_id)
                                <div class="blog-details__nav-item next">
                                    <a class="blog-details__nav-link"
                                        href="{{ route('blog.details', $next_blog_details?->slug) }}">
                                        <div class="blog-details__hover-bg"
                                            style="background-image: url({{ $next_blog_details?->image }});"></div>
                                        <span class="text">{{ $next_blog_details?->title }}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Blog Dtails End -->
                    <!-- Related Post Start -->
                    <div class="related-post mt-8">
                        <h3 class="related-post__title">Related Posts</h3>

                        <ul class="sidebar-widget-02__psot">
                            @foreach ($latest_blogs as $popular_blog)
                                <li>
                                    <div class="sidebar-widget-02__psot-item">
                                        <div class="sidebar-widget-02__psot-thumbnail">
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
                    </div>
                    <!-- Related Post End -->
                    <!-- Comment Start -->
                    <div class="comments-area">
                        <!-- Comment Wrapper Start -->
                        <div class="comment-wrap mt-8">
                            <h3 class="comment-title">Leave your thought here</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <!-- Comment Form Start -->
                            <div class="comment-form">
                                <form action="{{ route('blog.comment.new') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="blog_id" value="{{ $blogdetails->id }}">
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <div class="comment-form__input">
                                                <input type="text" name="name" required="required"
                                                    class="form-control" placeholder="Your Name *">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="comment-form__input">
                                                <input type="email" name="email" required="required"
                                                    class="form-control" placeholder="Your Email *">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <textarea class="form-control" required="required" name="comment" placeholder="Your Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input form-check">
                                                <input id="save" type="checkbox">
                                                <label for="save">Save my name, email, and website in this browser for
                                                    the next time I comment.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <button class="btn btn-primary btn-hover-secondary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Comment Form End -->
                        </div>
                        <!-- Comment Wrapper End -->
                    </div>
                    <!-- Comment End -->
                </div>
                <div class="col-lg-4">
                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-weap-02 ps-xl-6" style="     position: sticky;
    top: 90px;">
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

                        @if ($showAds)
                            <div class="sidebar-widget-02 border-0 m-0 p-0">
                                <div class="oneByOne-image-wrapper-1x1">
                                    <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                        class="background-image"></div>
                                </div>
                            </div>
                        @endif

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Categories</h4>
                            <ul class="sidebar-widget-02__link">
                                @foreach ($blogcategories as $category)
                                    <li><a href="/blog/list?title={{ $category->name }}"">
                                            {{ $category->name }}
                                            <span class="count">({{ $category->blog_categories->count() }})</span> </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Sidebar Widget End -->
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Latest Posts</h4>
                            <ul class="sidebar-widget-02__psot">
                                @foreach ($latest_blogs as $popular_blog)
                                    <li>
                                        <div class="sidebar-widget-02__psot-item">
                                            <div class="sidebar-widget-02__psot-thumbnail">
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
                        </div>
                        <!-- Sidebar Widget End -->
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Popular Tags</h4>
                            <!-- Sidebar Widget Search Start -->
                            <ul class="sidebar-widget-02__tags">
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

    <div id="blog-lead" class="modal fade" aria-modal="true" role="dialog" style="display: none;"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-login">
            <!-- Modal Wrapper Start -->
            <div class="modal-wrapper">
                <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <!-- Modal Content Start -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 24px">School Admission Enquiry</h5>
                        {{-- <p class="modal-description">Don't have an account yet? <button data-bs-toggle="modal"
                data-bs-target="#registerModal">Sign up for free</button></p> --}}
                    </div>
                    <div class="modal-body">
                        <form id="blog-leads" method="POST" action="{{ route('blog.lead.submit') }}">
                            @csrf
                            <div class="modal-form">
                                <label class="form-label">Your Name</label>
                                <input class="form-control" name="name" type="text" placeholder="your Name"
                                    required />
                                <input id="" type="hidden" name="blog_id" value="{{ $blogdetails->id }}">
                            </div>
                            <div class="modal-form">
                                <label class="form-label">Your Phone Number</label>
                                <input class="form-control" name="phone" type="text"
                                    placeholder="your Phone Number" required>
                            </div>
                            <div class="modal-form">
                                <label class="form-label">Looking for class</label>
                                <div class="countdown-register__input">

                                    <i class="edumi edumi-open-book"></i>
                                    <select class="form-control" name="seeking_class" required="required">
                                        <option value=" " disabled="" selected="">Select a Class</option>
                                        <option value="Nursery">Nursery </option>
                                        <option value="LKG">LKG </option>
                                        <option value="UKG">UKG </option>
                                        <option value="Class 1">Class 1 </option>
                                        <option value="Class 2">Class 2 </option>
                                        <option value="Class 3">Class 3 </option>
                                        <option value="Class 4">Class 4 </option>
                                        <option value="Class 5">Class 5 </option>
                                        <option value="Class 6">Class 6 </option>
                                        <option value="Class 7">Class 7 </option>
                                        <option value="Class 8">Class 8 </option>
                                        <option value="Class 9">Class 9 </option>
                                        <option value="Class 10">Class 10 </option>
                                        <option value="Class 11">Class 11 </option>
                                        <option value="Class 12">Class 12 </option>
                                    </select>
                                    <p id="seekingClassError" class="error-message" style="display: none;"></p>
                                </div>
                            </div>
                            <div class="modal-form mt-3">
                                <button class="btn btn-primary btn-hover-secondary w-100" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Content End -->
            </div>
            <!-- Modal Wrapper End -->
        </div>
    </div>
    <!-- Blog End -->
@endsection

@push('js')
    <script>
        // Check if the cookie is set
        if (document.cookie.indexOf("blog-callback=true") === -1) {
            // Wait for 3 seconds and then open the modal
            setTimeout(function() {
                $('#blog-lead').modal('show');
            }, 10000);
        }

        // Handle form submission
        $('#blog-leads').submit(function(e) {
            e.preventDefault();

            // Perform form submission using AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {

                    var expires = new Date();
                    expires.setTime(expires.getTime() + 24 * 60 * 60 * 1000); // 24 hours
                    document.cookie = "blog-callback=true;expires=" + expires.toUTCString();

                    $('#blog-lead').modal('hide');
                    swal(
                        "Thanks!",
                        "We will get back to you shortly.",
                        "success"
                    );
                },
                error: function(error) {

                    console.error(error);
                }
            });
        });
    </script>
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
            var url =
                `/searchin?latitude=${position.coords.latitude}&longitude=${position.coords.longitude}`;
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
            var input1 = document.getElementById('autocomplete1');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                var url =
                    `/searchin?location=${input.value}&latitude=${place.geometry['location'].lat()}&longitude=${place.geometry['location'].lng()}`;
                window.location.href = url;
            });
            var autocomplete1 = new google.maps.places.Autocomplete(input1, options);
            autocomplete1.addListener('place_changed', function() {
                var place = autocomplete1.getPlace();
                var url =
                    `/searchin?location=${input1.value}&latitude=${place.geometry['location'].lat()}&longitude=${place.geometry['location'].lng()}`;
                window.location.href = url;
            });
        }
    </script>
@endpush
