@extends('layouts.front.app')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/front/css/custom/about.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/custom/index-custom.css') }}">
@endpush

<script>
    window.onload = function() {
        getLocation();
    };


    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

    function showPosition(position) {
        console.log("Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude);
    }
</script>




@section('content')
<section class="banner-part">
    <div class="container">
        <div class="banner-content col-md-8 offset-md-2">
            <div class="header-search header-search-cover" style="margin-bottom: 20px;margin-top:20px;">
                <button type="button" title="Filter by Location" class=""><i class="fas fa-map-marker-alt"></i></i></button>
                <input type="text" id="search_key" placeholder="Search 15000+ schools" value="">
                <button type="submit" class="btn-primary icon-center" onclick="GoTo()" style="height: 50px; border-radius: 0px 5px 5px 0px; background-color: #0044bb;" title="Search Submit "><i class="fas fa-search fa-search-1" style=" color: white;"></i></i></button>
                <script>
                    var enter = document.getElementById("search_key");
                    enter.addEventListener("keydown", function(e) {
                        if (e.code === "Enter") { //checks whether the pressed key is "Enter"
                            GoTo();
                        }
                    });

                    function GoTo() {
                        var key = document.getElementById("search_key").value;
                        console.log(key);
                        url = "{{ url('/search/') }}" + "/" + key;
                        console.log(url);
                        window.location.href = url;
                    }
                </script>

            </div>
            <h1 style="text-align: left;">Did you know,<span style="font-weight: 400;"> Everyday thousands of Parents use School Dekho to find their child's dream school.</span></h1>
            <div class="header-option header-option-box" id="suggesstion-box">
              
            </div>
        </div>

</section>
<section class="suggest-part">
    <div class="container">
        <div class="suggest-slider slider-arrow">
            {{-- <a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/admission-open.png" alt="admission open schools">
            <h6>Admission Open</h6>
            <p>(354) schools</p>
            </a> --}}
            <a href="{{ url('search') }}" class="suggest-card"><img src="{{ asset('assets') }}/images/suggest/schools.png" alt="total schools">
                <h6>Total Schools</h6>
                <p>({{ $total_schools }}) schools</p>
            </a>
            {{-- <a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/trending.png" alt="icse schools">
            <h6>Trending</h6>
            <p>(212) schools</p>
            </a> --}}
            <a href="{{ url('search/icse') }}" class="suggest-card"><img src="{{ asset('assets') }}/images/suggest/icse.png" alt="icse schools">
                <h6>ICSE</h6>
                <p>({{ $icse_schools }}) schools</p>
            </a>
            <a href="{{ url('search/cbse') }}" class="suggest-card"><img src="{{ asset('assets') }}/images/suggest/cbse.png" alt="cbse schools">
                <h6>CBSE</h6>
                <p>({{ $cbse_schools }}) schools</p>
            </a>
            <a href="{{ url('search/wbbse') }}" class="suggest-card"><img src="{{ asset('assets') }}/images/suggest/wbbse.png" alt="wbbse schools">
                <h6>WBBSE</h6>
                <p>({{ $wbse_schools }}) schools</p>
            </a>
            {{-- <a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/search.png" alt="searches per hour">
            <h6>Searches</h6>
            <p>(7054) per hour</p>
            </a> --}}
            <a href="#" class="suggest-card"><img src="{{ asset('assets') }}/images/suggest/students.png" alt="total student registered">
                <h6>Students</h6>
                <p>({{ $total_students }}) registered</p>
            </a>
            {{-- <a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/wb.png" alt="West Bengal School">
            <h6>West Bengal</h6>
            <p>(2,112) schools</p>
            </a> --}}

        </div>
    </div>
</section>

<section class="section feature-part">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="section-side-heading">
                    <h2>Who are we and <span>why us?</span></h2>
                    <p>Welcome to School Dekho, India’s first search engine for school admissions. We're dedicated to giving you the best school of your choice with a focus on education as a priority, infrastructure & nature, like extra-curricular activities, programs, etc. </p>
                </div>
                <div class="about-quote">
                    <p> School Dekho's goal is to get all students admitted to their dream choice of schools right from their home. </p>
                    <h5>Founder & CEO - <span>School Dekho</span></h5>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">

                <div class="row about-image">
                    <div class="col-6 col-lg-6"><img src="{{ asset('assets') }}/images/about/01.jpg" alt="about">
                    </div>
                    <div class="col-6 col-lg-6"><img src="{{ asset('assets') }}/images/about/02.jpg" alt="about">
                    </div>
                    <div class="col-6 col-lg-6"><img src="{{ asset('assets') }}/images/about/03.jpg" alt="about">
                    </div>
                    <div class="col-6 col-lg-6"><img src="{{ asset('assets') }}/images/about/04.jpg" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section recomend-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Recommended <span><i>Schools</i></span></h2>
                    <p>School Dekho also recommends schools with excellent educational values and top-notch facilities.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recomend-slider slider-arrow">
                    @foreach ($recommended_schools as $schools)
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img img-center"><img style="" src="{{ $schools->school_logo }}" alt="product" height="120"></div>
                            <div class="product-type">
                                @if ($schools->is_admission)
                                <span class="flat-badge rent">Admission Open</span>
                                @else
                                <span class="flat-badge sale">Admission Closed</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title"><a href="{{ route('details', $schools->id) }}">{{ $schools->name }} 
                            @if($schools->is_verify == 1)
                                <i class="fas fa-check-circle text-primary" title="Verified by School Dekho"></i></a> 
                            @endif
                            </h5>
                            <div class="product-meta">
                                <span class = "text-secondary"><i class="fas fa-map-marker-alt"></i>
                                    {{ $schools->address?->address }}
                                </span>

                            </div>
                            <div class="product-info">
                                <a href="{{ url('details' , $schools->id) }}" class="blog-read">
                                    <span>Go to School</span><i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                                <div class="review-meta">
                                    <ul>
                                        <li><i class="fas fa-star active"></i></li>
                                        <li>
                                            <h5> {{ $schools->rating }}/5.0</h5>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-50"><a href="{{ url('search') }}" class="btn btn-inline"><i class="fas fa-eye"></i><span>VIEW ALL RECOMMENDATIONS</span></a></div>
            </div>
        </div>
    </div>
</section>

<section class="intro-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Your Admission Partner!</h2>
                    <p>Whether you are a parent or a student or the school itself, we have a solution for everyone. Register to find out more.</p><a href="{{ route('schooladmin.signup')}}" class="btn btn-outline"><i class="fas fa-plus-circle"></i><span>Register your School</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Read Our <span><i>Recent Articles</i></span></h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recomend-slider slider-arrow">
                    @foreach ($popular_blogs as $blog)
                    <div class="product-card" style = "padding-top:-8px;">
                        <div class="product-media">
                            <div class="product-image-blog">
                                <img class  = "product-image-blog" src="{{ $blog->image }}" alt="blog-image" />
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h5>
                            <p class ="small text-gray"><i class="fas fa-clock"></i>
                                <span>{{ App\Core\Helper::GetDate($blog->created_at) }}</span>
                            </p>
                            <div class="product-meta small text-gray">
                                {!! substr($blog->short_description, 0, 100) !!}...
                            </div>
                            <div class="product-info">
                                <a href="{{ route('blog.details', $blog->id) }}" class="blog-read"><span>read
                                        more</span><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-btn"><a href="{{ route('blog.list') }}" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all blogs</span></a></div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
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