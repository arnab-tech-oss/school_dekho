@extends('layouts.frontend.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/index-custom.css') }}">
    <link rel="stylesheet" href="https://schooldekho.org/assets/front/css/custom/main.css">
    <link rel="stylesheet" href="https://schooldekho.org/assets/front/css/custom/404.css">
@endpush
@section('content')
    <style>
        .user-form-option li:nth-child(2) button i {
            background: #0044bb !important;
            color: white !important;

        }

        .user-form-option li:nth-child(2) button {
            background: #0044bb !important;
            color: white !important;

        }

        .user-form-option li:nth-child(3) button {
            background: #ffd900 !important;
            color: white !important;
        }

        .user-form-option li:nth-child(3) button i {
            background: #fcdb2479 !important;
            color: white !important;
        }

        .superSmall {
            font-size: 8px;
            text-align: justify;
        }

        .pstyle {
            max-width: 690px;
            margin-left: auto;
            margin-right: auto;
            line-height: 15px;
        }

        .pstyle2 {
            max-width: 690px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 570px) {
            .user-form-option {
                display: grid !important;
                gap: 10px;
            }

            .user-form-option li:nth-child(3) button {
                width: 100% !important
            }

            .user-form-option li:nth-child(2) button {
                width: 100% !important
            }
        }
    </style>
    <section class="container">

        <div class="mt-5  user-form-title">
            <div class="section-center-heading">
                <h2>OTP <span>Verification</span></h2>

            </div>

            <p class=" text-justify pstyle2 "><small>An OTP has been sent to the email address associated with your account.
                    Please
                    check your email inbox and/or spam folder for the OTP. The OTP is a temporary code that is valid for a
                    single use and is used to verify your identity and authenticate your account. Please enter the OTP on
                    the specified field to complete the verification process.</small></p>
        </div>

        <form action="{{ route('claim.verify.otp') }}"  method="POST">
            @csrf
            <input type="hidden" name="claim_id" id="claim_id" value="{{ $claim_id }}" value="XXXX">
            <ul class="mt-5 d-flex user-form-option">
                <li>
                    <input type="password" name="otp" class="form-control " placeholder="Enter OTP">
                </li>
                <li>
                    <button type="submit" class="btn btn-purple"><i class="fas fa-check"></i>Submit</button>
                </li>
                <li>
                    <button type="button" id="sendOTP" class="btn btn-purple"><i class="fas fa-redo-alt"></i>Resend</button>
                </li>
            </ul>
        </form>
        <div class="mt-5 superSmall">
            <div class="pstyle">
                Please ensure that you keep your email account secure and do not share your OTP with anyone. The OTP is a
                temporary code that is valid for a single use and should be used within the specified time limit. Please
                check your email inbox and/or spam folder for the OTP, and enter it on the specified field to complete the
                verification process. Additionally, it's important to note that you should not share your email
                password or any other sensitive information with anyone, and you should use a strong and unique password for
                your email account. You should also ensure that you have enabled two-factor authentication for your email
                account, which provides an additional layer of security.</div>

        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>

        <!-- Custom JavaScript -->
        <script>
            $(document).ready(function() {
                // Initialize variables
                var otpTimer;
                var otpTimerCount = 120; // 2 minutes in seconds
                var otpButton = $('#sendOTP');
                // Function to start the timer
                function startOTPTimer() {
                    otpButton.attr('disabled', true);
                    otpTimer = setInterval(function() {
                        otpTimerCount--;
                        if (otpTimerCount == 0) {
                            clearInterval(otpTimer);
                            otpButton.attr('disabled', false);
                            otpButton.text('Resend OTP');
                            otpTimerCount = 120;
                        } else {
                            otpButton.text('Resend OTP in (' + otpTimerCount + 's)');
                        }
                    }, 1000);
                }
                // Send OTP button click event handler
                otpButton.click(function() {
                    // Simulate OTP sending
                    setTimeout(function() {
                        // alert('OTP sent!');
                        startOTPTimer();
                    }, 1000);
                });
            });
        </script>

    </section>
@endsection
@push('js')
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
            return true;
        }

        function validatePincode() {
            var l = document.getElementById('pincode').value.length;
            console.log(l);
            if (l == 6) {
                document.getElementById("search_submit").disabled = false;
                document.getElementById('pincode').style.color = "black";
            } else {
                document.getElementById('pincode').style.color = "red";
                document.getElementById("search_submit").disabled = true;
            }
        }
        var current_location = {
            latitude: "",
            longitude: ""
        };
        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }
        getCurrentLocationSchools({
            latitude: "",
            longitude: ""
        });

        function showPosition(position) {
            current_location = {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude
            }
            getCurrentLocationSchools(position.coords)
        }

        function getCurrentLocationSchools(location_data) {
            var url = `/schools/recommended?latitude=${location_data.latitude}&longitude=${location_data.longitude}`;
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    if (data) {
                        $("#recommended").html(data);
                    }
                }
            });
        }
        $("#search_key").keyup(function() {
            var keyword = $(this).val();
            $.ajax({
                type: "GET",
                url: `/school/search/home?key=${keyword}`,
                success: function(data) {
                    if (keyword.length > 0) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    } else {
                        $("#suggesstion-box").hide();
                    }
                }
            });
        })
    </script>
@endpush
