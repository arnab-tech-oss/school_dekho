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
        width: 100%;
        transition: all 0.5s;
        margin-top: 0;
        padding-top: 0;
    }

    #headerSearchForm {
        display: none;
    }

    @media only screen and (max-width: 767px) {
        #headerSuggestion {
            max-height: calc(100dvh - 150px);
        }

        #headerSearchbtn {
            display: none !important;
        }

        #headerSearchForm {
            display: contents !important;
        }
    }

    #headerSuggestion a {
        padding: 10px 10px;
        /* flex-direction: column; */
        text-wrap: pretty;
    }

    #mobileSearchtoggleButton {
        display: none !important;
    }

    @media only screen and (max-width: 767px) {
        #headerSuggestion {
            width: 100% !important;
            left: 0 !important;
            top: 75px !important;
        }

        #mobileSearchtoggleButton {
            display: block !important;
        }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
        /* #headerSuggestion {
      width: 380px !important;
    } */
    }

    /* @media only screen and (min-width: 1500px) and (max-width: 1599px) {
    #headerSuggestion {
      width: 360px !important;
    }
  } */
    .header-serach {
        max-width: unset;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-serach__btn {
        position: absolute;
        top: 0;
        left: 0px;
        width: 40px;
        height: 45px;
        border: 0;
        background-color: transparent;
        color: #0071dc;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        font-size: 20px;
    }

    .header-inner {
        justify-content: space-between;
    }

    .header-serach__input {
        padding: 3px 12px;
    }

    .header-serach__form {
        display: contents;
    }

    .search-suggestion-wrap {
        position: relative;
        width: 100%;
    }

    .menu-primary__container>li>a {
        padding: 12px 17px;
    }

    #searchText {
        overflow: hidden;
        /* Hide the text initially */
        white-space: nowrap;
        /* Prevent wrapping */
        border-right: 0.15em solid orange;
        /* Create the cursor */
        animation: typing 3.5s steps(40, end), blink 0.5s step-end infinite;
        /* Animations */
    }

    @keyframes typing {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    @keyframes blink {

        from,
        to {
            border-color: orange;
        }

        50% {
            border-color: transparent;
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('mobileSearchtoggleButton');
        const headerSearch = document.getElementById('headerSearch');
        const openIcon = document.getElementById('openIcon');
        const closeIcon = document.getElementById('closeIcon');
        toggleButton.addEventListener('click', async function() {
            try {
                const position = await new Promise((resolve, reject) => {
                    navigator.geolocation.getCurrentPosition(resolve, reject);
                });
                // headerSearch.classList.toggle('open');
                // console.log(headerSearch.classList);
                // if (headerSearch.classList.contains('open')) {
                //  openIcon.style.display = 'none';
                // closeIcon.style.display = 'inline';
                // } else {
                //     openIcon.style.display = 'inline';
                //   closeIcon.style.display = 'none';
                // }
                showSearchRecomended();
                $('#searchModal').modal('show');
            } catch (error) {
                console.error('Error in getNearBySchoolsWithLocationCheck:', error);
                if (error.code === error.PERMISSION_DENIED) {
                    document.getElementById('locationDeniedMessage').innerText =
                        "To use this feature, please allow location access in your browser settings.";
                    locationDeniedModal.show();
                    openIcon.style.display = 'inline';
                    closeIcon.style.display = 'none';
                    headerSearch.classList.remove('open');
                } else {
                    console.error('Geolocation error:', error);
                }
            }

        });
    });
</script>
<div class="header-section header-sticky">
    <div class="header-main header-section-main">
        <div class="container-fluid">
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
                        <div class="header-navigation d-none d-xl-block">
                            <nav class="menu-primary">
                                <ul class="menu-primary__container">
                                    <li>
                                        <a onclick="getNearBySchoolsWithLocationCheck()"
                                            style=" display : flex; align-items: center; justify-content: center; gap: 12px;"
                                            href="javascript:void();">
                                            <button
                                                style="border-radius: 999999999px; height: 40px; width: 40px; padding: 0; display : flex; align-items: center; justify-content: center; "
                                                class="btn btn-light btn-hover-primary">
                                                <i class="far fa-map-marker-alt"></i>
                                            </button><span>Schools Near
                                                Me </span>
                                        </a>
                                    </li>
                                    <li id="headerSearchbtn" ">
                    <a style=" display : flex; align-items: center; justify-content: center; gap: 12px;" href="javascript:void();">
                    <button style="border-radius: 999999999px; height: 40px; width: 40px; padding: 0; display : flex; align-items: center; justify-content: center; " onclick="ShowSearchBar()" class="btn btn-light btn-hover-primary">
                      <i class="far fa-search"></i>
                    </button><span onclick="ShowSearchBar()"> Search</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <style>
              .dropdown-school-list,
              .dropdown-locations-list {
                padding: 0 0;
              }

              .dropdown-school-list div,
              .dropdown-locations-list div {
                font-weight: 500;
                line-height: 1.31;
                color: #7e7e7e;
                /* padding-bottom: .5rem; */
              }

              .dropdown-school-list li a {
                display: flex;
                gap: 10px;
              }

              .dropdown-school-list li a img {
                height: 40px;
                width: 40px;
              }

              .dropdown-school-list li a div {
                display: flex;
                flex-direction: column;
                font-size: 15px;
                /* justify-content: space-between; */
              }

              .dropdown-school-list li a div span {
                font-size: 10px;
              }

              #headerSuggestion hr {
                margin: .5rem 0;
              }

              .suggestion-headers-schools {
                display: flex;
                flex-direction: initial !important;
                align-items: center;
                font-size: 14px !important;
                gap: .25rem
              }
              .header-search-button{
                font-weight: 500;
                background-color: #f5f5f5;
                border-color: #F5F5F5;
                color: #969696;
                width: 100%;
                text-align: left;
                padding: 0 20px;
              }
              #searchTextTypeWriter{
                margin-left: .5ch;
                overflow: hidden;
                border-right: black solid 1px;
                padding-right: 3px; animation: blink 1s step-end infinite;
              }
            @keyframes blink { from, to { border-color: transparent; } 50% { border-color: black; } /* Adjust cursor color here */ } </style>
            <form id="headerSearchForm" class="header-serach__form" style="margin: 0; display: none;" action="#">
              <div class="search-suggestion-wrap">
                <a id ="searchModalToggleer" href="javascript:void();" data-bs-toggle="modal" data-bs-target="#searchModal" class="header-search-button btn"> <i class="far fa-search"></i> <span id="searchTextTypeWriter">Enter a School Name</span>
                </a>
              </div>
            </form>
