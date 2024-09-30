   @php
       use App\Models\SchoolClaim;
       $username = SchoolClaim::where('claim_id', Auth::user()->id)->first();
   @endphp
   <!DOCTYPE html>
   <html class="no-js" lang="en">

   <head>
       <meta charset="utf-8" />
       <meta http-equiv="x-ua-compatible" content="ie=edge" />
       <title>Admin - School Dekho</title>
       <meta name="robots" content="noindex, follow" />
       <meta name="description" content="" />
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
       <!-- Favicon -->
       <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico" />
       <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/school/images/favicon.png"> -->
       <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->
       <!-- Font CSS -->
       <link rel="preconnect" href="https://fonts.googleapis.com" />
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
       <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
           rel="stylesheet" />
       <!-- Vendor CSS (Bootstrap & Icon Font) -->
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/vendor/fontawesome-all.min.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/vendor/edumall-icon.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/vendor/bootstrap.min.css" />
       <!-- Plugins CSS (All Plugins Files) -->
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/aos.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/swiper-bundle.min.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/perfect-scrollbar.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/jquery.powertip.min.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/glightbox.min.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/flatpickr.min.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/ion.rangeSlider.min.css" />
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/plugins/select2.min.css" />
       <!-- Style CSS -->
       <link rel="stylesheet" href="{{ asset('assets') }}/school/css/style.css" />
       @yield('css')
       @livewireStyles
       <style>
           .btn-c {
               font-size: 13px !important;
           }

           @media only screen and (min-width: 992px) and (max-width: 1199px),
           only screen and (min-width: 768px) and (max-width: 991px) {
               .btn-c {
                   padding: 0px 20px !important;
               }
           }

           @media only screen and (max-width: 786px) {
               .dashboard-header__btn {
                   display: none;
               }
           }
       </style>
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

   <body class="dashboard-page dashboard-nav-fixed">
       @include('layouts.schooladmin.partials.sidebar')
       {{-- @include('layouts.schooladmin.partials.menu') --}}
       <!-- Dashboard Main Wrapper Start -->
       <main class="dashboard-main-wrapper">
           <!-- Dashboard Header Start -->
           <div class="dashboard-header">
               <div class="container">
                   <!-- Dashboard Header Wrapper Start -->
                   <div class="dashboard-header__wrap">
                       <div class="dashboard-header__toggle-menu d-xl-none">
                           <button class="toggle-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDashboard">
                               <svg width="20px" height="18px" viewBox="0 0 20 18" version="1.1"
                                   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                   <path
                                       d="M18.7179688,2.60581293 L1.28207031,2.60581293 C0.573828125,2.60581293 0,2.02491559 0,1.30798783 C0,0.591060076 0.573828125,0.0101231939 1.28207031,0.0101231939 L18.7179688,0.0101231939 C19.4261719,0.0101231939 20,0.591020532 20,1.30798783 C20,2.02495513 19.4261719,2.60581293 18.7179688,2.60581293 Z">
                                   </path>
                                   <path
                                       d="M11.5384766,10.5957293 L1.28207031,10.5957293 C0.573828125,10.5957293 2.91322522e-13,10.0147924 2.91322522e-13,9.29786464 C2.91322522e-13,8.58093688 0.573828125,8 1.28207031,8 L11.5384766,8 C12.2466797,8 12.8205469,8.58089734 12.8205469,9.29786464 C12.8205469,10.0148319 12.2466797,10.5957293 11.5384766,10.5957293 Z">
                                   </path>
                                   <path
                                       d="M18.7179688,17.6 L1.28207031,17.6 C0.573828125,17.6 0,17.0628683 0,16.4 C0,15.7371317 0.573828125,15.2 1.28207031,15.2 L18.7179688,15.2 C19.4261719,15.2 20,15.7370952 20,16.4 C20,17.0628683 19.4261719,17.6 18.7179688,17.6 Z">
                                   </path>
                               </svg>
                           </button>
                       </div>
                       <div class="dashboard-header__user">
                           <div class="dashboard-header__user-avatar">
                               <img src="{{ asset('assets') }}/school/images/avatar-male.svg" alt="Avatar"
                                   width="90" height="90" />
                           </div>

                           <div class="dashboard-header__user-info">
                               <h4 class="dashboard-header__user-name">
                                   <span class="welcome-text"></span>
                                   {{ $username?->name }}
                               </h4>
                               <div class="dashboard-header__user-rating">
                                   <!-- <div class="rating-star">
                                    <div class="rating-label" style="width: 100%;"></div>
                                </div> -->
                                   <p> <span>{{ auth()->user()->email }} </span></p>

                               </div>
                               <div class="dashboard-header__user-rating">
                                   <!-- <div class="rating-star">
                                    <div class="rating-label" style="width: 100%;"></div>
                                </div> -->

                               </div>
                           </div>
                       </div>
                       <div class="dashboard-header__btn">
                           <a class="btn btn-c btn-outline-primary" data-bs-toggle="modal" data-bs-target="#SchoolClaim"
                               href="#"><i class="edumi edumi-content-writing"></i>
                               <span class="text">Claim A School </span></a>
                           <a class="btn btn-c btn-outline-primary" href="{{ route('schooladmin.add') }}"><i
                                   class="edumi edumi-content-writing"></i>
                               <span class="text">Register School </span></a>
                       </div>
                       <div class="dashboard-header__toggle">
                           <button class="btn btn-toggle">
                               <i class="far fa-bars"></i>
                           </button>
                       </div>
                   </div>
                   <!-- Dashboard Header Wrapper End -->
               </div>
           </div>
           <div class="dashboard-menu">
               <!-- Dashboard Menu Close Start -->
               <div class="dashboard-menu__close">
                   <button class="close-btn"><i class="fal fa-times"></i></button>
               </div>
               <!-- Dashboard Menu Close End -->
               <!-- Dashboard Menu Content Start -->
               <div class="dashboard-menu__content">
                   <div class="dashboard-menu__image">
                       <img src="assets/images/canvas-menu-image.png" alt="Images" width="984"
                           height="692" />
                   </div>
                   <div class="dashboard-menu__main-menu">
                       <ul class="dashboard-menu__menu-link">
                           <li><a href="/">Home</a></li>
                           <li><a href="{{ route('blog.list') }}">News & Blogs</a></li>
                           <li><a href=" {{ route('about-us') }}">About Us</a></li>
                           <li><a href="{{ route('contact') }}">Contact Us</a></li>
                       </ul>
                       <div class="dashboard-menu__search">
                           <!-- <form action="#">
                        <input type="text" placeholder="Search…">
                        <button class="search-btn"><i class="far fa-search"></i></button>
                    </form> -->
                           <ul class="dashboard-menu__menu-link">
                               <li><a href="{{ route('schooladmin.logout') }}">Logout</a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <!-- Dashboard Menu Content End -->
           </div>
           {{-- @include('layouts.schooladmin.partials.header'); --}}
           <!-- Dashboard Header End -->
           <!-- Dashboard Content Start -->
           @yield('content')
           <!-- Dashboard Content End -->
           @include('layouts.schooladmin.partials.registermodal')
           @include('layouts.schooladmin.partials.claimschoolmodal')
       </main>
       <!-- Dashboard Main Wrapper End -->
       <!-- JS Vendor, Plugins & Activation Script Files -->
       <!-- Vendors JS -->
       @livewireScripts
       <script src="{{ asset('assets') }}/school/js/vendor/modernizr-3.11.7.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/vendor/jquery-3.6.0.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/vendor/jquery-migrate-3.3.2.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/vendor/bootstrap.bundle.min.js"></script>
       <!-- Plugins JS -->
       <script src="{{ asset('assets') }}/school/js/plugins/aos.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/parallax.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/swiper-bundle.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/perfect-scrollbar.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/jquery.powertip.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/nice-select.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/glightbox.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/jquery.sticky-kit.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/imagesloaded.pkgd.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/masonry.pkgd.min.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/flatpickr.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/range-slider.js"></script>
       <script src="{{ asset('assets') }}/school/js/plugins/select2.min.js"></script>
       <script src="{{ asset('assets') }}/js/sweetalert.min.js"></script>
       <!-- Activation JS -->
       <script src="{{ asset('assets') }}/school/js/main.js"></script>
       <script src="{{ asset('assets') }}/js/jquery.slimscroll.js"></script>
       <script>
           $("#search_claim_key").keyup(function() {
               var keyword = $(this).val();
               var url = `/search/claim?key=${keyword}`;
               console.log(url);
               $.ajax({
                   type: "GET",
                   url: `/search/claim?key=${keyword}`,
                   success: function(data) {
                       if (keyword.length > 0) {
                           $("#suggesstion-claim-box").show();
                           $("#suggesstion-claim-box").html(data);
                           $("#search-box").css("background", "#FFF");
                       } else {
                           $("#suggesstion-claim-box").hide();
                       }
                   },
               });
           });
       </script>
       @if ($message = Session::get('update_message'))
           <script>
               swal(
                   "Profile updated",
                   "Your profile has been updated successfully",
                   "success"
               );
           </script>
       @endif
       @if ($message = Session::get('wrong_password'))
           <script>
               swal({
                   icon: "error",
                   title: "Wrong Password",
                   text: "Entered password is wrong!",
                   footer: '<a href="">Why do I have this issue?</a>',
               });
           </script>
       @endif
       @if ($message = Session::get('password_updated'))
           <script>
               swal(
                   "Password updated",
                   "Your password has been updated successfully",
                   "success"
               );
           </script>
       @endif
       @if ($message = Session::get('password_not_same'))
           <script>
               swal({
                   icon: "error",
                   title: "Wrong Password",
                   text: "Entered password is not same!",
                   footer: '<a href="">Why do I have this issue?</a>',
               });
           </script>
       @endif
       @if ($message = Session::get('Claimed'))
           <script>
               swal("Claimed", "you have claimed this school", "success");
           </script>
       @endif
       @if ($message = Session::get('payment_success'))
           <script>
               swal("Payment Success", "your subscription period has been started", "success");
           </script>
       @endif

       @if (isset($subscription_check) && isset($last_date))
           <div id="subsciption-expired" class="modal fade" data-backdrop="static" data-keyboard="false"
               style="display: none;" aria-hidden="true">
               <div class="modal-dialog modal-lg modal-dialog-centered">
                   <!-- Modal Wrapper Start -->
                   <div class="modal-wrapper">
                       <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                       <!-- Modal Content Start -->
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Subscription Expired!</h5>
                           </div>
                           <div class="modal-body">
                               <style>
                                   .modal-body {
                                       text-align: justify;
                                       text-wrap: pretty;

                                       & strong {
                                           font-weight: 500;
                                       }

                                       @media(max-width: 500px) {
                                           text-align: left;
                                       }
                                   }
                               </style>

                               <p> It seems that your subscription expired on
                                   <strong>{{ date('d-m-Y', strtotime($last_date)) }}</strong>. If
                                   you'd like to continue using School Dekho, please renew your
                                   subscription.
                               </p>
                               <p> To renew, kindly contact us at <a href="tel:18002588074">
                                       <strong>1800 2588 074</strong>
                                   </a> or email us at <a href="mailo:info@schooldekho.org">
                                       <strong>info@schooldekho.org</strong> </a> </p>

                           </div>
                       </div>
                       <!-- Modal Content End -->
                   </div>
                   <!-- Modal Wrapper End -->
               </div>
           </div>

           <script>
               $(document).ready(function() {
                   var isSubscriptionExpired = {{ $subscription_check ? 'true' : 'false' }};

                   function checkSubscriptionStatus() {
                       if (isSubscriptionExpired) {
                           $("#subsciption-expired").modal('show');
                       }
                   }
                   checkSubscriptionStatus();
                   setInterval(checkSubscriptionStatus, 10000);
               });
           </script>
       @endif
   </body>

   </html>
