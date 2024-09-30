@php
$link =
(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') .
"://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$address = $schooldetails->address?->address;
$city = $schooldetails->address?->city;
$state = $schoolcontacts?->states?->state;
$pin = $schoolcontacts?->pincode;
$fulladdress = "$address, $city, $state, $pin";
$knowsLanguage = $schooldetails['medium']->medium;
$hours = $schooldetails->hours;

$showAds = true;
$showEligibilityCriteria = false;
@endphp

@extends('layouts.frontend.app')

@section('canonical')
<link rel="canonical" href="https://www.schooldekho.org/details/{{ $slug }}" />
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom/schoolDetails.css') }}">
@endpush

@push('top-js')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "School",
        "address": "{{ $fulladdress }}",
        "name": "{{ $schooldetails->name }}",
        "alternateName": "NULL",
        "knowsLanguage": "{{ $knowsLanguage }}",
        "url": "{{ $link }}",
        "logo": "{{ $schooldetails->school_logo }}",
        "alumni": "{{ $schooldetails->principal_name }}",
        "photo": "{{ $schooldetails->principal_pic }}",
        "knowsAbout": "{{ $schooldetails->about }}",
        "description": "{{ $schooldetails->principal_desk }}",
        "hasMap": "https://www.google.com/maps/place/{{ $schooldetails->address?->lattitude }}, {
            {
                $schooldetails - > address ? - > longitude
            }
        }
        ",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "18002588074",
            "contactType": "reservations",
            "contactOption": ["TollFree", "HearingImpairedSupported"],
            "areaServed": "IN",
            "availableLanguage": ["en", "Bengali", "Hindi"]
        },

        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "{{ $schooldetails->address?->lattitude }}",
            "longitude": "{{ $schooldetails->address?->longitude }}"
        },
        "openingHours": [
            "Mo {{ $hours->mon[0] }}-{{ $hours->mon[1] }}",
            "Tu {{ $hours->tue[0] }}-{{ $hours->tue[1] }}",
            "We {{ $hours->wed[0] }}-{{ $hours->wed[1] }}",
            "Th {{ $hours->thu[0] }}-{{ $hours->thu[1] }}",
            "Fr {{ $hours->fri[0] }}-{{ $hours->fri[1] }}",
            "Sa {{ $hours->sat[0] }}-{{ $hours->sat[1] }}"
        ]
    }

</script>

{{-- dynamic working aggregateRating specific school --}}
{{-- "aggregateRating": {
"@type": "AggregateRating",
"bestRating": "5",
"worstRating": "0",
"ratingValue": "{{ number_format($school_review, 1) }}",
"reviewCount": "{{ $reviews_count }} "
}, --}}

@endpush

@section('content')

<div class="page-banner bg-color-11">
    <div class="page-banner__wrapper">
        <div class="container">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">{{ $schooldetails->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- --}}