<script>
    const textElement = document.querySelector('#searchTextTypeWriter');
    const texts = ["Enter School Name", "Enter Your Location", ];
    let currentChar = 0;
    let currentTextIndex = 0;
    let isTyping = true;

    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function typeWriter() {
        if (isTyping) {
            if (currentChar < texts[currentTextIndex].length) {
                textElement.textContent = texts[currentTextIndex].slice(0, currentChar + 1);
                currentChar++;
                setTimeout(typeWriter, getRandomNumber(50, 250));
            } else {
                isTyping = false;
                setTimeout(typeWriter, 500);
            }
        } else {
            if (currentChar > -1) {
                textElement.textContent = texts[currentTextIndex].slice(0, currentChar);
                currentChar--;
                setTimeout(typeWriter, getRandomNumber(50, 100));
            } else {
                isTyping = true;
                currentTextIndex = (currentTextIndex + 1) % texts.length;
                currentChar = 0;
                setTimeout(typeWriter, 1000);
            }
        }
    }
    window.addEventListener("DOMContentLoaded", function() {
        typeWriter();
    });
</script>

          </div>
          <!-- Header Search End -->
          <!-- Header Navigation Start -->
          <div class="header-navigation d-none d-xl-block">
            <nav class="menu-primary">
              <ul class="menu-primary__container">
                <li><a href="{{ route('schools.compare') }}"><span>Compare</span></a>
                </li>
                <li><a href="{{ route('register-school') }}"><span>Add Your School </span></a></li>
                {{-- <li><a data-bs-toggle="modal" data-bs-target="#registerSchoolModal" href="#"><span>Register your
                      School</span></a></li> --}}
              </ul>
            </nav>
          </div>
          <div class="header-category-menu d-none d-md-block">
            <a class="header-category-toggle" href="#">
              <div class="header-category-toggle__icon active">
                <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g stroke="none" stroke-width="1" fill-rule="evenodd">
                    <path d=" M2,14 C3.1045695,14 4,14.8954305 4,16 C4,17.1045695 3.1045695,18 2,18 C0.8954305,18
                                        0,17.1045695 0,16 C0,14.8954305 0.8954305,14 2,14 Z M9,14 C10.1045695,14
                                        11,14.8954305 11,16 C11,17.1045695 10.1045695,18 9,18 C7.8954305,18 7,17.1045695
                                        7,16 C7,14.8954305 7.8954305,14 9,14 Z M16,14 C17.1045695,14 18,14.8954305 18,16
                                        C18,17.1045695 17.1045695,18 16,18 C14.8954305,18 14,17.1045695 14,16
                                        C14,14.8954305 14.8954305,14 16,14 Z M2,7 C3.1045695,7 4,7.8954305 4,9
                                        C4,10.1045695 3.1045695,11 2,11 C0.8954305,11 0,10.1045695 0,9 C0,7.8954305
                                        0.8954305,7 2,7 Z M9,7 C10.1045695,7 11,7.8954305 11,9 C11,10.1045695
                                        10.1045695,11 9,11 C7.8954305,11 7,10.1045695 7,9 C7,7.8954305 7.8954305,7 9,7 Z
                                        M16,7 C17.1045695,7 18,7.8954305 18,9 C18,10.1045695 17.1045695,11 16,11
                                        C14.8954305,11 14,10.1045695 14,9 C14,7.8954305 14.8954305,7 16,7 Z M2,0
                                        C3.1045695,0 4,0.8954305 4,2 C4,3.1045695 3.1045695,4 2,4 C0.8954305,4
                                        0,3.1045695 0,2 C0,0.8954305 0.8954305,0 2,0 Z M9,0 C10.1045695,0 11,0.8954305
                                        11,2 C11,3.1045695 10.1045695,4 9,4 C7.8954305,4 7,3.1045695 7,2 C7,0.8954305
                                        7.8954305,0 9,0 Z M16,0 C17.1045695,0 18,0.8954305 18,2 C18,3.1045695
                                        17.1045695,4 16,4 C14.8954305,4 14,3.1045695 14,2 C14,0.8954305 14.8954305,0
                                        16,0 Z">
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
                                {{-- <li><a data-bs-toggle="modal" data-bs-target="#registerSchoolModal" href="#">Register
                    your School</a></li> --}}
                                <li><a href="{{ route('register-school') }}">Add Your School </a></li>
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
                        <div class="header-user d-none d-md-flex">
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

                        .mobile-search-button {
                            display: none;
                        }

                        .mobile-search-button:hover {
                            color: #0071dc;
                        }

                        @media only screen and (max-width: 767px) {
                            .mobile-search-button {
                                all: unset;
                                display: block;
                            }
                        }
                    </style>
                    @if (auth()->check())
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <div class="header-category-menu d-none d-md-block">
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
                                            <a href="#"> Logout </a>
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
                    {{-- <button id="toggleButton" class="header-toggle__btn search-open d-flex d-md-none"> --}}

                    {{-- <button id="toggleButton" class="mobile-search-button">

                        <svg id="openIcon" class="bi bi-search"
                            style="display: inline; transition-property: all;
                  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                  transition-duration: 300ms;
                  transition-duration: 300ms; "
                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                            width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z">
                            </path>
                        </svg>
                    </button> --}}

                    <button id="mobileSearchtoggleButton" style="all: unset">
                        <svg id="openIcon" class="bi bi-search"
                            style="display: inline; transition-property: all;
              transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
              transition-duration: 300ms;
              transition-duration: 300ms; "
                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                            width="30" height="30" xmlns="http://www.w3.org/2000/svg">
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
                    </button>
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
                                                <!-- <i class="far fa-tasks-alt"></i> --> Dashboard
                                            </a>
                                        @endif
                                    </li>
                                    {{-- x --}}
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
                            '3' => 'student.logout',
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
<style>
    .header-serach__input-custom {
        background: white;
        border: unset;
        font-size: 32px;
        font-weight: 500;
    }

    .modal-content-search {
        height: auto;
        max-height: 100lvh;
        transition: all 0.5s;
        padding: 15px 15px 0px 15px;
    }

    .modal-header-search {
        margin-bottom: 0;
        position: relative
    }

    .clear-btn {
        all: unset;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: 10px;
        top: 50%;
        font-size: 32px;
        transform: translateY(-50%);
        padding: 5px;
        height: 32px;
        width: 32px;
        transition: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    .clear-btn:hover {
        font-size: 35px;
        border-radius: 0.25rem;
        cursor: pointer;
        /* background: #ff000025;
    color: #ff0000; */
    }

    @media only screen and (max-width: 767px) {
        .search-suggestion-wrap {
            position: static;
        }

        .clear-btn {
            right: 0;
        }
    }

    .modal-wrapper-search {
        position: absolute;
        top: 0;
        padding-top: 0;
    }

    .header-category-dropdown-search {
        margin: 0;
        list-style-type: unset;
        background: unset;
        box-shadow: unset;
        border: unset;
        border-radius: unset;
        width: unset;
        position: unset;
        padding: 14px 0 0;
        background:
    }

    .header-category-dropdown::before {
        display:
    }

    @media only screen and (width > 768px) {
        .modal-dialog.modal-dialog-search {
            max-width: 100dvw;
        }
    }

    @media only screen and (max-width: 767px) {
        .modal-dialog.modal-register-searcj {
            max-width: 100%;
        }

        .modal-content-search {
            padding: 15px 15px 0 15px;
        }
    }

    .modal-dialog.modal-dialog-search {
        margin-inline: auto;
    }

    /* .modal-dialog.modal-dialog-search {
        max-width: calc(100dvw - 100px);
    } */
    .header-category-dropdown-search::before {
        border-left: unset;
        border-right: unset;
        border-bottom: unset;
    }

    .suggestion-wrapper {
        /* display: flex;
        justify-content: center;
        align-items: center; */
        overflow-y: auto;
        margin-top: 15px;
    }

    .modal-dialog-search {
        margin: 0;
    }

    .modal-content-search {
        border-radius: 0;
    }

    @media only screen and (max-width: 767px) {
        .header-category-dropdown-search {
            font-size: 20px;
        }

        .modal-dialog.modal-dialog-search {
            max-width: 100dvw;
        }
    }

    @media only screen and (max-width: 460px) {
        .header-serach__input-custom {
            font-size: 20px;
        }

        .modal-content-search {
            padding: 15px 15px 0px 15px;
        }
    }

    #recomendedSearchSuggestion {
        display: none;
        list-style: none;
        padding: 10px 15px;
        border-radius: 5px;
        background: #fafbff;
        margin-bottom: 15px;

        & h3 {
            top 0;
            font-size: 20px;
            font-weight: 500;
            line-height: 1.4;
            /* letter-spacing: 2px; */
            color: #0071dc;
            margin-top: 10px;
            position: sticky;
            background: #fafbff;
        }

        & a {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 12px;
            border-radius: 5px;
            padding: 3px;

            &:hover {
                box-shadow: 0 0 5px #ccc;
                /* padding: 0px 10px; */
                background: white;
            }
        }

        & img {
            height: 100%;
            width: 100%;
            max-width: 40px;
            max-height: 40px;
        }

        & .suggestion-headers-schools {
            font-size: 16px;
            padding-top: 0.5rem;
            line-height: 0.75;
            font-weight: 500;
        }

        & .location-element {
            font-size: 12px;
            padding-bottom: 0px;
            color: #777777;
        }

        & li {
            padding: 3px 0;
        }
    }
