<style>
    .header-form {
        margin: 0px 20px !important;
    }
    .header-widget i {
        border: 1px solid #ccc;
        transition: all linear .1s;
        -webkit-transition: all linear .1s;
        -moz-transition: all linear .1s;
        -ms-transition: all linear .1s;
        -o-transition: all linear .1s;
    }
    .dropdown-card-custom {
        background: fixed;
        position: fixed;
        top: 62px;
        left: 350px !important ;
        z-index: 3;
        width: 230px;
        border-radius: 8px;
        /* padding-bottom: 15px; */
        background: var(--white);
        box-shadow: var(--primary-bshadow);
        display: none;
        padding: 0px;
    }
    @media (max-width: 800px){
        .header-logo img {
            width: auto;
            height: 32px;
        }
        .header-form {
            padding-top: 15px;
        }
    }

    @media (max-width: 700px){
        .dropdown-card-custom {
            left:50px !important;
        }
    }
    .header-search button i {
        width: 36px;
        height: 36px; 
        line-height: 36px; 
        text-align: center;
        color: var(--text);
        transition: all linear .3s;
        -webkit-transition: all linear .3s;
        -moz-transition: all linear .3s;
        -ms-transition: all linear .3s;
        -o-transition: all linear .3s;
    }
</style>

<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-left">
                <!-- <button type="button" class="header-widget sidebar-btn visible-desktop"><i class="fas fa-align-left"></i></button> -->
                <button type="button" class="header-widget sidebar-btn"><i class="fas fa-align-left"></i></button>
                <a href="{{ route('school.index') }}" class="header-logo"><img src="{{ asset('assets/images/logo.png') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                <!-- @if(!Auth::check())
                <a href="{{ route('schooladmin.signup')}}" class="header-widget header-user" style = "border:0px;"><img src="{{ asset('assets/images/school.png') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>Register your School</span></a>
                <button type="button" class="header-widget search-btn"><i class="fas fa-search"></i></button>
                @else

                @endif -->

                <button type="button" class="header-widget">
                            <i class="fas fa-map-marker-alt"></i>
                            <!-- <sup>0</sup> -->
                        </button>
                        <div class="dropdown-card dropdown-card-custom">
                            <div class="dropdown-header">
                              <h5><a class="h5" style="color: #000000; left: 350; margin-bottom: 0px;" href="#" onclick="getLocation()">
                                    <i style=" color:#0044bb;" class="fas fa-crosshairs"></i>
                                    Detect current
                                    location
                                </a></h5>
                                <!-- <a href="notification.html">view all</a> -->

                            <div>
                               
                                <script>
                                    function getLocation() {
                                        if (navigator.geolocation) {

                                            navigator.geolocation.getCurrentPosition(showPosition);
                                        }
                                    }

                                    function showPosition(position) {
                                        debugger
                                        var current_location = {
                                            latitude: position.coords.latitude,
                                            longitude: position.coords.longitude
                                        }

                                        var url = `/pincode?latitude=${current_location.latitude}&longitude=${current_location.longitude}`;
                                        $.ajax({
                                            type: "GET",
                                            url: url,

                                            success: function(data) {
                                                if (data.is_success) {
                                                    localStorage.setItem('pincode', data.data?.pincode);
                                                    location.reload();
                                                }

                                            }
                                        });

                                    }
                                </script>
                            </div>
                       
                            </div>
                        </div>

                <button type="button" class="header-widget search-btn"><i class="fas fa-search"></i></button>

            </div>
            <div class="header-form " id="search_bar">

                <div class="header-search header-search-custom header-search-head">

                   <!--  <div class="dropdown">
                        <a style="background: transparent;
                            padding: 11px;
                            width: auto;"
                            type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span data-toggle="tooltip" data-placement="bottom" title="Click Here to detect Location">
                                <i style=" color:#0044bb;" class="fas fa-map-marker-alt"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu w-auto" aria-labelledby="dropdownMenu2" style="text-align: center;
            width: 200px !important;
            position: absolute;
            transform: translate3d(0px, 52px, 0px);
            top: 0px;
            left: -65px;
            will-change: transform;">
                            <div>
                                <a style="color: #000000;" href="#" onclick="getLocation()">
                                    <i style=" color:#0044bb;" class="fas fa-crosshairs"></i>
                                    Detect current
                                    location
                                </a>
                                <script>
                                    function getLocation() {
                                        if (navigator.geolocation) {

                                            navigator.geolocation.getCurrentPosition(showPosition);
                                        }
                                    }

                                    function showPosition(position) {
                                        debugger
                                        var current_location = {
                                            latitude: position.coords.latitude,
                                            longitude: position.coords.longitude
                                        }

                                        var url = `/pincode?latitude=${current_location.latitude}&longitude=${current_location.longitude}`;
                                        $.ajax({
                                            type: "GET",
                                            url: url,

                                            success: function(data) {
                                                if (data.is_success) {
                                                    localStorage.setItem('pincode', data.data?.pincode);
                                                    location.reload();
                                                }

                                            }
                                        });

                                    }
                                </script>
                            </div>
                        </div>
                    </div> -->
                    {{-- <button type="button" title="Filter by Location" class=""><i class="fas fa-map-marker-alt"></i></i></button> --}}
                    <input id="search_key_header" type="text" class="inlinex" style="    width: 100%; height: 38px;  padding-left: 20px;" placeholder="Search School Dekho">
                    <button type="submit" class="btn-primary my-auto mx-auto icon-center header-search-button" onclick="GoToHeader()" title="Search Submit "><i class="fas fa-search fa-search-1" </i></i></button>

                </div>
                <div class="header-option" id="suggesstion-box-header"></div>

            </div>
            <script>
                // var enter = document.getElementById("search_key_header");
                //         enter.addEventListener("keydown", function(e) {
                //             if (e.code === "Enter") { //checks whether the pressed key is "Enter"
                //                 GoTo();
                //             }
                //         });

                //         function GoTo() {
                //             var key = document.getElementById("search_key_header").value;
                //             console.log(key);
                //             url = "{{ url('/search/') }}" + "/" + key;
                //             console.log(url);
                //             window.location.href = url;
                //         }
                var input = document.getElementById('search_key_header');
                input.addEventListener('keyup', function(e) {
                    var closeIcon = document.getElementById('reset-search-bar');
                    if (input.value.length > 0) {
                        closeIcon.style.display = 'block';
                    }

                    if (input.value.length == 0) {
                        closeIcon.style.display = 'none';
                    }
                });

                function hideSerachBar() {
                    document.getElementById('search_key_header').value = "";
                    document.getElementById('suggesstion-box-header').style.display = "none";
                    document.getElementById('reset-search-bar').style.display = "none";
                }
                var enter = document.getElementById("search_key_hebtn-sm;
                enter.addEventListener("keydown", function(e) {

                    if (e.code === "Enter") { //checks whether the pressed key is "Enter"

                        GoToHeader();
                    }
                });

                function GoToHeader() {

                    var key = document.getElementById("search_key_header").value;
                    console.log(key);
                    url = "{{ url('/search/') }}" + "/" + key;
                    console.log(url);

                    window.location.href = url;
                }
            </script>
            <script>
                window.addEventListener('scroll', function() {
                    if (window.scrollY !== 0) {

                        document.getElementById('searchBar').classList.add('scrolled');

                        if ($("#search_key_header").val().length > 0)
                            $("#suggesstion-box-header").show();
                    } else {
                        $("#suggesstion-box-header").hide();
                        document.getElementById('searchBar').classList.remove('scrolled');
                    }
                });
            </script>

            <div class="header-right ">
            <a href="{{ route('school.claimquery') }}" class="header-widget header-user"><span class = "span-header">Register Your School</span></a>
                <!-- <a href="{{ route('school.claimquery') }}" class="btn"> Register Your School</a> -->
                <ul class="header-list ">
                    <li class="header-item ">
                        <a href="{{ route('school.compare') }}" class="header-widget header-widget-compare ">
                            <img style="max-height: 25px;" src="{{asset('assets/images/compare.svg')}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me" />
                            <!-- <i class="fas fa-sliders-h" title="Comapre Schools by features"></i> -->
                            <sup>
                                @if(session()->get('school_ids'))
                                {{ sizeof(session()->get('school_ids')) }}
                                @else
                                @php
                                echo "0";
                                @endphp

                                @endif
                            </sup>
                        </a>
                    </li>
                </ul>
                @if (!Auth::check())
                <a href="{{ route('student.login.register') }}" class="btn btn-inline post-btn"><span>
                        Login</span></a>
                @else
                {{-- <a href="user-form.html" class="header-widget header-user"><img
                            src="{{ asset('assets/images/school.png') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>join us</span></a>
                <div class="header-right"> --}}
                    <ul class="header-list">
                        <li class="header-item">
                            <a href="#" class="header-widget header-user"><img src="{{ asset('assets/images/school.png') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>{{auth()->user()->name}}</span></a>
                            <div class="dropdown-card">
                                <div class="dropdown-header">
                                    <h5>My Account</h5>
                                </div>
                                <ul class="notify-list" style="height: 100%">
                                    <li class="notify-item">
                                        @if(auth()->user()->role == '3')
                                        <a href="{{route('student.home')}}" target="blank" class="notify-link">
                                            {{-- <div class="notify-img"><img src="images/avatar/01.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                            </div> --}}
                                            <div class="notify-content">
                                                <p class="notify-text">Dashboard</p>
                                            </div>
                                        </a>
                                        @elseif(auth()->user()->role == '2')
                                        <a href="{{route('school.home')}}" target="blank" class="notify-link">
                                            {{-- <div class="notify-img"><img src="images/avatar/01.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                            </div> --}}
                                            <div class="notify-content">
                                                <p class="notify-text">Dashboard</p>
                                            </div>
                                        </a>
                                        @elseif(auth()->user()->role == '1'||auth()->user()->role == '4')
                                        <a href="{{route('admin.home')}}" target="blank" class="notify-link">
                                            {{-- <div class="notify-img"><img src="images/avatar/01.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                            </div> --}}
                                            <div class="notify-content">
                                                <p class="notify-text">Dashboard</p>
                                            </div>
                                        </a>
                                        @endif
                                    </li>
                                    @if(auth()->user()->role == '3')
                                    <li class="notify-item">
                                        <a href="{{ route('student.password.view')}}" target="blank" class="notify-link">

                                            <div class="notify-content">
                                                <p class="notify-text">Settings
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->role == '3')
                                    <li class="notify-item">
                                        <a href="{{route('student.front.logout')}}" class="notify-link">

                                            <div class="notify-content">
                                                <p class="notify-text">Logout
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    @elseif(auth()->user()->role == '2')
                                    <li class="notify-item">
                                        <a href="{{route('school.logout')}}" class="notify-link">

                                            <div class="notify-content">
                                                <p class="notify-text">Logout
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    @elseif(auth()->user()->role == '1' || auth()->user()->role == '4')
                                    <li class="notify-item">
                                        <a href="{{route('admin.logout.perform')}}" class="notify-link">

                                            <div class="notify-content">
                                                <p class="notify-text">Logout
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            @endif

        </div>
    </div>
    </div>
</header>