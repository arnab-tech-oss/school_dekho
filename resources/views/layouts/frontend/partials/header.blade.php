<style>
    @media only screen and (max-width: 767px) {
        .header-section-main {
            padding: 10px 0;
        }
    }

    .header-section-main .container .header-main-wrapper .header-logo a img {
        width: 160px;
        max-width: 160px;
    }

    .header-category-menu {
        position: relative;
        padding: 10px 10px 10px 28px;
    }

    .header-user {
        margin-left: unset;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
        .header-user {
            margin-left: 0px;
            padding-left: 20px;
        }
    }

    #headerSuggestion {
        display: none;
        position: absolute;
        top: 45px;
        width: 450px !important;
        max-height: 225px;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
        /* max-height: 0; */
        overflow-y: auto;
        width: 100%;
        /* transition: max-height 1s; */
    }

    #headerSuggestion a {
        padding: 10px 25px;
    }

    @media only screen and (max-width: 767px) {
        #headerSuggestion {
            width: 100% !important;
            left: 0 !important;
            top: 80px !important;
        }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
        #headerSuggestion {
            width: 380px !important;
        }
    }

    @media only screen and (min-width: 1500px) and (max-width: 1599px) {
        #headerSuggestion {
            width: 360px !important;
        }
    }
</style>
<div class="header-section header-sticky">
    <div class="header-main header-section-main">
        <div class="container">
            <div class="header-main-wrapper">
                <div class="header-logo">
                    <a class="header-logo__logo" href="{{ route('schools.index') }}">
                        <img src="{{ asset('assets/school/images/sd-logo.png') }}" alt="Logo" width="296"
                            height="64"></a>
                </div>
                <!-- Header Category Menu End -->
                <!-- Header Inner Start -->
                <div class="header-inner">
                    <!-- Header Search Start -->
                    <div id="headerSearch" class="header-serach">
                        {{-- START: Added during excess api hit --}}
                        <div class="header-navigation d-none d-xl-block">
                            <nav class="menu-primary">
                                <ul class="menu-primary__container">
                                    <li><a style=" display : flex; align-items: center; justify-content: center; gap: 12px;"
                                            href="javascript:void();"> <button
                                                style="border-radius: 999999999px; height: 40px; width: 40px; padding: 0; display : flex; align-items: center; justify-content: center; "
                                                onclick="getNearBySchoolsWithLocationCheck()"
                                                class="btn btn-light btn-hover-primary">
                                                <i class="far fa-map-marker-alt"></i>
                                            </button><span onclick="getNearBySchoolsWithLocationCheck()"> Schools Near
                                                Me</span></a>
                                </ul>
                            </nav>
                        </div>
                        {{-- END: Added during excess api hit --}}
                        {{-- <form style="margin: 0;" action="#">
              <input id="autocomplete" class="header-serach__input" type="text"
                placeholder="Enter school name or location...">
              <button class="header-serach__btn"><i class="far fa-map-marker-alt"></i></button>
              <div id="headerSuggestion" class="headerSuggestion-mobile suggestion-h-bs"></div>
            </form> --}}
                    </div>
                    <!-- Header Search End -->
                    <!-- Header Navigation Start -->
                    <div class="header-navigation d-none d-xl-block">
                        <nav class="menu-primary">
                            <ul class="menu-primary__container">
                                <li><a href="{{ route('schools.compare') }}"><span>Compare</span></a>
                                </li>
                                <li><a data-bs-toggle="modal" data-bs-target="#registerSchoolModal"
                                        href="#"><span>Add Your School </span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-category-menu d-none d-xl-block">
                        <a class="header-category-toggle" href="#">
                            <div class="header-category-toggle__icon active">
                                <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                        <path d=" M2,14 C3.1045695,14 4,14.8954305 4,16 C4,17.1045695 3.1045695,18 2,18
                                C0.8954305,18 0,17.1045695 0,16 C0,14.8954305 0.8954305,14 2,14 Z M9,14 C10.1045695,14
                                11,14.8954305 11,16 C11,17.1045695 10.1045695,18 9,18 C7.8954305,18 7,17.1045695 7,16
                                C7,14.8954305 7.8954305,14 9,14 Z M16,14 C17.1045695,14 18,14.8954305 18,16 C18,17.1045695
                                17.1045695,18 16,18 C14.8954305,18 14,17.1045695 14,16 C14,14.8954305 14.8954305,14 16,14 Z
                                M2,7 C3.1045695,7 4,7.8954305 4,9 C4,10.1045695 3.1045695,11 2,11 C0.8954305,11 0,10.1045695
                                0,9 C0,7.8954305 0.8954305,7 2,7 Z M9,7 C10.1045695,7 11,7.8954305 11,9 C11,10.1045695
                                10.1045695,11 9,11 C7.8954305,11 7,10.1045695 7,9 C7,7.8954305 7.8954305,7 9,7 Z M16,7
                                C17.1045695,7 18,7.8954305 18,9 C18,10.1045695 17.1045695,11 16,11 C14.8954305,11
                                14,10.1045695 14,9 C14,7.8954305 14.8954305,7 16,7 Z M2,0 C3.1045695,0 4,0.8954305 4,2
                                C4,3.1045695 3.1045695,4 2,4 C0.8954305,4 0,3.1045695 0,2 C0,0.8954305 0.8954305,0 2,0 Z
                                M9,0 C10.1045695,0 11,0.8954305 11,2 C11,3.1045695 10.1045695,4 9,4 C7.8954305,4 7,3.1045695
                                7,2 C7,0.8954305 7.8954305,0 9,0 Z M16,0 C17.1045695,0 18,0.8954305 18,2 C18,3.1045695
                                17.1045695,4 16,4 C14.8954305,4 14,3.1045695 14,2 C14,0.8954305 14.8954305,0 16,0 Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="header-category-toggle__text"></div>
                        </a>
                        <style>
                            #location-allowed-recommended,
                            #location-disallowed-recommended,
                            #location-allowed-all,
                            #location-disallowed-all {
                                display: none
                            }

                            .header-category-dropdown-wrap-d {
                                right: 0;
                                left: unset;
                            }

                            .header-category-dropdown::before {
                                right: 22px;
                                left: unset;
                            }
                        </style>
                        <div class="header-category-dropdown-wrap-d header-category-dropdown-wrap">
                            <ul class="header-category-dropdown-d header-category-dropdown">
                                <li>
                                    <a id="location-allowed-recommended" class="location-toggle"
                                        href="javascript:void();"
                                        onclick="getNearBySchoolsWithLocationCheck()">Recommended
                                        Schools</a>
                                    <a id="location-disallowed-recommended" class="location-toggle"
                                        href="javascript:void();" style="color: gray;" onclick="">Recommended
                                        Schools<br /> <span style="font-size: 8px ; color: red;">(location access
                                            denied)</span></a>
                                </li>
                                <li><a data-bs-toggle="modal" data-bs-target="#registerSchoolModal" href="#">Add
                                        Your School </a></li>
                                {{-- <li><a href="shop-left-sidebar.html">Claim your School</a></li> --}}
                                <li>
                                    <a id="location-allowed-all" class="location-toggle" href="javascript:void();"
                                        onclick="getNearBySchoolsWithLocationCheck()">All Schools</a>
                                    <a id="location-disallowed-all" class="location-toggle" href="javascript:void();"
                                        style="color: gray;" onclick="getNearBySchoolsWithLocationCheck()">All
                                        Schools<br /> <span style="font-size: 8px ; color: red;">(location
                                            access denied)</></a>
                                </li>
                                <li><a href="{{ route('schools.index') }}#counselling">Parent
                                        Counselling</a></li>
                                <li><a href="{{ route('blog.list') }}">News & Blogs</a></li>
                                <li><a href=" {{ route('about-us') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Navigation End -->
                    <!-- Header User Button Start -->
                    @if (!auth()->check())
                        <div class="header-user d-none d-lg-flex">
                            <div class="header-user__button">
                                <button class="header-user__login" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">Log
                                    In</button>
                            </div>
                            <div class="header-user__button">
                                <button class="header-user__signup btn btn-primary btn-hover-primary"
                                    data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
                            </div>
                        </div>
                    @endif
                    <style>
                        /* .header-category-dropdown-c {
                        width: unset !important;
                        min-width: unset !important;
                    } */
                        .header-category-dropdown-c::before {
                            right: 37px !important;
                            left: unset !important;
                        }

                        .header-category-dropdown-wrap-c {
                            left: unset !important;
                            right: 0 !important;
                        }
                    </style>
                    @if (auth()->check())
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <div class="header-category-menu d-none d-xl-block">
                            <a class="header-category-toggle" href="#">
                                <div class="header-category-toggle__icon active" style=" height: 45px; width: 45px;">
                                    <canvas id="user-avatar" width="45" height="45"
                                        style="border-radius: 9999px; border: 0.5px solid #ededed;"></canvas>
                                </div>
                                <div class="header-category-toggle__text"></div>
                            </a>
                            <div class="header-category-dropdown-wrap-c header-category-dropdown-wrap">
                                <ul class="header-category-dropdown header-category-dropdown-c">
                                    <li>
                                        @if (auth()->user()->role == 1)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                        @if (auth()->user()->role == 2)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                        @if (auth()->user()->role == 3)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                        @if (auth()->user()->role == 4)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                        @if (auth()->user()->role == 5)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                        @if (auth()->user()->role == 6)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                        @if (auth()->user()->role == 7)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                        @if (auth()->user()->role == 8)
                                            <a class="mr-2" href="#">
                                                {{ auth()->user()->name }} </a>
                                        @endif
                                    <li>
                                        @if (auth()->user()->role == 1 || auth()->user()->role == '4')
                                            <a class="mr-2" href="{{ route('admin.home') }}">
                                                Dashboard </a>
                                        @endif
                                        @if (auth()->user()->role == 2)
                                            <a class="mr-2" href="{{ route('schooladmin.dashboard') }}">
                                                <!-- <i class="far fa-tasks-alt"></i> --> Dashboard
                                            </a>
                                        @endif
                                        @if (auth()->user()->role == 3)
                                            <a class="mr-2" href="{{ route('student.home') }}">
                                                Dashboard </a>
                                        @endif
                                        @if (auth()->user()->role == 5)
                                            <a class="mr-2" href="{{ route('lead.dashboard') }}">
                                                Dashboard </a>
                                        @endif
                                        @if (auth()->user()->role == 8)
                                            <a class="mr-2" href="{{ route('whatsapp.dashboard') }}">
                                                Dashboard </a>
                                        @endif
                                        @if (auth()->user()->role == 7)
                                            <a class="mr-2" href="{{ route('account.dashboard') }}">
                                                Dashboard </a>
                                        @endif
                                        @if (auth()->user()->role == 6)
                                            <a class="mr-2" href="{{ route('counselor.dashboard') }}">
                                                Dashboard </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (auth()->user()->role == '2')
                                            <a href="{{ route('schooladmin.logout') }}"> Logout </a>
                                        @endif
                                        @if (auth()->user()->role == '1' || auth()->user()->role == '4')
                                            <a href="{{ route('admin.logout.perform') }}"> Logout </a>
                                        @endif
                                        @if (auth()->user()->role == '7')
                                            <a href="{{ route('account.logout') }}"> Logout </a>
                                        @endif
                                        @if (auth()->user()->role == '5')
                                            <a href="{{ route('lead.logout') }}"> Logout </a>
                                        @endif
                                        @if (auth()->user()->role == '6')
                                            <a href="{{ route('counselor.logout') }}"> Logout </a>
                                        @endif
                                        @if (auth()->user()->role == '3')
                                            <a href="{{ route('student.front.logout') }}"> Logout </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Header User Button End -->
                <!-- Header Mobile Toggle Start -->
                <div class="header-toggle">
                    {{-- <button id="toggleButton" class="header-toggle__btn search-open d-flex d-md-none">
            <svg id="openIcon" class="bi bi-search"
              style="display: inline; transition-property: all;
              transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
              transition-duration: 300ms; 
              transition-duration: 300ms; "
              stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" width="30"
              height="30" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z">
              </path>
            </svg>
            <svg id="closeIcon" class="bi bi-x"
              style="display: none; transition-property: all;
              transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
              transition-duration: 300ms; 
              transition-duration: 300ms; "
              xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M3.646 3.646a.5.5 0 0 1 .708 0L8 7.293l3.646-3.647a.5.5 0 1 1 .708.708L8.707 8l3.647 3.646a.5.5 0 1 1-.708.708L8 8.707l-3.646 3.647a.5.5 0 0 1-.708-.708L7.293 8 3.646 4.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </button> --}}
                    {{-- <button class="header-toggle__btn search-open d-flex d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30">
              <path
                d="M13 3C7.4889971 3 3 7.4889971 3 13C3 18.511003 7.4889971 23 13 23C15.396508 23 17.597385 22.148986 19.322266 20.736328L25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969L20.736328 19.322266C22.148986 17.597385 23 15.396508 23 13C23 7.4889971 18.511003 3 13 3 z M 13 5C17.430123 5 21 8.5698774 21 13C21 17.430123 17.430123 21 13 21C8.5698774 21 5 17.430123 5 13C5 8.5698774 8.5698774 5 13 5 z" />
            </svg>
          </button> --}}
                    <style>
                        .search-b {
                            display: none;
                        }

                        .suggestion-h-bs {
                            display: block;
                        }

                        .suggestion-h-ss {
                            display: none;
                        }

                        @media only screen and (max-width: 764px) {
                            .search-b {
                                display: inline;
                            }

                            .suggestion-h-ss {
                                display: block;
                            }

                            .suggestion-h-bs {
                                display: none;
                            }
                        }
                    </style>
                    <div class="search-b container">
                        <button class="header-toggle__btn d-xl-none" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasMobileMenu">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </button>
                    </div>
                    <div id="headerSearch-mobile1" style="display: none;">
                        <script>
                            const toggleButton = document.getElementById('toggleButton');
                            const headerSearch = document.getElementById('headerSearch-mobile1');
                            const headerSearch1 = document.getElementById('headerSearch');
                            const openIcon = document.getElementById('openIcon');
                            const closeIcon = document.getElementById('closeIcon');
                            toggleButton.addEventListener('click', () => {
                                if (headerSearch.style.display === 'none' || headerSearch.style.display === '') {
                                    headerSearch.style.display = 'block';
                                    openIcon.style.display = 'inline';
                                    closeIcon.style.display = 'none';
                                    headerSearch1.classList.add('open');
                                } else {
                                    headerSearch.style.display = 'none';
                                    openIcon.style.display = 'none';
                                    closeIcon.style.display = 'inline';
                                }
                            });
                        </script>
                    </div>
                </div>
                <!-- Header Mobile Toggle End -->
            </div>
            <!-- Header Inner End -->
        </div>
        <!-- Header Main Wrapper End -->
        <div id="offcanvasMobileMenu" class="offcanvas offcanvas-end offcanvas-mobile">
            <div class="offcanvas-header bg-white">
                @if (auth()->check())
                    <div class="offcanvas-logo">
                        <div class="header-category-toggle__icon active"
                            style="display: flex ;align-items: center; gap: 10px;">
                            <div class="header-category-toggle__icon active" style=" height: 45px; width: 45px;">
                                <canvas id="user-avatar2" width="45" height="45"
                                    style="border-radius: 9999px; border: 0.5px solid #ededed;"></canvas>
                            </div>
                            {{--
            <script>
              $(document).ready(function () {
                var colours = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9",
                  "#8e44ad",
                  "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                ];
                var name = "{{ auth()->user()->name }}";
                var nameSplit = name.split(" ");
                var initials = "";
                // Extract up to 3 characters as initials
                for (var i = 0; i < Math.min(3, nameSplit.length); i++) {
                  initials += nameSplit[i].charAt(0).toUpperCase();
                }
                var charIndex = initials.charCodeAt(0) - 65;
                var colourIndex = charIndex % 19;
                var canvas = document.getElementById("user-avatar2");
                var context = canvas.getContext("2d");
                var canvasWidth = $(canvas).attr("width");
                var canvasHeight = $(canvas).attr("height");
                var canvasCssWidth = canvasWidth;
                var canvasCssHeight = canvasHeight;
                if (window.devicePixelRatio) {
                  $(canvas).attr("width", canvasWidth * window.devicePixelRatio);
                  $(canvas).attr("height", canvasHeight * window.devicePixelRatio);
                  $(canvas).css("width", canvasCssWidth);
                  $(canvas).css("height", canvasCssHeight);
                  context.scale(window.devicePixelRatio, window.devicePixelRatio);
                }
                context.fillStyle = colours[colourIndex];
                context.fillRect(0, 0, canvas.width, canvas.height);
                context.font = "18px Gordita"; // Adjust the font size as needed
                context.textAlign = "center";
                context.fillStyle = "#FFF";
                context.fillText(initials, canvasCssWidth / 2, canvasCssHeight / 1.5);
              });
            </script> --}}
                            <span>{{ auth()->user()->name }} </span>
                        </div>
                    </div>
                @endif
                @if (!auth()->check())
                    <div class="header-logo">
                        <a class="header-logo__logo" href="{{ route('schools.index') }}"><img
                                src="{{ asset('assets/school/images/sd-logo.png') }}" alt="Logo"
                                style=" width: 160px;
                            max-width: 160px;" wid "296"
                                height="64"></a>
                    </div>
                @endif
                <button class="offcanvas-close" data-bs-dismiss="offcanvas" type="button"><i
                        class="fal fa-times"></i></button>
            </div>
            <div class="offcanvas-body">
                <nav class="canvas-menu">
                    <ul class="offcanvas-menu">
                        @if (auth()->check())
                            <li>
                                @if (auth()->user()->role == 1)
                                    <a class="mr-2">
                                        {{ auth()->user()->name }} </a>
                                @elseif (auth()->user()->role == 2)
                                    <a class="mr-2">
                                        {{ auth()->user()->name }} </a>
                                @endif
                                <ul class="sub-menu">
                                    <li>
                                        @if (auth()->user()->role == 1)
                                            <a class="mr-2" href="{{ route('admin.home') }}">
                                                Dashboard </a>
                                        @elseif (auth()->user()->role == 2)
                                            <a class="mr-2" href="#">
                                                Dashboard
                                            </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (auth()->user()->role == 1)
                                            <a class="mr-2" href="{{ route('admin.home') }}">
                                                Dashboard </a>
                                        @elseif (auth()->user()->role == 2)
                                            <a class="mr-2" href="#"">
                                                <!-- <i class="far fa-tasks-alt"></i> --> Account Settings
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <style>
                            #location-allowed-mob-recommended,
                            #location-disallowed-mob-recommended,
                            #location-allowed-mob-all,
                            #location-disallowed-mob-all {
                                display: none
                            }
                        </style>
                        <li><a class="active" href="/"><span>Home</span></a> </li>
                        <li>
                            <a id="location-allowed-mob-recommended" class="location-toggle"
                                href="javascript:void();" onclick="getNearBySchoolsWithLocationCheck()">Recommended
                                Schools</a>
                            <a id="location-disallowed-mob-recommended" class="location-toggle"
                                href="javascript:void();" style="color: gray;" onclick="">Recommended
                                Schools <span style="font-size: 8px ; color: red;">(location access denied)</span></a>
                        </li>
                        <li><a href="/register-school">Add Your School </a></li>
                        {{-- <li><a data-bs-toggle="modal" data-bs-target="#registerSchoolModal"
                                href="javascript:void();">Register
                                your School</a></li> --}}
                        <li>
                            <a id="location-allowed-mob-all" class="location-toggle" href="javascript:void();"
                                onclick="getNearBySchoolsWithLocationCheck()">All Schools</a>
                            <a id="location-disallowed-mob-all" class="location-toggle" href="javascript:void();"
                                style="color: gray;" onclick="getNearBySchoolsWithLocationCheck()">All Schools <span
                                    style="font-size: 8px ; color: red;">(location access
                                    denied)</span></a>
                        </li>
                        <li><a href="{{ route('schools.index') }}#counselling">Parent
                                Counselling</a></li>
                        <li><a href="{{ route('blog.list') }}">News & Blogs</a></li>
                        <li><a href=" {{ route('about-us') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="offcanvas-user d-lg-none">
                @if (!auth()->check())
                    <div class="offcanvas-user__button">
                        <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys"
                            data-bs-toggle="modal" data-bs-target="#loginModal">Log In
                        </button>
                    </div>
                    <div class="offcanvas-user__button">
                        <button class="offcanvas-user__signup btn btn-primary btn-hover-primary"
                            data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up
                        </button>
                    </div>
                @endif
                @if (auth()->check())
                    @php
                        $roleRoutes = [
                            '2' => 'schooladmin.logout',
                            '1' => 'admin.logout.perform',
                            '4' => 'admin.logout.perform',
                            '7' => 'account.logout',
                            '5' => 'lead.logout',
                            '6' => 'counselor.logout',
                            '3' => 'student.front.logout',
                        ];
                        $userRole = auth()->user()->role;
                    @endphp
                    @if (array_key_exists($userRole, $roleRoutes))
                        <div class="offcanvas-user__button">
                            <a href="{{ route($roleRoutes[$userRole]) }}">
                                <button class="offcanvas-user__signup btn btn-danger btn-hover-primary">Logout</button>
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Header Main End -->
</div>
@if (auth()->check())
    <script>
        // This function creates an avatar for the authenticated user based on their name.
        function createAvatar(canvasId) {
            // List of colors for the avatar background
            var colours = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9",
                "#8e44ad",
                "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7",
                "#7f8c8d"
            ];
            // Get the name of the authenticated user
            var name = "{{ auth()->user()->name }}";
            // Split the name into individual characters
            var nameSplit = name.split("");
            // Initialize the initials as an empty string
            var initials = "";
            // Loop through the first three characters of the name and capitalize the first letter of each
            for (var i = 0; i < Math.min(3, nameSplit.length); i++) {
                initials += nameSplit[i].charAt(0).toUpperCase();
            }
            // If the initials are less than 3 characters
            if (initials.length < 3) {
                // If the name has more than one character
                if (nameSplit.length > 1) {
                    // Set the initials as the first letter of the first and second characters of the name, capitalized
                    initials = nameSplit[0].charAt(0).toUpperCase() + nameSplit[1].charAt(0).toUpperCase();
                } else if (nameSplit.length > 0) {
                    // Set the initials as the first letter of the first character of the name, capitalized
                    initials = nameSplit[0].charAt(0).toUpperCase();
                }
            }
            // Calculate the index of the first character in the ASCII table
            var charIndex = initials.charCodeAt(0) - 65;
            // Calculate the index of the color based on the character index
            var colourIndex = charIndex % 19;
            // Get the canvas element by ID
            var canvas = document.getElementById(canvasId);
            // Get the 2D rendering context of the canvas
            var context = canvas.getContext("2d");
            // Get the width and height of the canvas
            var canvasWidth = canvas.width;
            var canvasHeight = canvas.height;
            // Scale the canvas based on the device pixel ratio (for better resolution on high-density displays)
            if (window.devicePixelRatio) {
                canvas.width *= window.devicePixelRatio;
                canvas.height *= window.devicePixelRatio;
                canvas.style.width = canvasWidth + "px";
                canvas.style.height = canvasHeight + "px";
                context.scale(window.devicePixelRatio, window.devicePixelRatio);
            }
            // Set the fill color of the context to the selected color based on the character index
            context.fillStyle = colours[colourIndex];
            // Fill the entire canvas with the selected color
            context.fillRect(0, 0, canvas.width, canvas.height);
            // Set the font style, alignment, and fill color for the initials
            context.font = "18px Gordita";
            context.textAlign = "center";
            context.fillStyle = "#FFF";
            // Draw the initials in the center of the canvas
            context.fillText(initials, canvasWidth / 2, canvasHeight / 1.5);
        }
        // When the document is ready
        $(document).ready(function() {
            // Pass the ID of the canvas element and the username to create an avatar
            createAvatar("user-avatar", "{{ auth()->user()->name }}");
            createAvatar("user-avatar2");
        });
    </script>
@endif
<script>
    // Check if the user allows location access
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // User allowed location access, show location-Allowed
            document.getElementById("location-allowed-mob-recommended").style.display = "block";
            document.getElementById("location-allowed-mob-all").style.display = "block";
            document.getElementById("location-allowed-recommended").style.display = "block";
            document.getElementById("location-allowed-all").style.display = "block";
        }, function(error) {
            // User denied location access, show location-disallowed
            document.getElementById("location-disallowed-mob-recommended").style.display = "block";
            document.getElementById("location-disallowed-mob-all").style.display = "block";
            document.getElementById("location-disallowed-recommended").style.display = "block";
            document.getElementById("location-disallowed-all").style.display = "block";
        });
    } else {
        // Geolocation is not supported, show location-disallowed
        document.getElementById("location-disallowed-mob-recommended").style.display = "block";
        document.getElementById("location-disallowed-mob-all").style.display = "block";
        document.getElementById("location-disallowed-recommended").style.display = "block";
        document.getElementById("location-disallowed-all").style.display = "block";
    }
</script>
