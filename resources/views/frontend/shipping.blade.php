@extends('layouts.frontend.app')
@section('canonical')
    <link rel="canonical" href="https://www.schooldekho.org/shipping" />
@endsection
@push('css')
@endpush
<style>
    .sticky-parent {
        margin-top: 0 !important;
    }

    .h-margin {
        margin-top: 65px;
    }
</style>
@section('content')
    <div class="tutor-course-main-content section-padding-01 sticky-parent">
        <div class="custom-container container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tutor Course Main Segment Start -->
                    <div class="tutor-course-main-segment">
                        <!-- Tutor Course Segment Start -->
                        <div class="tutor-course-segment">
                            <div
                                style="
                    transform: translate3d(0px, 0px, 0px);
                    transform-style: preserve-3d;
                    backface-visibility: hidden;
                    position: relative;
                    display: block;
                    left: 0px;
                    top: 0px;
                  ">
                                <!-- Page Breadcrumb Start -->
                                <div class="page-breadcrumb">
                                    <div class="container" style="padding-left: unset">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active">Shipping Policy</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Page Breadcrumb End -->
                                <!-- Instructor Banner Start -->
                                <div class="instructor-banner">
                                    <div class="custom-container container" style="padding-left: unset">
                                        <div class="row align-items-end align-items-xl-center">
                                            <div class="col-lg-6">
                                                <!-- Instructor Banner Start -->
                                                <div class="instructor-banner__content aos-init aos-animate"
                                                    data-aos="fade-up" data-aos-duration="1000">
                                                    <!-- Section Title Start -->
                                                    <div class="section-title">
                                                        <h2 class="section-title__title-03">Shipping Policy</h2>
                                                    </div>
                                                    <!-- Section Title End -->
                                                </div>
                                                <!-- Instructor Banner End -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Instructor Banner End -->
                            </div>
                            <!-- Tutor Course Segment Content Wrapper Start -->
                            <div class="tutor-course-segment__content-wrap">
                                <p style="text-align: justify">
                                    Thank you for visiting schooldekho.org. The following are the terms and
                                    conditions that constitute
                                    our Shipping Policy.
                                </p>
                                <p style="text-align: justify;padding-top:20px;">
                                    <strong>Shipment processing time</strong>
                                </p>
                                <p style="text-align: justify;padding-top:20px;padding-bottom:30px;">
                                    All orders are processed as soon as the payment is completed since the
                                    delivery is online. In the
                                    event of any delivery failure, which may occur due to any technical
                                    failure, the same would be taken
                                    care of after information is received at our end within 3–10 working
                                    days.
                                </p>
                            </div>
                            <!-- Tutor Course Segment Content Wrapper End -->
                        </div>
                        <!-- Tutor Course Segment End -->
                        <!-- Tutor Course Segment Start -->
                        <div class="tutor-course-segment"></div>
                        <!-- Tutor Course Segment End -->
                    </div>
                    <!-- Tutor Course Main Segment End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Log In Modal Start -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-dialog-centered modal-login">
            <!-- Modal Wrapper Start -->
            <div class="modal-wrapper">
                <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <!-- Modal Content Start -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <p class="modal-description">Don't have an account yet? <button data-bs-toggle="modal"
                                data-bs-target="#registerModal">Sign up for
                                free</button></p>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="modal-form">
                                <label class="form-label">Username or email</label>
                                <input class="form-control" type="text" placeholder="Your username or email">
                            </div>
                            <div class="modal-form">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="modal-form d-flex justify-content-between flex-wrap gap-2">
                                <div class="form-check">
                                    <input id="rememberme" type="checkbox">
                                    <label for="rememberme">Remember me</label>
                                </div>
                                <div class="text-end">
                                    <a class="modal-form__link" href="#">Forgot your password?</a>
                                </div>
                            </div>
                            <div class="modal-form">
                                <button class="btn btn-primary btn-hover-secondary w-100">Log In</button>
                            </div>
                        </form>
                        <div class="modal-social-option">
                            <p>or Log-in with</p>
                            <ul class="modal-social-btn">
                                <li><a class="btn facebook" href="#"><i class="fab fa-facebook-square"></i>
                                        Gacebook</a></li>
                                <li><a class="btn google" href="#"><i class="fab fa-google"></i>
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
    <div class="modal fade" id="registerModal">
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
                        <form action="#">
                            <div class="row gy-5">
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Last Name</label>
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Username</label>
                                        <input class="form-control" type="text" placeholder="username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="text" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" type="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-form">
                                        <label class="form-label">Re-Enter Password</label>
                                        <input class="form-control" type="password" placeholder="Re-Enter Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="modal-form form-check">
                                        <input id="privacy" type="checkbox">
                                        <label for="privacy">Accept the Terms and Privacy Policy</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="modal-form">
                                        <button class="btn btn-primary btn-hover-secondary w-100">Register</button>
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
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showRecommends);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showRecommends(position) {
                var url =
                    `/recommend?latitude=${position.coords.latitude}&longitude=${position.coords.longitude}`;
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
        // $("#search_key").keyup(function() {
        //     var keyword = $(this).val();
        //     $.ajax({
        //         type: "GET",
        //         url: `/school/search/home?key=${keyword}`,
        //         success: function(data) {
        //             if (keyword.length > 0) {
        //                 $("#suggesstion-box").show();
        //                 $("#suggesstion-box").html(data);
        //                 $("#search-box").css("background", "#FFF");
        //             } else {
        //                 $("#suggesstion-box").hide();
        //             }
        //         }
        //     });
        // })
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
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                // $('#latitude').val(place.geometry['location'].lat());
                // $('#longitude').val(place.geometry['location'].lng());
                var url =
                    `/searchin?latitude=${place.geometry['location'].lat()}&longitude=${place.geometry['location'].lng()}`;
                window.location.href = url;
            });
        }
    </script>
@endpush
