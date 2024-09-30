<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords"
        content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>School Dekho Admin Panel</title>
    <!-- Fevicon -->
    <!-- <link rel="shortcut icon" href="{{ asset('assets') }}/images/small_logo.svg"> -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{ asset('assets') }}/plugins/switchery/switchery.min.css" rel="stylesheet">
    <!-- Apex css -->
    <link href="{{ asset('assets') }}/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{ asset('assets') }}/plugins/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/js/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
    @livewireStyles
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

<body class="vertical-layout">
    <!-- Start Infobar Setting Sidebar -->
    <!-- End Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        @include('layouts.counselor.partials.sidebar')
        <!-- End Leftbar -->
        <!-- Start Rightbar -->
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="index-2.html" class="mobile-logo"><img src="{{ asset('assets') }}/images/logo.svg"
                                    class="img-fluid"
                                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="{{ asset('assets') }}/images/svg-icon/horizontal.svg"
                                                class="img-fluid menu-hamburger-horizontal"
                                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                            <img src="{{ asset('assets') }}/images/svg-icon/verticle.svg"
                                                class="img-fluid menu-hamburger-vertical"
                                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="{{ asset('assets') }}/images/svg-icon/collapse.svg"
                                                class="img-fluid menu-hamburger-collapse"
                                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                            <img src="{{ asset('assets') }}/images/svg-icon/close.svg"
                                                class="img-fluid menu-hamburger-close"
                                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Topbar -->
            @include('layouts.counselor.partials.header')
            <!-- End Topbar -->
            <!-- Start Breadcrumbbar -->
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->
            @yield('content')
            <!-- End Contentbar -->
            <!-- Start Footerbar -->
            @include('layouts.counselor.partials.footer')
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- Start js -->
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/modernizr.min.js"></script>
    <script src="{{ asset('assets') }}/js/detect.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('assets') }}/js/vertical-menu.js"></script>
    <!-- Switchery js -->
    <script src="{{ asset('assets') }}/plugins/switchery/switchery.min.js"></script>
    <!-- Apex js -->
    <script src="{{ asset('assets') }}/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/apexcharts/irregular-data-series.js"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets') }}/plugins/slick/slick.min.js"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('assets') }}/js/custom/custom-dashboard.js"></script>
    <!-- Datatable js -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/js/select2/select2.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/custom/custom-table-datatable.js"></script>
    <script src="{{ asset('assets') }}/js/sweetalert.min.js"></script>
    <!-- Core js -->
    <script src="{{ asset('assets') }}/js/core.js"></script>
    @livewireScripts
    @stack('js')
    <!-- End js -->
</body>

</html>
