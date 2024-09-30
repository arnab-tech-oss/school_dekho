@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Facilities</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Container -->
<form action="{{ route('admin.school.facility.new') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="contentbar">
    {{-- <div class="col-lg-4 col-xl-4"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Educational Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="education[]" value="Library">
                        <label for="accessories" style="margin-left: 10px;margin-top: -5px;">Library</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="education[]" value="Career Counseling">
                        <label for="computer" style="margin-left: 10px;margin-top: -5px;">Career Counseling</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="education[]" value="Student Exchange">
                        <label for="mobile" style="margin-left: 10px;margin-top: -5px;">Student Exchange</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="education[]" value="Digital Library">
                        <label for="headphone" style="margin-left: 10px;margin-top: -5px;">Digital Library</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="education[]" value="Counseling">
                        <label for="camera" style="margin-left: 10px;margin-top: -5px;">Counseling</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="education[]" value="Test Center">
                        <label for="camera" style="margin-left: 10px;margin-top: -5px;">Test Center</label>
                    </div>
            </div>
        </div>

    </div>
    {{-- <div class="col-lg-4 col-xl-4"> --}}
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Classroom Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                <div class="form-row col-md-4">
                    <input type="checkbox" name="classroom[]" value="AC Class rooms">
                    <label style="margin-left: 10px;margin-top: -5px;" for="accessories">AC Class rooms</label>
                </div>
                <div class="form-row col-md-4">
                    <input type="checkbox" name="classroom[]" value="AV Class rooms">
                    <label style="margin-left: 10px;margin-top: -5px;" for="computer">AV Class rooms</label>
                </div>

                <div class="form-row col-md-4">
                    <input type="checkbox" name="classroom[]" value="Lockers">
                    <label style="margin-left: 10px;margin-top: -5px;" for="mobile">Lockers</label>
                </div>
                </div>
            </div>

        </div>

    {{-- </div> --}}
    {{-- <div class="col-lg-3 col-xl-3"> --}}
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Laboratories Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="lab[]" value="Laboratories">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Laboratories</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="lab[]" value="Language Lab">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Language Lab</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="lab[]" value="Computer Labs">
                        <label style="margin-left: 10px;margin-top: -5px;" for="mobile">Computer Labs</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="lab[]" value="Robotics Labs">
                        <label style="margin-left: 10px;margin-top: -5px;" for="robo">Robotics Labs</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="lab[]" value="Math Labs">
                        <label style="margin-left: 10px;margin-top: -5px;" for="camera">Math Labs</label>
                    </div>
                </div>
            </div>
        </div>

    {{-- </div>
</div> --}}
{{-- <div class="row"> --}}
    {{-- <div class="col-lg-4 col-xl-4"> --}}
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Boarding Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                <div class="form-row col-md-4">
                    <input type="checkbox" name="boarding[]" value="Hostel">
                    <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Hostel</label>
                </div>
                <div class="form-row col-md-4">
                    <input type="checkbox" name="boarding[]" value="AC Hostel">
                    <label style="margin-left: 10px;margin-top: -5px;" for="computer">AC Hostel</label>
                </div>
                </div>
            </div>
        </div>

        {{-- </div>
    </div> --}}
    {{-- <div class="col-lg-7 col-xl-7"> --}}
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Sports Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Play Area">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Play Area</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Badminton">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Badminton</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Cricket">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Cricket</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Covered Play Area">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Covered Play Area</label>
                    </div>                
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Hockey">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Hockey</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Football">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Football</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Volleyball">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Volleyball</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Tennis">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Tennis</label>
                    </div>                
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Kabaddi">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Kabaddi</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Swimming">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Swimming</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Table Tennis">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Table Tennis</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Athletics">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Athletics</label>
                    </div>                
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Gymnasium">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Gymnasium</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="Karate">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Karate</label>
                    </div>
                </div>
            </div>
        </div>
{{-- 
    </div>
</div> --}}
<br>
{{-- <div class="row">
    <div class="col-lg-4 col-xl-4"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Performing Arts Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="arts[]" value="Art">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Art</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="arts[]" value="Dance">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Dance</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="arts[]" value="Dramatics">
                        <label style="margin-left: 10px;margin-top: -5px;" for="mobile">Dramatics</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="arts[]" value="Music">
                        <label style="margin-left: 10px;margin-top: -5px;" for="headphone">Music</label>
                    </div>
                </div>
            </div>

        </div>

    <br>
    {{-- <div class="col-lg-4 col-xl-4"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Digital Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="digital[]" value="AV Facilities">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">AV Facilities</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="digital[]" value="Interactive Boards">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Interactive Boards</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="digital[]" value="School App">
                        <label style="margin-left: 10px;margin-top: -5px;" for="mobile">School App</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="digital[]" value="Wi-fi">
                        <label style="margin-left: 10px;margin-top: -5px;" for="headphone">Wi-fi</label>
                    </div>
                </div>
            </div>

        </div>

    <br>
    {{-- <div class="col-lg-4 col-xl-3"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Food and Catering Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="food[]" value="Canteen">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Canteen</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="food[]" value="Meal Served">
                        <label style="margin-left: 10px;margin-top: -5px;" for="computer">Meal Served</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="food[]" value="School App">
                        <label style="margin-left: 10px;margin-top: -5px;" for="mobile">School App</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="food[]" value="Kitchen & Dining Hall">
                        <label style="margin-left: 10px;margin-top: -5px;" for="headphone">Kitchen & Dining Hall</label>
                    </div>
                </div>
            </div>

        </div>
<br>
{{-- <div class="row">
    <div class="col-lg-4 col-xl-4"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Safety & Security Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="CCTV">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">CCTV</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="Fire Alarm">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Fire Alarm</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="Fire Extinguisher">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Fire Extinguisher</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="Security Guards">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Security Guards</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="Boundary Wall">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Boundary Wall</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="Fenced Boundary Wall">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Fenced Boundary Wall</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="Speedometer in Bus">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Speedometer in Bus</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="GPS in Bus">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">GPS in Bus</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="CCTV in Bus">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">CCTV in Bus</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="Fire Extinguisher in Bus">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Fire Extinguisher in Bus</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="School Bus">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">School Bus</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="security[]" value="School Bus Tracking App">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">School Bus Tracking App</label>
                    </div>
                </div>
            </div>
        </div>
   <br>

    {{-- <div class="col-lg-4 col-xl-4"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Medical Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="medical[]" value="Medical Facility">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Medical Facility</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="medical[]" value="Medical Room or Clinic">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Medical Room or Clinic</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="medical[]" value="ICU">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">ICU</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="medical[]" value="Medical Staff">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Medical Staff</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="medical[]" value="Isolation Room">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Isolation Room</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="medical[]" value="Dedicated Ambulance">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Dedicated Ambulance</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="medical[]" value="Resident Doctor">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Resident Doctor</label>
                    </div>
                </div>
            </div>
        </div>
    <br>
    {{-- <div class="col-lg-3 col-xl-3"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Other Infra Facilities</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="infra[]" value="Kids Play Area">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Kids Play Area</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="infra[]" value="Activity Center">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Activity Center</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="infra[]" value="Toy Room">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Toy Room</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="infra[]" value="Amphitheatre">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Amphitheatre</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="infra[]" value="Auditorium">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Auditorium</label>
                    </div>
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="infra[]" value="Day Care">
                        <label style="margin-left: 10px;margin-top: -5px;" for="accessories">Day Care</label>
                    </div>
                </div>
            </div>
        </div>
    <br>
{{-- <div class="row"> --}}
    {{-- <div class="col-lg-12 col-xl-10"> --}}
        {{-- <div class="card m-b-24"> --}}
             {{-- <div class="card-body"> --}}
               <div class="form-row">
                    <div class="col-md-8">
                        <button type="submit" name="action" value="previous" class="btn btn-primary">&laquo;Previous</button>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="action" value="next" class="btn btn-primary">Save & Next&raquo;</button>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    {{-- </div> --}}
{{-- </div> --}}

</form>
<br>
<!-- End Container -->

@endsection

@push('js')

@endpush