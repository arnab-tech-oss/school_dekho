@extends('layouts.frontend.app')
@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection
@push('css')
@endpush
@section('content')
    <style>
        .section-padding-02 {
            margin-top: 0 !important;
        }

        .h-margin {
            margin-top: 65px;
        }

        .dashboard-content-box {
            border-radius: 5px;
            border: 1px solid #ededed;
            background: #FFFFFF;
            padding: 30px;
        }

        body {
            background-color: #f5f5f5;
        }

        @media only screen and (max-width: 767px) {
            .btn {
                height: 52px !important;
            }
        }
    </style>
    <div class="counter-section section-padding-02 custom-container container">
        <div class="h-margin">
            <div class="col">
                <div class="dashboard-content-box">

                    <h4 class="dashboard-content-box__title">Contact information</h4>
                    <p>Provide your details below to create your account profile</p>

                    <form class="row gy-4" method="POST" action="{{ route('school.new.application.submit') }}">
                        @csrf
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Student Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Student's Name"
                                    required>
                                <input type="hidden" name="school_id" id="school_id" value="{{ $id }}">
                            </div>
                            <!-- Account Account details End -->
                        </div>

                        <div class="col-md-3">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Class</label>
                                <select type="text" class="form-control" name="seeking_class" id="seeking_class" required>
                                    <option value="">Select Class</option>
                                    <option value="1">Prenursery</option>
                                    <option value="2">Nursery</option>
                                    <option value="3">LKG</option>
                                    <option value="4">UKG</option>
                                    <option value="5">KG</option>
                                    <option value="6">Class 1</option>
                                    <option value="7">Class 2</option>
                                    <option value="8">Class 3</option>
                                    <option value="9">Class 4</option>
                                    <option value="10">Class 5</option>
                                    <option value="11">Class 6</option>
                                    <option value="12">Class 7</option>
                                    <option value="13">Class 8</option>
                                    <option value="14">Class 9</option>
                                    <option value="15">Class 10</option>
                                    <option value="16">Class 11</option>
                                    <option value="17">Class 12</option>
                                </select>
                            </div>
                            <!-- Account Account details End -->
                        </div>

                        <div class="col-md-3">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Gender</label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 " id="phone-input-container" style="position: relative">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input" id="application_phone_label">
                                <label class="form-label-02">Phone</label>
                                <input type="text" class="form-control" name="phone" id="application_phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                            <div style="position: absolute; bottom: 0; right: 15px;">
                                <a href="javascript:void(0)" id="otp_send_button" style="display: none;"
                                    class="btn btn-primary" onclick="sendApplicationOtp()">Send
                                    OTP</a>
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-6" id="otp-view" style="display: none; position: relative">
                            <div> <label class="form-label-02">OTP</label>
                                <input type="text" id="otp_code" placeholder="12345" class="form-control">
                            </div>
                            <div style="position: absolute; bottom: 0; right: 15px;">
                                <a id="otp_submit_button" class="btn btn-primary" onclick="verify()">Verify & Submit</a>
                            </div>
                            <div id="OtpMessage" style="display: none;">OTP Verified</div>
                        </div>
                        <div class="">
                            <button type="submit" disabled id="application_submit_button" class="btn btn-primary"
                                style="display: none;">Submit Application</button>
                        </div>
                    </form>

                </div>
                <!-- Dashboard Settings Info End -->

            </div>
        </div>
    @endsection
    @push('js')
        <script>
            var hash_key = null;

            document.getElementById('application_phone').addEventListener('keyup', function(e) {
                if (document.getElementById('application_phone').value.length === 10) {
                    document.getElementById('otp_send_button').style.display = 'block';
                } else {
                    document.getElementById('otp_send_button').style.display = 'none';
                }
            });

            function sendApplicationOtp() {
                var mobile = document.querySelector('#application_phone').value;
                var body = {
                    mobile: mobile
                };
                fetch('/send/application/otp', {
                    method: 'POST',
                    body: JSON.stringify(body),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json()).then(data => {

                    if (data.is_success) {
                        hash_key = data.data.hash_key;
                        document.getElementById('otp_send_button').disabled = true;
                        document.getElementById('application_phone_label').style.display = 'none';
                        document.getElementById('phone-input-container').style.display = 'none';
                        var inputField = document.getElementById("otp-view");
                        if (inputField.style.display === "none") {
                            inputField.style.display = "block";
                        }
                    } else {
                        alert(data.message);
                    }
                }).catch(error => {
                    alert("Something gone wrong");
                    console.log(error);
                })

            }

            function verify() {
                var otp_code = document.querySelector('#otp_code').value;
                var school_id = document.querySelector('#school_id').value;
                var name = document.querySelector('#name').value;
                var seeking_class = document.querySelector('#seeking_class').value;
                // var school_type = document.querySelector('#school_type').value;
                var gender = document.querySelector('#gender').value;
                var phone = document.querySelector('#application_phone').value;
                // alert(otp_code);
                var body = {
                    code: otp_code,
                    hash_key: hash_key,
                    school_id: school_id,
                    name: name,
                    seeking_class: seeking_class,
                    gender: gender,
                    phone: phone
                };
                fetch('/verify/application/otp', {
                    method: 'POST',
                    body: JSON.stringify(body),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json()).then(data => {

                    if (data.is_success) {
                        // document.getElementById('application_submit_button').style.display = 'block';
                        document.getElementById('application_submit_button').disabled = false;
                        // document.getElementById('OtpMessage').style.display = 'block';
                        document.getElementById('otp-view').style.display = 'none';
                       
                        document.getElementById('otp_send_button').style.display = 'none'

                         alert("Application submitted successfully");
                         location.reload();
                    } else {
                        alert(data.message);
                    }

                }).catch(error => {
                    alert("Something gone wrong");
                })

            }
        </script>
    @endpush
