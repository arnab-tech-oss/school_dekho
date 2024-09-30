@extends("layouts.schooladmin.app")
@section("title", "School Dashboard")
@push("css")
@endpush

@section("content")
    <style>
        .nav-tab {
            overflow-x: auto;
            display: flex;
            flex-wrap: nowrap !important;
        }

        .nav-tab li a {
            display: flex !important;
            flex-wrap: nowrap;
            white-space: nowrap;
        }
    </style>
    @if (!$school_exists)
        <script>
            alert("You are not authorized");
            window.location.reload(history.back());
        </script>
    @endif
    <style>
        #regForm {}

        h1 {
            text-align: center;
        }

        h2 {
            margin: 0;
        }

        #multi-step-form-container {
            margin-top: 5rem;
        }

        .text-center {
            text-align: center;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .pl-0 {
            padding-left: 0;
        }

        .button {
            padding: 0.7rem 1.5rem;
            border: 1px solid #4361ee;
            background-color: #4361ee;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn {
            border: 1px solid #0071dc;
            background-color: #0071dc;
        }

        .mt-3 {
            margin-top: 2rem;
        }

        .d-none {
            display: none;
        }

        .form-step {}

        .font-normal {
            font-weight: normal;
        }

        ul.form-stepper {
            counter-reset: section;
            margin-bottom: 3rem;
        }

        ul.form-stepper .circle {
            position: relative;
        }

        ul.form-stepper .circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .form-stepper {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        ul.form-stepper>li:not(:last-of-type) {
            margin-bottom: 0.625rem;
            -webkit-transition: margin-bottom 0.4s;
            -o-transition: margin-bottom 0.4s;
            transition: margin-bottom 0.4s;
        }

        .form-stepper>li:not(:last-of-type) {
            margin-bottom: 0 !important;
        }

        .form-stepper li {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .form-stepper li:not(:last-child):after {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            height: 2px;
            content: "";
            top: 32%;
        }

        .form-stepper li:after {
            background-color: #dee2e6;
        }

        .form-stepper li.form-stepper-completed:after {
            background-color: #4da3ff;
        }

        .form-stepper li:last-child {
            flex: unset;
        }

        ul.form-stepper li a .circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 0;
            line-height: 1.7rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.38);
            border-radius: 50%;
        }

        .form-stepper .form-stepper-active .circle {
            background-color: #4361ee !important;
            color: #fff;
        }

        .form-stepper .form-stepper-active .text {
            color: #4361ee !important;
        }

        .form-stepper .form-stepper-active .circle:hover {
            background-color: #4361ee !important;
            color: #fff !important;
        }

        .form-stepper .form-stepper-unfinished .circle {
            background-color: #f8f7ff;
        }

        .form-stepper .form-stepper-completed .circle {
            background-color: #0071dc !important;
            color: #fff;
        }

        .form-stepper .form-stepper-completed .text {
            color: #0071dc !important;
        }

        .form-stepper .form-stepper-completed .circle:hover {
            background-color: #0071dc !important;
            color: #fff !important;
        }

        .form-stepper .form-stepper-active span.text-muted {
            color: #fff !important;
        }

        .form-stepper .form-stepper-completed span.text-muted {
            color: #fff !important;
        }

        .form-stepper .text {
            font-size: .75rem;
            margin-top: 0.5rem;
        }

        .form-stepper a {
            cursor: default;
        }

        .trigger {
            font-weight: 700;
        }

        .button-wrapper {
            position: absolute;
            bottom: 30px;
            right: 30px;
        }

        .dashboard-settings-profile {
            height: 142px;
        }

        .dashboard-settings-profile__photo-option,
        .dashboard-settings-profile__photo {
            top: unset;
            left: unset;
            width: 142px;
        }

        .logo-wrapper {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .dashboard-settings-profile__photo-option {
            top: 140px
        }

        .dashboard-settings-profile__photo {
            position: relative;
        }

        .pointer {
            cursor: pointer !important;
        }

        .pointer:hover {
            color: #4361ee !important;
        }

        .form-stepper-completed .circle i::before {
            content: "\f00c";
            /* FontAwesome check icon */
        }

        .form-stepper-active .circle i::before {
            content: "\f303";
            /* FontAwesome pencil icon */
        }

        .form-stepper-unfinished .circle i::before {
            /* FontAwesome question icon */
            /* content: "\f128"; */
            /* FontAwesome check icon */
            content: "\f00c";
        }

        .form-stepper .form-stepper-completed .text {
            color: #6c757d !important;
        }

        .form-stepper .form-stepper-completed .circle {
            background-color: #f8f7ff !important;
            color: #6c757d !important;
        }

        .form-stepper li.form-stepper-completed:after {
            background-color: #dee2e6 !important;
        }

        .form-stepper .form-stepper-completed .circle:hover {
            background-color: #f8f7ff !important;
            color: #0071dc !important;
        }

        ul.form-stepper {
            margin-bottom: 15px !important;
        }
    </style>
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Update Details</h4>
            <div class="dashboard-settings">

                <div id="multi-step-form-container">
                    <ul class="form-stepper form-stepper dashboard-content-box mx-auto text-center">
                        <li id="step-1-button" class="form-stepper-active form-stepper-list text-center" step="1">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="1">
                                <span class="circle">
                                    <span><i class="far"></i></span>
                                </span>
                                <div class="text">Basic Information</div>
                            </a>
                        </li>
                        <li id="step-1-button" class="form-stepper-unfinished form-stepper-list text-center" step="2">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="2">
                                <span class="circle">
                                    <span><i class="far"></i></span>
                                </span>
                                <div class="text">Principal Details</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished form-stepper-list text-center" step="3">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="3">

                                <span class="circle">
                                    <span><i class="far"></i></span>
                                </span>
                                <div class="text">School Facilities</div>
                            </a>
                        </li>
                        {{-- <button s class="btn btn-light btn-hover-primary trigger" type="button">1</button></span> --}}
                        <li class="form-stepper-unfinished form-stepper-list text-center" step="4">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="4">

                                <span class="circle">
                                    <span><i class="far"></i></span>
                                </span>
                                <div class="text">Opening Hours</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished form-stepper-list text-center" step="5">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="5">

                                <span class="circle">
                                    <span id="step-3-icon"><i class="far"></i></span>
                                </span>
                                <div class="text">Contact Information</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished form-stepper-list text-center" step="6">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="6">

                                <span class="circle">
                                    <span><i class="far"></i></span>
                                </span>
                                <div class="text">Eligibility Details</div>
                            </a>
                        </li>
                        <li class="form-stepper-unfinished form-stepper-list text-center" step="7">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="7">

                                <span class="circle">
                                    <span><i class="far"></i></span>
                                </span>
                                <div class="text">Admission Fees</div>
                            </a>
                        </li>

                        <li class="form-stepper-unfinished form-stepper-list text-center" step="8">
                            <a href="javascript:void(0)" class="trigger pointer mx-2" step_number="8">

                                <span class="circle">
                                    <span><i class="far"></i></span>
                                </span>
                                <div class="text">Gallery</div>
                            </a>
                        </li>
                    </ul>
                    <div id="userAccountSetupForm">
                        <section id="step-1" class="form-step">
                            <style>
                                .logo-wrapper {
                                    width: 175px;
                                    height: 175px;
                                    margin-bottom: 20px;
                                }

                                .logo-wrapper img {
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    border-radius: 100%;
                                    box-shadow: 0px 2px 10px 0px #0000006e
                                }

                                .logo-section {
                                    display: flex;
                                    align-items: center;
                                    gap: 35px;
                                }

                                .action-panel-c {
                                    display: flex;
                                    gap: 8px;
                                    justify-content: center;
                                    flex-direction: column;
                                }
                            </style>
                            <div>
                                <div class="row">
                                    <div class="col">
                                        <div class="dashboard-content-box">
                                            <h3 class="dashboard-content-box__title">Logo</h3>
                                            <p>Upload school logo.</p>
                                            <form method="POST" {{-- action="{{route('schooladmin.logo.update')}}"  --}} enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $id }}" name="school_id" />
                                                <div class="logo-section">
                                                    <div class="logo-wrapper"> <img
                                                            src="{{ isset($school_details->school_logo) ? $school_details->school_logo : "assets/images/avatar-placeholder.jpg" }}"
                                                            alt="{{ $school_details->name }}"></div>
                                                    <div class="dashboard-announcement-add__btn action-panel-c mt-5">
                                                        <div> <input class="form-control" type="file"
                                                                name="logo_school" /></div>
                                                        <div class="widget-filter__item">
                                                            <input id="" type="checkbox">
                                                            <label for="categories13">I agree to the <a href="#">terms
                                                                    & conditions</a> for updating the school Logo.</label>
                                                        </div>
                                                        <div>
                                                            <button
                                                                class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </form>
                                            <form id="basicInformation" style="padding-top:3.625rem!important"
                                                action="{{ route("schooladmin.about_new.update") }}" method="POST">
                                                <h4 class="dashboard-content-box__title">Basic Information
                                                </h4>
                                                <p>Provide valid details below to update your school profile
                                                </p>
                                                @csrf
                                                <input type="hidden" name="school_id" value="{{ $id }}">
                                                <div class="row gy-4">
                                                    <div class="col-md-6">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">School Name:
                                                                <input required type="text" name="school_name"
                                                                    class="form-control"
                                                                    value="{{ $school_details->name }}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">Registration Number:
                                                                <input type="text" class="form-control"
                                                                    name="registration_no"
                                                                    value="{{ $school_details->registration_no }}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">School Catagory:
                                                                <select required class="form-select" name="category">
                                                                    @foreach ($allcategory as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $school_details->categories->id == $category->id ? 'selected="selected"' : "" }}>
                                                                            {{ $category->category }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">School Type:
                                                                <select required class="form-select" name="school_type">
                                                                    <option value="Boys"
                                                                        @if ($school_details->school_type == "Boys") selected="selected";
                                                                            
                                                                        @endif>
                                                                        Boys </option>
                                                                    <option value="Girls"
                                                                       @if ($school_details->school_type == "Girls") selected="selected";   
                                                                       @endif>
                                                                        Girls </option>
                                                                    <option value="Co-Ed"
                                                                        @if ($school_details->school_type == "Co-Ed") selected="selected";
                                                                            
                                                                        @endif>
                                                                        Co-ed </option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">Board:
                                                                <select required class="form-select" name="board">
                                                                    @foreach ($allboards as $board)
                                                                        <option value="{{ $board->id }}"
                                                                            @if ($school_details->boards?->id == $board->id) selected="selected"; @endif>
                                                                            {{ $board->board_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">Medium:

                                                                <select required class="form-select" name="medium">
                                                                    @foreach ($allmedium as $medium)
                                                                        <option value="{{ $medium->id }}"
                                                                            @if ($school_details->medium?->id == $medium->id) selected="selected"; @endif>
                                                                            {{ $medium->medium }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">About School
                                                                (Introduction)
                                                                <textarea required class="form-control" style="height: 20ch" name="about">{{ $school_details->about }}</textarea>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dashboard-announcement-add__btn mt-5">
                                                    <div class="widget-filter__item">
                                                    </div>
                                                    <button
                                                        class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                                </div>
                                            </form>
                                            <script>
                                                var form = document.getElementById('basicInformation');
                                                var listItem = document.getElementById('step-1-button');

                                                function checkMissing() {
                                                    var missingField = false;
                                                    var requiredElements = form.querySelectorAll('input[required], select[required]');
                                                    for (var i = 0; i < requiredElements.length; i++) {
                                                        if (requiredElements[i].value.trim() === '') {
                                                            missingField = true;
                                                            console.log('Missing field found:', requiredElements[i]);
                                                            break;
                                                        }
                                                    }

                                                    if (missingField) {
                                                        console.log('Adding missing class to listItem');
                                                        listItem.classList.add('missing');
                                                    } else {
                                                        console.log('Removing missing class from listItem');
                                                        listItem.classList.remove('missing');
                                                    }
                                                }

                                                var inputElements = form.querySelectorAll('input[required], select[required]');
                                                for (var i = 0; i < inputElements.length; i++) {
                                                    inputElements[i].addEventListener('change', checkMissing);
                                                    inputElements[i].addEventListener('blur', checkMissing);
                                                }
                                            </script>

                                        </div>

                                    </div>
                                    {{-- <div class="col-lg-6">
                                    <div class="dashboard-content-box">

                                    </div>
                                </div> --}}
                                    {{-- <div class="mt-3 dashboard-content-box d-flex justify-content-between">
                                    <button class="btn btn-light btn-hover-primary trigger" type="button"
                                        step_number="1">Prev</button>
                                    <button class="btn btn-light btn-hover-primary trigger" type="button"
                                        step_number="2">Next</button>
                                </div> --}}
                                </div>
                            </div>

                        </section>
                        <section id="step-2" class="form-step d-none">
                            <form action="{{ route("schooladmin.principal_new.update") }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input id="" type="hidden" name="school_id"
                                    value="{{ $school_principal_details->id }}">
                                <div class="row gy-6">
                                    <div class="col">
                                        <!-- Dashboard Settings Info Start -->
                                        <div class="dashboard-content-box">
                                            <h4 class="dashboard-content-box__title">Principal Details</h4>
                                            <p>Provide valid details below to update your principal profile</p>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row gy-4">
                                                        <div class="col-md-12">
                                                            <!-- Account Account details Start -->
                                                            <div class="dashboard-content__input">
                                                                <label class="form-label-02">Upload Principal Photo</label>
                                                                <input type="file" name="principal_pic"
                                                                    class="form-control" />
                                                            </div>
                                                            <!-- Account Account details End -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <!-- Account Account details Start -->
                                                            <div class="dashboard-content__input">
                                                                <label class="form-label-02">Name of the Principal</label>
                                                                <input name="principal_name" type="text"
                                                                    class="form-control"
                                                                    value="{{ $school_principal_details->principal_name }}">
                                                            </div>
                                                            <!-- Account Account details End -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <!-- Account Account details Start -->
                                                            <div class="dashboard-content__input">
                                                                <label class="form-label-02">From the Desk of The
                                                                    Principal</label>
                                                                <textarea name="principal_desk" class="form-control">{{ $school_principal_details->principal_desk }}</textarea>
                                                            </div>
                                                            <!-- Account Account details End -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--<div class="col-md-3">-->
                                                <!--    <div class="col-md-12">-->
                                                <!--        <div id="dashboard-profile-cover-photo-editor"-->
                                                <!--            class="dashboard-settings-profile">-->
                                                <!--            <input name="principal_pic" id="dashboard-photo-dialogue-box"-->
                                                <!--                class="dashboard-settings-profile__input" type="file"-->
                                                <!--                accept=".png,.jpg,.jpeg" />-->

                                                <!--            <label class="form-label-02">Upload/Edit Picture</label>-->
                                                <!--            <div id="profile-photo"-->
                                                <!--                class="dashboard-settings-profile__photo_principal dashboard-settings-profile__photo"-->
                                                <!--                data-fallback="assets/images/avatar-placeholder.jpg"-->
                                                <!--                style="background-image:url(assets/images/avatar-placeholder.jpg)">-->
                                                <!--                <div class="overlay">-->
                                                <!--                    <i class="far fa-camera"></i>-->
                                                <!--                </div>-->
                                                <!--            </div>-->
                                                <!--            <div id="profile-photo-option"-->
                                                <!--                class="dashboard-settings-profile__photo-option dashboard-settings-profile__photo-option-principal">-->
                                                <!--                <span class="profile-photo-uploader"><i class="far fa-upload"></i>-->
                                                <!--                    Upload Photo</span>-->
                                                <!--                <span class="profile-photo-deleter"><i class="far fa-trash-alt"></i>-->
                                                <!--                    Delete</span>-->
                                                <!--            </div>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                            </div>
                                            <div class="dashboard-announcement-add__btn mt-5">
                                                <div class="widget-filter__item">
                                                    <label for="categories13">
                                                        <input id="categories13" type="checkbox">

                                                    </label>
                                                    {{-- <div>{{$school_principal_details}}</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                        <!-- Dashboard Settings Info End -->
                                    </div>
                                </div>
                            </form>
                        </section>

                        <section id="step-3" class="form-step d-none">
                            <form action="{{ route("schooladmin.facilities_new.update") }}" method="POST">
                                @csrf
                                <div class="row gy-6">
                                    <div class="col">
                                        <div class="dashboard-content-box">
                                            <h4 class="dashboard-content-box__title">Facilities</h4>
                                            <p>Provide valid details below to update facilities.</p>
                                            <input type="hidden" name="id"
                                                value="{{ $school_facilities->school_id }}">
                                            @csrf
                                            <div class="row gy-3">
                                                <span class="dashboard-nav__title_faci text-primary">Educational</span>
                                                @php
                                                    $education = [
                                                        "Library",
                                                        "Career Counseling",
                                                        "Student Exchange",
                                                        "Digital Library",
                                                        "Counseling",
                                                        "Test Center",
                                                    ];
                                                    $education1 = array_fill(1, 6, null);
                                                    $i = 1;
                                                @endphp
                                                @if ($schoolfeatures = json_decode($school_facilities->education))
                                                   {{-- {{$school_facilities->education}} --}}
                                                    @foreach ($schoolfeatures as $features)
                                                        <div class="col-md-4">
                                                            <div>
                                                                <input type="checkbox" name="education[]"
                                                                    value="{{ $features }}" checked />
                                                                <label
                                                                    for="{{ $features }}">{{ $features }}</label>
                                                                <?php
                                                                $education1[$i] = $features;
                                                                $i++;
                                                                ?>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                @php
                                                    $result = [];
                                                    $result = array_diff($education, $education1);
                                                @endphp
                                                @foreach ($result as $key => $value)
                                                    <div class="col-md-4">
                                                        <div>
                                                            <input type="checkbox" name="education[]"
                                                                value="{{ $value }}">
                                                            <label for="">{{ $value }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Classroom</span>
                                                    @php
                                                        $classroom = ["AC Class Rooms", "AV Class Rooms", "Lockers"];
                                                        $classroom1 = array_fill(1, 3, null);
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->classroom))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="classroom[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $classroom1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($classroom, $classroom1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox"
                                                                    name="classroom[]" value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span
                                                        class="dashboard-nav__title_faci text-primary">Laboratories</span>
                                                    @php
                                                        $lab = [
                                                            "Laboratories",
                                                            "Computer Labs",
                                                            "Robotics Labs",
                                                            "Maths Labs",
                                                            "Language Lab",
                                                        ];
                                                        $lab1 = array_fill(1, 5, null);
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->lab))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="lab[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $lab1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($lab, $lab1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox" name="lab[]"
                                                                    value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Boarding</span>
                                                    @php
                                                        $boarding = ["Hostel", "AC Hostel"];
                                                        $boarding1 = array_fill(1, 2, null);
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->boarding))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="boarding[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $boarding1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($boarding, $boarding1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox"
                                                                    name="boarding[]" value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Sports</span>
                                                    @php
                                                        $sports = [
                                                            "Play Area",
                                                            "Badminton",
                                                            "Cricket",
                                                            "Covered Play Area",
                                                            "Hockey",
                                                            "Football",
                                                            "Volleyball",
                                                            "Tennis",
                                                            "Kabaddi",
                                                            "Swimming",
                                                            "Table Tennis",
                                                            "Athletics",
                                                            "Gymnasium",
                                                            "Karate",
                                                        ];
                                                        $sports1 = array_fill(1, 14, null);
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->sports))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="sports[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $sports1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($sports, $sports1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox" name="sports[]"
                                                                    value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Performing
                                                        Arts</span>
                                                    @php
                                                        $arts = ["Art", "Dance", "Dramatics", "Music"];
                                                        $arts1 = array_fill(1, 4, null);
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->arts))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="arts[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $arts1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($arts, $arts1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox" name="arts[]"
                                                                    value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Digital</span>
                                                    @php
                                                        $digital = [
                                                            "AV Facilities",
                                                            "Interactive Boards",
                                                            "School App",
                                                            "Wi-fi",
                                                        ];
                                                        $digital1 = [1, 4, null];
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->digital))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="digital[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $digital1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($digital, $digital1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox" name="digital[]"
                                                                    value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Food &amp;
                                                        Catering</span>
                                                    @php
                                                        $food = [
                                                            "Canteen",
                                                            "Meal Served",
                                                            "School App",
                                                            'Kitchen & Dining
                                                Hall',
                                                        ];
                                                        $food1 = [1, 4, null];
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->food))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="food[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $food1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($food, $food1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox" name="food[]"
                                                                    value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Safety &amp;
                                                        Security</span>
                                                    @php
                                                        $safety = [
                                                            "CCTV",
                                                            "Fire Alarm",
                                                            "Fire Extinguisher",
                                                            "Security Guards",
                                                            "Boundary Wall",
                                                            "Fenced Boundary Wall",
                                                            "Speedometer in Bus",
                                                            'GPS in
                                                Bus',
                                                            "CCTV in Bus",
                                                            "Fire Extinguisher in Bus",
                                                            'School Bus Tracking
                                                App',
                                                        ];
                                                        $safety1 = [1, 11, null];
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->security))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="security[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $safety1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($safety, $safety1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox"
                                                                    name="security[]" value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Medical</span>
                                                    @php
                                                        $medical = [
                                                            "Medical Facility",
                                                            "Medical Room or Clinic",
                                                            "ICU",
                                                            "Medical Staff",
                                                            "Isolation Room",
                                                            "Dedicated Ambulance",
                                                            'Resident
                                                Doctor',
                                                        ];
                                                        $medical1 = [1, 7, null];
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->medical))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="medical[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $medical1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($medical, $medical1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox" name="medical[]"
                                                                    value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row gy-3">
                                                    <span class="dashboard-nav__title_faci text-primary">Other Infra
                                                        Facilities</span>
                                                    @php
                                                        $other = [
                                                            "Kids Play Area",
                                                            "Activity Center",
                                                            "Toy Room",
                                                            "Amphitheatre",
                                                            "Auditorium",
                                                            "Day Care",
                                                        ];
                                                        $other1 = [1, 6, null];
                                                        $i = 1;
                                                    @endphp
                                                    @if ($schoolfeatures = json_decode($school_facilities->infra))
                                                        @foreach ($schoolfeatures as $features)
                                                            <div class="col-md-4">
                                                                <div class="">
                                                                    <input id="categories13" type="checkbox"
                                                                        name="infra[]" value="{{ $features }}"
                                                                        checked>
                                                                    <label for="categories13">{{ $features }}</label>
                                                                    <?php
                                                                    $other1[$i] = $features;
                                                                    $i++;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @php
                                                        $result = [];
                                                        $result = array_diff($other, $other1);
                                                    @endphp
                                                    @foreach ($result as $key => $value)
                                                        <div class="col-md-4">
                                                            <div class="">
                                                                <input id="categories13" type="checkbox" name="infra[]"
                                                                    value="{{ $value }}">
                                                                <label for="categories13">{{ $value }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="dashboard-announcement-add__btn mt-5">
                                                    {{-- <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories0">
                                                    <label for="categories0">I agree to the <a href="#">terms &
                                                            conditions</a>
                                                        for updating the facilities.</label>
                                                </div> --}}
                                                    <button
                                                        class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </section>

                        <section id="step-5" class="form-step d-none">
                            <div class="row gy-6">
                                <div class="col">
                                    <div class="dashboard-content-box">
                                        <form id="contstactInformationForm" 
                                            action="{{ route("schooladmin.contact_new.update") }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="school_id"
                                                value="{{ $school_contact_details->school_id }}">
                                            <h4 class="dashboard-content-box__title">Contact Information</h4>
                                            <p>Provide valid details below to update your school profile</p>
                                            <div class="row gy-4">
                                                <div class="col-md-12">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Street Address</label>
                                                        <input type="text" class="form-control" name="address"
                                                            value="{{ $school_contact_details->address }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">State</label>
                                                        <select id="inputState" class="form-select" name="state_id"
                                                            required>
                                                            @foreach ($allstates as $states)
                                                                <option value="{{ $states?->id }}"
                                                                    @if ($states?->id == $school_contact_details?->state_id) selected @endif>
                                                                    {{ $states?->state }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">District</label>
                                                        <select class="form-select" name="district_id" required>
                                                            @foreach ($alldistricts as $district)
                                                                <option value="{{ $district?->id }}"
                                                                    @if ($district?->id == $school_contact_details?->district_id) selected @endif>
                                                                    {{ $district?->district }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">City</label>
                                                        <input id="inputZip" required type="text"
                                                            class="form-control" name="city" placeholder="Enter City"
                                                            value="{{ $school_contact_details->city }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Pincode</label>
                                                        <input type="text" class="form-control" name="pincode"
                                                            value="{{ $school_contact_details?->pincode }}">
                                                    </div>
                                                </div>
                                                <hr style="opacity: .1;">

                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Landline/Mobile</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            value="{{ $school_contact_details?->contact }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Alternative Contact</label>
                                                        <input type="text" class="form-control" name="alt_phone"
                                                            value="{{ $school_contact_details?->alt_contact }}">
                                                    </div>
                                                </div>
                                                <hr style="opacity: .1;">
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Facebook Page</label>
                                                        <input type="text" class="form-control" name="fb_link"
                                                            value="{{ $school_contact_details?->fb }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Instagram</label>
                                                        <input type="text" class="form-control" name="insta_link"
                                                            value="{{ $school_contact_details?->insta }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Twitter</label>
                                                        <input type="text" class="form-control" name="twitt_link"
                                                            value="{{ $school_contact_details?->twitter }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Linked In</label>
                                                        <input type="text" class="form-control" name="linkedin"
                                                            value="{{ $school_contact_details?->linkedin }}">
                                                    </div>
                                                </div>
                                                <hr style="opacity: .1;">
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Lattitude</label>
                                                        <input type="text" class="form-control" name="lat"
                                                            value="{{ $school_contact_details?->lattitude }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Longitude</label>
                                                        <input type="text" class="form-control" name="long"
                                                            value="{{ $school_contact_details?->longitude }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dashboard-announcement-add__btn mt-5">
                                                {{-- <div class="widget-filter__item">
                                                    <input id="" type="checkbox" name="terms">
                                                    <label for="categories13">I agree to the <a href="#">terms &
                                                            conditions</a>
                                                        for updating the school profile.</label>
                                                </div> --}}
                                                <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </section>
                        <section id="step-6" class="form-step d-none">
                            <form action="{{ route("schooladmin.eligibility_new.update") }}" method="POST">
                                <div class="row gy-6">
                                    <div class="col">
                                        <div class="dashboard-content-box">
                                            @csrf
                                            <input type="hidden" name="id"
                                                value="{{ $school_eligibility_details->school_id }}">
                                            <h4 class="dashboard-content-box__title">Eligibility Details</h4>
                                            <p>Provide valid details below to update your eligibility criteria for different
                                                classes.
                                            </p>
                                            <div class="row gy-4">
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Pre Nursery</label>
                                                        <input type="text" class="form-control" name="pre_nursery"
                                                            value="{{ $school_eligibility_details->pre_nursery }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Nursery</label>
                                                        <input type="text" class="form-control" name="nursery"
                                                            value="{{ $school_eligibility_details->nursery }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">LKG</label>
                                                        <input type="text" class="form-control" name="lkg"
                                                            value="{{ $school_eligibility_details->lkg }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">UKG</label>
                                                        <input type="text" class="form-control" name="ukg"
                                                            value="{{ $school_eligibility_details->ukg }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">KG</label>
                                                        <input type="text" class="form-control" name="kg"
                                                            value="{{ $school_eligibility_details->kg }}">
                                                    </div>
                                                </div>
                                                <hr style="opacity: .1;">
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class I</label>
                                                        <input type="text" class="form-control" name="one"
                                                            value="{{ $school_eligibility_details->class_one }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class II</label>
                                                        <input type="text" class="form-control" name="two"
                                                            value="{{ $school_eligibility_details->class_two }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class III</label>
                                                        <input type="text" class="form-control" name="three"
                                                            value="{{ $school_eligibility_details->class_three }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class IV</label>
                                                        <input type="text" class="form-control" name="four"
                                                            value="{{ $school_eligibility_details->class_four }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class V</label>
                                                        <input type="text" class="form-control" name="five"
                                                            value="{{ $school_eligibility_details->class_five }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VI</label>
                                                        <input type="text" class="form-control" name="six"
                                                            value="{{ $school_eligibility_details->class_six }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VII</label>
                                                        <input type="text" class="form-control" name="seven"
                                                            value="{{ $school_eligibility_details->class_seven }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VIII</label>
                                                        <input type="text" class="form-control" name="eight"
                                                            value="{{ $school_eligibility_details->class_eight }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class IX</label>
                                                        <input type="text" class="form-control" name="nine"
                                                            value="{{ $school_eligibility_details->class_nine }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class X</label>
                                                        <input type="text" class="form-control" name="ten"
                                                            value="{{ $school_eligibility_details->class_ten }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class XI</label>
                                                        <input type="text" class="form-control" name="eleven"
                                                            value="{{ $school_eligibility_details->class_eleven }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class XII</label>
                                                        <input type="text" class="form-control" name="twelve"
                                                            value="{{ $school_eligibility_details->class_twelve }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dashboard-announcement-add__btn mt-5">
                                                {{-- <div class="widget-filter__item">
                                                    <input id="" type="checkbox" name="term">
                                                    <label for="categories13">I agree to the <a href="#">terms &
                                                            conditions</a>
                                                        for updating the eligibility criteria.</label>
                                                </div> --}}
                                                <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                        <section id="step-7" class="form-step d-none">
                            <form action="{{ route("schooladmin.fees_new.update") }}" method="POST">
                                <div class="row gy-6">
                                    <div class="col">
                                        <div class="dashboard-content-box">
                                            <h4 class="dashboard-content-box__title">Admission Fees</h4>
                                            <p>Provide valid details below to update your fees structure for different
                                                classes.</p>
                                            <input type="hidden" name="id"
                                                value="{{ $school_fees_structure->school_id }}">
                                            @csrf
                                            <div class="row gy-4">
                                                <div class="col-md-6">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->pre_nursery);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Pre Nursery</label>
                                                        <input type="text" class="form-control"
                                                            name="class_prenursery_admission"
                                                            value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->nursery);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Nursery</label>
                                                        <input type="text" class="form-control"
                                                            name="class_nursery_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->lkg);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">LKG</label>
                                                        <input type="text" class="form-control"
                                                            name="class_lkg_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->ukg);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">UKG</label>
                                                        <input type="text" class="form-control"
                                                            name="class_ukg_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->kg);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">KG</label>
                                                        <input type="text" class="form-control"
                                                            name="class_kg_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <hr style="opacity: .1;">
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_one);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class I</label>
                                                        <input type="text" class="form-control"
                                                            name="class_one_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_two);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class II</label>
                                                        <input type="text" class="form-control"
                                                            name="class_two_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_three);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class III</label>
                                                        <input type="text" class="form-control"
                                                            name="class_three_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_four);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class IV</label>
                                                        <input type="text" class="form-control"
                                                            name="class_four_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_five);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class V</label>
                                                        <input type="text" class="form-control"
                                                            name="class_five_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_six);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VI</label>
                                                        <input type="text" class="form-control"
                                                            name="class_six_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_seven);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VII</label>
                                                        <input type="text" class="form-control"
                                                            name="class_seven_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_eight);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VIII</label>
                                                        <input type="text" class="form-control"
                                                            name="class_eight_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_nine);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class IX</label>
                                                        <input type="text" class="form-control"
                                                            name="class_nine_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_ten);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class X</label>
                                                        <input type="text" class="form-control"
                                                            name="class_ten_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_eleven);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class XI</label>
                                                        <input type="text" class="form-control"
                                                            name="class_eleven_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_twelve);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class XII</label>
                                                        <input type="text" class="form-control"
                                                            name="class_twelve_admission" value="{{ $x[0] }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="dashboard-content-box">
                                            <h4 class="dashboard-content-box__title">Annual Fees</h4>
                                            <p>Provide valid details below to update your fees structure for different
                                                classes.</p>
                                            <div class="row gy-4">
                                                <div class="col-md-6">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->pre_nursery);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Pre Nursery</label>
                                                        <input type="text" class="form-control"
                                                            name="class_prenursery_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->nursery);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Nursery</label>
                                                        <input type="text" class="form-control"
                                                            name="class_nursery_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->lkg);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">LKG</label>
                                                        <input type="text" class="form-control"
                                                            name="class_lkg_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->ukg);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">UKG</label>
                                                        <input type="text" class="form-control"
                                                            name="class_ukg_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->kg);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">KG</label>
                                                        <input type="text" class="form-control" name="class_kg_annual"
                                                            value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <hr style="opacity: .1;">
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_one);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class I</label>
                                                        <input type="text" class="form-control"
                                                            name="class_one_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_two);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class II</label>
                                                        <input type="text" class="form-control"
                                                            name="class_two_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_three);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class III</label>
                                                        <input type="text" class="form-control"
                                                            name="class_three_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_four);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class IV</label>
                                                        <input type="text" class="form-control"
                                                            name="class_four_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_five);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class V</label>
                                                        <input type="text" class="form-control"
                                                            name="class_five_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_six);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VI</label>
                                                        <input type="text" class="form-control"
                                                            name="class_six_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_seven);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VII</label>
                                                        <input type="text" class="form-control"
                                                            name="class_seven_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_eight);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class VIII</label>
                                                        <input type="text" class="form-control"
                                                            name="class_eight_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_nine);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class IX</label>
                                                        <input type="text" class="form-control"
                                                            name="class_nine_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_ten);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class X</label>
                                                        <input type="text" class="form-control"
                                                            name="class_ten_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_eleven);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class XI</label>
                                                        <input type="text" class="form-control"
                                                            name="class_eleven_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php
                                                        $x = explode(",", $school_fees_structure->class_twelve);
                                                    @endphp
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Class XII</label>
                                                        <input type="text" class="form-control"
                                                            name="class_twelve_annual" value="{{ $x[1] }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-pagination">
                                    <ul class="pagination justify-content-center">
                                        <div>
                                            <div>
                                                <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </form>

                        </section>
                        <section id="step-4" class="form-step d-none">

                            <form action="{{ route("schooladmin.opening_hour_new.update") }}" method="post">
                                <div class="row gy-6">
                                    <div class="col">
                                        <div class="dashboard-content-box">
                                            @csrf
                                            <input name="id" type="hidden"
                                                value="{{ $school_opening_hour->school_id }}">
                                            <h4 class="dashboard-content-box__title">Opening Hours</h4>
                                            <p>Provide valid details below to update your opening hours.</p>
                                            <div class="row gy-4">
                                                @php
                                                    $days = [
                                                        "Monday",
                                                        "Tuesday",
                                                        "Wednesday",
                                                        "Thursday",
                                                        "Friday",
                                                        "Saturday",
                                                        "Sunday",
                                                    ];
                                                    $abbreviations = ["mon", "tue", "wed", "thu", "fri", "sat", "sun"];
                                                @endphp

                                                @for ($i = 0; $i < count($days); $i++)
                                                    <div class="col-md-4">
                                                        <div class="dashboard-content__input">
                                                            <label class="form-label-02">{{ $days[$i] }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="dashboard-content__input">
                                                            <input class="form-control"
                                                                name="{{ $abbreviations[$i] }}_f" type="time"
                                                                value="{{ $school_opening_hour->{$abbreviations[$i]}[0] }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="dashboard-content__input">
                                                            <input class="form-control"
                                                                name="{{ $abbreviations[$i] }}_t" type="time"
                                                                value="{{ $school_opening_hour->{$abbreviations[$i]}[1] }}">
                                                        </div>
                                                    </div>
                                                @endfor

                                                <div class="dashboard-announcement-add__btn mt-5">
                                                    <button
                                                        class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </form>
                            {{-- <div class="mt-3 button-wrapper">
                            <button class="btn btn-light btn-hover-primary trigger" type="button"
                                step_number="1">Prev</button>
                            <button class="btn btn-light btn-hover-primary trigger" type="button"
                                step_number="3">Next</button>
                        </div> --}}
                        </section>

                        <section id="step-8" class="form-step d-none">
                            <div class="row gy-6">
                                <div class="col">
                                    <div class="dashboard-content-box">
                                        <h4 class="dashboard-content-box__title">Gallery</h4>
                                        <p>Max 5 Uploads & Max Photo Size: Must Me Less Than 2Mb.</P>

                                        <div class="row gy-4">
                                            <div class="col-lg-12">
                                                <style>
                                                    .c-button {
                                                        background: #0071dc;
                                                        color: #FFFFFF;
                                                        border: none;
                                                        cursor: pointer;
                                                        font-weight: 600;
                                                        /* position: absolute; */
                                                        /* left: 22px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    bottom: 22px; */
                                                        padding: 5px 10px;
                                                        border-radius: 5px;
                                                        font-size: 14px;
                                                    }

                                                    .output {
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        height: 200px;
                                                    }

                                                    .dashboard-settings-profile {
                                                        display: flex;
                                                    }

                                                    .action-panel {
                                                        display: flex;
                                                        flex-direction: column;
                                                        gap: 10px;
                                                    }

                                                    .dashboard-settings-profile {
                                                        height: unset;
                                                        position: unset;
                                                    }

                                                    .dashboard-settings-profile__photo-meta {
                                                        text-align: unset;
                                                        padding-left: unset;
                                                    }

                                                    .galary-image-wrapper {
                                                        display: grid;
                                                        grid-template-columns: repeat(auto-fit, minmax(345px, 1fr));
                                                        gap: 10px;
                                                    }

                                                    .dashboard-settings-profile {
                                                        width: fit-content;
                                                        position: relative;
                                                    }

                                                    .image-container-wrapper {
                                                        display: flex;
                                                        flex-direction: column;
                                                        position: relative;
                                                    }

                                                    .button-wrapper {
                                                        position: absolute;
                                                        display: flex;
                                                        left: 12px;
                                                        right: 12px;
                                                        bottom: 15px;
                                                        justify-content: space-between;
                                                    }

                                                    .button-wrapper button {
                                                        background: #0000003b;
                                                        color: #d4d4d4;
                                                    }

                                                    .button-wrapper button:hover {
                                                        background: #0000006d;
                                                        color: #ffffff;
                                                    }

                                                    .button-wrapper .delete-button {
                                                        background: rgba(255, 0, 0, 0.15);
                                                        color: #d00e0ef4;
                                                    }

                                                    .button-wrapper .delete-button:hover {
                                                        background: rgba(255, 0, 0, 0.472);
                                                        color: rgb(255, 208, 208)
                                                    }

                                                    .image-wrapper img {
                                                        width: 100%;
                                                        height: 250px;
                                                        object-fit: cover;
                                                        border-radius: 5px;
                                                        box-shadow: #f8f7ff
                                                    }

                                                    .dashboard-settings-profile__photo-meta {
                                                        margin: 0
                                                    }
                                                </style>
                                                <input id="id" type="hidden" name=""
                                                    value="{{ $school_gallery->school_id }}">
                                                <div class="galary-image-wrapper">
                                                    @foreach ($school_gallery->school_image as $key => $school_image)
                                                        <div class="image-container-wrapper">

                                                            <div class="image-wrapper"> <img src="{{ $school_image }}"
                                                                    class="output"></div>
                                                            <div id="photo-meta-area"
                                                                class="dashboard-settings-profile__photo-meta">
                                                                <div class="action-panel">

                                                                    <div class="button-wrapper">
                                                                        <div>
                                                                            <button id="fileButton{{ $loop->iteration }}"
                                                                                class="c-button">
                                                                                <i class="far fa-camera"></i>
                                                                            </button>
                                                                            <input
                                                                                id="hiddenFileInput{{ $loop->iteration }}"
                                                                                type="file" class="file"
                                                                                style="display: none;"
                                                                                onchange="loadFile(event,'{{ $key }}')">
                                                                            <button id="fileButton{{ $loop->iteration }}"
                                                                                class="c-button"
                                                                                onclick="updateimage('{{ $key }}')">
                                                                                <i class="far fa-edit"></i> </button>
                                                                        </div>
                                                                        <button id="fileButton{{ $loop->iteration }}"
                                                                            class="c-button delete-button"
                                                                            onclick="deleteimage('{{ $key }}')">
                                                                            <i class="far fa-trash"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="profile-photo-option"
                                                                class="dashboard-settings-profile__photo-option">
                                                                <span class="profile-photo-uploader"><i
                                                                        class="far fa-upload"></i>
                                                                    Upload Photo</span>
                                                                <span class="profile-photo-deleter"><i
                                                                        class="far fa-trash-alt"></i>
                                                                    Delete</span>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            const numButtons = 5; // Change this to the number of sets of IMAGES and inputs
                                            for (let i = 1; i <= numButtons; i++) {
                                                const fileButton = document.getElementById(`fileButton${i}`);
                                                const hiddenFileInput = document.getElementById(`hiddenFileInput${i}`);
                                                fileButton.addEventListener('click', () => {
                                                    hiddenFileInput.click();
                                                });
                                            }

                                            function loadFile(event, index) {
                                                var output = document.getElementsByClassName('output')[index];
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            }

                                            function updateimage(index) {
                                                debugger
                                                var file = document.getElementsByClassName('file')[index].files[0];
                                                var model = new FormData();
                                                model.append("file", file);
                                                model.append("position", index);
                                                model.append("id", document.getElementById("id").value);
                                                console.log({
                                                    file: file,
                                                    id: document.getElementById("id").value,
                                                    position: index
                                                });
                                                var request = fetch('/school/image/update', {
                                                    method: "post",
                                                    body: model,
                                                }).then(res => {
                                                    return res.json();
                                                });
                                                request.then(res => {
                                                    if (!res.is_success) {
                                                        alert(res.message);
                                                        return;
                                                    } else {
                                                        alert(res.message);
                                                        window.history.go(0);
                                                    }
                                                }).catch(res => {
                                                    console.log(res)
                                                })
                                            }

                                            function deleteimage(index) {
                                                var file = document.getElementsByClassName('file')[index].files[0];
                                                var model = new FormData();
                                                model.append("file", file);
                                                model.append("position", index);
                                                model.append("id", document.getElementById("id").value);
                                                var request = fetch('/image/delete', {  
                                                    method: "post",
                                                    body: model,
                                                }).then(res => {
                                                    return res.json();
                                                });
                                                request.then(res => {
                                                    if (!res.is_success) {
                                                        alert(res.message);
                                                        return;
                                                    } else {
                                                        alert(res.message);
                                                        window.history.go(0);
                                                    }
                                                }).catch(res => {
                                                    console.log(res)
                                                })
                                            }
                                        </script>
                                        @if ($total_images < 5)
                                            <form action="{{ route("schooladmin.gallery.new.upload") }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ $school_gallery->school_id }}">
                                                <div class="dashboard-announcement-add__btn mt-5">
                                                    <input id="logo_path" type="file" class="form-control"
                                                        name="filenewnames[]" multiple>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-hover-secondary mt-3">Upload New
                                                        Image</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>

                    <style>
                        #alart-status {
                            position: fixed;
                            bottom: 25px;
                            right: 25px;
                            /* transform: translateX(50%); */
                            z-index: 9999;
                            box-shadow: #0000008c 0px 5px 20px 0px;
                            transition: all 0.3s ease-in-out;
                        }
                    </style>

                    <script>
                        /**
                         * Define a function to navigate betweens form steps.
                         * It accepts one parameter. That is - step number.
                         */
                        const navigateToFormStepAlt = (stepNumber) => {
                            /**
                             * Hide all form steps.
                             */
                            document.querySelectorAll(".form-step").forEach((formStepElement) => {
                                formStepElement.classList.add("d-none");
                            });
                            /**
                             * Mark all form steps as unfinished.
                             */
                            document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                                formStepHeader.classList.add("form-stepper-unfinished");
                                formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
                            });
                            /**
                             * Show the current form step (as passed to the function).
                             */
                            document.querySelector("#step-" + stepNumber).classList.remove("d-none");
                            /**
                             * Select the form step circle (progress bar).
                             */
                            const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
                            /**
                             * Mark the current form step as active.
                             */
                            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
                            formStepCircle.classList.add("form-stepper-active");
                            /**
                             * Loop through each form step circles.
                             * This loop will continue up to the current step number.
                             * Example: If the current step is 3,
                             * then the loop will perform operations for step 1 and 2.
                             */
                            for (let index = 0; index < stepNumber; index++) {
                                /**
                                 * Select the form step circle (progress bar).
                                 */
                                const formStepCircle = document.querySelector('li[step="' + index + '"]');
                                /**
                                 * Check if the element exist. If yes, then proceed.
                                 */
                                if (formStepCircle) {
                                    /**
                                     * Mark the form step as completed.
                                     */
                                    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                                    formStepCircle.classList.add("form-stepper-completed");
                                }
                            }
                        };
                        /**
                         * Select all form navigation buttons, and loop through them.
                         */
                        document.querySelectorAll(".trigger").forEach((formNavigationBtn) => {
                            /**
                             * Add a click event listener to the button.
                             */
                            formNavigationBtn.addEventListener("click", () => {
                                /**
                                 * Get the value of the step.
                                 */
                                const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                                /**
                                 * Call the function to navigate to the target form step.
                                 */
                                console.log(stepNumber + ' navigateToFormStepAlt(stepNumber) ');
                                navigateToFormStepAlt(stepNumber);
                            });
                        });
                    </script>

                    @if (session()->has("message"))
                        <div id="alart-status" class="alert alert-success">
                            {{ session("message") }}
                        </div>
                        <script>
                            // Get the div element
                            var div = document.getElementById('alart-status');

                            // Function to hide the div
                            function hideDiv() {
                                div.style.display = 'none';
                            }

                            // Set a timeout to call hideDiv function after 5 seconds
                            setTimeout(hideDiv, 5000); // 5000 milliseconds = 5 seconds
                        </script>
                    @endif
                    @if (session()->has("tab"))
                        <script>
                            navigateToFormStepAlt({{ session("tab") }});
                        </script>
                    @endif
                </div>

            @endsection

            @push("js")
            @endpush