</style>
<div style="position: absolute">
    <div id="searchModal" class="modal fade">
        <div class="modal-dialog modal-dialog-searc modal-dialog-centered modal-register modal-dialog-search">
            <div style="margin-top:0 " class="modal-wrapper modal-wrapper-search">
                <div class="modal-content modal-content-search">
                    <div class="modal-header modal-header-search">
                        <input id="headerSearchInputa" class="header-serach__input header-serach__input-custom"
                            type="text" placeholder="Enter School Name or Location">
                        <button id="clearButton" class="clear-btn" type="button"><i
                                class="fal fa-times"></i></button>
                        {{-- <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button> --}}

                    </div>
                    <div class="modal-body suggestion-wrapper">
                        <ul id="headerSuggestion"
                            class="header-category-dropdown headerSuggestion-mobile suggestion-h-bs header-category-dropdown-search">

                        </ul>
                        <ul id="recomendedSearchSuggestion"></ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<template id="search-suggition-list">
    <li> <a href="">
            <div style="width: 20px; height: 20px">
                <svg id="Flat" style="width: 100%; height: 100%" fill="#252525" viewBox="0 0 256 256"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M244.00244,56.00513V120a12,12,0,0,1-24,0V84.9707l-75.51465,75.51465a11.99973,11.99973,0,0,1-16.9707,0L96.00244,128.9707,32.48779,192.48535a12.0001,12.0001,0,0,1-16.9707-16.9707l72-72a11.99973,11.99973,0,0,1,16.9707,0l31.51465,31.51465L203.03174,68h-35.0293a12,12,0,0,1,0-24h63.99512c.39746-.00024.79541.02075,1.1914.06006.167.01636.32911.04785.49366.071.22314.0315.44629.05786.66748.10181.19238.03809.37793.09131.56689.13843.19092.04761.3833.09009.57276.14721.18505.05616.36377.126.54492.19068.18847.06714.37793.12939.56347.2063.16846.06982.33008.1521.49415.22949.19091.08936.3833.17432.57031.27441.15527.0835.30273.17847.4541.26856.18506.10986.37207.21484.55225.33545.16455.11035.31884.2334.478.35156.15479.11523.31348.22314.46387.34692.28467.23365.55664.4812.81787.73951.019.01879.04.03418.05908.05322s.03467.04.05371.05908c.2583.262.50635.53418.73975.81885.12012.146.22461.2998.33691.45019.12159.16309.24805.32251.36133.49195.11865.177.22168.36084.33008.54272.0918.1543.189.30518.27393.46387.09863.18408.18213.37329.2705.56128.07862.16723.16211.33179.2334.50317.07569.18311.13721.37036.20362.55664.06591.18311.13623.36377.19287.551.05713.18823.09912.37964.14648.56982.04736.18946.10059.37622.13916.56909.04346.22071.07031.44361.10156.666.02344.16553.05518.32788.07129.49536Q244.00171,55.40808,244.00244,56.00513Z">
                        </path>
                    </g>
                </svg>
            </div>

            <img src="" alt="">
            <div class="info-element">
                <div class="suggestion-headers-schools">
                    <i class="fas fa-badge-check text-primary small" data-bs-tooltip="tooltip"
                        data-bs-placement="top" data-bs-original-title="Verified" title=""
                        aria-label="Select Demo"></i>
                </div>
                <span class="location-element"></span>
            </div>
        </a>
    </li>
