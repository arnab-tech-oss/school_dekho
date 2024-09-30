<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="School Dekho">
    <meta name="email" content="info@schooldekho.org">
    <meta name="name" content="School Dekho">
    <meta name="type" content="School Search Engine">
    <meta name="title" content="School Dekho - India's 1st Search Engine for School Admissions">
    <meta name="google-site-verification" content="AxwE9o1P7J4osh4pV9JYil6Ddrx1e6EU6ZO9OeiMDPA" />
    @if (isset($blogdetails))
        <meta name="keywords" content="{{ str_replace(',', ' ', $blogdetails->meta_keywords) }}">
    @else
    @endif
    <meta name="description"
        content="School Dekho is dedicated to giving you the best school of your choice with a focus on education, infrastructure, extra-curricular activities, etc.">
    <meta name="robots"
        content="schools near me, school compare, compare schools, best school in, best school in my city, best schools near me, best schools in the town, top school, school dekho, school search portal, school admissions, admission, education, school, students, admissions , study, india, viral, admission2023 , ICSE, CBSE, BESTCBSESCHOOL, Best icse school, best school near me, best school for my kid, dekho phir chuno, my school, trending, trending now, Popular Post, education, students, school, dream school, get school admission, school admission open">
    <meta name="keywords"
        content="schools near me, school compare, compare schools, best school in, best school in my city, best schools near me, best schools in the town, top school, school dekho, school search portal, school admissions, admission, education, school, students, admissions , study, india, viral, admission2023 , ICSE, CBSE, BESTCBSESCHOOL, Best icse school, best school near me, best school for my kid, dekho phir chuno, my school, trending, trending now, Popular Post, education, students, school, dream school, get school admission, school admission open">
    <meta name="theme-color" content="#000066" />

    <title>

        @if (isset($title))
            {{ $title }}
        @endif
        @if (isset($schooldetails->name))
            {{ $schooldetails->name }} | School Dekho | Best School near me
        @endif
    </title>
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

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/fonts/font-awesome/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/index.css') }}">
    <link href="{{ asset('assets') }}/js/select2/select2.min.css" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="{{asset('assets/front/css/custom/about.css')}}"> --}}
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y1GK7DW95Z"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Y1GK7DW95Z');
    </script>
    <meta name="ahrefs-site-verification" content="4a3d2d8bd66ca7bd06d600e9cd28ffe7b76c61fe6097bd04658cad33e1a9f8f6">

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
    <script src="{{ asset('assets') }}/js/select2/select2.min.js"></script>
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
