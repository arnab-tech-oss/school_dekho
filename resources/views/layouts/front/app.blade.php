<!DOCTYPE html>
<html lang="en">

<head>
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
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="School Dekho">
    <meta name="email" content="info@schooldekho.org">
    <meta name="name" content="School Dekho">
    <meta name="type" content="School Search Engine">
    <meta name="title" content="School Dekho - India's 1st Search Engine for School Admissions">
    <meta name="google-site-verification" content="AxwE9o1P7J4osh4pV9JYil6Ddrx1e6EU6ZO9OeiMDPA" />
    @if (isset($schooldetails->name) && isset($schoolcontacts))
        <meta name="description"
            content="{{ $schooldetails->name }} Best,top,@if ($schooldetails->boards->board_name == 'CISCE') ICSE @endif,{{ $schooldetails->boards->board_name }} school {{ $schooldetails->address->city }}, {{ $schoolcontacts->states?->state }},{{ $schooldetails->name }},best school near me.School Dekho " />
    @endif
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="msnbot" content="index,follow,archive" />
    <meta name="Slurp" content="index,follow,archive" />
    <meta name="distribution" content="Global" />
    @if (isset($blogdetails))
        <meta name="keywords" content="{{ str_replace(' ,', ' ', $blogdetails->meta_keywords) }}">
    @else
    @endif
    @if (isset($schoodetails))
        @if (!sizeof($schoodetails))
            <meta name="description"
                content="School Dekho is dedicated to giving you the best school of your choice with a focus on education, infrastructure, extra-curricular activities, etc.">
        @endif
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
    <script type="application/ld+json">
		{
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "schooldekho",
      "url": "https://www.schooldekho.org/",
      "logo": "https://www.schooldekho.org/assets/images/logo.png"
    }
	</script>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@dekho_school">
    <meta name="twitter:title" content="school dekho">
    <meta name="twitter:description"
        content="India’s first search engine for school admission “http://schooldekho.org” is helping parents find the best schools">
    <meta name="twitter:image" content="https://www.schooldekho.org/assets/images/logo.png">
    <script type="application/ld+json">
		{
	  "@context": "http://schema.org/",
	  "@type": "Product",
	  "name": "school dekho ",
	  "image": "https://www.schooldekho.org/assets/images/logo.png",
	  "description": "school dekho.",
	  "mpn": "3124",
	  "brand": {
	    "@type": "Product",
	    "name": "school dekho"
	  },
	  "aggregateRating": {
	    "@type": "AggregateRating",
	    "ratingValue": "5",
	    "reviewCount": "4198"
	  },
	  "offers": {
	    "@type": "Offer",
	    "priceCurrency": "INR",
	    "price": "60000",
	    "priceValidUntil": "2020-12-31",
	    "itemCondition": "https://www.schooldekho.org/",
	    "availability": "InStock",
	    "seller": {
	      "@type": "Organization",
	      "name": "school dekho"
	    }
	  }
	}
	</script>
    <title>
        @if (isset($title))
            {{ $title }}
        @endif
        @if (isset($schooldetails->name) && isset($schoolcontacts))
            {{ $schooldetails->name }}, {{ $schooldetails->address->city }},@if ($schooldetails->boards->board_name == 'CISCE')
                ICSE,
            @endif {{ $schooldetails->boards->board_name }} School
        @endif
    </title>
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/fonts/font-awesome/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/index.css') }}">
    @if (isset($schooldetails))
        <link rel="canonical" href="https://www.schooldekho.org/details/{{ $schooldetails->slug }}" />
    @endif
    {{--
	<link rel="stylesheet" href="{{asset('assets/front/css/custom/about.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom/user-form.css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/header-custom.css') }}">
    <style>
        .hide1 {
            opacity: 0;
        }

        .show1 {
            opacity: 1;
            width: 50%;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 10px;
        }
    </style>
    @stack('css')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E1MDKF376S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-E1MDKF376S');
    </script>
    <meta name="ahrefs-site-verification" content="4a3d2d8bd66ca7bd06d600e9cd28ffe7b76c61fe6097bd04658cad33e1a9f8f6">
    <!-- Clarity tracking code for https://schooldekho.org/ -->
    <script>
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i + "?ref=bwt";
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "f6okm2bblu");
    </script>
    <script async defer src="https://tools.luckyorange.com/core/lo.js?site-id=4ec8b801"></script>
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

</head>

<body>
    @include('layouts.front.partials.header')
    @include('layouts.front.partials.sidebar')
    @yield('content')
    @include('layouts.front.partials.footer')
    <!--<script src="{{ asset('assets') }}/js/vendor/jquery-1.12.4.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/slick.min.js"></script>
    <script src="{{ asset('assets') }}/js/custom/slick.js"></script>
    <script src="{{ asset('assets') }}/js/custom/main.js"></script>
    <script src="{{ asset('assets') }}/js/sweetalert.min.js"></script>
    <script>
        $("#search_key_header").keyup(function() {
            var keyword = $(this).val();
            $.ajax({
                type: "GET",
                url: `/school/search?key=${keyword}`,
                success: function(data) {
                    if (keyword.length > 0) {
                        $("#suggesstion-box-header").show();
                        $("#suggesstion-box-header").html(data);
                        $("#search-box").css("background", "#FFF");
                    } else {
                        $("#suggesstion-box-header").hide();
                    }
                }
            });
        })
        $("#search_key_header1").keyup(function() {
            var keyword = $(this).val();
            $.ajax({
                type: "GET",
                url: `/school/search?key=${keyword}`,
                success: function(data) {
                    if (keyword.length > 0) {
                        $("#suggesstion-box-header1").show();
                        $("#suggesstion-box-header1").html(data);
                        $("#search-box").css("background", "#FFF");
                    } else {
                        $("#suggesstion-box-header1").hide();
                    }
                }
            });
        })
    </script>
    <!-- START Smith.ai School Dekho Chat -->
    <!--<script type="text/javascript">
        -- >
        <
        !--window.SMITH = {}, window.SMITH.smithChatAccount = "6a607672-df07-4759-9f3f-859072ee7efc", window.SMITH.baseUrl =
            "https://app.smith.ai";
        -- >
        <
        !--
        var script = document.createElement("script");
        -- >
        <
        !--script.async = !0, script.type = "text/javascript", script.src = "https://app.smith.ai/chat/widget-latest.js",
            document.getElementsByTagName("HEAD").item(0).appendChild(script);
        -- >
        <
        !--
    </script>-->
    <!-- END Smith.ai School Dekho Chat -->
    @if ($message = Session::get('msg'))
        <script>
            swal("No School added", "Please add schools for comparison", "warning");
        </script>
    @endif
    @if ($message = Session::get('message'))
        <script>
            swal("Thanks for your query", "We will get back to you soon", "success");
        </script>
    @endif
    @if ($message = Session::get('contact_message'))
        <script>
            swal("Thanks for your query", "We will get back you soon", "success");
        </script>
    @endif
    {{-- <script>
		$(document).scroll(function() {
			myID = document.getElementById("search_bar");
			var myScrollFunc = function() {
				var y = window.scrollY;
				if (y >= 100) {
					myID.className = "search_bar show1"
				} else {
					myID.className = "search_bar hide1"
				}
			};
			window.addEventListener("scroll", myScrollFunc);
		});
	</script> --}}
    @stack('js')
</body>

</html>
