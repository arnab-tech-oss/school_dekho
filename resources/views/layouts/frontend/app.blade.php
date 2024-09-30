<!DOCTYPE html>

<!--
 .oooooo..o           oooo                            oooo        .o8            oooo        oooo
d8P'    `Y8           `888                            `888       "888            `888        `888
Y88bo.       .ooooo.   888 .oo.    .ooooo.   .ooooo.   888   .oooo888   .ooooo.   888  oooo   888 .oo.    .ooooo.       .ooooo.  oooo d8b  .oooooooo
 `"Y8888o.  d88' `"Y8  888P"Y88b  d88' `88b d88' `88b  888  d88' `888  d88' `88b  888 .8P'    888P"Y88b  d88' `88b     d88' `88b `888""8P 888' `88b
     `"Y88b 888        888   888  888   888 888   888  888  888   888  888ooo888  888888.     888   888  888   888     888   888  888     888   888
oo     .d8P 888   .o8  888   888  888   888 888   888  888  888   888  888    .o  888 `88b.   888   888  888   888 .o. 888   888  888     `88bod8P'
8""88888P'  `Y8bod8P' o888o o888o `Y8bod8P' `Y8bod8P' o888o `Y8bod88P" `Y8bod8P' o888o o888o o888o o888o `Y8bod8P' Y8P `Y8bod8P' d888b    `8oooooo.
                                                                                                                                          d"     YD
                                                                                                                                          "Y88888P'
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="School Dekho">
    <meta name="email" content="info@schooldekho.org">
    <meta name="name" content="School Dekho">
    <meta name="type" content="School Search Engine">
    <meta name="p:domain_verify" content="525cc07587857a6a40ec7584f3267152" />
    @yield('canonical')
    @yield('meta')
    <title>
        @isset($title)
            {{ $title }}
        @endisset
        @isset($schooldetails->name, $schoolcontacts)
            {{ $schooldetails->name }}, {{ $schooldetails->address->city }}: Admission, Fees, Reviews
        @endisset
        @if (isset($article_details))
            {{ $article_details->blog_title }}
        @endif
        @if (isset($author_details))
            {{ $author_details->writer_name }} - School Dekho
        @endif
        @if (isset($category_details_for_title))
            {{ $category_name }} - School Dekho
        @endif
        @if (isset($article_main_title))
            {{ $article_main_title }}
        @endif
    </title>
    <meta property="og:title"
        content="@if (isset($title)) {{ $title }} @endif
      @if (isset($schooldetails->name) && isset($schoolcontacts)) {{ $schooldetails->name }},{{ $schooldetails->address->city }},
        @if ($schooldetails->boards->board_name == 'CISCE') ICSE, @endif
        {{ $schooldetails->boards->board_name }} school
      @endif">
    <meta name="google-site-verification" content="AxwE9o1P7J4osh4pV9JYil6Ddrx1e6EU6ZO9OeiMDPA" />
    <link type="image/x-icon" href="/assets/images/favicon.ico" rel="icon">
    @if (isset($schooldetails->name) && isset($schoolcontacts))
        @php
            $boardName = $schooldetails->boards->board_name;
            $schoolName = $schooldetails->name;
            $city = $schooldetails->address->city;
            $about = $schooldetails->about;
            $logo = $schooldetails->school_logo;
            $slug = $schooldetails->slug;
            $state = isset($schoolcontacts->states->state) ? $schoolcontacts->states->state : '';
        @endphp
        <meta name="description"
            content="{{ "$schoolName Best, top, " . ($boardName == 'CISCE' ? 'ICSE' : '') . " $boardName school in $city, $state, $schoolName, best school near me. School Dekho" }}" />
        <meta property="og:type" content="website">
        <meta property="og:description" content="{{ $about }}">
        <meta property="og:image" content="{{ $logo }}">
        <meta property="og:url" content="{{ 'www.schooldekho.org/details/' . $slug }}">
        <meta property="og:site_name" content="www.schooldekho.org">
        <meta property="og:locale" content="en_IN">
        <!-- Add Twitter Card meta tags (optional, but recommended for Twitter) -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title"
            content="{{ $title ?? '' }} {{ "$schoolName,$city," . ($boardName == 'CISCE' ? 'ICSE,' : '') . "$boardName school" }}">
        <meta name="twitter:description" content="{{ $about }}">
        <meta name="twitter:image" content="{{ $logo }}">
        <!-- Add LinkedIn meta tags (optional, but recommended for LinkedIn) -->
        <meta property="og:title"
            content="{{ $title ?? '' }} {{ "$schoolName,$city," . ($boardName == 'CISCE' ? 'ICSE,' : '') . "$boardName school" }}">
        <meta property="og:description" content="{{ $about }}">
        <meta property="og:image" content="{{ $logo }}">
        @if (isset($school_form))
            <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">

            <meta name="msnbot" content="noindex, nofollow, archive" />
            <meta name="Slurp" content="noindex, nofollow, archive" />
        @else
            <meta name="robots" content="index, follow">
            <meta name="googlebot" content="index, follow">

            <meta name="msnbot" content="index, follow, archive" />
            <meta name="Slurp" content="index, follow, archive" />
        @endif
        <meta name="distribution" content="Global" />
    @endif

    @if (isset($article_details))
        <meta name="description" content="{{ $article_details->blog_meta_description }}">
    @endif
    @if (isset($total_number_rows))
        <meta name="description"
            content="India's first search engine for school admissions. We're dedicated to giving you the best school of your choice, with a focus on education as a priority, infrastructure, and nature, like extracurricular activities, programs, etc." />
    @endif
    @if (isset($blogdetails))
        <meta name="keywords" content="{{ str_replace(',', ' ', $blogdetails->meta_keywords) }}">
    @endif
    @if (isset($schoodetails) && !sizeof($schoodetails))
        <meta name="description"
            content="School Dekho is dedicated to giving you the best school of your choice with a focus on education, infrastructure, extra-curricular activities, etc.">
    @endif
    <meta name="robots"
        content="schools near me, school compare, compare schools, best school in, best school in my city, best schools near me, best schools in the town, top school, school dekho, school search portal, school admissions, admission, education, school, students, admissions , study, india, viral, admission2023 , ICSE, CBSE, BESTCBSESCHOOL, Best icse school, best school near me, best school for my kid, dekho phir chuno, my school, trending, trending now, Popular Post, education, students, school, dream school, get school admission, school admission open">
    <meta name="keywords"
        content="schools near me, school compare, compare schools, best school in, best school in my city, best schools near me, best schools in the town, top school, school dekho, school search portal, school admissions, admission, education, school, students, admissions , study, india, viral, admission2023 , ICSE, CBSE, BESTCBSESCHOOL, Best icse school, best school near me, best school for my kid, dekho phir chuno, my school, trending, trending now, Popular Post, education, students, school, dream school, get school admission, school admission open">
    <meta name="theme-color" content="#000066" />
    <meta property="og:type" content="website" />
    <meta name="geo.region" content="IN" />
    <meta name="geo.position" content="22.351115;78.667743" />
    <meta name="ICBM" content="22.351115, 78.667743" />
    <meta property="og:site_name" content="schooldekho" />
    <meta name="robots" content="NOODP, NOYDIR" />
    <meta name="language" content="English">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="India's first search engine for school admissions. We're dedicated to giving you the best school of your choice, with a focus on education as a priority, infrastructure, and nature, like extracurricular activities, programs, etc.">
    <meta property="og:image" content="https://www.schooldekho.org/assets/images/sd-logo.png">
    <meta property="og:url" content="www.schooldekho.org">
    <meta property="og:site_name" content="www.schooldekho.org">
    <meta property="og:locale" content="en_IN">
    <!-- Add Twitter Card meta tags (optional, but recommended for Twitter) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="School Dekho - India's first search engine for school admissions">
    <meta name="twitter:description"
        content="India's first search engine for school admissions. We're dedicated to giving you the best school of your choice, with a focus on education as a priority, infrastructure, and nature, like extracurricular activities, programs, etc.">
    <meta name="twitter:image" content="https://www.schooldekho.org/assets/images/sd-logo.png">
    <!-- Add LinkedIn meta tags (optional, but recommended for LinkedIn) -->
    <meta property="og:title" content="School Dekho - India's first search engine for school admissions">
    <meta property="og:description"
        content="India's first search engine for school admissions. We're dedicated to giving you the best school of your choice, with a focus on education as a priority, infrastructure, and nature, like extracurricular activities, programs, etc.">
    <meta property="og:image" content="https://www.schooldekho.org/assets/images/sd-logo.png">
    @if (isset($index) == 'noindex')
        <meta name="robots" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow">
    @endif
    <meta name="msnbot" content="index, follow, archive" />
    <meta name="Slurp" content="index, follow, archive" />
    <meta name="distribution" content="Global" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@dekho_school">
    <meta name="twitter:description"
        content="India’s first search engine for school admission “http://schooldekho.org” is helping parents find the best schools">
    <meta name="twitter:image" content="https://www.schooldekho.org/assets/images/sd-logo.png">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->
    <!-- Font CSS -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link href="{{ asset('assets/school/css/vendor/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/vendor/edumall-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Plugins CSS (All Plugins Files) -->
    <link href="{{ asset('assets/school/css/plugins/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/plugins/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/plugins/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/plugins/jquery.powertip.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/plugins/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/plugins/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/plugins/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/school/css/plugins/select2.min.css') }}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{ asset('assets/school/css/style.css') }}" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    @stack('css')
    @livewireStyles

    @stack('top-js')

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "legalName": "School Dekho",
        "description": "School Dekho is India's first search engine for school admissions.",
        "url": "https://www.schooldekho.org/",
        "logo": "https://www.schooldekho.org/assets/school/images/sd-logo.png",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "1800 2588 074",
            "contactType": "customer support"
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Sati Plaza, Barrackpore",
            "addressLocality": "Kolkata",
            "addressRegion": "West Bengal",
            "postalCode": "700120",
            "addressCountry": "India"
        },
        "sameAs": [
            "https://www.facebook.com/SchoolDekhoOrg",
            "https://www.instagram.com/schooldekhoorg",
            "https://twitter.com/SchoolDekhoOrg",
            "https://www.youtube.com/@SchoolDekhoOrg",
            "https://www.linkedin.com/company/schooldekhoorg/"
        ]
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "School Dekho",
        "image": "https://www.schooldekho.org/assets/school/images/sd-logo.png",
        "description": "School Dekho is India's first search engine for school admissions.",
        "brand": {
            "@type": "Brand",
            "name": "School Dekho"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "{{ number_format(mt_rand(39, 50) / 10, 2) }}",
            "bestRating": "5",
            "worstRating": "0",
            "ratingCount": "{{ mt_rand(100, 5000) }}"
        }
    }
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E1MDKF376S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-E1MDKF376S');
    </script>
    <script src="{{ asset('assets/school/js/plugins/swiper-bundle.min.js') }}"></script>

    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "f6okm2bblu");
    </script>
    <script>
        var _paq = (window._paq = window._paq || []);
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(["trackPageView"]);
        _paq.push(["enableLinkTracking"]);
        (function() {
            var u = "https://matomo.collegeforme.org/";
            _paq.push(["setTrackerUrl", u + "matomo.php"]);
            _paq.push(["setSiteId", "2"]);
            var d = document,
                g = d.createElement("script"),
                s = d.getElementsByTagName("script")[0];
            g.async = true;
            g.src = u + "matomo.js";
            s.parentNode.insertBefore(g, s);
        })();

        var _mtm = (window._mtm = window._mtm || []);
        _mtm.push({
            "mtm.startTime": new Date().getTime(),
            event: "mtm.Start"
        });
        (function() {
            var d = document,
                g = d.createElement("script"),
                s = d.getElementsByTagName("script")[0];
            g.async = true;
            g.src = "https://matomo.collegeforme.org/js/container_Opd7n9nB.js";
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <noscript> <img referrerpolicy="no-referrer-when-downgrade"
            src="https://matomo.collegeforme.org/matomo.php?idsite=2&amp;rec=1" style="border:0" alt="" />
    </noscript>

    <!-- Hotjar Tracking Code for https://schooldekho.org -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 3544133,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

</head>

<body>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6H53HFXLXV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-6H53HFXLXV');
    </script>
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    //   console.log("Latitude: " + position.coords.latitude);
                    //   console.log("Longitude: " + position.coords.longitude);
                },
                function(error) {
                    console.error("Error getting geolocation:", error.message);
                }
            );
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    </script>
    <main class="main-wrapper">
        @include('layouts.frontend.partials.header2')
        @yield('content')
        @include('layouts.frontend.partials.footer')
    </main>
    <!-- Log In Modal Start -->
    <div id="loginModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-login">
            <!-- Modal Wrapper Start -->
            <div class="modal-wrapper">
                <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <!-- Modal Content Start -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <p class="modal-description">Don't have an account yet? <button data-bs-toggle="modal"
                                data-bs-target="#registerModal">Sign up for free</button></p>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user.login') }}">
                            <div class="modal-form">
                                <label class="form-label">Username or email</label>
                                <input class="form-control" name="email" type="text"
                                    placeholder="Your username or email">
                            </div>
                            <div class="modal-form">
                                <label class="form-label">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Password">
                            </div>
                            <div class="modal-form">
                                <button class="btn btn-primary btn-hover-secondary w-100" type="submit">Log
                                    In</button>
                            </div>
                        </form>
                        <div class="modal-social-option">
                            <p>or Log-in with</p>
                            <ul class="modal-social-btn">
                                <li><a class="btn facebook" href="{{ route('facebook.login') }}"><i
                                            class="fab fa-facebook-square"></i>
                                        Facebook</a></li>
                                <li><a class="btn google" href="{{ route('google.login') }}"><i
                                            class="fab fa-google"></i>
                                        Google</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Modal Content End -->
            </div>
            <!-- Modal Wrapper End -->
        </div>
    </div>
    <!-- Log In Modal End -->
    <!-- Log In Modal Start -->
    <div id="registerModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-register">
            <!-- Modal Wrapper Start -->
            <div class="modal-wrapper">
                <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <!-- Modal Content Start -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up</h5>
                        <p class="modal-description">Already have an account? <button data-bs-toggle="modal"
                                data-bs-target="#loginModal">Log in</button></p>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user.signup') }}">
                            @csrf
                            <div class="row gy-5">
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Name</label>
                                        <input class="form-control" name="name" type="text"
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" type="text"
                                            placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" name="password" type="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="modal-form form-check">
                                        <input id="privacy" type="checkbox">
                                        <label for="privacy">Accept the <a href="/terms">Terms</a> and
                                            <a href="/privacy">
                                                Privacy
                                                Policy
                                            </a>
                                            </a></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="modal-form">
                                        <button class="btn btn-primary btn-hover-secondary w-100"
                                            type="submit">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Content End -->
            </div>
            <!-- Modal Wrapper End -->
        </div>
    </div>
    <!-- Log In Modal End -->
    <div id="registerSchoolModal" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- Modal Wrapper Start -->
            <div class="modal-wrapper">
                <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <!-- Modal Content Start -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Be a part of school dekho</h5>
                    </div>
                    <div class="modal-body">
                        <form id="RegisterYourSchool" class="adpost-form" method="POST"
                            action="{{ route('school.claimquery.submit') }}">
                            @csrf
                            <!-- School Information Section -->
                            <div class="adpost-card">
                                <div class="adpost-title">
                                    <h3 class="sidebar-widget-02__title">School Information</h3>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="school_name">School Name</label>
                                            <div class="input-with-error">
                                                <input id="school_name" class="form-control" name="school_name"
                                                    type="text" placeholder="Type your School Name here" required>
                                                <p id="school_name-error" class="error-message"
                                                    style="display: none;">
                                                    Please enter the
                                                    School Name.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="location">Address of the School</label>
                                            <div class="input-with-error">
                                                <input id="location" class="form-control" name="location"
                                                    type="text" placeholder="Type School Address here" required>
                                                <p id="location-error" class="error-message" style="display: none;">
                                                    Please enter the Address.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="officialContactNumber">Official Contact
                                                Number</label>
                                            <div class="input-with-error">
                                                <input id="officialContactNumber" class="form-control"
                                                    name="official_contact" type="number"
                                                    placeholder="Official contact number" required>
                                                <p id="officialContactNumber-error" class="error-message"
                                                    style="display: none;">Please enter
                                                    the Official Contact Number.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="officialEmail">Official Email Id</label>
                                            <div class="input-with-error">
                                                <input id="officialEmail" class="form-control" name="official_email"
                                                    type="email" placeholder="Official Email ID" required>
                                                <p id="officialEmail-error" class="error-message"
                                                    style="display: none;">Please enter a valid
                                                    Official Email ID.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Information Section -->
                            <div class="adpost-card">
                                <div class="adpost-title">
                                    <h3 class="sidebar-widget-02__title">Contact Information</h3>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="contactPerson">Name</label>
                                            <div class="input-with-error">
                                                <input id="contactPerson" class="form-control" name="contact_person"
                                                    type="text" placeholder="Your Name" required>
                                                <p id="contactPerson-error" class="error-message"
                                                    style="display: none;">Please enter the
                                                    Contact Person Name.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="designation">Designation</label>
                                            <div class="input-with-error">
                                                <input id="designation" class="form-control" name="designation"
                                                    type="text" placeholder="Your Designation" required>
                                                <p id="designation-error" class="error-message"
                                                    style="display: none;">
                                                    Please enter the
                                                    Designation.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="Mobile_number">Mobile Number</label>
                                            <div class="input-with-error">
                                                <input id="Mobile_number" class="form-control" name="contact_number"
                                                    type="number" placeholder="Your Number" required>
                                                <p id="Mobile_number-error" class="error-message"
                                                    style="display: none;">Please enter the
                                                    Contact Number.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="emailId">Email Id</label>
                                            <div class="input-with-error">
                                                <input id="emailId" class="form-control" name="email_id"
                                                    type="email" placeholder="Your Email" required>
                                                <p id="emailId-error" class="error-message" style="display: none;">
                                                    Please enter a valid Email
                                                    ID.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Terms and Conditions Section -->
                            <div class="adpost-card pb-2">
                                <div class="form-check">
                                    <input id="T&C" type="checkbox">
                                    <label for="T&C">By clicking checkbox, I accept the <a href="/terms">Terms &
                                            Conditions</a>
                                        and
                                        <a href="/privacy"> Privacy Policy</a> of School Dekho.</label>
                                    <div class="input-with-error">
                                        <p id="T&C-error" class="error-message" style="display: none;">Please accept
                                            the Terms and
                                            Conditions.</p>
                                    </div>
                                </div>
                                <div class="form-group mt-3 text-right">
                                    <button
                                        class="header-user__signup btn btn-primary btn-hover-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Modal Content End -->
            </div>
            <!-- Modal Wrapper End -->
        </div>
        <!-- Modal Wrapper End -->
    </div>
    </div>
    <script src="" asyn defer></script>
    <!-- JS Vendor, Plugins & Activation Script Files -->
    <!-- Vendors JS -->
    <script src="{{ asset('assets/school/js/vendor/modernizr-3.11.7.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('assets/school/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/parallax.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/jquery.powertip.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/jquery.sticky-kit.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/range-slider.js') }}"></script>
    <script src="{{ asset('assets/school/js/plugins/select2.min.js') }}"></script>
    <!-- Activation JS -->
    <script src="{{ asset('assets/school/js/main.js') }}"></script>
    <script src="{{ asset('assets') }}/js/sweetalert.min.js"></script>
    @if ($message = Session::get('query_message'))
        <script>
            swal("Thanks for your query", "Query received. We will be in touch with you soon.", "success");
        </script>
    @endif
    @if ($message = Session::get('application_message'))
        <script>
            swal("Thanks for your query", "Query received. We will be in touch with you soon.", "success");
        </script>
    @endif
    @if ($message = Session::get('page_lead_message'))
        <script>
            swal("Thanks for your query", "Query received. We will be in touch with you soon.", "success");
        </script>
    @endif
    @if ($message = Session::get('blog_message'))
        <script>
            swal("Thanks for your query", "We will be in touch with you soon.", "success");
        </script>
    @endif
    @if ($message = Session::get('job_message'))
        <script>
            swal("Thanks for submitting your application", "We will be in touch with you soon.", "success");
        </script>
    @endif
    @if ($message = Session::get('message'))
        <script>
            swal("Wrong credentials", "Please provide correct username or password", "warning");
        </script>
    @endif
    @if ($message = Session::get('msg'))
        <script>
            swal("No School added", "Please add schools for comparison", "warning");
        </script>
    @endif
    @if ($message = Session::get('contact_message'))
        <script>
            swal("Thanks for your query", "We will get back you soon", "success");
        </script>
    @endif
    @if ($message = Session::get('email_message'))
        <script>
            swal("Exists", "Email address already exists", "warning");
        </script>
    @endif
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
    <div id="locationDeniedModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-register">
            <div style="margin-top:0 " class="modal-wrapper">
                <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 24px">Location Access Denied</h5>
                        <p class="modal-description">If you want to use this feature, please allow location access &
                            refresh the page.

                        </p>
                    </div>
                    <div style="display: flex ; justify-content: center ; align-items: center" class="modal-body">
                        <button class="btn btn-primary btn-hover-primary pac-target-input" data-bs-toggle="modal"
                            data-bs-target="locationDeniedModal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .loader {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            border-top: 3px solid #FFF;
            border-right: 3px solid transparent;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div id="loading-spinner" style=" justify-content: center; display : none" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-register">
            <div class="modal-wrapper">

                <div style=" background-color: #fff0; border:unset;" class="modal-content">
                    <div style="display: flex ; justify-content: center ; align-items: center"> <span
                            class="loader"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="locationDeniedModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-register">
            <div style="margin-top:0 " class="modal-wrapper">
                <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 24px">Location Access Denied</h5>
                        <p id="locationDeniedMessage" class="modal-description">If you want to use this feature,
                            please allow
                            location access.</p>
                    </div>
                    <div style="display: flex ; justify-content: center ; align-items: center" class="modal-body">
                        <button class="btn btn-primary btn-hover-primary pac-target-input" data-bs-toggle="modal"
                            data-bs-target="locationDeniedModal" onclick="closeLocationDeniedModal()">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var loadingSpinner = new bootstrap.Modal(document.getElementById('loading-spinner'));
        var locationDeniedModal = new bootstrap.Modal(document.getElementById('locationDeniedModal'));
        var headerSearchForm = document.getElementById('headerSearchForm');
        var headerSearchbtn = document.getElementById('headerSearchbtn');
        window.addEventListener('beforeunload', function() {
            loadingSpinner.hide();
        });

        function getNearBySchoolsWithLocationCheck() {
            try {
                loadingSpinner.show();
                navigator.geolocation.getCurrentPosition(function(position) {
                    openNearbySchool(position);
                }, function(error) {
                    console.error('Error in getNearBySchoolsWithLocationCheck:', error);
                    if (error.code === error.PERMISSION_DENIED) {
                        document.getElementById('locationDeniedMessage').innerText =
                            "To use this feature, please allow location access in your browser settings.";
                        locationDeniedModal.show();
                    } else {
                        console.error('Geolocation error:', error);
                    }
                    loadingSpinner.hide();
                });
            } catch (error) {
                console.error('Error in getNearBySchoolsWithLocationCheck:', error);
                loadingSpinner.hide();
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

        function closeLocationDeniedModal() {
            locationDeniedModal.hide();
        }
        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showRecommends);
                try {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        headerSearchForm.style.display = 'contents';
                        headerSearchbtn.style.display = 'none';
                        headerSearchbtn.style.position = 'absolute';
                    }, function(error) {
                        console.error('ShowSearchBar', error);
                        if (error.code === error.PERMISSION_DENIED) {
                            console.error('Error in getNearBySchoolsWithLocationCheck:', error.message);

                        } else {
                            console.error('Geolocation error:', error);
                        }

                    });
                } catch (error) {
                    console.error('ShowSearchBar', error);

                }

            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showRecommends(position) {
                var url = `/recommend?latitude=${position.coords.latitude}&longitude=${position.coords.longitude}`;
                // console.log("url ----> " + url);
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

        function ShowSearchBar() {
            try {
                navigator.geolocation.getCurrentPosition(function(position) {
                    headerSearchForm.style.display = 'contents';
                    headerSearchbtn.style.display = 'none';
                    headerSearchbtn.style.position = 'absolute';
                }, function(error) {
                    console.error('ShowSearchBar', error);
                    if (error.code === error.PERMISSION_DENIED) {
                        document.getElementById('locationDeniedMessage').innerText =
                            "To use this feature, please allow location access in your browser settings.";
                        locationDeniedModal.show();
                    } else {
                        console.error('Geolocation error:', error);
                    }
                    loadingSpinner.hide();
                });
            } catch (error) {
                console.error(error.message);
                loadingSpinner.hide();
            }
        }
    </script>
    <script>
        function myFunction() {
            //   console.log("Function called!");
        }

        function randomTime() {
            return Math.floor(Math.random() * (2000 - 500 + 1) + 500);
        }

        function scheduleFunction() {
            loadingSpinner.hide();
            setTimeout(function() {
                scheduleFunction();
            }, randomTime());
        }
        scheduleFunction();
    </script>
    @stack('js')
    @livewireScripts
</body>

<!--
 .oooooo..o           oooo                            oooo        .o8            oooo        oooo
d8P'    `Y8           `888                            `888       "888            `888        `888
Y88bo.       .ooooo.   888 .oo.    .ooooo.   .ooooo.   888   .oooo888   .ooooo.   888  oooo   888 .oo.    .ooooo.       .ooooo.  oooo d8b  .oooooooo
 `"Y8888o.  d88' `"Y8  888P"Y88b  d88' `88b d88' `88b  888  d88' `888  d88' `88b  888 .8P'    888P"Y88b  d88' `88b     d88' `88b `888""8P 888' `88b
     `"Y88b 888        888   888  888   888 888   888  888  888   888  888ooo888  888888.     888   888  888   888     888   888  888     888   888
oo     .d8P 888   .o8  888   888  888   888 888   888  888  888   888  888    .o  888 `88b.   888   888  888   888 .o. 888   888  888     `88bod8P'
8""88888P'  `Y8bod8P' o888o o888o `Y8bod8P' `Y8bod8P' o888o `Y8bod88P" `Y8bod8P' o888o o888o o888o o888o `Y8bod8P' Y8P `Y8bod8P' d888b    `8oooooo.
                                                                                                                                          d"     YD
                                                                                                                                          "Y88888P'
-->

</html>
