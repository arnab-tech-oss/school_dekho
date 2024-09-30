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

    @media (max-width: 800px) {
        .header-logo img {
            width: auto;
            height: 32px;
        }

        .header-form {
            padding-top: 15px;
        }
    }

    @media (max-width: 700px) {
        .dropdown-card-custom {
            left: 50px !important;
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
            <div style="width:100%" class="flex header-left justify-center">
                <!-- <button type="button" class="header-widget sidebar-btn visible-desktop"><i class="fas fa-align-left"></i></button> -->
                <button type="button" class="header-widget sidebar-btn"><i class="fas fa-align-left"></i></button>
                <a style="margin-right: auto; margin-left:auto;" href="{{ route('schools.index') }}"
                    class="header-logo">
                    <img style="margin-left: auto; margin-right: auto;" src="{{ asset('assets/images/logo.png') }}"
                        alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>


                <!--  <button type="button" class="header-widget">
                            <i class="fas fa-map-marker-alt"></i>
                          
                        </button> -->
                <div class="dropdown-card dropdown-card-custom">
                    <div class="dropdown-header dropdown-header-loc">
                        <h5><a class="h5" style="color: #000000; left: 350; margin-bottom: 0px;" href="#"
                                onclick="getLocation()">
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

                <!-- <button type="button" class="header-widget search-btn"><i class="fas fa-search"></i></button> -->

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
                <!-- <a href="{{ route('school.claimquery') }}" class="header-widget header-user"><span class = "span-header">Add Your School </span></a> -->
                <!-- <a href="{{ route('school.claimquery') }}" class="btn"> Add Your School </a> -->
                <!-- <ul class="header-list ">
                    <li class="header-item ">
                        <a href="{{ route('school.compare') }}" class="header-widget header-widget-compare ">
                            <img style="max-height: 25px;" src="{{ asset('assets/images/compare.svg') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me" />
                             <i class="fas fa-sliders-h" title="Comapre Schools by features"></i> -->
                <!-- <sup>
                                @if (session()->get('school_ids'))
{{ sizeof(session()->get('school_ids')) }}
@else
@php
    echo '0';
@endphp
@endif
                            </sup>
                        </a>
                    </li>
                </ul> -->

                {{-- <a href="user-form.html" class="header-widget header-user"><img
                            src="{{ asset('assets/images/school.png') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span>join us</span></a>
                <div class="header-right"> --}}

            </div>
        </div>


    </div>
    </div>
    </div>
</header>
