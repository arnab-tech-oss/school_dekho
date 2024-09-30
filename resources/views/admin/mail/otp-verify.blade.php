@extends('layouts.front.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/index-custom.css') }}">
    <link rel="stylesheet" href="https://schooldekho.org/assets/front/css/custom/main.css">
    <link rel="stylesheet" href="https://schooldekho.org/assets/front/css/custom/404.css">
@endpush

<script>


</script>

@section('content')
 <section class="error-part">
            <div class="container">
                <div class="error">
                    <h5>Mobile OTP Verify</h5>
                    <h6>An OTP has been send to your contact no. Please, enter the OTP and complete Verification.</h6>
                    <br><br>
                    <form action="{{ route('claim.verify.otp')}}" method="POST">
                        @csrf
                        <input type="hidden" name="claim_id" id="claim_id" value="{{ $claim_id }}">
                        <input type="text" name="otp" class="pl-2" placeholder="Enter OTP"><br><br>
                        <input type="submit" class="btn btn-outline" value="Submit">
                    </form>
                </div>
            </div>
        </section>
<br>
@endsection

@push('js')
<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed\
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
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


    // window.onload = function() {
    //     getLocation();
    // };


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