</template>

<!-- Header Main End -->

@if (auth()->check())
    <script>
        function createAvatar(canvasId) {
            var colours = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9",
                "#8e44ad",
                "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7",
                "#7f8c8d"
            ];
            var name = "{{ auth()->user()->name }}";
            var nameSplit = name.split("");
            var initials = "";
            for (var i = 0; i < Math.min(3, nameSplit.length); i++) {
                initials += nameSplit[i].charAt(0).toUpperCase();
            }
            if (initials.length < 3) {
                if (nameSplit.length > 1) {
                    initials = nameSplit[0].charAt(0).toUpperCase() + nameSplit[1].charAt(0).toUpperCase();
                } else if (nameSplit.length > 0) {
                    initials = nameSplit[0].charAt(0).toUpperCase();
                }
            }
            var charIndex = initials.charCodeAt(0) - 65;
            var colourIndex = charIndex % 19;
            var canvas = document.getElementById(canvasId);
            var context = canvas.getContext("2d");
            var canvasWidth = canvas.width;
            var canvasHeight = canvas.height;
            if (window.devicePixelRatio) {
                canvas.width *= window.devicePixelRatio;
                canvas.height *= window.devicePixelRatio;
                canvas.style.width = canvasWidth + "px";
                canvas.style.height = canvasHeight + "px";
                context.scale(window.devicePixelRatio, window.devicePixelRatio);
            }
            context.fillStyle = colours[colourIndex];
            context.fillRect(0, 0, canvas.width, canvas.height);
            context.font = "18px Gordita";
            context.textAlign = "center";
            context.fillStyle = "#FFF";
            context.fillText(initials, canvasWidth / 2, canvasHeight / 1.5);
        }
        $(document).ready(function() {
            createAvatar("user-avatar", "{{ auth()->user()->name }}");
            createAvatar("user-avatar2");
        });
    </script>