<div class="tutor-course-top-info section-padding-40 bg-color-11">
    <div class="custom-container container">
        <div class="row">
            <div class="col-lg-2">
                <div class="tutor-course-top-info__meta-instructor">
                    <div class="instructor-avatar">
                        <img src="{{ $schooldetails->school_logo }}"
                            alt="{{ $schooldetails->name }}- https://schooldekho.org/{{ $schooldetails->slug }}"
                            width="150" height="150">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tutor-course-top-info__content">
                    <div class="tutor-course-top-info__meta">
                        <div class="tutor-course-top-info__meta-instructor">
                            <h1 class="tutor-course-top-info__title">{{ $schooldetails->name }}
                                @if ($is_verified == 1)
                                <i class="fas fa-badge-check text-primary small" data-bs-tooltip="tooltip"
                                    data-bs-placement="top" data-bs-original-title="Verified" title=""
                                    aria-label="Verified"></i>
                                @endif
                            </h1>
                        </div>
                    </div>
                    <div class="tutor-course-top-info__meta">
                        <div class="tutor-course-top-info__meta-action"><i class="meta-icon far fa-map-marker-alt"></i>
                            {{ $schooldetails->address?->address . ', ' }}{{ $schooldetails->address?->city . ', ' }}{{
                            $schoolcontacts?->states?->state . ' -' }}
                            {{ $schoolcontacts?->pincode }}
                        </div>
                    </div>
                    <div class="tutor-course-top-info__meta">
                        <div onclick="showModal('#ReviewModal')" class="tutor-course-top-info__meta-rating"
                            style="cursor: pointer">
                            <div class="rating-star">
                                <div class="rating-label" style="width: {{ number_format($school_review, 2) * 20 }}%;">
                                </div>
                            </div>

                            <div class="rating-count" style=" display:flex"><span style="font-size: 11px;">({{
                                    $reviews?->count() }})</span></div>
                        </div>
                        <div class="tutor-course-top-info__meta-rating">
                            <div class="tutor-course-top-info__meta-action">
                                <i class="far fa-eye meta-icon"></i> <span style="font-weight: 800;">{{
                                    $schooldetails->view_count }}</span> Views
                            </div>
                        </div>
                        <div class="tutor-course-top-info__meta-rating">
                            <div class="tutor-course-top-info__meta-action">
                                <i class="far fa-road meta-icon"></i>
                                {{-- {{ isset($distance) && is_numeric($distance) ? round($distance, 1) . " Km" :
                                "Unavailable" }}
                                --}}
                                {{ isset($distance) && is_numeric($distance) ? round(floatval($distance), 1) . ' Km' :
                                'Unavailable' }}
                            </div>
                        </div>
                    </div>
                    <div class="pt-1"></div>
                    <div class="tutor-course-top-info__meta">
                        <div class="tutor-course-top-info__meta-rating">
                            @if ($is_payment == 0)
                            <div class="tutor-course-top-info__meta-action btn-claim">
                                <a class="text-primary"
                                    href="{{ route('register.claim.school', $schooldetails->id) }}"><i
                                        class="edumi edumi-heart"></i>
                                    Claim this School</a>
                            </div>

                            {{-- <div class="rating-star">
                                <div class="rating-label" style="width: {{ number_format($school_review, 2) * 20 }}%;">
                                </div>

                            </div> --}}
                            {{-- <div class="rating-average"><strong> {{ (int) $school_review }}</strong> /5
                            </div> --}}
                            {{-- <div class="rating-count" style=" display:flex"><span style="font-size: 11px;">({{
                                    $reviews?->count() }})</span>
                            </div> --}}
                        </div>
                        <div class="tutor-course-top-info__meta-rating">
                            {{-- <div class="tutor-course-top-info__meta-action">
                                <i class="far fa-eye meta-icon"></i> <span style="font-weight: 800;">{{
                                    $schooldetails->view_count }}</span> Views
                            </div> --}}
                            @endif
                            <div class="tutor-course-top-info__meta-action btn-claim">
                                <a class="text-success" href="#" onclick="AddedForCompare()">
                                    <i class="edumi edumi-star"></i>
                                    Add to Compare</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="tutor-course-top-info__content">
                    <div class="tutor-course-top-info__btn">
                        <a class="btn btn-admission btn-hover-secondary btn-primary"
                            href="{{ route('school.new.application.form', $schooldetails->id) }}">Admission
                            Enquiry</a>
                        {{-- <a class="btn-wishlist" href="#" onclick="AddedForCompare()"><i class="fal fa-heart"></i>
                            <span>Add to
                                Compare</span></a>
                        <a class="btn btn-hover-primary btn-outline-primary"
                            href="https://www.schooldekho.org/register-school">Claim this school</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="sticky-component">
    <div class="tutor-course-tabs bg-color-13">
        <div class="custom-container container">
            <ul class="nav">
                <li>
                    <button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#tab2">Facilities</button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#school-fee">Fees</button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#tab3">Gallery</button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#tab4">Reviews</button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#tab-Faq">FAQ</button>
                </li>
                @if($article_list_schoolwise->count() > 0)
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#tab-news-articles"> News & Articles</button>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<script>
    var stickyComponent = document.getElementById("sticky-component");
    // Get the offset position of the sticky component
    var stickyOffset = stickyComponent.offsetTop;

    // Function to add or remove the "sticky" class to the sticky component
    function toggleSticky() {
        if (window.pageYOffset >= stickyOffset) {
            stickyComponent.classList.add("sticky-tab");
        } else {
            stickyComponent.classList.remove("sticky-tab");
        }
    }

    // Add event listeners to toggle the "sticky" class when scrolling or resizing the window
    window.addEventListener("scroll", toggleSticky);
    window.addEventListener("resize", toggleSticky);

    function AddedForCompare() {
            var url = `/school/addtocompare/{{ $schooldetails->id }}`;
            swal({
                title: "Added",
                text: "This school has been added for comparison. Go ahead and click the comparison button.",
                type: "success"
            }).then(function() {
                window.location = url;
            });
        }
</script>
<div class="tutor-course-main-content bg-color-05 section-padding-30 sticky-parent">
    <div class="custom-container container">
        <div class="row gy-10">
            <div class="col-lg-8">
                <div class="course-main-sticky">
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade show active">
                            <div class="tutor-course-main-segment">

                                @if($showAds) <div class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif

                                <div class="tutor-course-segment tutor-course-wrap">

                                    <div class="tutor-course-segment__benefits-items">
                                        {{-- <div class="tutor-course-segment__benefit-item">
                                            <div class="tutor-course-segment__benefit-content">
                                                <i class="far fa-calendar-star text-muted"></i>
                                                <span class="text-500"> Year of Establishment:</span> <span
                                                    class="benefit-text"> 2016</span>
                                            </div>
                                        </div> --}}

                                        <div class="tutor-course-segment__benefit-item">
                                            <div class="tutor-course-segment__benefit-content">
                                                <i class="far fa-school text-muted"></i>
                                                <span class="text-500"> Ownership:</span> <span class="benefit-text">
                                                    {{ $schooldetails['categories']->category }}</span>
                                            </div>
                                        </div>

                                        <div class="tutor-course-segment__benefit-item">
                                            <div class="tutor-course-segment__benefit-content">
                                                <i class="far fa-wreath text-muted"></i>
                                                <span class="text-500"> Board:</span> <span class="benefit-text">
                                                    {{ $schooldetails['boards']->board_name }}</span>
                                            </div>
                                        </div>
                                        <div class="tutor-course-segment__benefit-item">
                                            <div class="tutor-course-segment__benefit-content">
                                                <i class="fal fa-venus-mars text-muted"></i>
                                                <span class="text-500"> Category:</span> <span class="benefit-text">
                                                    {{ $schooldetails->school_type }}</span>
                                            </div>
                                        </div>
                                        <div class="tutor-course-segment__benefit-item">
                                            <div class="tutor-course-segment__benefit-content">
                                                <i class="far fa-language text-muted"></i>
                                                <span class="text-500"> Medium:</span> <span class="benefit-text">
                                                    {{ $schooldetails['medium']->medium }}</span>
                                            </div>
                                        </div>
                                        {{-- <div class="tutor-course-segment__benefit-item">
                                            <div class="tutor-course-segment__benefit-content">
                                                <i class="far fa-clock text-muted"></i>
                                                <span class="text-500"> Campus Type:</span> <span class="benefit-text">
                                                    Day</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                @if($showEligibilityCriteria)
                                <div class="tutor-course-segment tutor-course-wrap">

                                    <div class="tutor-course-top-info bg-color-11">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style="background: #fff" class="account-card fade show">
                                                        <h4 class="tutor-course-segment__title">Eligibility Criteria
                                                        </h4>

                                                        <div class="row gy-4">
                                                            <div class="col-md-4">
                                                                <!-- Account Account details Start -->
                                                                <div class="dashboard-content__input">
                                                                    <label class="form-label-02">Select Birthday</label>
                                                                    <input type="date" class="form-control text-500"
                                                                        name="birthday" placeholder="Enter Birthday"
                                                                        id="birthday">
                                                                </div>
                                                                <!-- Account Account details End -->
                                                            </div>
                                                            <div class="col-md-4  ">
                                                                <!-- Account Account details Start -->
                                                                <div class="dashboard-content__input">
                                                                    <label class="form-label-02">Gender</label>
                                                                    <div class="form-control radio-inline text-500"
                                                                        style="">
                                                                        <input class=" " id="Eligibility_Male"
                                                                            type="radio" name="gender" value="Male"
                                                                            checked> <label for="Eligibility_Male"> Male
                                                                        </label>
                                                                        |
                                                                        <input id="Eligibility_Female" type="radio"
                                                                            name="gender" value="Female">
                                                                        <label for="Eligibility_Female"> Female </label>
                                                                    </div>
                                                                </div>
                                                                <!-- Account Account details End -->
                                                            </div>
                                                            <div class="col-md-4 mt-auto">

                                                                <button
                                                                    class=" gy-4 eligibility-button btn btn-primary btn-hover-secondary btn-admission  mt- "
                                                                    type="submit">
                                                                    Check Eligibility
                                                                </button>
                                                            </div>

                                                            <div>The Applicant is eligible for admission to PRE-NURSERY
                                                                for this session. <a href=""><b>Apply Now</b></a></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tutor-course-segment tutor-course-wrap">

                                    <div class="tutor-course-top-info bg-color-11">
                                        <div class="">
                                            <div class="row">
                                                <div style="background: #fff" class="col-lg-12">
                                                    <div class="account-card fade show">

                                                        <div class="row ">

                                                            <div class="col">

                                                                <div class="courses-tab-menu aos-init mb-1 aos-animate"
                                                                    data-aos="fade-up" data-aos-duration="1000">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h4 class="tutor-course-segment__title"
                                                                            style="margin-block: auto;">
                                                                            Session
                                                                            2025-2026</h4>
                                                                        <ul class="nav justify-content-lg-end">

                                                                            <li><button data-bs-toggle="tab"
                                                                                    data-bs-target="#tab2"
                                                                                    class="active">LKG</button>
                                                                            </li>
                                                                            <li><button data-bs-toggle="tab"
                                                                                    data-bs-target="#tab3"
                                                                                    class="">UKG</button>
                                                                            </li>
                                                                            <li><button data-bs-toggle="tab"
                                                                                    data-bs-target="#tab4"
                                                                                    class="">Class I</button>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-content">

                                                            <div class="tab-pane fade active show" id="tab2">

                                                                <div class="row eligible-date">
                                                                    <p> Eligible Date of Birth: <span>01/04/2020 and
                                                                            31/03/2021</span></p>
                                                                    <p> Admission Open From: <span>01/07/2024 and
                                                                            31/07/2024</span></p>

                                                                </div>

                                                            </div>
                                                            <div class="tab-pane fade" id="tab3">

                                                                <div class="row  ">
                                                                    <p> Eligible Date of Birth: <span>01/04/2019 and
                                                                            31/03/2020</span></p>
                                                                    <p> Admission Open From: <span>01/07/2024 and
                                                                            31/07/2024</span></p>
                                                                </div>

                                                            </div>
                                                            <div class="tab-pane fade" id="tab4">

                                                                <div class="row ">
                                                                    <p> Eligible Date of Birth: <span>01/04/2018 and
                                                                            31/03/2019</span></p>
                                                                    <p> Admission Open From: <span>01/07/2024 and
                                                                            31/07/2024</span></p>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if ($is_verified == 1)
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <h4 class="tutor-course-segment__title">About The School</h4>
                                    <div class="tutor-course-segment__content-wrap">
                                        <p style="text-align: justify;"> {{ $schooldetails->about }}</p>
                                    </div>
                                </div>
                                @endif
                                @if ($is_verified == 1)
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <h4 class="tutor-course-segment__title">From the Desk of The Principal</h4>
                                    <div class="tutor-course-segment__prerequisites">
                                        <ul class="tutor-course-segment__prerequisites-list">
                                            <li>
                                                <div class="prerequisites-item" href="#">
                                                    <div class="prerequisites-item__thumbnail">
                                                        <img src="{{ $schooldetails->principal_pic }}"
                                                            alt="{{ $schooldetails->principal_name }}" width="70">
                                                    </div>
                                                    <div class="prerequisites-item__title">
                                                        <strong>{{ $schooldetails->principal_name }}</strong>
                                                        <br> <span class="small">{{
                                                            $schooldetails->principal_designation }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tutor-course-segment__content-wrap">
                                        <p style="text-align: justify;"> {{ $schooldetails->principal_desk }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="tutor-course-segment tutor-course-wrap audience-wrap">
                                    <h4 class="tutor-course-segment__title">Admission Criteria & Eligibility
                                    </h4>
                                    <div class="tutor-course-segment__audience-content">
                                        <ul class="tutor-course-segment__list-style-02">
                                            <li><span class="text-meta">Pre Nursery:
                                                    {{ $schooldetails['elligibilities']?->pre_nursery }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Nursery:
                                                    {{ $schooldetails['elligibilities']?->nursery }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">LKG:
                                                    {{ $schooldetails['elligibilities']?->lkg }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">UKG:
                                                    {{ $schooldetails['elligibilities']?->ukg }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">KG:
                                                    {{ $schooldetails['elligibilities']?->kg }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class I:
                                                    {{ $schooldetails['elligibilities']?->class_one }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class II:
                                                    {{ $schooldetails['elligibilities']?->class_two }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class III:
                                                    {{ $schooldetails['elligibilities']?->class_three }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class IV:
                                                    {{ $schooldetails['elligibilities']?->class_four }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class V:
                                                    {{ $schooldetails['elligibilities']?->class_five }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class VI:
                                                    {{ $schooldetails['elligibilities']?->class_six }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class VII:
                                                    {{ $schooldetails['elligibilities']?->class_seven }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class VIII:
                                                    {{ $schooldetails['elligibilities']?->class_eight }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class IX:
                                                    {{ $schooldetails['elligibilities']?->class_nine }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class X:
                                                    {{ $schooldetails['elligibilities']?->class_ten }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class XI:
                                                    {{ $schooldetails['elligibilities']?->eleven }} years &amp;
                                                    above</span></li>
                                            <li><span class="text-meta">Class XII:
                                                    {{ $schooldetails['elligibilities']?->twelve }} years &amp;
                                                    above</span></li>
                                        </ul>
                                    </div>
                                </div>@if($showAds) <div class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <div class="tutor-course-main-segment">@if($showAds) <div
                                    class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <div class="tutor-course-segment__header">
                                        <h4 class="tutor-course-segment__title">Facilities</h4>
                                        <div class="tutor-course-segment__lessons-duration">
                                            <span class="tutor-course-segment__duration"><i
                                                    class="fas fa-check-circle text-success"></i>
                                                Available</span>
                                            <span class="tutor-course-segment__duration"><i
                                                    class="fas fa-times-circle text-danger"></i> Not
                                                Available</span>
                                            <span class="tutor-course-segment__duration"><i
                                                    class="fas fa-question-circle text-warning"></i>
                                                Unknown</span>
                                        </div>
                                    </div>
                                    <div class="course-curriculum accordion">
                                        <div class="accordion-item">
                                            <button class="accordion-button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne">
                                                Educational Facilities <i class="tutor-icon"></i></button>
                                            @php
                                            $educations = [
                                            'Library',
                                            'Career Counseling',
                                            'Student Exchange',
                                            'Digital Library',
                                            'Counseling',
                                            'Test Center',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->education);

                                            @endphp

                                            <div id="collapseOne" class="accordion-collapse show collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    {{-- {{ dd($educations) }} --}}
                                                    @foreach ($educations as $education)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $education }}
                                                        </span>
                                                        {{-- @if() --}}
                                                        @if ($features != null && in_array($education, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse2">

                                                Classroom Facilities <i class="tutor-icon"></i>
                                            </button>
                                            @php
                                            $classrooms = ['AC Class Rooms', 'AV Class Rooms', 'Lockers'];
                                            $features = json_decode($schooldetails['facilities']->classroom);
                                            @endphp
                                            <div id="collapse2" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($classrooms as $classroom)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $classroom }}
                                                        </span>
                                                        @if ($features != null && in_array($classroom, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse3">

                                                Laboratory Facilities <i class="tutor-icon"></i></button>
                                            @php
                                            $labs = [
                                            'Laboratories',
                                            'Computer Labs',
                                            'Robotics Labs',
                                            'Maths Labs',
                                            'Language Lab',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->lab);
                                            @endphp
                                            <div id="collapse3" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($labs as $lab)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $lab }}
                                                        </span>
                                                        @if ($features != null && in_array($lab, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse4">

                                                Boarding Facilities
                                                <i class="tutor-icon"></i>
                                            </button>
                                            @php
                                            $boardings = ['Hostel', 'AC Hostel'];
                                            $features = json_decode($schooldetails['facilities']->boarding);
                                            @endphp
                                            <div id="collapse4" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($boardings as $boarding)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $boarding }}
                                                        </span>
                                                        @if ($features != null && in_array($boarding, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse5">

                                                Sports Facilities <i class="tutor-icon"></i></button>
                                            @php
                                            $sportses = [
                                            'Play Area',
                                            'Badminton',
                                            'Cricket',
                                            'Covered Play Area',
                                            'Hockey',
                                            'Football',
                                            'Volleyball',
                                            'Tennis',
                                            'Kabaddi',
                                            'Swimming',
                                            'Table Tennis',
                                            'Athletics',
                                            'Gymnasium',
                                            'Karate',
                                            'Basket Ball',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->sports);
                                            @endphp
                                            {{-- {{$schooldetails["facilities"]->sports}} --}}
                                            <div id="collapse5" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($sportses as $sports)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $sports }}
                                                        </span>
                                                        @if ($features != null && in_array($sports, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse6">

                                                Performing Arts Facilities
                                                <i class="tutor-icon"></i>
                                            </button>
                                            @php
                                            $arts = ['Art', 'Dance', 'Dramatics', 'Music'];
                                            $features = json_decode($schooldetails['facilities']->arts);
                                            @endphp
                                            <div id="collapse6" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($arts as $art)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $art }}
                                                        </span>
                                                        @if ($features != null && in_array($art, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse7">

                                                Digital Facilities <i class="tutor-icon"></i></button>
                                            @php
                                            $digitals = [
                                            'AV Facilities',
                                            'Interactive Boards',
                                            'School App',
                                            'Wi-fi',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->digital);
                                            @endphp
                                            <div id="collapse7" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($digitals as $digital)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $digital }}
                                                        </span>
                                                        @if ($features != null && in_array($digital, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse8">

                                                Food &amp; Catering Facilities <i class="tutor-icon"></i></button>
                                            @php
                                            $foods = [
                                            'Canteen',
                                            'Meal Served',
                                            'School App',
                                            'Kitchen & Dining Hall',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->food);
                                            @endphp
                                            <div id="collapse8" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($foods as $food)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $food }}
                                                        </span>
                                                        @if ($features != null && in_array($food, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse9">

                                                Safety and Security Facilities <i class="tutor-icon"></i></button>
                                            @php
                                            $safeties = [
                                            'CCTV',
                                            'Fire Alarm',
                                            'Fire Extinguisher',
                                            'Security Guards',
                                            'Boundary Wall',
                                            'Fenced Boundary Wall',
                                            'Speedometer in Bus',
                                            'GPS in Bus',
                                            'CCTV in Bus',
                                            'School Bus',
                                            'Fire Extinguisher in Bus',
                                            'School Bus
                                            Tracking App',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->security);
                                            @endphp
                                            <div id="collapse9" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($safeties as $security)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $security }}
                                                        </span>
                                                        @if ($features != null && in_array($security, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse10">

                                                Medical Facilities <i class="tutor-icon"></i></button>
                                            @php
                                            $medicals = [
                                            'Medical Facility',
                                            'Medical Room or Clinic',
                                            'ICU',
                                            'Medical Staff',
                                            'Isolation Room',
                                            'Dedicated Ambulance',
                                            'Resident Doctor',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->medical);
                                            @endphp
                                            <div id="collapse10" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($medicals as $medical)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $medical }}
                                                        </span>
                                                        @if ($features != null && in_array($medical, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse11">

                                                Other Infrastructure <i class="tutor-icon"></i></button>
                                            @php
                                            $others = [
                                            'Kids Play Area',
                                            'Activity Center',
                                            'Toy Room',
                                            'Amphitheatre',
                                            'Auditorium',
                                            'Day Care',
                                            ];
                                            $features = json_decode($schooldetails['facilities']->infra);
                                            @endphp
                                            <div id="collapse11" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionCourse">
                                                <div class="course-curriculum__lessons">
                                                    @foreach ($others as $other)
                                                    <div class="course-curriculum__lesson">
                                                        <span class="course-curriculum__title">
                                                            {{ $other }}
                                                        </span>
                                                        @if ($features != null && in_array($other, $features))
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        </span>
                                                        @else
                                                        <span class="course-curriculum__icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>@if($showAds) <div class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade">
                            <div class="tutor-course-main-segment">@if($showAds) <div
                                    class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                                <div class="tutor-course-segment tutor-course-wrap">

                                    <div class="col-lg-12">
                                        <div class="shop-single-product__images">
                                            <div class="shop-single-product__image-main">
                                                <div
                                                    class="swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                                    <div id="swiper-wrapper-a2fd477c16a62e101" class="swiper-wrapper"
                                                        aria-live="polite"
                                                        style=" transform: translate3d(-1344px, 0px, 0px); transition-duration: 0ms; max-height: 500px ">
                                                        @if ($features = $schooldetails['images']->school_image)
                                                        @php $i = 0; @endphp
                                                        @foreach ($features as $feature)
                                                        <div style="max-height: 500px"
                                                            class="swiper-slide product-image-main" role="group"
                                                            aria-label="1 / 4"
                                                            style="justify-content: center; display: flex "
                                                            style="width: 438px; margin-right: 10px">
                                                            <img class="center-cropped" src="{{ $feature }}"
                                                                alt="{{ $schooldetails->name }}"
                                                                style="margin-left: auto; margin-right: auto; border-radius: 5px; width: 100%;"
                                                                width="532" height="615" />
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <p>No images found! </p>
                                                        @endif
                                                    </div>
                                                    <span class="swiper-notification" aria-live="assertive"
                                                        aria-atomic="true"></span>
                                                </div>
                                            </div>
                                            <div class="shop-single-product__image-thumbs">
                                                <div
                                                    class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                                    <div id="swiper-wrapper-72106394e1ae9c7d5" class="swiper-wrapper"
                                                        aria-live="polite"
                                                        style=" transform: translate3d(0px, 0px, 0px); transition-duration: 0ms; max-height: 100px ">
                                                        @if ($features = $schooldetails['images']->school_image)
                                                        @php $i = 0; @endphp
                                                        @foreach ($features as $feature)
                                                        <div class="swiper-slide product-image-thumb swiper-slide-visible swiper-slide-active"
                                                            role="group" aria-label="1 / 4"
                                                            style="width: 102px; margin-right: 10px">
                                                            <img style="height: 100px" class="center-cropped"
                                                                src="{{ $feature }}" alt="{{ $schooldetails->name }}"
                                                                width="126" height="145" />
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                    <span class="swiper-notification" aria-live="assertive"
                                                        aria-atomic="true"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>@if($showAds) <div class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                            </div>
                        </div>
                        <div id="tab4" class="tab-pane fade">
                            <div class="tutor-course-main-segment">@if($showAds) <div
                                    class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <h4 class="tutor-course-segment__title">Rating</h4>
                                    <div class="tutor-course-segment__feedback">
                                        <div class="tutor-course-segment__reviews-average">
                                            <div class="count">{{ number_format($school_review, 1) }}</div>
                                            <div class="reviews-rating-star">
                                                <div class="rating-star">
                                                    <div class="rating-label"
                                                        style="width:{{ number_format($school_review, 2) * 20 }}%;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating-total">{{ $reviews_count }} Ratings</div>
                                        </div>
                                        <div class="tutor-course-segment__reviews-metar">
                                            <div class="course-rating-metar">
                                                <div class="rating-metar-star">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-col">
                                                    <div class="rating-metar-bar">
                                                        <div class="rating-metar-line"
                                                            style="width: {{ number_format($reviews_5 * 100, 2) }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-text">
                                                    {{ number_format($reviews_5 * 100, 2) }}%
                                                </div>
                                            </div>
                                            <div class="course-rating-metar">
                                                <div class="rating-metar-star">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 80%;"></div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-col">
                                                    <div class="rating-metar-bar">
                                                        <div class="rating-metar-line"
                                                            style="width: {{ number_format($reviews_4 * 100, 2) }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-text">
                                                    {{ number_format($reviews_4 * 100, 2) }}%
                                                </div>
                                            </div>
                                            <div class="course-rating-metar">
                                                <div class="rating-metar-star">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-col">
                                                    <div class="rating-metar-bar">
                                                        <div class="rating-metar-line"
                                                            style="width: {{ number_format($reviews_3 * 100, 2) }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-text">
                                                    {{ number_format($reviews_3 * 100, 2) }}%
                                                </div>
                                            </div>
                                            <div class="course-rating-metar">
                                                <div class="rating-metar-star">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 40%;"></div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-col">
                                                    <div class="rating-metar-bar">
                                                        <div class="rating-metar-line"
                                                            style="width: {{ number_format($reviews_2 * 100, 2) }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-text">
                                                    {{ number_format($reviews_2 * 100, 2) }}%
                                                </div>
                                            </div>
                                            <div class="course-rating-metar">
                                                <div class="rating-metar-star">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 20%;"></div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-col">
                                                    <div class="rating-metar-bar">
                                                        <div class="rating-metar-line"
                                                            style="width: {{ number_format($reviews_1 * 100, 2) }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-metar-text">
                                                    {{ number_format($reviews_1 * 100, 2) }}%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <h4 class="tutor-course-segment__title">Reviews <span class="count">({{
                                            $reviews->count() }})</span>
                                    </h4>
                                    <div class="tutor-course-segment__review-commnet">
                                        <ul class="comment-list-02">
                                            @forelse ($reviews as $review)
                                            <li>
                                                <div class="comment-item-02">
                                                    <div class="comment-item-02__header">

                                                        <div class="comment-item-02__info" style="padding-left: 0px;">
                                                            <h6 class="comment-item-02__name"><a href="#">{{
                                                                    $review->name }}</a></h6>
                                                            <div class="comment-item-02__body">
                                                                <div class="rating-star">
                                                                    <div class="rating-label"
                                                                        style="width: {{ $review->rating * 20 }}%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="comment-item-02__date" style="font-size: 12px">
                                                                Reviewed on
                                                                {{ Carbon\Carbon::parse($review->created_at)->format('j
                                                                F Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p style="text-align: justify">{{ $review->description }}</p>
                                                </div>
                                            </li>
                                            @empty
                                            <p>No reviews found.</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <h4 class="tutor-course-segment__title">Write a review</h4>
                                    <div class="tutor-course-segment__reviews">
                                        <button class="tutor-course-segment__btn btn btn-primary btn-hover-secondary"
                                            data-bs-toggle="collapse" data-bs-target="#collapseForm">Write a
                                            review
                                        </button>

                                        <div id="collapseForm" class="collapse">
                                            <div class="comment-form">
                                                <form action="{{ route('school.review.add') }}" method="POST">
                                                    @csrf
                                                    <input name="school_id" type="hidden"
                                                        value="{{ $schooldetails->id }}">
                                                    <div class="comment-form__rating">
                                                        <label class="label">Your rating: *</label>

                                                        <head>
                                                            <div class="rating">
                                                                <input id="star5" name="rating" type="radio" value="5">
                                                                <label class="star" for="star5"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input id="star4" name="rating" type="radio" value="4">
                                                                <label class="star" for="star4"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input id="star3" name="rating" type="radio" value="3">
                                                                <label class="star" for="star3"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input id="star2" name="rating" type="radio" value="2">
                                                                <label class="star" for="star2"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input id="star1" name="rating" type="radio" value="1"
                                                                    checked>
                                                                <label class="star" for="star1"><i
                                                                        class="fas fa-star"></i></label>
                                                            </div>
                                                    </div>
                                                    <div class="row gy-4">
                                                        <div class="col-md-6">
                                                            <div class="comment-form__input">
                                                                <input class="form-control" name="name" type="text"
                                                                    placeholder="Your Name *" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="comment-form__input">
                                                                <input class="form-control" name="email" type="email"
                                                                    placeholder="Your Email *" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="comment-form__input">
                                                                <textarea class="form-control" name="description"
                                                                    placeholder="Your Comment" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="comment-form__input form-check">
                                                                <input id="save" type="checkbox">
                                                                <label for="save">I accept to the terms and
                                                                    conditions of School Dekho.</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="comment-form__input">
                                                                <button class="btn btn-primary btn-hover-secondary"
                                                                    type="submit">Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>@if($showAds) <div class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                            </div>
                        </div>
                        <div id="tab-Faq" class="tab-pane fade">
                            <div class="tutor-course-main-segment">@if($showAds) <div
                                    class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <div class="tutor-course-segment">

                                        <div class="tutor-course-segment__header">
                                            <h4 class="tutor-course-segment__title">FAQ</h4>

                                        </div>

                                        <div class="course-curriculum accordion">

                                            <div class="accordion-item">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#FAQ-1" aria-expanded="false">1. Where
                                                    exactly is
                                                    the
                                                    {{ $schooldetails->name }}
                                                    located? <i class="tutor-icon"></i></button>
                                                <div id="FAQ-1" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionCourse" style="">

                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                {{ $schooldetails->name }} is located at
                                                                {{ $schooldetails->address?->address . ', ' ?? '' }}{{
                                                                $schooldetails->address?->city . ', ' ?? '' }}{{
                                                                $schoolcontacts?->states?->state . ' -' ?? '' }}
                                                                {{ $schoolcontacts?->pincode }}.
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#FAQ-2" aria-expanded="false"> 2. Which
                                                    educational board is the
                                                    school affiliated with? <i class="tutor-icon"></i></button>
                                                <div id="FAQ-2" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionCourse" style="">

                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                {{ $schooldetails->name }} is affiliated with
                                                                {{ $schooldetails['boards']->board_name }}.
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#FAQ-3" aria-expanded="false"> 3.What is the
                                                    fee
                                                    structure for the
                                                    academic year? <i class="tutor-icon"></i></button>
                                                <div id="FAQ-3" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionCourse" style="">

                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title"> To learn about
                                                                {{ $schooldetails->name }}'s fee structure, please
                                                                reach out to our admission team.
                                                                <a class="click-here"
                                                                    href="{{ route('school.new.application.form', $schooldetails->id) }}">Click
                                                                    Here</a>.
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#FAQ-4" aria-expanded="false">4. What is the
                                                    admission process at
                                                    {{ $schooldetails->name }}?
                                                    <i class="tutor-icon"></i></button>
                                                <div id="FAQ-4" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionCourse" style="">

                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                Fill out the admission application, submit documents,
                                                                and undergo exams or interviews if
                                                                required. To learn more about admission details, please
                                                                <a class="click-here"
                                                                    href="{{ route('school.new.application.form', $schooldetails->id) }}">Click
                                                                    Here</a>.
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#FAQ-5" aria-expanded="false">
                                                    5. Does the school provide transportation facilities? <i
                                                        class="tutor-icon"></i></button>
                                                <div id="FAQ-5" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionCourse" style="">

                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                @php
                                                                $providesTransportation = null;
                                                                if ($schooldetails['facilities']) {
                                                                $security = json_decode(
                                                                $schooldetails['facilities']?->security,
                                                                );
                                                                if ($security != null) {
                                                                $providesTransportation = in_array(
                                                                'School Bus',
                                                                $security,
                                                                );
                                                                }
                                                                }
                                                                @endphp

                                                                {{ $providesTransportation ? 'Yes,' : 'No,' }}
                                                                {{ $schooldetails->name }}
                                                                {{ $providesTransportation ? 'does' : "doesn't" }}
                                                                provide transportation facilities.
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#FAQ-6" aria-expanded="false"> 6. What are
                                                    the
                                                    regular school hours?

                                                    <i class="tutor-icon"></i></button>
                                                <div id="FAQ-6" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionCourse" style="">

                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                {{ $schooldetails->name }}'s regular school hours are

                                                                <ul>
                                                                    @php $allClosed = true; @endphp

                                                                    @foreach (['mon', 'tue', 'wed', 'thu', 'fri', 'sat',
                                                                    'sun'] as $day)
                                                                    @php
                                                                    $hoursOfDay =
                                                                    $schooldetails->hours->$day;
                                                                    $dayNames = [
                                                                    'mon' => 'Monday',
                                                                    'tue' => 'Tuesday',
                                                                    'wed' => 'Wednesday',
                                                                    'thu' => 'Thursday',
                                                                    'fri' => 'Friday',
                                                                    'sat' => 'Saturday',
                                                                    'sun' => 'Sunday',
                                                                    ];
                                                                    $allClosed =
                                                                    $allClosed &&
                                                                    ($hoursOfDay[0] === '00:00' &&
                                                                    $hoursOfDay[1] === '00:00');
                                                                    @endphp
                                                                    <li>
                                                                        {{ ucfirst($dayNames[$day]) }}:
                                                                        {{ $hoursOfDay[0] === $hoursOfDay[1] ? 'Closed'
                                                                        : "$hoursOfDay[0] - $hoursOfDay[1]" }}
                                                                    </li>
                                                                    @endforeach
                                                                </ul>

                                                                {!! $allClosed ? '<small style="color: red">Note:
                                                                    Opening hours are not available for this
                                                                    school.</small>' : '' !!}
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#FAQ--7" aria-expanded="false">7. Are there
                                                    medical facilities
                                                    available on campus?
                                                    <i class="tutor-icon"></i></button>
                                                <div id="FAQ--7" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionCourse" style="">

                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                @php
                                                                $hasMedicalFacility = null;
                                                                if ($schooldetails['facilities']) {
                                                                $medicalFeatures = json_decode(
                                                                $schooldetails['facilities']?->medical,
                                                                );
                                                                if ($medicalFeatures != null) {
                                                                $hasMedicalFacility = in_array(
                                                                'Medical Facility',
                                                                $medicalFeatures,
                                                                );
                                                                }
                                                                }
                                                                @endphp

                                                                {{ $hasMedicalFacility ? 'Yes,' : 'No,' }}
                                                                {{ $schooldetails->name }}
                                                                {{ $hasMedicalFacility ? 'does' : "doesn't" }} have
                                                                medical facilities on campus with qualified
                                                                professionals.
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="school-fee" class="tab-pane fade">
                            <div class="tutor-course-main-segment">@if($showAds) <div
                                    class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <div class="tutor-course-segment">

                                        <div class="tutor-course-segment__header">
                                            <h4 class="tutor-course-segment__title">School Fees</h4>

                                        </div>

                                        <div class="course-curriculum accordion">

                                            <div class="tutor-course-segment">
                                                <p> We appreciate your interest in {{ $schooldetails->name }}! We
                                                    understand that choosing the right school for your child is an
                                                    important decision, and we are delighted that you are
                                                    considering
                                                    us. </p>

                                                <p> To know the fee details or the admission process in general,
                                                    please
                                                    do not hesitate to get in touch with our admission team. We are
                                                    here
                                                    to assist you. </p>
                                                <p>
                                                    Fees Enquiry Form:
                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="tutor-course-segment tutor-course-wrap">

                                    <div class="tutor-course-top-info bg-color-11">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style="background: #fff" class="account-card fade show">
                                                        {{-- <div ng-app="myApp" ng-controller="myCtrl"
                                                            style="margin: 10px;width:100%;margin:auto auto;">
                                                            <ng-template ng-show="fields.length>0">
                                                                <form ng-submit="submitData()">
                                                                    <input type="hidden" name="school_id"
                                                                        value="{{ $schooldetails->school_id }}" />
                                                                    <div ng-repeat="(sectionIndex, section) in fields"
                                                                        style="">
                                                                        <div style="display: flex; flex-wrap: wrap; "
                                                                            class="form-row">
                                                                            <div class="form-group col-md-6 p-2"
                                                                                ng-repeat="(elementIndex, element) in section.elements">
                                                                                <label for="inputAddress">@{{
                                                                                    element.label }}
                                                                                    <sup
                                                                                        ng-if="element.option.is_required">*</sup>
                                                                                </label>
                                                                                <ng-template
                                                                                    ng-if="(element.type=='text') || (element.type=='email')||(element.type=='date') ||(element.type=='number')">
                                                                                    <input type="@{{ element.type }}"
                                                                                        class="form-control"
                                                                                        name="@{{ element.name }}"
                                                                                        ng-model="element.value"
                                                                                        required="@{{ element.option.is_required }}"
                                                                                        placeholder="@{{ element.label }}">
                                                                                </ng-template>
                                                                                <ng-template
                                                                                    ng-if="element.type=='file'">
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        name="@{{ element.name }}"
                                                                                        file-model="element.value"
                                                                                        required="@{{ element.option.is_required }}">
                                                                                </ng-template>
                                                                                <ng-template
                                                                                    ng-if="(element.type=='textarea')">
                                                                                    <textarea class="form-control"
                                                                                        name="@{{ element.name }}"
                                                                                        required="@{{ element.option.is_required }}"
                                                                                        ng-model="element.value"> </textarea>
                                                                                </ng-template>
                                                                                <ng-template
                                                                                    ng-if="element.type=='radio'">
                                                                                    <div class="form-control"
                                                                                        style="align-items: center;display:flex">
                                                                                        <span
                                                                                            ng-repeat="menu in element.menu"
                                                                                            style="margin: 5px;">
                                                                                            <input type="radio"
                                                                                                value="@{{ menu }}"
                                                                                                name="@{{ element.name }}"
                                                                                                required="@{{ element.option.is_required }}"
                                                                                                ng-model="element.value">@{{
                                                                                            menu }}
                                                                                        </span>
                                                                                    </div>
                                                                                </ng-template>
                                                                                <ng-template
                                                                                    ng-if="element.type=='checkbox'">
                                                                                    <div class="form-control"
                                                                                        style="align-items: center;display:flex">
                                                                                        <span
                                                                                            ng-repeat="menu in element.menu"
                                                                                            style="margin: 5px;">
                                                                                            <input type="checkbox"
                                                                                                ng-checked="@{{ GetSelectedStatus(element.value, menu) }}"
                                                                                                ng-click="SetSelectedItem(sectionIndex,elementIndex,menu)">@{{
                                                                                            menu }}
                                                                                        </span>
                                                                                    </div>
                                                                                </ng-template>
                                                                                <ng-template
                                                                                    ng-if="element.type=='select'">
                                                                                    <select name="@{{ element.name }}"
                                                                                        class="form-control"
                                                                                        required="@{{ element.option.is_required }}"
                                                                                        ng-model="element.value">
                                                                                        <option value="">
                                                                                            Select</option>
                                                                                        <option value="@{{ menu }}"
                                                                                            ng-repeat="menu in element.menu">
                                                                                            @{{ menu }}
                                                                                        </option>
                                                                                    </select>
                                                                                </ng-template>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display:  flex;
                                                                        margin-top:10px" class="col-6 p-2">
                                                                        <button class="btn btn-md btn-primary"
                                                                            type="submit">SUBMIT</button>
                                                                    </div>
                                                                </form>
                                                            </ng-template>
                                                        </div> --}}
                                                        <form class="row gy-4" method="POST"
                                                            action="{{ route('school.new.application.submit') }}">
                                                            @csrf
                                                            <div class="col-md-6">
                                                                <!-- Account Account details Start -->
                                                                <div class="dashboard-content__input">
                                                                    <label class="form-label-02">Student
                                                                        Name</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                        placeholder="Enter Student's Name" id="name">
                                                                    <input type="hidden" name="school_id" id="school_id"
                                                                        value="{{ $schooldetails->id }}">
                                                                </div>
                                                                <!-- Account Account details End -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <!-- Account Account details Start -->
                                                                <div class="dashboard-content__input">
                                                                    <label class="form-label-02">Class</label>
                                                                    <select type="text" class="form-control"
                                                                        name="seeking_class" id="seeking_class">
 
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

                                                            <div class="col-md-6">
                                                                <div class="dashboard-content__input">
                                                                    <label class="form-label-02">Gender</label>
                                                                    <select class="form-control" name="gender"
                                                                        id="gender">
                                                                        <option value="">Select Gender</option>
                                                                        <option value="1">Male</option>
                                                                        <option value="2">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="phone-no-wrapper"
                                                                style="position: relative;">
                                                                <!-- Account Account details Start -->
                                                                <div class="dashboard-content__input"
                                                                    id="application_phone_label">
                                                                    <label class="form-label-02">Phone</label>
                                                                    <input type="text" class="form-control" name="phone"
                                                                        id="application_phone"
                                                                        placeholder="Enter your phone number">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; bottom: 0; right: 15px;">
                                                                    <a href="javascript:void(0)" id="otp_send_button"
                                                                        style="display: none;" class="btn btn-primary"
                                                                        onclick="sendApplicationOtp()">Send
                                                                        OTP</a>
                                                                </div>
                                                                <!-- Account Account details End -->
                                                            </div>
                                                            <div class="col-md-6" id="otp-view"
                                                                style="display: none; position: relative">
                                                                <div><label class="form-label-02">OTP</label>
                                                                    <input type="text" id="otp_code" placeholder="12345"
                                                                        class="form-control">
                                                                </div>
                                                                <div
                                                                    style="position: absolute; bottom: 0; right: 15px;">
                                                                    <a id="otp_submit_button" class="btn btn-primary"
                                                                        onclick="verify()">Verify & Submit</a>
                                                                </div>
                                                                <div id="OtpMessage" style="display: none;">OTP
                                                                    Verified
                                                                </div>
                                                                <div id="OtpMessage" style="display: none;">OTP
                                                                    Verified
                                                                </div>
                                                            </div>

                                                            <div class="">
                                                                <button id="application_submit_button" type="submit"
                                                                    style="display: none;" disabled
                                                                    class="btn btn-primary">Submit Application
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>@if($showAds) <div class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                            </div>
                        </div>
                        <div id="tab-news-articles" class="tab-pane fade">
                            <div class="tutor-course-main-segment">@if($showAds) <div
                                    class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                                <div class="tutor-course-segment tutor-course-wrap">
                                    <div class="tutor-course-segment">

                                        <div class="tutor-course-segment__header">
                                            <h4 class="tutor-course-segment__title">News & Articles</h4>

                                        </div>

                                        <div class="course-curriculum accordion">

                                            <div class="tutor-course-segment">
                                             @foreach($article_list_schoolwise as $article)
                                                <div class="blog-list-item-02" data-aos="fade-up"
                                                    data-aos-duration="1000">
                                                    <div class="blog-list-item-02__image"> <a href="{{route('article.details',$article->custom_url)}}" target="_blank">
                                                            <img src="{{asset('/storage/articlebanner/'.$article->blog_image_path)}}"
                                                                alt="Blog" width="270" height="170"></a> </div>
                                                    <div class="blog-list-item-02__content">
                                                        <h3 class="blog-list-item-02__title"><a href="{{route('article.details',$article->custom_url)}}" target="_blank">{{ $article->blog_title }}</a>
                                                        </h3>
                                                        <div class="blog-list-item-02__meta"> <span class="meta-action">
                                                                <i class="far fa-calendar"></i> Date:{{$article->created_at->format('d-m-Y')}}</span>
                                                            <span class="meta-action"> <i class="fal fa-user"></i><a
                                                                    href="#">{{$article->blog_article_writer->name}}</a></span>
                                                        </div> <a target="_blank" class="blog-list-item-02__more" href="{{route('article.details',$article->custom_url)}}">Read
                                                            More <i class="fal fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                             @endforeach
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                @if($showAds) <div class="tutor-course-segment tutor-course-wrap p-0 ">
                                    <div class="tutor-course-segment__benefits-items landscape-image-wrapper">
                                        <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                            class="background-image"></div>
                                    </div>
                                </div> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tutor-course-sidebar sidebar-label">
                    @if($showAds)
                    <div class="tutor-course-segment tutor-course-wrap p-0 ">

                        <div class="oneByOne-image-wrapper">
                            <div onclick="window.open('https://www.careerandcourses.com/neet-jee-landing-page', '_blank')"
                                class="background-image"></div>
                        </div>
                    </div>
                    @endif
                    <div class="tutor-course-price-preview">
                        <div class="tutor-course-price-preview__thumbnail">
                            <div class="event-details__map">
                                <iframe id="gmap_canvas"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBtWE84XIIE6anZBgc6KMiefOpYnsWVArE&q={{ $schooldetails->address?->lattitude }},{{ $schooldetails->address?->longitude }}"></iframe>
                            </div>
                        </div>
                        <div class="tutor-course-price-preview__price">
                            <div class="tutor-course-price-badge"><i class="meta-icon far fa-map-marker-alt"></i>
                                {{ $schooldetails->address?->address . ', ' }}{{ $schooldetails->address?->city . ', '
                                }}{{ $schoolcontacts?->states?->state . ' -' }}
                                {{ $schoolcontacts?->pincode }}
                            </div>
                        </div>
                        <div class="tutor-course-price-preview__meta">

                        </div>
                        <div class="tutor-course-price-preview__social">
                            @if ($schooldetails->address)
                            @if ($schooldetails->address->fb)
                            <a href="{{ $schooldetails->address->fb }}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if ($schooldetails->address->twitter)
                            <a href="{{ $schooldetails->address->twitter }}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if ($schooldetails->address->linkedin)
                            <a href="{{ $schooldetails->address->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if ($schooldetails->address->insta)
                            <a href="{{ $schooldetails->address->insta }}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if (
                            !$schooldetails->address->fb &&
                            !$schooldetails->address->twitter &&
                            !$schooldetails->address->linkedin &&
                            !$schooldetails->address->insta
                            )
                            No social profile found
                            @endif
                            @else
                            No social profile found
                            @endif
                        </div>
                    </div>
                    <div class="sidebar-widget border-0">
                        <h3 class="sidebar-widget__title"> Get more Reviews</h3>
                        <div style="display: flex; justify-content: center; align-items: center">
                            <button style="margin-top: 0; " class="btn btn-light btn-hover-primary"
                                data-bs-toggle="modal" data-bs-target="#School-Review-Share-Modal">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    height="1rem" width="1rem" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                                    <path
                                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.17l-.59.59-.58.58V4h16v12zm-9.5-2H18v-2h-5.5zm3.86-5.87c.2-.2.2-.51 0-.71l-1.77-1.77c-.2-.2-.51-.2-.71 0L6 11.53V14h2.47l5.89-5.87z">
                                    </path>
                                </svg>
                                Ask for a Review
                            </button>
                        </div>
                    </div>

                    <div class="sidebar-widget border-0">
                        <h3 class="sidebar-widget__title">Nearby Schools</h3>
                        <div class="sidebar-widget__course">
                            @foreach ($recommended_schools as $schools)
                            @if ($schools->id != $schooldetails->id)
                            <div class="sidebar-widget__course-item">
                                <div class="sidebar-widget__course-thumbnail"><a
                                        href="{{ url('details/' . $schools->slug) }}"> <img
                                            src="{{ $schools->school_logo }}" alt="School Dekho" width="120"
                                            height="72"></a></div>
                                <div class="sidebar-widget__course-content">
                                    <h4 class="sidebar-widget__course-title pt-0"><a
                                            href="{{ url('details/' . $schools->slug) }}">{{ $schools->name }}
                                            @if ($schools->is_verify)
                                            <i class="fas fa-badge-check text-primary small" data-bs-tooltip="tooltip"
                                                data-bs-placement="top" data-bs-original-title="Verified" title=""
                                                aria-label="Select Demo"></i>
                                            @endif
                                        </a></h4>
                                    <p class="nearby-schools__address mb-0">
                                        {{ $schools->address?->address . ', ' }}{{ $schools->address?->city . ' ' }}
                                        {{-- {{ $schools?->address?->state_id->state . ' -' }} --}}
                                    </p>
                                    <div class="nearby-schools__footer d-flex justify-content-between">
                                        <div class="tutor-course-top-info__meta-rating">
                                            <div class="rating-star nearby-school-rating-star d-flex">
                                                @php
                                                $reviews = $schools['reviews'];
                                                $totalRating = 0;
                                                $reviewCount = count($reviews);
                                                foreach ($reviews as $review) {
                                                $totalRating += $review['rating'];
                                                }
                                                if ($reviewCount > 0) {
                                                $averageRating = $totalRating / $reviewCount;
                                                } else {
                                                $averageRating = 0;
                                                }
                                                @endphp
                                                <div class="rating-label nearby-school-rating-label"
                                                    style="width: {{ number_format($averageRating, 2) * 20 }}%;">
                                                </div>
                                            </div>
                                            <span> ({{ count($reviews) }}) </span>
                                        </div>
                                        <span><i class="far fa-road meta-icon"></i>
                                            {{ round($schools->distance, 1) }} Km</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="offcanvas-user__button">
    <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys" data-bs-toggle="modal"
        data-bs-target="#ReviewModal">Log In</button>
</div> --}}
<div id="ReviewModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-login">
        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
            <!-- Modal Content Start -->
            <div class="modal-content">
                <h4 class="tutor-course-segment__title">Write a review</h4>
                <div class="tutor-course-segment__reviews">
                    <div class="comment-form">
                        <form action="{{ route('school.review.add') }}" method="POST">
                            @csrf
                            <input name="school_id" type="hidden" value="{{ $schooldetails->id }}">
                            <div class="comment-form__rating">
                                <label class="label">Your rating: *</label>

                                <head>
                                    {{-- <input type="hidden" name="modal" id="" @if (request()->get('review-model'))
                                    value="5"
                                    @endif"> --}}
                                    <div class="rating">
                                        <input id="star-modal5" name="rating" type="radio" value="5">
                                        <label class="star" for="star-modal5"><i class="fas fa-star"></i></label>
                                        <input id="star-modal4" name="rating" type="radio" value="4">
                                        <label class="star" for="star-modal4"><i class="fas fa-star"></i></label>
                                        <input id="star-modal3" name="rating" type="radio" value="3">
                                        <label class="star" for="star-modal3"><i class="fas fa-star"></i></label>
                                        <input id="star-modal2" name="rating" type="radio" value="2">
                                        <label class="star" for="star-modal2"><i class="fas fa-star"></i></label>
                                        <input id="star-modal1" name="rating" type="radio" value="1" checked>
                                        <label class="star" for="star-modal1"><i class="fas fa-star"></i></label>
                                    </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="comment-form__input">
                                        <input class="form-control" name="name" type="text" placeholder="Your Name *"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="comment-form__input">
                                        <input class="form-control" name="email" type="email" placeholder="Your Email *"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="comment-form__input">
                                        <textarea class="form-control" name="description" placeholder="Your Review"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {{-- <div class="comment-form__input form-check">
                                        <input id="save-modal" type="checkbox">
                                        <label for="save-modal">I accept to the terms and
                                            conditions of School Dekho.</label>
                                    </div> --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="comment-form__input">
                                        <button class="btn btn-primary btn-hover-secondary" type="submit">Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Content End -->
        </div>
        <!-- Modal Wrapper End -->
    </div>
</div>
<div id="School-Review-Share-Modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-login">
        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
            <!-- Modal Content Start -->
            <div style="padding: 30px" class="modal-content">
                <div style="padding: 0" class="sidebar-widget border-0">
                    <div class="header-user__button">
                    </div>
                    <h4 style="" class="sidebar-widget__title">You can share this link to get
                        more review</h4>
                    <ul class="share-review-links">
                        <li><a target="_blank"
                                href="https://twitter.com/intent/tweet?text={{ rawurlencode($schooldetails->name . ' - School Dekho') }}%0AWe would love your feedback. Post a review to our school.%0A%0A{{ rawurlencode('https://www.schooldekho.org/details/' . $schooldetails->slug . '?review=true') }}">Twitter
                                <i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode('https://www.schooldekho.org/details/' . $schooldetails->slug . '?review=true') }}&quote={{ rawurlencode($schooldetails->name . ' - School Dekho') }}%0AWe would love your feedback. Post a review to our school.">
                                Facebook <i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank"
                                href="https://api.whatsapp.com/send?text={{ rawurlencode($schooldetails->name . ' - School Dekho') }}%0AWe would love your feedback. Post a review to our school.%0A%0A{{ rawurlencode('https://www.schooldekho.org/details/' . $schooldetails->slug . '?review=true') }}">
                                Whatsapp <i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                    <div style="position: relative; display: flex;">
                        <div style="display: flex; flex-direction: column ; width: 100%;">
                            <label for="hiddenInput"> Review link</label>
                            <input id="hiddenInput" style="flex: 1; padding: 7px; box-sizing: border-box; width: 100%;"
                                type="text" readonly
                                value="{{ 'www.schooldekho.org/details/' . $schooldetails->slug . '?review=true' }}"
                                aria-hidden="true">
                        </div>
                        <button style="border: 1px solid gray; padding: 7px; background: #fff; margin-top: 24.5px"
                            onclick="copyText()"><i class="fas fa-copy"></i></button>
                        <div id="copySuccess"
                            style="border: 1px solid gray; padding: 7px; display: none; background: #0071dc; color: #fff;margin-top: 24.5px; position: absolute; top: 0; right: 0; height: 43px;  justify-content: center; align-items: center;"
                            class="hidden"><i style="margin: auto" class="fas fa-check"></i></div>
                    </div>
                    <p style="text-align: center; margin-top: 10px;font-size: 9px;"><a href="/contact">Contact
                            us</a>
                        for any
                        queries.</p>
                </div>
            </div>
            <!-- Modal Content End -->
        </div>
        <!-- Modal Wrapper End -->
    </div>
</div>
<div id="blog-lead" class="modal fade" style="display: none;" data-backdrop="static" data-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-login">
        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
            <!-- Modal Content Start -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 24px">Admission Enquiry</h5>
                    {{-- <p class="modal-description">Don't have an account yet? <button data-bs-toggle="modal"
                            data-bs-target="#registerModal">Sign up for free</button></p> --}}
                </div>
                <div class="modal-body">
                    <form id="blog-leads" method="POST" action="{{ route('school.new.application.submit') }}">
                        @csrf
                        <div class="modal-form">
                            <label class="form-label">Student Name </label>
                            <input class="form-control" name="name" id="name1" type="text"
                                placeholder="Enter Student's Name" required />
                            <input id="school_id1" type="hidden" name="school_id1" value="{{ $schooldetails->id }}">
                        </div>

                        <div class="modal-form">
                            <label class="form-label">Which class?</label>
                            <div class="countdown-register__input">

                                <i class="edumi edumi-open-book"></i>
                                <select class="form-control" name="seeking_class" id="seeking_class1"
                                    required="required">
                                    <option value=" " disabled="" selected="">Select a Class</option>
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
                                <p id="seekingClassError" class="error-message" style="display: none;"></p>
                            </div>
                        </div>

                        <div class="modal-form">
                            <label class="form-label">Gender</label>
                            <div class="countdown-register__input">

                                <i class="edumi edumi-open-book"></i>
                                <select class="form-control" name="gender" id="gender1" required="required">
                                    <option value=" " disabled="" selected="">Select gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <p id="seekingClassError" class="error-message" style="display: none;"></p>
                            </div>
                        </div>
                        <div class="modal-form" style="position: relative" id="application_phone_field">
                            <label class="form-label">Your Phone Number</label>
                            <input class="form-control" id="application_phone_2" name="phone" type="text"
                                placeholder="Your Phone Number" required>
                            <div style=" position: absolute; bottom: 0; right: 0px;">
                                <a href="javascript:void(0)" id="otp_send_button_2" style="display: none;"
                                    class="btn btn-primary" onclick="sendApplicationOtp2()">Send
                                    OTP</a>
                            </div>
                        </div>

                        <div id="errorMessage" style="display: none; color: red;">Please enter a valid 10-digit
                            phone
                            number.
                        </div>
                        <div class="modal-form mt-3" id="otp-view-2" style="position: relative ; display:none;">

                            <div><label class="form-label">OTP</label>
                                <input type="text" id="otp_code_2" placeholder="12345" class="form-control">
                            </div>
                            <div style="position: absolute; bottom: 0; right: 0;">
                                <a id="otp_submit_button" class="btn btn-primary" onclick="verify2()">Verify &
                                    Submit</a>
                            </div>

                        </div>

                        {{-- <button id="lead_capture_submit" disabled
                            class="btn btn-primary btn-hover-secondary w-100  mt-3" type="submit">Submit</button>
                </div> --}}
                </form>
                <script>
                    document.getElementById("phoneInput").addEventListener("keyup", function (event) {
                var phoneInput = event.target;
                var errorMessage = document.getElementById("errorMessage");
                var button = document.getElementById("lead_capture_submit");
                // Check if the length is less than 10 characters
                if (phoneInput.value.length < 10 || phoneInput.value.length > 10) {
                    errorMessage.style.display = "block";
                    button.disabled = true;
                    // Show error message
                } else {
                    errorMessage.style.display = "none"; // Hide error message if displayed
                    button.disabled = false;
                }
            });
                </script>
            </div>
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Wrapper End -->
</div>
</div>

<div class="mobile-sticky-button">
    <a class="btn btn-admission btn-hover-secondary btn-primary"
        href="{{ route('school.new.application.form', $schooldetails->id) }}">Admission Enquiry</a>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    // Function to check URL parameter
            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }

            // Check if the "review-model" parameter is present in the URL
            var reviewModelParam = getParameterByName('review');
            if (reviewModelParam === 'true') {
                // Trigger the modal if the parameter is 'true'
                showModal('#ReviewModal')
            }

            function showModal(modalId) {
                $(document).ready(function () {
                    $(modalId).modal('show');
                    // Change URL and URL parameter to 'false'
                    var newUrl = window.location.href.replace('?review=true', '');
                    history.pushState({}, '', newUrl);
                });
            }
</script>

<script>
    function copyText() {
                // Select the hidden input field to copy
                var inputToCopy = document.getElementById("hiddenInput");
                // Create a range to select the text
                var range = document.createRange();
                range.selectNode(inputToCopy);
                // Select the text
                window.getSelection().removeAllRanges(); // Clear previous selections
                window.getSelection().addRange(range);
                // Use the Clipboard API to copy the text
                navigator.clipboard.writeText(inputToCopy.value).then(function () {
                    // Deselect the text
                    window.getSelection().removeAllRanges();
                    // Show tick icon and "Copied!" message
                    var copySuccess = document.getElementById("copySuccess");
                    copySuccess.style.display = 'flex'; // Show the tick icon and message
                    setTimeout(function () {
                        copySuccess.style.display = 'none'; // Hide the tick icon and message after a delay
                    }, 2000); // Adjust the delay (in milliseconds) as needed
                }).catch(function (err) {
                    console.error('Unable to copy text', err);
                });
            }
</script>
<script>
    // Function to dynamically add a favicon
            function addFavicon() {
                // Create link element for favicon
                const faviconLink = document.createElement('link');
                faviconLink.rel = 'icon';
                faviconLink.type = 'image/png'; // Set the appropriate MIME type
                faviconLink.href = '/assets/images/favicon.ico'; // Provide the path to your favicon image
                // Append the link element to the head of the document
                document.head.appendChild(faviconLink);
            }

            // Call the function to add the favicon
            addFavicon();
</script>

@push('js')
<script>
    var hash_key = null;

                document.getElementById('application_phone').addEventListener('keyup', function (e) {
                    if (document.getElementById('application_phone').value.length === 10) {
                        document.getElementById('otp_send_button').style.display = 'block';
                    } else {
                        document.getElementById('otp_send_button').style.display = 'none';
                    }
                });

                document.getElementById('application_phone_2').addEventListener('keyup', function (e) {
                    if (document.getElementById('application_phone_2').value.length === 10) {
                        document.getElementById('otp_send_button_2').style.display = 'block';
                    } else {
                        document.getElementById('otp_send_button_2').style.display = 'none';
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
                            document.getElementById('phone-no-wrapper').style.display = 'none';
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

                function sendApplicationOtp2() {
                    var mobile = document.querySelector('#application_phone_2').value;
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
                            document.getElementById('otp_send_button_2').style.display = 'none';
                            document.getElementById('application_phone_label').style.display = 'none';
                            document.getElementById('phone-no-wrapper').style.display = 'none';
                            var inputField = document.getElementById("otp-view-2");
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
                            alert("Your Application has been submitted successfully");
                            location.reload();
                        } else {
                            alert(data.message);
                        }

                    }).catch(error => {
                        alert("Something gone wrong");
                    })

                }

                function verify2() {
                    var otp_code = document.querySelector('#otp_code_2').value;
                    // alert(otp_code);
                    var school_id = document.querySelector('#school_id1').value;
                                    var name = document.querySelector('#name1').value;
                    var seeking_class = document.querySelector('#seeking_class1').value;
                    // var school_type = document.querySelector('#school_type').value;
                    var gender = document.querySelector('#gender1').value;
                    var phone = document.querySelector('#application_phone_2').value;
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
                            // document.getElementById('OtpMessage').style.display = 'block';
                            document.getElementById('otp-view-2').style.display = 'none';
                            document.getElementById('otp_send_button_2').style.display = 'none';
                            document.getElementById('application_phone_2').style.display = 'none';
                            document.getElementById('application_phone_field').style.display = 'none';
                            // document.getElementById('lead_capture_submit').disabled = false;
                            alert("Your Application has been submitted successfully");
                            location.reload();
                        } else {
                            alert(data.message);
                        }

                    }).catch(error => {
                        alert("Something gone wrong");
                    })

                }
</script>
<script>
    // Check if the cookie is set
                if (document.cookie.indexOf("blog-callback=true") === -1) {
                    // Wait for 3 seconds and then open the modal
                    setTimeout(function () {
                        $('#blog-lead').modal('show');
                    }, 7000);
                }

                // Handle form submission
                $('#blog-leads').submit(function (e) {
                    e.preventDefault();

                    // Perform form submission using AJAX
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success: function () {

                            var expires = new Date();
                            expires.setTime(expires.getTime() + 24 * 60 * 60 * 1000); // 24 hours
                            document.cookie = "blog-callback=true;expires=" + expires.toUTCString();

                            $('#blog-lead').modal('hide');
                            swal(
                                "Thanks!",
                                "We will get back to you shortly.",
                                "success"
                            );
                        },
                        error: function (error) {

                            console.error(error);
                        }
                    });
                });
</script>
<script src="{{ asset('assets/front/js/vendor/angular.min.js') }}"></script>
@if ($message = Session::get('msg'))
<script>
    swal("No School added", "Please add school for comparison", "warning");
</script>
@endif
<script>
    var app = angular.module('myApp', []);
                app.controller('myCtrl', function ($scope, $http) {
                    $scope.fields = [];
                    var elements = document.getElementsByTagName('input');
                    get_fields();

                    function get_fields() {
                        $http({
                            url: `/school/applicationform/fields?school_id=${elements['school_id'].value}`,
                            method: 'GET'
                        }).then(res => {
                            var response = res.data;
                            if (response.is_success) {
                                $scope.fields = response.data
                            }
                        })
                    }

                    $scope.submitData = function () {
                        //console.log($scope.fields);
                        $http({
                            url: "/school/application/save",
                            data: {
                                school_id: elements['school_id'].value,
                                fields: $scope.fields
                            },
                            method: "POST",
                        }).then(res => {
                            var response = res.data;
                            swal("Success!", response.message, "success");
                            setInterval(function () {
                                window.history.go(-1);
                            }, 2000)
                        }, error => {
                            swal("Warning!", error, "warning");
                        })
                    }
                    $scope.GetSelectedStatus = function (items, value) {
                        if (!items) {
                            return false;
                        }
                        return items.includes(value);
                    }
                    $scope.SetSelectedItem = function (selection_index, element_index, value) {
                        var fields = $scope.fields;
                        var section = fields[selection_index];
                        var element = section.elements[element_index];
                        var values = (element.value) ? element.value : [];
                        var index = values.indexOf(value);
                        if (index < 0) {
                            values.push(value);
                        } else {
                            values.splice(index, 1);
                        }
                        element.value = values;
                        $scope.fields = fields;
                    }
                    $scope.SetFile = function (selected_index, element_index, value) {
                        debugger;
                        console.log(value);
                    }
                });
                app.directive('fileModel', ['$parse', function ($parse) {
                    return {
                        restrict: 'A',
                        link: function (scope, element, attrs) {
                            var model = $parse(attrs.fileModel);
                            var modelSetter = model.assign;
                            element.bind('change', function () {
                                scope.$apply(function () {
                                    getBase64(element[0].files[0]).then(
                                        data => {
                                            modelSetter(scope, data);
                                        }
                                    );
                                });
                            });
                        }
                    };
                }]);

                function getBase64(file) {
                    return new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = () => resolve(reader.result);
                        reader.onerror = error => reject(error);
                    });
                }
</script>
@endpush
@endsection