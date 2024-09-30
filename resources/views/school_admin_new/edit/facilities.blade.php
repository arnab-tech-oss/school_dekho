@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
<style>
    .nav-tab {
        overflow-x: auto;
        display: flex ;
        flex-wrap: nowrap !important;
    }
    .nav-tab li a {
        display: flex !important ;
        flex-wrap: nowrap ;
        white-space: nowrap;
    }
</style>
    @if(!$school_exists)
    <script>
        alert("You are not authorized");
        window.location.reload(history.back());
    </script>
    @endif
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Update Details: <span class="text-primary">{{$school_details->name}}</span></h4>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <!-- Dashboard Tabs Start -->
                <div class="dashboard-tabs-menu">
                    <ul class="nav-tab">
                        <li><a href="{{ route('schooladmin.about_new.edit', $school_facilities->school_id) }}">About</a></li>
                        <li><a
                                href="{{ route('schooladmin.principal_new.edit', $school_facilities->school_id) }}">Principal</a>
                        </li>
                        <li><a href="{{ route('schooladmin.contact_new.edit', $school_facilities->school_id) }}">Contacts</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.eligibility_new.edit', $school_facilities->school_id) }}">Eligibility</a>
                        </li>
                        <li><a href="{{ route('schooladmin.fees_new.edit', $school_facilities->school_id) }}">Fees
                                Structure</a></li>
                        <li><a href="{{ route('schooladmin.opening_hour_new.edit', $school_facilities->school_id) }}">Opening
                                Hours</a></li>
                        <li><a class="active" href="#">Facilities</a></li>
                        <li><a href="{{ route('schooladmin.gallery_new.edit', $school_facilities->school_id) }}">Gallery</a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <form action="{{ route('schooladmin.facilities_new.update')}}" method="POST">
                    <div class="row gy-6">
                        <div class="col-lg-8">
                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">
                                <h4 class="dashboard-content-box__title">Facilities</h4>
                                <p>Provide valid details below to update facilities.</p>
                                <input type="hidden" name="id" value="{{$school_facilities->school_id}}">
                                @csrf
                                <div class="row gy-3">
                                    <span class="dashboard-nav__title_faci text-primary">Educational</span>
                                    @php
                                        $education= array("Library","Career Counsiling","Student Exchange","Digital Library","Counseling","Test Center");
                                        $education1=array_fill(1,6,null);
                                        $i=1;
                                    @endphp
                                    @if($schoolfeatures=json_decode($school_facilities->education))
                                        @foreach($schoolfeatures as $features)
                                            <div class="col-md-4">
                                                <div>
                                                    <input type="checkbox" name="education[]"  value="{{$features}}" checked />
                                                    <label for="{{$features}}">{{ $features}}</label>
                                                    <?php
                                                        $education1[$i]=$features;
                                                        $i++;
                                                    ?>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @php
                                        $result=array();
                                        $result=array_diff($education,$education1);
                                    @endphp
                                    @foreach($result as $key=>$value)
                                        <div class="col-md-4">
                                            <div>
                                                <input type="checkbox" name="education[]"  value="{{ $value }}">
                                                <label for="{{$features}}">{{ $value }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Classroom</span>
                                        @php
                                            $classroom=array("AC Class Rooms","AV Class Rooms","Lockers");
                                            $classroom1=array_fill(1,3,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->classroom))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="classroom[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $classroom1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($classroom,$classroom1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="classroom[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Laboratories</span>
                                        @php
                                            $lab=array("Laboratories","Computer Labs","Robotics Labs","Maths Labs","Language Lab");
                                            $lab1=array_fill(1,5,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->lab))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="lab[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $lab1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($lab,$lab1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="lab[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Boarding</span>
                                        @php
                                            $boarding=array("Hostel","AC Hostel");
                                            $boarding1=array_fill(1,2,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->boarding))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="boarding[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $boarding1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($boarding,$boarding1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="boarding[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Sports</span>
                                        @php
                                            $sports=array("Play Area","Badminton","Cricket","Covered Play Area","Hockey","Football","Volleyball","Tennis","Kabaddi","Swimming","Table Tennis","Athletics","Gymnasium","Karate");
                                            $sports1=array_fill(1,14,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->sports))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="sports[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $sports1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($sports,$sports1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="sports[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Performing Arts</span>
                                        @php
                                            $arts=array("Art","Dance","Dramatics","Music");
                                            $arts1=array_fill(1,4,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->arts))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="arts[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $arts1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($arts,$arts1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="arts[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Digital</span>
                                        @php
                                            $digital=array("AV Facilities","Interactive Boards","School App","Wi-fi");
                                            $digital1=array(1,4,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->digital))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="digital[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $digital1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($digital,$digital1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="digital[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Food &amp; Catering</span>
                                        @php
                                            $food=array("Canteen","Meal Served","School App","Kitchen & Dining Hall");
                                            $food1=array(1,4,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->food))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="food[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $food1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($food,$food1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="food[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Safety &amp; Security</span>
                                        @php
                                            $safety=array("CCTV","Fire Alarm","Fire Extinguisher","Security Guards","Boundary Wall","Fenced Boundary Wall","Speedometer in Bus","GPS in Bus","CCTV in Bus","Fire Extinguisher in Bus","School Bus Tracking App");
                                            $safety1=array(1,11,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->security))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="security[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $safety1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($safety,$safety1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="security[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Medical</span>
                                        @php
                                            $medical=array("Medical Facility","Medical Room or Clinic","ICU","Medical Staff","Isolation Room","Dedicated Ambulance","Resident Doctor");
                                            $medical1=array(1,7,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->medical))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="medical[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $medical1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($medical,$medical1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="medical[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row gy-3">
                                        <span class="dashboard-nav__title_faci text-primary">Other Infra Facilities</span>
                                        @php
                                            $other=array("Kids Play Area","Activity Center","Toy Room","Amphitheatre","Auditorium","Day Care");
                                            $other1=array(1,6,null);
                                            $i=1;
                                        @endphp
                                        @if($schoolfeatures=json_decode($school_facilities->infra))
                                            @foreach($schoolfeatures as $features)
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <input type="checkbox" name="infra[]" id="categories13" value="{{$features}}" checked>
                                                        <label for="categories13">{{ $features}}</label>
                                                        <?php
                                                            $other1[$i]=$features;
                                                            $i++;
                                                        ?>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @php
                                            $result=array();
                                            $result=array_diff($other,$other1);
                                        @endphp
                                        @foreach($result as $key=>$value)
                                            <div class="col-md-4">
                                                <div class="">
                                                    <input type="checkbox" name="infra[]" id="categories13" value="{{ $value }}">
                                                    <label for="categories13">{{ $value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="dashboard-announcement-add__btn mt-5">
                                        {{-- <div class="widget-filter__item">
                                            <input type="checkbox" id="categories0">
                                            <label for="categories0">I agree to the <a href="#">terms & conditions</a>
                                                for updating the facilities.</label>
                                        </div> --}}
                                        <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                    </div>
                                </div>
                                <!-- Dashboard Settings Info End -->
                            </div>
                        </div>
                </form>
            </div>
            <!-- Dashboard Settings End -->
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