@endif
<script>
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById("location-allowed-mob-recommended").style.display = "block";
            document.getElementById("location-allowed-mob-all").style.display = "block";
            document.getElementById("location-allowed-recommended").style.display = "block";
            document.getElementById("location-allowed-all").style.display = "block";
        }, function(error) {
            document.getElementById("location-disallowed-mob-recommended").style.display = "block";
            document.getElementById("location-disallowed-mob-all").style.display = "block";
            document.getElementById("location-disallowed-recommended").style.display = "block";
            document.getElementById("location-disallowed-all").style.display = "block";
        });
    } else {
        document.getElementById("location-disallowed-mob-recommended").style.display = "block";
        document.getElementById("location-disallowed-mob-all").style.display = "block";
        document.getElementById("location-disallowed-recommended").style.display = "block";
        document.getElementById("location-disallowed-all").style.display = "block";
    }
</script>
<script>
    const inputField = document.getElementById('headerSearchInputa');
    const suggestionContainer = document.getElementById('headerSuggestion');
    const clearButton = document.getElementById('clearButton');
    const searchActivator = document.querySelector('#searchModalToggleer');
    const searchRecomendedTemplate = document.querySelector('#search-suggition-list');
    const recommendedSearchcontainer = document.querySelector('#recomendedSearchSuggestion');

    var latitude;
    var longitude;
    var debounceTimeout;

    function showSearchRecomended() {
        const recommendedSearchUrl = `/schoolSearch?latitude=${latitude}&longitude=${longitude}`;

        recommendedSearchcontainer.innerHTML = '';

        const heading = document.createElement('h3');
        // const headingIcon = document.createElement('i');
        // headingIcon.classList.add('fad', 'fa-fire', 'ms-2', );
        // headingIcon.style.setProperty('--fa-primary-color', '#ffe115');
        // headingIcon.style.setProperty('--fa-secondary-color', '#e33c19');
        // headingIcon.style.setProperty('--fa-secondary-opacity', '0.7');
        const headingText = document.createElement('span');
        headingText.textContent = 'Trending Searches';
        heading.appendChild(headingText);
        // heading.appendChild(headingIcon);
        recommendedSearchcontainer.appendChild(heading);

        fetch(recommendedSearchUrl)
            .then(response => response.json())
            .then(data => {

                data.suggestions.forEach(suggestion => {
                    const cloneList = searchRecomendedTemplate.content.cloneNode(true);

                    const anchor = cloneList.querySelector('a');
                    anchor.href = suggestion.link;

                    const img = cloneList.querySelector('img');
                    img.src = suggestion.logo;
                    img.alt = suggestion.name;
                    const location = cloneList.querySelector('.location-element');
                    location.textContent = suggestion.location;

                    const schoolName = cloneList.querySelector('.suggestion-headers-schools');
                    schoolName.textContent = suggestion.name;
                    // img.style.display = 'none';

                    recommendedSearchcontainer.appendChild(cloneList);
                });

                recommendedSearchcontainer.style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

    }

    searchActivator.addEventListener('click', showSearchRecomended);

    inputField.addEventListener('input', function() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(function() {
            handleInput();
        }, 750);
    });

    clearButton.addEventListener('click', clearInput);

    document.addEventListener('click', function(event) {
        if (!event.target.matches('.header-serach__input')) {
            suggestionContainer.style.display = 'none';
        }
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
            },
            function(error) {
                console.error("Error getting geolocation:", error.message);
            }
        );
    } else {
        console.error("Geolocation is not supported by this browser.");
    }

    function handleInput() {
        const inputValue = inputField.value.toLowerCase();
        const searchUrl = `/school/header/search/${inputValue}/${latitude}/${longitude}`;
        const recommendedSearchUrl = `/schoolSearch?latitude=${latitude}&longitude=${longitude}`;

        if (inputValue.trim() === '') {
            suggestionContainer.style.display = 'none';
            recommendedSearchcontainer.style.display = 'block';
        } else {
            fetch(searchUrl)
                .then(response => response.json())
                .then(data => {
                    displaySuggestions(data.suggestions);
                    clearButton.style.display = inputValue.trim() === '' ? 'none' : 'flex';
                    recommendedSearchcontainer.style.display = 'none';

                    if (typeof _paq !== 'undefined' && _paq.push) {
                        _paq.push(['trackSiteSearch', inputValue, false, data.suggestions.length]);
                    }
                })
                .catch(error => console.error('Error fetching data:', error));

        }
    }

    function displaySuggestions(suggestions) {
        // console.log(suggestions);
        suggestionContainer.innerHTML = '';
        if (suggestions.length === 0 || inputField.value.trim() === '') {
            suggestionContainer.style.display = 'none';
            return;
        }
        const schoolSection = createSection('Schools:', suggestions);
        if (schoolSection) {
            suggestionContainer.appendChild(schoolSection);
        }
        suggestionContainer.style.display = 'block';
    }

    function createSection(headerText, schools) {
        if (schools.length === 0) {
            return null;
        }
        const section = document.createElement('ul');
        section.classList.add('dropdown-school-list');
        const sectionHTML = schools.map(school =>
            ` <li> <a href="${school.link}"> <img src="${school.logo}" alt="${school.name}"> <div class="info-element"> <div class="suggestion-headers-schools"> ${school.name} ${school.verified ? '<i class="fas fa-badge-check text-primary small" data-bs-tooltip="tooltip" data-bs-placement="top" data-bs-original-title="Verified" title="" aria-label="Select Demo"></i>' : ''} </div> <span class="location-element">${school.location}</span> </div> </a> </li> `
        ).join('');
        section.innerHTML = sectionHTML;
        return section;
    }

    function clearInput() {
        inputField.value = '';
        suggestionContainer.style.display = 'none';
        clearButton.style.display = 'none';
        $('#searchModal').modal('hide');

    }
</script>
