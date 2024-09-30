@extends('layouts.frontend.app')
@section('canonical')
  <link rel="canonical" href="https://www.schooldekho.org" />
@endsection
@push('css')
@endpush
<style>
  .error-message {
    margin-top: 4px;
    background-color: #ffe8e8;
    text-align: left;
    color: #ff5757;
    padding: 3px;
    border-radius: 5px;
    padding-left: 20px;
    font-size: 12px;
    transition: all 0.3s ease;
  }

  .countdown-register__input span {
    position: absolute;
    top: 15px;
    left: 15px;
    font-size: 14px;
    color: #666666;
    min-width: 20px;
  }
</style>
@section('content')
  <div class="slider-section">
    <div class="slider-wrapper scene">
      <div class="container">
        <div class="row align-items-center gy-10">
          <div class="col-md-6">
            <div class="slider-widget" data-aos="fade-up" data-aos-duration="1000">
              <div class="slider-caption">
                <h3 class="slider-caption__sub-title">Path to Success</h3>
                <h1 class="slider-caption__main-title">Finding the best school for your
                  <mark>kid</mark> is now just a <br><mark>click</mark> away!
                </h1>
              </div>
            </div>
            <div class="call-to-action__wrapper">
              <div class="slider-search" style="margin-bottom: 10px;">
                {{-- <form action="#">
                  <input id="autocomplete1" class="slider-search__field" placeholder="Enter school name or location...">
                  <button class="slider-search__submit" type="submit">
                    <i class="far fa-map-marker-alt"></i>
                  </button>
                </form> --}}
              </div>
              <div class="call-to-action__content" data-aos="fade-up" data-aos-duration="1000">
                <div class="call-to-action__caption">
                  <h3 class="call-to-action__sub-title"><i class="far fa-school"></i>
                    Local
                    Schools</h3>
                  <h3 class="call-to-action__main-title">Find School Near Me</h3>
                </div>
                <div class="call-to-action__btn">
                  <a id="autocomplete" class="btn btn-primary btn-hover-primary" href="javascript:void();"
                    onclick="getNearBySchools()">
                    Search
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="slider-image">
              <div class="slider-image__image text-lg-end text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('assets/images/sd_index.jpg') }}" alt="Hero Image" style="border-radius: 30px;"
                  width="599" height="480">
              </div>
              {{-- <style>
              @media only screen and (max-width: 767px) {
                .slider-image-widget {
                  bottom: -49px;
                }
              }
            </style> --}}
              <div class="slider-image-widget" data-aos="zoom-in-left" data-aos-duration="1000" data-aos-delay="1000">
                <div class="slider-image-widget__icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 53">
                    <g fill-rule="nonzero">
                      <path
                        d="M46.2977393,23.4211436 C45.3957447,23.4211436 44.6636968,22.6890957 44.6636968,21.787101 C44.6636968,15.5297872 42.2281915,9.64946809 37.8051861,5.22446809 C37.1668883,4.58617021 37.1668883,3.55132984 37.8051861,2.91303197 C38.443484,2.27473409 39.4783245,2.27473409 40.1170213,2.91303197 C45.156383,7.95438832 47.9317819,14.6585106 47.9317819,21.787101 C47.9317819,22.6890957 47.199734,23.4211436 46.2977393,23.4211436 L46.2977393,23.4211436 Z">
                      </path>
                      <path
                        d="M1.63404255,23.4211436 C0.732047898,23.4211436 0,22.6890957 0,21.787101 C0,14.6585106 2.77579792,7.95438832 7.81715428,2.91502662 C8.45545215,2.27672875 9.49069154,2.27672875 10.1289894,2.91502662 C10.7672873,3.55332449 10.7672873,4.58856388 10.1289894,5.22686175 C5.70398931,9.64946809 3.26808511,15.5297872 3.26808511,21.787101 C3.26808511,22.6890957 2.53603721,23.4211436 1.63404255,23.4211436 Z">
                      </path>
                      <path
                        d="M23.9660905,52.2893617 C19.4605053,52.2893617 15.7958777,48.6247341 15.7958777,44.1191489 C15.7958777,43.2171543 16.5279256,42.4851064 17.4299202,42.4851064 C18.3319149,42.4851064 19.0639628,43.2171543 19.0639628,44.1191489 C19.0639628,46.8231382 21.262101,49.0212766 23.9660905,49.0212766 C26.6696809,49.0212766 28.8682181,46.8231382 28.8682181,44.1191489 C28.8682181,43.2171543 29.600266,42.4851064 30.5022607,42.4851064 C31.4042553,42.4851064 32.1363032,43.2171543 32.1363032,44.1191489 C32.1363032,48.6247341 28.4716755,52.2893617 23.9660905,52.2893617 L23.9660905,52.2893617 Z">
                      </path>
                      <path
                        d="M41.9405585,45.7531915 L5.99162237,45.7531915 C3.88882979,45.7531915 2.1785904,44.0429521 2.1785904,41.9405585 C2.1785904,40.8247341 2.66449471,39.7683511 3.51223404,39.0426862 C6.82579792,36.2429521 8.71476061,32.1734043 8.71476061,27.8617021 L8.71476061,21.787101 C8.71476061,13.3775266 15.556117,6.53617021 23.9660905,6.53617021 C32.3756649,6.53617021 39.2170213,13.3775266 39.2170213,21.787101 L39.2170213,27.8617021 C39.2170213,32.1734043 41.1059841,36.2429521 44.3980053,39.0275266 C45.2672873,39.7683511 45.7531915,40.8247341 45.7531915,41.9405585 C45.7531915,44.0429521 44.0429521,45.7531915 41.9405585,45.7531915 Z M23.9660905,9.80425532 C17.3577128,9.80425532 11.9828457,15.1791223 11.9828457,21.787101 L11.9828457,27.8617021 C11.9828457,33.1360372 9.6714096,38.1167553 5.6429521,41.5220744 C5.56675527,41.5875001 5.44667551,41.7227393 5.44667551,41.9405585 C5.44667551,42.2365691 5.69521277,42.4851064 5.99162237,42.4851064 L41.9405585,42.4851064 C42.2365691,42.4851064 42.4851064,42.2365691 42.4851064,41.9405585 C42.4851064,41.7227393 42.3654255,41.5875001 42.2932181,41.5264627 C38.2603723,38.1167553 35.9489362,33.1360372 35.9489362,27.8617021 L35.9489362,21.787101 C35.9489362,15.1791223 30.5740692,9.80425532 23.9660905,9.80425532 Z">
                      </path>
                      <path
                        d="M23.9660905,9.80425532 C23.0640958,9.80425532 22.3320479,9.07220742 22.3320479,8.17021277 L22.3320479,1.63404255 C22.3320479,0.732047898 23.0640958,0 23.9660905,0 C24.8680851,0 25.600133,0.732047898 25.600133,1.63404255 L25.600133,8.17021277 C25.600133,9.07220742 24.8680851,9.80425532 23.9660905,9.80425532 Z">
                      </path>
                    </g>
                  </svg>
                </div>
                <div class="slider-image-widget__caption">
                  <h4 class="slider-image-widget__title">"Education is the most powerful
                    weapon which you
                    can use to change the world."<br> - <strong>Nelson Mandela</strong>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <img class="slider-section__shape-01" data-depth="0.8"
        src="{{ asset('assets/school/images/shape/edumall-shape-grid-dots.png') }}" alt="Shape" width="417"
        height="371">
      <div class="slider-section__shape-02" data-depth="-1"></div>
      <div class="slider-section__shape-03" data-depth="1.6"></div>
      <img class="slider-section__shape-04" data-depth="-0.6"
        src="{{ asset('assets/school/images/shape/edumall-shape-01.png') }}" alt="Shape" width="179" height="178">
    </div>
  </div>
  <div id="recommended" class="courses-section section-padding-01">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title-03"><mark>Recommended</mark> Schools</h2>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="section-btn-02 text-sm-end" data-aos="fade-up" data-aos-duration="1000">
            <a class="btn btn-light btn-hover-primary" href="javascript:void();" onclick="getNearBySchools()">View All <i
                class="far fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div id="trends" class="row gy-6">
      </div>
    </div>
  </div>
  <div id="counselling" class="countdown-signup-section bg-color-02 section-padding-01 scene">
    <div class="container">
      <div class="row gy-10 align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-sm-10">
          <div class="countdown-widget" data-aos="fade-up" data-aos-duration="1000">
            <div class="countdown-title">
              <h2 class="countdown-title__title">Get in touch with our Expert
                <mark>Counsellors
                </mark>
              </h2>
              <p>Guaranteed call back within 24 hours from our expert counsellors.</p>
            </div>
            <div class="countdown-wrap">
              <div class="countdown-clock countdown" data-countdown="2023/04/29" data-format="short">
                <div class="countdown-item hours">
                  <span class="countdown-item__number hoursLeft"></span>
                  <span class="countdown-item__text hoursText"></span>
                </div>
                <div class="countdown-clock__divider"></div>
                <div class="countdown-item minutes">
                  <span class="countdown-item__number minsLeft"></span>
                  <span class="countdown-item__text minsText"></span>
                </div>
                <div class="countdown-clock__divider"></div>
                <div class="countdown-item seconds">
                  <span class="countdown-item__number secsLeft"></span>
                  <span class="countdown-item__text secsText"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-10">
          <div class="countdown-image scene text-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="countdown-image__image">
              <img src="{{ asset('assets/school/images/Somnath Sir.svg') }}" alt="resourse image" width="346">
            </div>
            <div class="countdown-image__shape-01" data-depth="0.8"></div>
            <div class="countdown-image__shape-02" data-depth="-0.8"></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-10">
          <div class="countdown-register text-center" data-aos="fade-up" data-aos-duration="1000">
            <h4 class="countdown-register__title">Request a Callback</h4>
            <form id="RequestCallbackForm" class="setting-form" method="POST"
              action="{{ route('front.counsellor.enquiry') }}">
              @csrf
              <div class="countdown-register__form">
                <div class="countdown-register__input">
                  <i class="far fa-user"></i>
                  <input class="form-control" name="name" type="text" placeholder="Full Name" required>
                  <p id="nameError" class="error-message"></p>
                </div>
                <div class="countdown-register__input">
                  <span display="flex">
                    <i style="position: static; margin-right: 5px;" class="far fa-phone"></i>
                    +91 -
                  </span>
                  <input style="padding-left: 80px; " class="form-control" name="phone" type="text" required>
                  <p id="phoneError" class="error-message"></p>
                </div>
                <div class="countdown-register__input">
                  <i class="far fa-map-marker-alt"></i>
                  <input class="form-control" name="pincode" type="text" placeholder="Pincode" required>
                  <p id="pincodeError" class="error-message"></p>
                </div>
                <div class="countdown-register__input">
                  <i class="edumi edumi-open-book"></i>
                  <select class="form-control" name="seeking_class" required>
                    <option value=" " disabled selected>Select a Class</option>
                    <option value="Nursery">Nursery </option>
                    <option value="LKG">LKG </option>
                    <option value="UKG">UKG </option>
                    <option value="Class 1">Class 1 </option>
                    <option value="Class 2">Class 2 </option>
                    <option value="Class 3">Class 3 </option>
                    <option value="Class 4">Class 4 </option>
                    <option value="Class 5">Class 5 </option>
                    <option value="Class 6">Class 6 </option>
                    <option value="Class 7">Class 7 </option>
                    <option value="Class 8">Class 8 </option>
                    <option value="Class 9">Class 9 </option>
                    <option value="Class 10">Class 10 </option>
                    <option value="Class 11">Class 11 </option>
                    <option value="Class 12">Class 12 </option>
                  </select>
                  <p id="seekingClassError" class="error-message"></p>
                </div>
                <div class="countdown-register__btn">
                  <button id="submitButton" class="btn btn-primary btn-hover-secondary w-100" disabled>Submit</button>
                </div>
              </div>
            </form>
            <p class="small pt-2">
              You are already the
              <span style="font-weight: 600; font-size: 12px"
                class="text-primary">{{ $total_number_rows + 2000 }}<sup>th</sup>
              </span>
              person <br>who will request a
              call
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="countdown-signup-section__shape-01" data-depth="-0.4"></div>
    <div class="countdown-signup-section__shape-02" data-depth="0.5"></div>
    <div class="countdown-signup-section__shape-03" data-depth="-0.5"></div>
  </div>
  <div class="event-section section-padding-01">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title-03">Recent <mark>Articles</mark></h2>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="section-btn-02 text-sm-end" data-aos="fade-up" data-aos-duration="1000">
            <a class="btn btn-light btn-hover-primary" href="{{ route('blog.list') }}">View All <i
                class="far fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div style="max-height: 250px" class="event-active-02 swiper-button-style" data-aos="fade-up"
        data-aos-duration="1000">
        <div class="swiper">
          <div class="swiper-wrapper">
            @foreach ($popular_blogs as $blog)
              <div class="swiper-slide">
                <div class="event-item-02">
                  <div class="event-item-02__image">
                    <a href="{{ route('blog.details', $blog->slug) }}"><img src="{{ $blog->image }}"
                        alt=" School dekho blog-image" width="330" height="186"></a>
                    <span class="event-item-02__date">{{ App\Core\Helper::GetDate($blog->created_at) }}</span>
                  </div>
                  <div class="event-item-02__content">
                    <h3 class="event-item-02__title"><a
                        href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                    </h3>
                    <p class="event-item-02__location"><i class="far fa-pen-nib text-primary"></i>
                      School Dekho<span class="float-end"><i class="far fa-eye text-success"></i>
                        {{ $blog->view_count }}
                        Views</span></p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="swiper-button-next"><i class="fal fa-angle-right"></i></div>
        <div class="swiper-button-prev"><i class="fal fa-angle-left"></i></div>
      </div>
    </div>
  </div>
  <style>
    .content-item {
      max-height: 190px;
      /* Set a maximum height for the content */
      overflow: hidden;
      /* Hide overflow content */
    }
  </style>
  <div class="testimonial-section bg-color-01 section-padding-01 scene">
    <div class="container">
      <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="section-title__title-03">People Say About <mark>Us</mark></h2>
      </div>
      <div style="max-height: 330px;" class="testimonial-active-02" data-aos="fade-up" data-aos-duration="1000">
        <div class="swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div style="overflow: auto;
              height: 331px;" class="testimonial-item bg-white">
                <div class="testimonial-quote-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="50px" height="40px"
                    viewBox="0 0 50 40">
                    <path
                      d="M21.8750977,2.18046875 C22.4503906,2.18046875 22.9167969,1.7140625 22.9167969,1.13876953 C22.9167969,0.563476562 22.4503906,0.0970703125 21.8750977,0.0970703125 C9.79960938,0.110839844 0.0138671875,9.89658203 2.76635467e-06,21.9720703 L2.76635467e-06,28.2220703 C-0.01796875,34.56875 5.11230469,39.728418 11.4588867,39.7465793 C17.8055664,39.7645508 22.9652344,34.6342773 22.9833957,28.2876953 C23.0013672,21.9410156 17.8710938,16.7813477 11.5245117,16.7632813 C7.77705078,16.7526367 4.25966797,18.5698242 2.10009766,21.6325195 C2.29296875,10.8446289 11.0853516,2.19580078 21.8750977,2.18046875 Z">
                    </path>
                    <path
                      d="M38.5416992,16.7638672 C34.8157227,16.7667969 31.3244141,18.5832031 29.1833984,21.6326172 C29.3763672,10.8446289 38.16875,2.19580078 48.9583984,2.18056641 C49.5336914,2.18056641 50.0000977,1.71416016 50.0000977,1.13886719 C50.0000977,0.563574219 49.5336914,0.0971679688 48.9583984,0.0971679688 C36.8829102,0.1109375 27.097168,9.89667969 27.0833984,21.972168 L27.0833984,28.222168 C27.0833984,34.5503906 32.2134766,39.6804687 38.5416992,39.6804687 C44.8699219,39.6804687 50.0000977,34.5503906 50.0000977,28.222168 C50.0000977,21.8939453 44.8700195,16.7638672 38.5416992,16.7638672 Z">
                    </path>
                  </svg>
                </div>
                <div class="testimonial-main-content">
                  <div class="testimonial-caption content-item">
                    <h3 class="testimonial-caption__title">Easy to Use!</h3>
                    <p>It's super easy to use and helped me find the perfect school.</p>
                  </div>
                  <a href="javascript:void(0);" class="showMoreLink course-info__instructor"
                    onclick="toggleContent(this)">Show More...</a>
                  <div class="testimonial-info">
                    {{-- <div class="testimonial-info__image">
                    <img src="{{ asset('assets/school/images/avatar/avatar-01.jpg') }}" alt="Avatar" width="60"
                      height="60">
                  </div> --}}
                    <div class="testimonial-info__caption">
                      <h5 class="testimonial-info__name">Priyanka Sen</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div style="overflow: auto;
              height: 331px;" class="testimonial-item bg-white">
                <div class="testimonial-quote-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="50px" height="40px"
                    viewBox="0 0 50 40">
                    <path
                      d="M21.8750977,2.18046875 C22.4503906,2.18046875 22.9167969,1.7140625 22.9167969,1.13876953 C22.9167969,0.563476562 22.4503906,0.0970703125 21.8750977,0.0970703125 C9.79960938,0.110839844 0.0138671875,9.89658203 2.76635467e-06,21.9720703 L2.76635467e-06,28.2220703 C-0.01796875,34.56875 5.11230469,39.728418 11.4588867,39.7465793 C17.8055664,39.7645508 22.9652344,34.6342773 22.9833957,28.2876953 C23.0013672,21.9410156 17.8710938,16.7813477 11.5245117,16.7632813 C7.77705078,16.7526367 4.25966797,18.5698242 2.10009766,21.6325195 C2.29296875,10.8446289 11.0853516,2.19580078 21.8750977,2.18046875 Z">
                    </path>
                    <path
                      d="M38.5416992,16.7638672 C34.8157227,16.7667969 31.3244141,18.5832031 29.1833984,21.6326172 C29.3763672,10.8446289 38.16875,2.19580078 48.9583984,2.18056641 C49.5336914,2.18056641 50.0000977,1.71416016 50.0000977,1.13886719 C50.0000977,0.563574219 49.5336914,0.0971679688 48.9583984,0.0971679688 C36.8829102,0.1109375 27.097168,9.89667969 27.0833984,21.972168 L27.0833984,28.222168 C27.0833984,34.5503906 32.2134766,39.6804687 38.5416992,39.6804687 C44.8699219,39.6804687 50.0000977,34.5503906 50.0000977,28.222168 C50.0000977,21.8939453 44.8700195,16.7638672 38.5416992,16.7638672 Z">
                    </path>
                  </svg>
                </div>
                <div class="testimonial-main-content">
                  <div class="testimonial-caption content-item">
                    <h3 class="testimonial-caption__title">Comprehensive Listings</h3>
                    <p>I used School Dekho to find the perfect fit for my child and was
                      blown
                      away by its comprehensive listings and easy navigation.</p>
                  </div>
                  <a href="javascript:void(0);" class="showMoreLink course-info__instructor"
                    onclick="toggleContent(this)">Show More...</a>
                  <div class="testimonial-info">
                    {{-- <div class="testimonial-info__image">
                    <img src="{{ asset('assets/school/images/avatar/avatar-02.jpg') }}" alt="Avatar" width="60"
                      height="60">
                  </div> --}}
                    <div class="testimonial-info__caption">
                      <h5 class="testimonial-info__name">Srijita Saha</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div style="overflow: auto;
              height: 331px;" class="testimonial-item bg-white">
                <div class="testimonial-quote-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="50px" height="40px"
                    viewBox="0 0 50 40">
                    <path
                      d="M21.8750977,2.18046875 C22.4503906,2.18046875 22.9167969,1.7140625 22.9167969,1.13876953 C22.9167969,0.563476562 22.4503906,0.0970703125 21.8750977,0.0970703125 C9.79960938,0.110839844 0.0138671875,9.89658203 2.76635467e-06,21.9720703 L2.76635467e-06,28.2220703 C-0.01796875,34.56875 5.11230469,39.728418 11.4588867,39.7465793 C17.8055664,39.7645508 22.9652344,34.6342773 22.9833957,28.2876953 C23.0013672,21.9410156 17.8710938,16.7813477 11.5245117,16.7632813 C7.77705078,16.7526367 4.25966797,18.5698242 2.10009766,21.6325195 C2.29296875,10.8446289 11.0853516,2.19580078 21.8750977,2.18046875 Z">
                    </path>
                    <path
                      d="M38.5416992,16.7638672 C34.8157227,16.7667969 31.3244141,18.5832031 29.1833984,21.6326172 C29.3763672,10.8446289 38.16875,2.19580078 48.9583984,2.18056641 C49.5336914,2.18056641 50.0000977,1.71416016 50.0000977,1.13886719 C50.0000977,0.563574219 49.5336914,0.0971679688 48.9583984,0.0971679688 C36.8829102,0.1109375 27.097168,9.89667969 27.0833984,21.972168 L27.0833984,28.222168 C27.0833984,34.5503906 32.2134766,39.6804687 38.5416992,39.6804687 C44.8699219,39.6804687 50.0000977,34.5503906 50.0000977,28.222168 C50.0000977,21.8939453 44.8700195,16.7638672 38.5416992,16.7638672 Z">
                    </path>
                  </svg>
                </div>
                <div class="testimonial-main-content">
                  <div class="testimonial-caption content-item">
                    <h3 class="testimonial-caption__title">Relevant Search Results</h3>
                    <p>I recently used this schooldekho and was extremely impressed with
                      the
                      results. It helped me narrow down my options and find the perfect
                      school
                      for my child.
                      The user interface was easy to navigate and the
                      search results were accurate and relevant.
                    </p>
                  </div>
                  <a href="javascript:void(0);" class="showMoreLink course-info__instructor"
                    onclick="toggleContent(this)">Show More...</a>
                  <div class="testimonial-info">
                    {{-- <div class="testimonial-info__image">
                    <img src="{{ asset('assets/school/images/avatar/avatar-03.jpg') }}" alt="Avatar" width="60"
                      height="60">
                  </div> --}}
                    <div class="testimonial-info__caption">
                      <h5 class="testimonial-info__name">Mayurika Rathi</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div style="overflow: auto;
              height: 331px;" class="testimonial-item bg-white">
                <div class="testimonial-quote-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="50px" height="40px"
                    viewBox="0 0 50 40">
                    <path
                      d="M21.8750977,2.18046875 C22.4503906,2.18046875 22.9167969,1.7140625 22.9167969,1.13876953 C22.9167969,0.563476562 22.4503906,0.0970703125 21.8750977,0.0970703125 C9.79960938,0.110839844 0.0138671875,9.89658203 2.76635467e-06,21.9720703 L2.76635467e-06,28.2220703 C-0.01796875,34.56875 5.11230469,39.728418 11.4588867,39.7465793 C17.8055664,39.7645508 22.9652344,34.6342773 22.9833957,28.2876953 C23.0013672,21.9410156 17.8710938,16.7813477 11.5245117,16.7632813 C7.77705078,16.7526367 4.25966797,18.5698242 2.10009766,21.6325195 C2.29296875,10.8446289 11.0853516,2.19580078 21.8750977,2.18046875 Z">
                    </path>
                    <path
                      d="M38.5416992,16.7638672 C34.8157227,16.7667969 31.3244141,18.5832031 29.1833984,21.6326172 C29.3763672,10.8446289 38.16875,2.19580078 48.9583984,2.18056641 C49.5336914,2.18056641 50.0000977,1.71416016 50.0000977,1.13886719 C50.0000977,0.563574219 49.5336914,0.0971679688 48.9583984,0.0971679688 C36.8829102,0.1109375 27.097168,9.89667969 27.0833984,21.972168 L27.0833984,28.222168 C27.0833984,34.5503906 32.2134766,39.6804687 38.5416992,39.6804687 C44.8699219,39.6804687 50.0000977,34.5503906 50.0000977,28.222168 C50.0000977,21.8939453 44.8700195,16.7638672 38.5416992,16.7638672 Z">
                    </path>
                  </svg>
                </div>
                <div class="testimonial-main-content">
                  <div class="testimonial-caption content-item">
                    <h3 class="testimonial-caption__title">A Guardian's Guide to Finding the Best School</h3>
                    <p>With its vast database of schools, detailed information, and ratings, it's the perfect tool for
                      making informed decisions about your child's education.</p>
                  </div>
                  <a href="javascript:void(0);" class="showMoreLink course-info__instructor"
                    onclick="toggleContent(this)">Show More...</a>
                  <div class="testimonial-info">
                    {{-- <div class="testimonial-info__image">
                    <img src="{{ asset('assets/school/images/avatar/avatar-02.jpg') }}" alt="Avatar" width="60"
                      height="60">
                  </div> --}}
                    <div class="testimonial-info__caption">
                      <h5 class="testimonial-info__name">Aishwarya Nagy</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="testimonial-section__shape-01" data-depth="-0.5"></div>
    <div class="testimonial-section__shape-02" data-depth="0.7"></div>
    <div class="testimonial-section__shape-03" data-depth="-0.5"></div>
    <img class="testimonial-section__shape-04" data-depth="0.7"
      src="{{ asset('assets/school/images/shape/edumall-shape-01.png') }}" alt="Shape" width="179"
      height="178">
  </div>
  <script>
    function toggleContent(link) {
      var content = link.previousElementSibling;
      if (content.style.maxHeight === "190px" || content.style.maxHeight === "") {
        content.style.maxHeight = "none";
        link.innerHTML = "Show Less";
      } else {
        content.style.maxHeight = "190px";
        link.innerHTML = "Show More...";
      }
    }
    window.addEventListener('DOMContentLoaded', function() {
      var targetedDiv = document.querySelectorAll(".content-item");
      var links = document.querySelectorAll(".showMoreLink");
      for (var i = 0; i < targetedDiv.length; i++) {
        if (targetedDiv[i].clientHeight >= 190) {
          links[i].style.display = "inline";
        } else {
          links[i].style.display = "none";
        }
      }
    });
  </script>
  <div class="partners-seaction section-padding-02">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title-03">School Dekho in <mark>News</mark></h2>
          </div>
        </div>
        {{-- <div class="col-sm-4">
        <div class="section-btn-02 text-sm-end" data-aos="fade-up" data-aos-duration="1000">
          <a class="btn btn-light btn-hover-primary" href="#">View all <i class="far fa-long-arrow-right"></i></a>
        </div>
      </div> --}}
      </div>
      <div style="max-height: 110px" class="partners-active" data-aos="fade-up" data-aos-duration="1000">
        <div class="swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a href="https://republicnewstoday.com/index.php/2022/08/15/indias-first-search-engine-for-school-admission-schooldekho-org-is-helping-parents-find-the-best-schools/"
                    target="_blank">
                    <img src="{{ asset('assets/school/images/news/republicnewstoday.webp') }}"
                      alt="Republic News Today Logo">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a href="https://asiannews.in/indias-first-search-engine-for-school-admission-schooldekho-org-is-helping-parents-find-the-best-schools/"
                    target="_blank">
                    <img src="{{ asset('assets/school/images/news/asiannews.webp') }}" alt="Asian News Logo">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a
                    href="https://news.google.com/search?q=India%27s%20first%20search%20engine%20for%20school%20admission&hl=en-IN&gl=IN&ceid=IN%3Aen">
                    <img src="{{ asset('assets/school/images/news/googlenews.webp') }}" alt="Google News Logo"
                      target="_blank">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a href="https://jionews.com/home/article/173/1795345448/India%E2%80%99s-First-Search-Engine-for-School-Admission-%E2%80%9Cschooldekhoorg%E2%80%9D-Is-Helping-Parents-Find-the-Best-Schools"
                    target="_blank">
                    <img src="{{ asset('assets/school/images/news/jionews.webp') }}" alt="Jio News Logo">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a
                    href="https://dailyhunt.in/news/india/english/ani+english-epaper-anieng/indias+first+search+engine+for+school+admission+schooldekhoorg+is+helping+parents+find+the+best+schools-newsid-n413217308?ss=wsp&s=i&uu=0xb2af503d36c6d6e8">
                    <img src="{{ asset('assets/school/images/news/dailyhunt.webp') }}" alt="dailyhunt Logo"
                      target="_blank">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a href="#">
                    <img src="{{ asset('assets/school/images/news/republicnewstoday.webp') }}"
                      alt="Republic News Today Logo">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a href="https://theprint.in/ani-press-releases/indias-first-search-engine-for-school-admission-schooldekho-org-is-helping-parents-find-the-best-schools/1081487/"
                    target="_blank">
                    <img src="{{ asset('assets/school/images/news/theprint.webp') }}" alt="The Print Logo">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a href="https://www.zee5.com/articles/indias-first-search-engine-for-school-admission-schooldekho-org-is-helping-parents-find-the-best-schools"
                    target="_blank">
                    <img src="{{ asset('assets/school/images/news/zee5.webp') }}" alt="Republic News Today Logo">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-logo">
                <div class="partner-logo__logo">
                  <a href="https://www.westbengalkhabar.in/news/indias-first-search-engine-for-school-admission-schooldekhoorg-is-helping-parents-find-the-best-schools20220813174301/"
                    target="_blank">
                    <img src="{{ asset('assets/images/news/wbsamachar.webp') }}" alt="WB Samachar Logo">
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Start -->
  <div class="banner-section section-padding-01">
    <div class="container">
      <!-- Banner Box Start -->
      <div class="banner-big-box banner-bg-4" data-aos="fade-up" data-aos-duration="1000">
        <img class="banner-big-box__arrow" src="{{ asset('assets/school/images/curve-arrow.png') }}" alt="arrow"
          width="50" height="45">
        <div class="banner-caption-03">
          <h3 class="banner-caption-03__title">Worried about kids Future?</h3>
          <p>Create an account for our free counselling.</p>
          <bu class="banner-caption-03__btn btn btn-primary btn-hover-secondary" data-bs-toggle="modal"
            data-bs-target="#registerModal" href="{{ route('schools.index') }}#counselling">Register for free
          </bu>
        </div>
        <div class="banner-big-box__image"
          style="background-image: url({{ asset('assets/school/images/sd_banner-1.png') }});">
        </div>
      </div>
      <!-- Banner Box End -->
    </div>
  </div>
  <!-- Banner End -->
  <!-- Counter Start -->
  <div class="counter-section bg-color-01">
    <div class="why-choose-title aos-init aos-animate text-center" data-aos="fade-up" data-aos-duration="1000">
      <h2 class="why-choose-title__title">Why choose School Dekho?</h2>
      <h4 class="why-choose-title__sub-title">India’s first search engine for
        school admissions.</h4>
    </div>
    <div class="custom-container container">
      <!-- Counter Start -->
      <div class="counter">
        <div class="row">
          <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
            <!-- Counter Item Start -->
            <div class="counter-item-03">
              <div class="counter-item-03__icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80px"
                  height="74px" viewBox="0 0 80 74">
                  <path
                    d="M11.4472881,61.5311864 C13.4932137,59.4400791 15.8065172,57.6285204 18.3271186,56.1435593 C20.9684746,62.5235593 25.1191525,67.7723729 30.5064407,71.4020339 C23.25808,70.2442888 16.5752082,66.7831901 11.4472881,61.5311864 L11.4472881,61.5311864 Z"
                    fill="#D3E6FA"></path>
                  <path
                    d="M17.5877966,22.9491525 C16.0135593,27.3874576 15.1355932,32.2033898 15.0350847,37.6271186 L2.05084746,37.6271186 C2.28591981,30.0837483 5.11888136,22.8530117 10.070678,17.1576271 C12.3032017,19.4189076 14.8319263,21.3671505 17.5877966,22.9491525 L17.5877966,22.9491525 Z"
                    fill="#D3E6FA"></path>
                  <path
                    d="M15.0350847,39.6610169 C15.1352542,44.9152542 16.0135593,49.8191525 17.5877966,54.2584746 C14.8308685,55.8544571 12.3022783,57.8157094 10.070678,60.0889831 C5.14692274,54.3929482 2.31732754,47.1854549 2.05084746,39.6610169 L15.0350847,39.6610169 Z"
                    fill="#D3E6FA"></path>
                  <path
                    d="M30.5066102,5.72322034 C25.119322,9.35305085 20.9684746,14.6018644 18.3271186,20.9816949 C15.8065183,19.4967994 13.4932136,17.6852968 11.4472881,15.5942373 C16.575273,10.3421982 23.2581909,6.88104695 30.5066102,5.72322034 L30.5066102,5.72322034 Z"
                    fill="#D3E6FA"></path>
                  <path class="primary-fill-color"
                    d="M36.0142373,73.8755932 C36.2645763,73.8755932 36.5138983,73.8710169 36.7628814,73.8661017 C36.8078232,73.8722242 36.853118,73.8755932 36.8984746,73.8755932 C36.9571028,73.8755932 37.0155693,73.8693206 37.0732203,73.8586441 C56.4435593,73.3071186 72.0284746,57.6864407 72.0284746,38.5623729 C72.0284746,37.1047458 71.9437288,33.8018644 71.7762712,32.4137288 L69.7569492,32.6577966 C69.9108475,33.9289831 69.9942373,37.2247458 69.9942373,38.5623729 C69.9903251,46.4964594 67.1047518,54.1590573 61.8742373,60.1249153 C59.6598591,57.8550749 57.1505809,55.8930071 54.4137288,54.2913559 C56.1057627,49.5488136 57.0038983,44.2454237 57.0038983,38.5625424 C57.0038983,37.5964407 56.9769492,36.6222034 56.9237288,35.6689831 C56.8924017,35.1082342 56.4124455,34.6790433 55.8516949,34.710339 C55.2838482,34.7610258 54.8591716,35.253954 54.8930508,35.8230508 C54.9254237,36.4049153 54.9466102,36.9489831 54.9586441,37.6269492 L36.9491525,37.6269492 L36.9491525,27.7859322 C40.4572595,27.6994527 43.9347292,27.1092383 47.2749153,26.0333898 C47.6066102,25.9259322 47.96,25.8130508 48.2850847,25.6971186 L47.4432203,23.9505085 C47.1367797,24.0598305 46.9562712,23.9969492 46.6433898,24.0983051 C43.5080125,25.1124805 40.2427723,25.6692268 36.9484746,25.7513559 L36.9484746,5.46152542 C40.4372802,7.14690807 43.5418592,9.53232971 46.0689831,12.469322 L47.6205085,11.130339 C45.8254267,9.06739484 43.7689264,7.24740945 41.5030508,5.71644068 C43.8586772,6.09085819 46.1688104,6.71002932 48.3959322,7.56389831 L48.5874576,7.63711864 L49.3272881,5.7420339 L49.1288136,5.66491525 C44.9424969,4.06078624 40.4963461,3.24207901 36.0132203,3.24977598 C16.1555932,3.24977598 0,19.0911864 0,38.5627119 C0,58.0342373 16.1559322,73.8755932 36.0142373,73.8755932 Z M11.4472881,61.5311864 C13.4932137,59.4400791 15.8065172,57.6285204 18.3271186,56.1435593 C20.9684746,62.5235593 25.1191525,67.7723729 30.5064407,71.4020339 C23.25808,70.2442888 16.5752082,66.7831901 11.4472881,61.5311864 L11.4472881,61.5311864 Z M17.5877966,22.9491525 C16.0135593,27.3874576 15.1355932,32.2033898 15.0350847,37.6271186 L2.05084746,37.6271186 C2.28591981,30.0837483 5.11888136,22.8530117 10.070678,17.1576271 C12.3032017,19.4189076 14.8319263,21.3671505 17.5877966,22.9491525 L17.5877966,22.9491525 Z M34.9152542,71.6650847 C28.3050847,68.3184746 23.0467797,62.5359322 20.0410169,55.1540678 C24.6570396,52.8054225 29.7380016,51.5137889 34.9152542,51.3728814 L34.9152542,71.6650847 Z M36.9491525,51.3740678 C42.1248951,51.5194788 47.2008651,52.8326362 51.7977966,55.2154237 C48.7888136,62.5677966 43.7288136,68.3277966 36.9491525,71.6650847 L36.9491525,51.3740678 Z M34.9152542,49.3389831 C29.5052556,49.5021517 24.1965247,50.8474128 19.3616949,53.280339 C17.9274576,49.1316949 17.1666102,44.5762712 17.069322,39.6610169 L34.9152542,39.6610169 L34.9152542,49.3389831 Z M15.0350847,39.6610169 C15.1352542,44.9152542 16.0135593,49.8191525 17.5877966,54.2584746 C14.8308685,55.8544571 12.3022783,57.8157094 10.070678,60.0889831 C5.14692274,54.3929482 2.31732754,47.1854549 2.05084746,39.6610169 L15.0350847,39.6610169 Z M60.4915254,61.6211864 C55.3747881,66.8231332 48.7272798,70.2506507 41.5220339,71.4020339 C46.8889831,67.7861017 51.0283051,62.5633898 53.6710169,56.2155932 C56.1708914,57.7117807 58.4639167,59.5291176 60.4915254,61.6211864 Z M54.959322,39.6610169 C54.8849507,44.3178959 54.0766612,48.9339148 52.5642373,53.3389831 C47.724815,50.8521051 42.3881993,49.485064 36.9491525,49.3389831 L36.9491525,39.6610169 L54.959322,39.6610169 Z M17.069322,37.6271186 C17.1666102,32.7118644 17.9274576,28.0750847 19.3616949,23.9271186 C24.202038,26.3344014 29.5110278,27.6519584 34.9152542,27.7871186 L34.9152542,37.6271186 L17.069322,37.6271186 Z M20.0410169,21.9711864 C23.0469492,14.5894915 28.3050847,8.80694915 34.9152542,5.46033898 L34.9152542,25.7518644 C29.7380305,25.6111882 24.6570546,24.3197248 20.0410169,21.9711864 L20.0410169,21.9711864 Z M30.5066102,5.72322034 C25.119322,9.35305085 20.9684746,14.6018644 18.3271186,20.9816949 C15.8065183,19.4967994 13.4932136,17.6852968 11.4472881,15.5942373 C16.575273,10.3421982 23.2581909,6.88104695 30.5066102,5.72322034 L30.5066102,5.72322034 Z"
                    fill="#0071DC"></path>
                  <path class="secondary-fill-color"
                    d="M74.5676271,5.07847458 C67.6567868,-1.66263363 56.6310098,-1.66263363 49.7201695,5.07847458 C46.549123,8.19013003 44.6295848,12.3568486 44.3252542,16.7891525 C44.1675155,19.2103273 44.5307056,21.6371814 45.390339,23.9061017 C46.2322034,26.1679661 47.6008475,28.2976271 49.4581356,30.2361017 L61.409322,42.710678 C61.6011409,42.9109402 61.8664214,43.024184 62.1437288,43.024184 C62.4210363,43.024184 62.6863167,42.9109402 62.8781356,42.710678 L74.8294915,30.2361017 C76.6864407,28.2977966 78.0549153,26.1683051 78.8972881,23.9062712 C79.7568589,21.6373985 80.1199354,19.2105889 79.9620339,16.7894915 C79.6578743,12.3571494 77.7385224,8.19032184 74.5676271,5.07847458 Z M76.9913559,23.1971186 C76.2455932,25.1971186 75.0252542,27.0925424 73.3610169,28.829661 L62.1440678,40.5377966 L50.9271186,28.829661 C49.2628814,27.0925424 48.0415254,25.1976271 47.2969492,23.1971186 C46.5384866,21.1989258 46.2173121,19.0613269 46.3550847,16.9284746 C46.6255491,12.9924173 48.3304737,9.29231295 51.1467797,6.52932203 C57.2660344,0.566841452 67.0221012,0.566841452 73.1413559,6.52932203 C75.9576357,9.29233141 77.6625554,12.9924252 77.9330508,16.9284746 C78.0706952,19.0610856 77.7495829,21.1984247 76.9913559,23.1964407 L76.9913559,23.1971186 Z"
                    fill="#FFC221"></path>
                  <path class="secondary-fill-color"
                    d="M62.1440678,4.74576271 C55.6116949,4.74576271 50.2966102,10.090678 50.2966102,16.6610169 C50.2966102,23.2313559 55.6110169,28.5762712 62.1440678,28.5762712 C68.6771186,28.5762712 73.9915254,23.2313559 73.9915254,16.6610169 C73.9915254,10.090678 68.6762712,4.74576271 62.1440678,4.74576271 Z M62.1440678,26.5413559 C56.7333898,26.5413559 52.3305085,22.1088136 52.3305085,16.66 C52.3305085,11.2111864 56.7333898,6.77966102 62.1440678,6.77966102 C67.5547458,6.77966102 71.9576271,11.2122034 71.9576271,16.6610169 C71.9576271,22.1098305 67.5549153,26.5413559 62.1440678,26.5413559 Z"
                    fill="#FFC221"></path>
                  <path class="secondary-fill-color"
                    d="M66.0681469,12.8891176 C66.582281,12.8891176 66.9990691,12.4662242 66.9990691,11.9445588 C66.9990691,11.4228934 66.582281,11 66.0681469,11 L58.9310773,11 C58.4169432,11 58.0001552,11.4228934 58.0001552,11.9445588 C58.0001552,12.4662242 58.4169432,12.8891176 58.9310773,12.8891176 L60.9732101,12.8891176 C61.8031819,12.8788413 62.5579928,13.3754728 62.8873412,14.1485294 L58.9309221,14.1485294 C58.416788,14.1485294 58,14.5714228 58,15.0930882 C58,15.6147536 58.416788,16.037647 58.9309221,16.037647 L62.8873412,16.037647 C62.4887293,16.7252172 61.7592246,17.1451667 60.973055,17.1396323 L58.9310773,17.1396323 C58.5447808,17.1573131 58.2054826,17.4054589 58.0668091,17.7717151 C57.9281355,18.1379712 58.0164199,18.5527881 58.2916889,18.828346 L63.3962453,23.7321805 C63.6355621,23.9692158 63.98207,24.0572556 64.3032395,23.9626274 C64.624409,23.8679991 64.870551,23.6053429 64.9475231,23.2751173 C65.0244953,22.9448918 64.920389,22.5981871 64.675022,22.3676079 L61.2616408,19.1142325 C63.0148775,18.9870319 64.4578068,17.6119117 64.8573276,16.037647 L66.0690779,16.037647 C66.583212,16.037647 67,15.6147536 67,15.0930882 C67,14.5714228 66.583212,14.1485294 66.0690779,14.1485294 L64.8565518,14.1485294 C64.7709356,13.6987841 64.5982821,13.2707265 64.3485786,12.8891176 L66.0681469,12.8891176 Z"
                    fill="#FFC221"></path>
                </svg>
              </div>
              <div class="counter-item-03__content"> <span class="counter-item-03__count count"
                  data-count="14000">0</span>
                <p class="counter-item-03__text">Listed Schools</p>
              </div>
            </div>
            <!-- Counter Item End -->
          </div>
          {{-- <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
          <!-- Counter Item Start -->
          <div class="counter-item-03">
            <div class="counter-item-03__icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px"
                height="82px" viewBox="0 0 64 82">
                <g transform="translate(1.000000, 3.000000)" fill="#D3E6FA">
                  <path
                    d="M5.2776187,48.0755646 C5.2254052,48.0035853 5.21387762,47.9100792 5.24778248,47.8273364 L10.9139499,33.1031604 C10.9593822,32.9867824 10.9824376,32.862332 10.9831156,32.7372087 C10.9885404,30.6033872 11.0048147,27.0811016 11.0278701,26.7070774 C11.8029334,12.7174957 22.7935082,1.40326357 36.8572124,0.118396152 C36.349997,0.0719795218 35.8387127,0.0369988405 35.322682,0.0188357514 C35.0785675,0.0100906242 34.8337749,0.00470898092 34.5869482,0.00134532471 C34.480487,0.000672662356 34.3719918,-9.25820039e-07 34.2648527,-9.25820039e-07 C19.1385724,-0.00269082164 6.64872807,11.7239098 5.81873896,26.7070774 C5.79636185,27.0811016 5.78008755,30.6033872 5.77466279,32.7372087 C5.77466279,32.8630047 5.7509294,32.9867824 5.70617517,33.1038331 L0.0400076884,47.8280091 C0.00813714812,47.9107519 0.0196647312,48.0035853 0.0698438981,48.0762376 C0.120700944,48.1488897 0.204106756,48.1927433 0.292937332,48.1927433 L5.50071213,48.1927433 C5.4112035,48.1946337 5.32711964,48.1502351 5.2776187,48.0755646 L5.2776187,48.0755646 Z">
                  </path>
                  <path
                    d="M34.7286702,68.2257826 C34.1421174,65.8955311 32.0298494,64.2622024 29.6090477,64.2648865 L29.5859925,64.2648865 C28.0379001,64.2716203 26.3480856,64.2790199 24.8725494,64.2864197 C27.1102652,64.4821771 28.9763844,66.0637075 29.5208953,68.2257826 C29.5419164,68.3078528 29.5520877,68.3926135 29.5520877,68.4773743 L29.5520877,77.1949637 L34.7598625,77.1949637 L34.7598625,68.4780471 C34.7598625,68.3932862 34.7496912,68.3085254 34.7286702,68.2257826 Z">
                  </path>
                  <path
                    d="M16.923912,62.7714871 C15.8477741,61.7429207 15.2422347,60.3235121 15.2483375,58.8408694 L15.2483375,49.2252184 C15.2483375,48.6547642 14.7818077,48.1919429 14.2067826,48.1919429 L8.99900777,48.1919429 C9.57403286,48.1919429 10.0405627,48.6547642 10.0405627,49.2252184 L10.0405627,58.8408694 C10.0398847,60.3214942 10.6440678,61.7388843 11.7141029,62.7701418 C12.7841378,63.8020718 14.2291597,64.3597446 15.7209701,64.3173641 C16.0118732,64.308619 17.8786707,64.2965104 20.1394416,64.2857471 C18.9276846,64.151206 17.7952649,63.6177505 16.923912,62.7714871 L16.923912,62.7714871 Z">
                  </path>
                </g>
                <path class="primary-fill-color"
                  d="M37.1274277,0.0203506142 C36.8679939,0.0108549198 36.6078878,0.00475060938 36.3471097,0.00203757865 C20.1291282,-0.185161507 6.641924,12.5491265 5.74869148,28.8910671 C5.71777457,29.404508 5.70500446,33.8050439 5.70231603,34.8956822 L0.153387064,49.5630046 C-0.120161025,50.2867056 -0.0240495828,51.0999366 0.411476784,51.738177 C0.847003185,52.3764176 1.56548728,52.7575984 2.3337075,52.7575984 L9.92987947,52.7575984 L9.92987947,61.41081 C9.92987947,63.4666089 10.7552289,65.435591 12.2170651,66.8680712 C13.6789014,68.3005514 15.6528845,69.0744434 17.6900458,69.0140785 C18.0321493,69.0032264 21.0599986,68.9849134 26.2157441,68.9632091 L26.229186,68.9632091 C27.6372538,68.9618527 28.8772943,69.899883 29.2698058,71.2652158 L29.2698058,80.9581963 C29.2698058,81.5333588 29.7322165,82 30.3021646,82 L56.4169458,82 C56.7019199,82 56.9734518,81.8813051 57.1683634,81.6724017 C57.363947,81.4634983 57.4647633,81.1826996 57.4479606,80.8964749 C57.4372069,80.7228409 56.4324044,63.3146791 57.4452721,52.3336874 C57.7208367,49.35071 60.5389881,42.2059437 60.7930453,41.5683814 C65.294829,32.875831 65.0427882,22.4564363 60.1269856,13.9958501 C55.2837708,5.59155913 46.686157,0.367618548 37.1274277,0.0203506142 Z M58.9386975,40.648664 C58.9232391,40.6785074 58.9091247,40.7090289 58.8970269,40.7395505 C58.7666376,41.0644359 55.7038386,48.7280695 55.3892917,52.1403838 C54.5108457,61.6624435 55.1244808,75.8787245 55.3274578,79.9157142 L31.3338513,79.9157142 L31.3338513,71.1268513 C31.3338513,71.0413907 31.3237698,70.9559303 31.3029344,70.8725046 C30.7215604,68.52302 28.627942,66.8762103 26.228514,66.8789233 L26.2056624,66.8789233 C22.5460307,66.8945233 18.08659,66.9162275 17.6248513,66.9311491 C16.1462123,66.9745576 14.7139487,66.4116038 13.6533614,65.3711565 C12.5927738,64.3313875 11.9939252,62.9022985 11.9945972,61.4094533 L11.9945972,51.7151164 C11.9945972,51.1399539 11.5321865,50.6733125 10.9622384,50.6733125 L2.33303544,50.6733125 C2.24498917,50.6733125 2.16231976,50.629904 2.11191174,50.5559739 C2.06217561,50.4827222 2.05074981,50.3891226 2.08233896,50.3056968 L7.69847879,35.4599926 C7.74283787,35.3426541 7.76636171,35.2171765 7.76636171,35.0910204 C7.77173858,32.9395871 7.7878692,29.3882299 7.81004873,29.0111186 C8.63270971,13.9042853 21.0122788,2.08089737 36.0050064,2.08360946 C36.1105275,2.08360946 36.2180648,2.08360946 36.3242581,2.08564521 C36.5682334,2.08835825 36.8108646,2.09378431 37.0534959,2.10260161 C41.5183136,2.23689655 45.8668565,3.56628161 49.6555329,5.95442704 C61.2191622,13.3230185 65.2551746,28.4074693 58.9386975,40.648664 Z"
                  fill="#0071DC"></path>
                <path class="secondary-fill-color"
                  d="M36.0003388,5 C24.9547587,4.99932235 16,13.9540813 16,24.9996612 C16,36.0452413 24.9540812,45 36.0003388,45 C47.0459188,45 56,36.0459188 56,24.9996612 C55.9878048,13.9595014 47.0411763,5.01219524 36.0003388,5 Z M46.8860247,39.2221243 L46.8860247,37.1705993 L49.2817292,34.8988804 C49.4883722,34.7024003 49.6055828,34.4293603 49.6055828,34.1441252 L49.6055828,32.1407037 C51.0453091,31.63392 51.9098224,30.1630279 51.6523655,28.6589374 C51.3949085,27.1548469 50.0913634,26.0545573 48.5649148,26.0545573 C47.0391437,26.0545573 45.7355986,27.1548469 45.4781416,28.6589374 C45.2206847,30.1630279 46.085198,31.63392 47.5242468,32.1407037 L47.5242468,33.6962856 L45.1292197,35.9680043 C44.9218992,36.1644846 44.8046886,36.4375244 44.8046886,36.723437 L44.8046886,40.6008741 C43.581768,41.2946527 42.2816104,41.8407326 40.9299616,42.228273 L40.9299616,34.1319297 L44.4855774,29.255831 C44.6156609,29.0783212 44.6854453,28.8635479 44.6854453,28.642677 L44.6854453,23.156134 C46.1251716,22.6493504 46.9890074,21.1784582 46.732228,19.6743679 C46.4747711,18.1702772 45.1712259,17.0706652 43.6447774,17.0706652 C42.119006,17.0706652 40.8147835,18.1702772 40.558004,19.6743679 C40.3005472,21.1784582 41.1650603,22.6493504 42.6041093,23.156134 L42.6041093,28.3039179 L39.0484935,33.1793392 C38.9190875,33.3575263 38.8486255,33.5722998 38.8486255,33.7924932 L38.8486255,42.6910178 C38.0024053,42.8265215 37.1473772,42.9010486 36.2896392,42.9145989 L36.2896392,31.5783635 L38.2612172,29.6067854 C38.4563424,29.4116601 38.5661005,29.147428 38.5661005,28.8710006 L38.5661005,15.1688714 C40.0051491,14.6620878 40.8696626,13.1911956 40.6122055,11.6871051 C40.3547487,10.1830146 39.0512034,9.08340255 37.5254324,9.08340255 C35.9989837,9.08340255 34.6954385,10.1830146 34.4379816,11.6871051 C34.1805247,13.1911956 35.045038,14.6620878 36.4847644,15.1688714 L36.4847644,28.440099 L34.5131862,30.4109995 C34.3180609,30.6068024 34.208303,30.8710344 34.208303,31.1474619 L34.208303,42.8299092 C33.8702214,42.7960332 33.5348498,42.7533497 33.2028658,42.7005032 L33.2028658,26.7971172 C33.2028658,26.5213673 33.093108,26.2564576 32.8973053,26.0613324 L30.031403,23.1961077 L30.031403,21.5653212 C31.4711294,21.0585376 32.3349649,19.5876455 32.0781857,18.0835548 C31.8207286,16.5794645 30.5171836,15.4798523 28.9907349,15.4798523 C27.4649637,15.4798523 26.1614186,16.5794645 25.9039617,18.0835548 C25.6465047,19.5876455 26.511018,21.0585376 27.9500668,21.5653212 L27.9500668,23.6263318 C27.9500668,23.9020818 28.0598249,24.1669913 28.2549501,24.3621165 L31.1215297,27.2280188 L31.1215297,42.2431783 C30.0381782,41.9362626 28.9873474,41.5270416 27.9819103,41.0209353 L27.9819103,33.1054897 C27.9819103,32.6813632 27.7244533,32.2992429 27.3308152,32.1407037 L24.4757532,30.9882451 L24.4757532,28.7334643 C25.914802,28.2260032 26.7793153,26.7557885 26.5218584,25.2516982 C26.2644014,23.7476075 24.9608563,22.6479955 23.4350852,22.6479955 C21.9093141,22.6479955 20.6050914,23.7476075 20.348312,25.2516982 C20.0908551,26.7557885 20.9553684,28.2260032 22.3944172,28.7334643 L22.3944172,31.6908317 C22.3944172,32.1156354 22.6518741,32.4970783 23.0455122,32.6562951 L25.9005741,33.8080761 L25.9005741,39.7939499 C19.4797337,35.4144719 16.6138314,27.3960434 18.8035704,19.9392774 C20.9939871,12.4825116 27.7413912,7.28730162 35.5098156,7.07523828 C43.2789173,6.86385259 50.298684,11.684395 52.8915465,19.0110775 C55.4844087,26.3377598 53.0588933,34.5004997 46.8860247,39.2221243 L46.8860247,39.2221243 Z M48.5649148,30.2409424 C47.9849591,30.2409424 47.5147616,29.7707448 47.5147616,29.1901117 C47.5147616,28.6101561 47.9849591,28.1399584 48.5655923,28.1399584 C49.1455479,28.1399584 49.6157457,28.6101561 49.6157457,29.1901117 C49.615068,29.7700673 49.1448704,30.2402649 48.5649148,30.2409424 L48.5649148,30.2409424 Z M43.6454548,21.2563729 C43.0648217,21.2563729 42.5946239,20.7861753 42.5946239,20.2062196 C42.5946239,19.6255866 43.0648217,19.1553888 43.6447774,19.1553888 C44.2254104,19.1553888 44.695608,19.6255866 44.695608,20.2055422 C44.6949305,20.7854978 44.224733,21.2556955 43.6454548,21.2563729 Z M37.5254324,13.2691103 C36.9447992,13.2691103 36.4746016,12.7989125 36.4746016,12.2189568 C36.4746016,11.6383238 36.9447992,11.1681262 37.5247548,11.1681262 C38.105388,11.1681262 38.5755857,11.6383238 38.5755857,12.2189568 C38.5749081,12.7989125 38.1047104,13.2684327 37.5254324,13.2691103 Z M28.9914123,19.6655615 C28.4114567,19.6662375 27.9412577,19.1953624 27.9412577,18.6154068 C27.9405817,18.0354512 28.4114567,17.564576 28.9914123,17.564576 C29.5713679,17.564576 30.0422432,18.0347735 30.0422432,18.6154068 C30.0415657,19.1953624 29.5713679,19.6655615 28.9907349,19.6655615 L28.9914123,19.6655615 Z M23.4357627,26.8330256 C22.8558071,26.8330256 22.3856094,26.3621505 22.3856094,25.7821948 C22.3856094,25.2022392 22.8558071,24.7313641 23.4364403,24.7313641 C24.0163959,24.7320416 24.4865935,25.2022392 24.4865935,25.7821948 C24.485916,26.3628281 24.0157183,26.8323482 23.4350852,26.8330256 L23.4357627,26.8330256 Z"
                  fill="#FFC221"></path>
              </svg>
            </div>
            <div class="counter-item-03__content"> <span class="counter-item-03__count"><span class="count"
                  data-count="7455">0</span>+</span>
              <p class="counter-item-03__text">Quaries generated by the users/parents </p>
            </div>
          </div>
          <!-- Counter Item End -->
        </div> --}}
          <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
            <!-- Counter Item Start -->
            <div class="counter-item-03">
              <div class="counter-item-03__icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="90px"
                  height="61px" viewBox="0 0 90 61">
                  <g transform="translate(0.037309, 11.586486)">
                    <path
                      d="M20.6001277,26.0310704 C19.6718051,25.8770816 18.7321438,25.7988069 17.7910194,25.7969781 C8.48365339,25.7969781 0.93636944,33.2129509 0.93636944,43.3257409 L6.55458608,43.3257409 C6.55458608,34.2616116 12.6318431,27.3606419 20.6001277,26.0310704 Z"
                      fill="#D3E6FA"></path>
                    <path
                      d="M11.4237072,11.9855288 C11.4269991,6.40169456 15.9526628,1.87566504 21.5364971,1.87273888 C21.7146267,1.87273888 21.9019006,1.88224884 22.0796645,1.89139314 C18.3857602,0.160207006 14.0129881,0.818957514 10.9928309,3.56113003 C7.97230784,6.30366829 6.89621457,10.5923135 8.26346031,14.4361832 C9.6310717,18.2796872 13.1742791,20.9249308 17.2482176,21.1432951 C13.6922084,19.4816052 11.4211468,15.9105994 11.4237072,11.9855288 Z"
                      fill="#D3E6FA"></path>
                    <path class="primary-fill-color"
                      d="M17.7910194,1.11910481e-13 C11.6888899,1.11910481e-13 6.74185997,4.94702993 6.74185997,11.0491594 C6.74185997,17.1512889 11.6888899,22.0983188 17.7910194,22.0983188 C23.8935145,22.0983188 28.8401788,17.1512889 28.8401788,11.0491594 C28.8357894,4.94885875 23.8916857,0.00475499638 17.7910194,1.11910481e-13 Z M17.7910194,19.9680783 C12.8654923,19.9680783 8.87210045,15.9750419 8.87210045,11.0491594 C8.87210045,6.12327688 12.8654923,2.13024048 17.7910194,2.13024048 C22.7169019,2.13024048 26.7099383,6.12327688 26.7099383,11.0491594 C26.7021171,15.9714869 22.7137023,19.9602572 17.7910194,19.9680783 Z"
                      fill="#0071DC"></path>
                    <path class="primary-fill-color"
                      d="M17.7910194,23.9606086 C12.9877367,23.9606086 8.52096191,25.8238376 5.20636035,29.2137875 C1.84494032,32.6501902 -5.97921712e-13,37.3411817 -5.97921712e-13,42.4352508 C0.00146298361,42.9517171 0.419903077,43.3701572 0.93636944,43.3716203 L34.6456693,43.3716203 C35.1625013,43.3701572 35.5805756,42.9517171 35.5820387,42.4352508 C35.5820387,37.3506916 33.7374641,32.6501902 30.376044,29.2229318 C27.0610768,25.8333475 22.5946677,23.9606086 17.7910194,23.9606086 Z M2.3224156,41.4005992 C2.52276265,37.22142 4.11699827,33.4026955 6.84072142,30.5732349 C9.71959776,27.5866622 13.6094615,25.9411397 17.7818751,25.9411397 C21.9542886,25.9411397 25.8441524,27.5866622 28.722673,30.5732349 C31.4556483,33.4026955 33.0409875,37.22142 33.2413345,41.4005992 L2.3224156,41.4005992 Z"
                      fill="#0071DC"></path>
                  </g>
                  <g transform="translate(27.351351, 0.000000)">
                    <g transform="translate(1.189189, 1.189189)" fill="#D4E1F4">
                      <polygon
                        points="40.2725822 54.5290128 41.3166318 48.4548593 34.0082846 41.3699684 44.1149023 39.917101 46.8848964 34.3272368 44.4487806 29.429214 39.9387039 38.5334177 29.8320861 39.9862851 37.1404334 47.071176 35.4144889 57.0747738">
                      </polygon>
                      <path
                        d="M15.8140888,16.0485642 C15.8140888,8.73558172 21.7782222,2.80682314 29.1360531,2.80682314 C29.5678111,2.80682314 29.985431,2.83438874 30.4030508,2.86249481 C25.9359323,-0.620495476 19.7401505,-0.907501694 14.9663424,2.14633064 C10.193078,5.20070344 7.89018746,10.9256931 9.23005112,16.4090786 C10.5699148,21.8924641 15.2578062,25.9300088 20.9087247,26.4678074 C17.6917469,23.9560979 15.8130013,20.1147554 15.8140888,16.0485642 Z">
                      </path>
                      <path
                        d="M29.121915,35.3509461 C30.6939709,35.349865 32.2616766,35.5120156 33.7994746,35.8352353 C30.3024523,33.6910666 26.2703545,32.5641215 22.1615842,32.5835795 C9.89780771,32.6116856 -0.0277326025,42.3385467 -0.000115705559,55.5808283 L7.09953732,55.5667753 C8.36653495,43.7638486 17.7352489,35.3790522 29.121915,35.3509461 Z">
                      </path>
                    </g>
                    <path class="primary-fill-color"
                      d="M23.4864865,29.1351351 C31.5317849,29.1351351 38.0540541,22.6129865 38.0540541,14.5672984 C38.0540541,6.52214867 31.5317849,0 23.4864865,0 C15.4411881,0 8.91891892,6.52214867 8.91891892,14.5672984 C8.92645607,22.6097564 15.4438799,29.1270598 23.4864865,29.1351351 Z M23.4864865,2.75636822 C30.0098323,2.75636822 35.2976349,8.04461142 35.2976349,14.5672984 C35.2976349,21.0905237 30.0098323,26.3787669 23.4864865,26.3787669 C16.9631407,26.3787669 11.6753381,21.0905237 11.6753381,14.5672984 C11.6828752,8.04730316 16.9663709,2.76390523 23.4864865,2.75636822 Z"
                      fill="#0071DC"></path>
                    <path class="primary-fill-color"
                      d="M23.5711295,32.7027027 C17.186957,32.7166483 11.2628804,35.16087 6.87209431,39.6094931 C2.42577002,44.0994164 -0.0135556368,50.2375937 -5.61949535e-05,56.8971191 C0.00277911914,57.2607756 0.14761412,57.6099501 0.404614499,57.8716969 C0.666515274,58.1302256 1.02315778,58.2734354 1.39395703,58.2703217 L37.0778063,58.2015623 L37.0778063,55.4553662 L2.82978326,55.5240211 C3.1227202,50.1276386 5.24133975,45.1978948 8.8790931,41.5318303 C12.7406327,37.6185009 17.967759,35.4628444 23.5847419,35.4628444 L23.6266678,35.4628444 C28.9447244,35.4354896 34.0645856,37.4500819 37.9005342,41.0786007 L39.8378378,39.1015542 C35.4808103,34.9801145 29.6672657,32.6903662 23.6266678,32.7166483 C23.6130555,32.7027027 23.5988986,32.7027027 23.5711295,32.7027027 Z"
                      fill="#0071DC"></path>
                    <path class="secondary-fill-color"
                      d="M60.6417808,40.361284 L51.2500949,38.9427513 L47.1056298,30.5009488 C46.8739584,30.0318702 46.392627,29.7333167 45.863871,29.7297297 C45.3318444,29.7214821 44.8428815,30.0162701 44.6079394,30.4875005 L40.3375542,38.8599094 L30.9322404,40.1407308 C30.405665,40.2112003 29.9657619,40.5721542 29.7995036,41.0702812 C29.6332454,41.5684084 29.7695226,42.1165634 30.150554,42.4818208 L36.9050018,49.0785087 L35.2304264,58.3051572 C35.1339421,58.8204982 35.3454443,59.3449841 35.7744453,59.6542963 C36.1990854,59.9700637 36.7714499,60.0130985 37.2396988,59.7645728 L45.6823497,55.4680919 L54.0552266,59.8888356 C54.2569171,59.9964225 54.4820471,60.0529055 54.710993,60.0540541 C55.0026264,60.0561332 55.2866283,59.9641464 55.5204801,59.7920075 C55.9549321,59.4859229 56.1767915,58.9630508 56.0928448,58.4428683 L54.5578173,49.1882473 L61.4092945,42.7023739 C61.7925063,42.340882 61.9331444,41.7959547 61.7723372,41.2978275 C61.5989925,40.8040038 61.1645405,40.4441258 60.6417808,40.361284 Z M52.8022985,48.0063198 C52.4308791,48.350698 52.2615556,48.8562238 52.3519828,49.3510064 L53.6883642,57.3570545 L46.4171632,53.5372612 C46.1926124,53.4178926 45.9419651,53.3546272 45.6870695,53.3540304 C45.4388497,53.3570146 45.1948781,53.4143115 44.9721479,53.5217432 L37.6390438,57.2347016 L39.0992316,49.2590927 C39.1878381,48.7631164 39.0257974,48.2558 38.6640884,47.8994849 L32.8069513,42.200234 L40.9793901,41.1002529 C41.4873608,41.0334065 41.9291798,40.7248389 42.1597997,40.2748194 L45.8576067,33.0327301 L49.4467796,40.3362942 C49.6658686,40.7916853 50.1040462,41.107415 50.6120167,41.1766488 L58.7528972,42.3989826 L52.8022985,48.0063198 Z"
                      fill="#FFC221"></path>
                  </g>
                </svg>
              </div>
              <div class="counter-item-03__content"> <span class="counter-item-03__count"><span class="count"
                    data-count="27800">0</span>+</span>
                <p class="counter-item-03__text">Parent Enquiries</p>
              </div>
            </div>
            <!-- Counter Item End -->
          </div>
          <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
            <!-- Counter Item Start -->
            <div class="counter-item-03">
              <div class="counter-item-03__icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80px"
                  height="77px" viewBox="0 0 80 77">
                  <path
                    d="M55.5948498,40.4245494 L34.2719313,31.5464378 C34.2523605,31.5381974 34.2336481,31.5303004 34.2161373,31.5224034 C34.2333047,31.5145064 34.2523605,31.5064378 34.2719313,31.4983691 L55.5948498,22.6199142 C55.6672961,22.5898712 55.744206,22.5622318 55.8238627,22.536309 C54.7649785,22.191073 53.1251502,22.2187124 52.1613734,22.6199142 L30.8384549,31.4983691 C30.8188841,31.5064378 30.8001717,31.5145064 30.7826609,31.5224034 C30.7998283,31.5303004 30.8188841,31.5381974 30.8384549,31.5464378 L52.1613734,40.4245494 C53.1253219,40.8259227 54.7653219,40.8537339 55.8238627,40.5081545 C55.744206,40.4822318 55.6672961,40.4547639 55.5948498,40.4245494 L55.5948498,40.4245494 Z"
                    fill="#D3E6FA"></path>
                  <path
                    d="M55.0995708,53.2494421 C52.1424893,50.5509013 47.6738197,46.4729614 42.8369099,46.4729614 L42.703691,46.4729614 L42.703691,38.7182833 L39.2702146,37.2887554 L39.2702146,46.4733047 L39.4034335,46.4733047 C44.2403433,46.4733047 48.7090129,50.5512446 51.6660944,53.2497854 C52.4777682,53.9903863 53.4686695,54.8947639 53.9179399,55.1505579 C54.2702146,54.9454077 54.9575966,54.3397425 55.6278112,53.7303004 C55.4482403,53.5675536 55.2700429,53.4048069 55.0995708,53.2494421 Z"
                    fill="#D3E6FA"></path>
                  <g class="primary-fill-color" fill="#0071DC">
                    <path
                      d="M5.96549356,76.104206 L44.4204292,76.104206 C47.2826183,76.1003679 49.7210976,74.0246707 50.1819742,71.1998283 C52.9966842,70.7296462 55.0604625,68.2957681 55.0642062,65.4420601 L55.0642062,56.2918455 C55.0642062,55.7229685 54.6030401,55.2618026 54.0341631,55.2618026 C53.4652861,55.2618026 53.0041202,55.7229685 53.0041202,56.2918455 L53.0041202,65.4420601 C53.001755,67.5269619 51.312198,69.2165189 49.2272961,69.2188841 L10.9440343,69.2188841 C8.85913249,69.2165189 7.16957548,67.5269619 7.1672103,65.4420601 L7.1672103,5.95587983 C7.16957548,3.87097799 8.85913249,2.18142097 10.9440343,2.17905579 L39.9569099,2.17905579 L39.9569099,10.984206 C39.9596536,13.4482023 41.9564329,15.4449816 44.4204292,15.4477253 L53.0041202,15.4477253 L53.0041202,20.9658369 C53.0041202,21.5347139 53.4652861,21.9958798 54.0341631,21.9958798 C54.6030401,21.9958798 55.0642062,21.5347139 55.0642062,20.9658369 L55.0642062,14.4176824 C55.0642062,14.3832827 55.0625097,14.348904 55.0590558,14.3146781 C55.0569957,14.2944206 55.0533906,14.2746781 55.0501288,14.2547639 C55.0480687,14.2417167 55.0466953,14.2284979 55.0441202,14.2154506 C55.0393133,14.1914163 55.0329614,14.1680687 55.0269528,14.1445494 C55.0245494,14.1359657 55.0228326,14.127382 55.0202575,14.1186266 C55.0130472,14.0949356 55.0044635,14.072103 54.9957082,14.0499571 C54.992618,14.0417167 54.9898712,14.0327897 54.9866094,14.0250644 C54.9778541,14.0037768 54.9677253,13.9833476 54.9574249,13.9627468 C54.9527897,13.9533047 54.9486695,13.9435193 54.943691,13.9340773 C54.9339056,13.9157082 54.9227468,13.8980258 54.9119313,13.8803433 C54.9052361,13.8695279 54.8992275,13.8583691 54.8921888,13.847897 C54.8817167,13.8319313 54.8698712,13.816824 54.8578541,13.8015451 C54.8492704,13.7900429 54.8406867,13.7783691 54.8319313,13.7672103 C54.8202575,13.7529614 54.8075536,13.7395708 54.7950215,13.7258369 C54.7860944,13.7158798 54.7778541,13.7054077 54.7682403,13.695794 L41.72103,0.427124464 L41.7174249,0.423862661 C41.703691,0.409957082 41.688927,0.397253219 41.6745064,0.384206009 C41.6640343,0.374935622 41.6540773,0.364806867 41.6432618,0.355879828 C41.6185408,0.335507868 41.5928469,0.316280401 41.5661803,0.298197425 L41.5634335,0.295965665 C41.4224204,0.200224686 41.2597302,0.141214806 41.0901288,0.124291845 C41.055794,0.120858369 41.0214592,0.118969957 40.9871245,0.118969957 L10.944206,0.118969957 C7.95728463,0.122700432 5.45373891,2.37785355 5.13905579,5.34815451 C2.26605055,5.76266032 0.132511685,8.22274335 0.128583691,11.1254936 L0.128583691,70.2671245 C0.132178708,73.4892983 2.74331984,76.1005162 5.96549356,76.104206 L5.96549356,76.104206 Z M42.0169957,10.984206 L42.0169957,3.6655794 L51.576824,13.3876395 L44.4204292,13.3876395 C43.0936379,13.3862202 42.018415,12.3109973 42.0169957,10.984206 Z M2.18866953,11.1254936 C2.19122056,9.37133752 3.39937433,7.84906377 5.10712446,7.44824034 L5.10712446,65.4420601 C5.11071966,68.664206 7.72188838,71.2753748 10.9440343,71.27897 L48.0583691,71.27897 C47.6023416,72.9117216 46.1156677,74.0416527 44.4204292,74.0439485 L5.96549356,74.0439485 C3.88059172,74.0415833 2.19103471,72.3520263 2.18866953,70.2671245 L2.18866953,11.1254936 Z">
                    </path>
                    <path
                      d="M38.2401717,20.3320172 L22.1886695,20.3320172 C21.6197925,20.3320172 21.1586266,20.7931831 21.1586266,21.3620601 C21.1586266,21.9309371 21.6197925,22.392103 22.1886695,22.392103 L38.2401717,22.392103 C38.8090487,22.392103 39.2702146,21.9309371 39.2702146,21.3620601 C39.2702146,20.7931831 38.8090487,20.3320172 38.2401717,20.3320172 L38.2401717,20.3320172 Z">
                    </path>
                    <path
                      d="M14.3392275,22.392103 L18.0381116,22.392103 C18.6069886,22.392103 19.0681545,21.9309371 19.0681545,21.3620601 C19.0681545,20.7931831 18.6069886,20.3320172 18.0381116,20.3320172 L14.3392275,20.3320172 C13.7703505,20.3320172 13.3091845,20.7931831 13.3091845,21.3620601 C13.3091845,21.9309371 13.7703505,22.392103 14.3392275,22.392103 L14.3392275,22.392103 Z">
                    </path>
                    <path
                      d="M14.3392275,33.4660944 L24.5062661,33.4660944 C25.0751431,33.4660944 25.536309,33.0049285 25.536309,32.4360515 C25.536309,31.8671745 25.0751431,31.4060086 24.5062661,31.4060086 L14.3392275,31.4060086 C13.7703505,31.4060086 13.3091845,31.8671745 13.3091845,32.4360515 C13.3091845,33.0049285 13.7703505,33.4660944 14.3392275,33.4660944 Z">
                    </path>
                    <path
                      d="M34.12,43.5103863 C34.12,42.9415093 33.6588341,42.4803433 33.0899571,42.4803433 L21.7967382,42.4803433 C21.2278612,42.4803433 20.7666953,42.9415093 20.7666953,43.5103863 C20.7666953,44.0792633 21.2278612,44.5404292 21.7967382,44.5404292 L33.0899571,44.5404292 C33.6588341,44.5404292 34.12,44.0792633 34.12,43.5103863 L34.12,43.5103863 Z">
                    </path>
                    <path
                      d="M14.3392275,44.5404292 L17.671588,44.5404292 C18.240465,44.5404292 18.7016309,44.0792633 18.7016309,43.5103863 C18.7016309,42.9415093 18.240465,42.4803433 17.671588,42.4803433 L14.3392275,42.4803433 C13.7703505,42.4803433 13.3091845,42.9415093 13.3091845,43.5103863 C13.3091845,44.0792633 13.7703505,44.5404292 14.3392275,44.5404292 L14.3392275,44.5404292 Z">
                    </path>
                    <path
                      d="M34.5006009,55.6145923 L38.2401717,55.6145923 C38.8090487,55.6145923 39.2702146,55.1534264 39.2702146,54.5845494 C39.2702146,54.0156724 38.8090487,53.5545064 38.2401717,53.5545064 L34.5006009,53.5545064 C33.9317239,53.5545064 33.4705579,54.0156724 33.4705579,54.5845494 C33.4705579,55.1534264 33.9317239,55.6145923 34.5006009,55.6145923 Z">
                    </path>
                    <path
                      d="M14.3392275,55.6145923 L30.1217167,55.6145923 C30.6905937,55.6145923 31.1517597,55.1534264 31.1517597,54.5845494 C31.1517597,54.0156724 30.6905937,53.5545064 30.1217167,53.5545064 L14.3392275,53.5545064 C13.7703505,53.5545064 13.3091845,54.0156724 13.3091845,54.5845494 C13.3091845,55.1534264 13.7703505,55.6145923 14.3392275,55.6145923 L14.3392275,55.6145923 Z">
                    </path>
                  </g>
                  <path class="secondary-fill-color"
                    d="M76.6951073,47.2648927 L76.6951073,34.0612876 L78.1675536,33.4482403 C79.5598283,32.8684979 79.7675536,31.9927897 79.7675536,31.5224034 C79.7675536,31.0520172 79.5598283,30.1761373 78.1675536,29.5965665 L56.8446352,20.7181116 C55.3091845,20.07897 52.9045494,20.07897 51.3694421,20.7181116 L30.0465236,29.5965665 C28.6542489,30.1761373 28.4463519,31.0518455 28.4463519,31.5224034 C28.4463519,31.9929614 28.6542489,32.8684979 30.0465236,33.4482403 L37.2101288,36.4309013 L37.2101288,47.5030043 C37.2101288,48.0718813 37.6712947,48.5330472 38.2401717,48.5330472 L39.4034335,48.5330472 C43.4417167,48.5330472 47.5553648,52.2870386 50.2774249,54.7711588 C52.1642918,56.4930472 53.0360515,57.2544206 53.9230901,57.2544206 C54.7986266,57.2544206 55.616309,56.5371674 57.5435193,54.7697854 C60.2521888,52.2861803 64.3452361,48.5330472 68.2590558,48.5330472 L69.4848069,48.5330472 C70.0536839,48.5330472 70.5148498,48.0718813 70.5148498,47.5030043 L70.5148498,36.6351931 L74.6350215,34.9198283 L74.6350215,47.1618884 C72.4318288,47.5751284 70.8862554,49.5713939 71.0379543,51.8078671 C71.1896531,54.0443404 72.990641,55.8136103 75.2294564,55.9255511 C77.4682717,56.0374919 79.4367629,54.4566959 79.8107947,52.2465092 C80.1848266,50.0363225 78.8460905,47.8958415 76.6951073,47.2648927 L76.6951073,47.2648927 Z M30.7826609,31.5224034 C30.7998283,31.5145064 30.8188841,31.5064378 30.8384549,31.4983691 L52.1613734,22.6199142 C53.1974249,22.1884979 55.0159657,22.1883262 56.0527039,22.6199142 L77.3756223,31.4983691 C77.3951931,31.5064378 77.4137339,31.5145064 77.4314163,31.5224034 C77.4142489,31.5303004 77.3951931,31.5381974 77.3756223,31.5464378 L56.0528755,40.4245494 C55.0164807,40.8559657 53.1977682,40.8559657 52.1613734,40.4245494 L30.8384549,31.5464378 C30.8188841,31.5381974 30.8001717,31.5303004 30.7826609,31.5224034 L30.7826609,31.5224034 Z M68.4547639,46.4729614 L68.2590558,46.4729614 C63.543691,46.4729614 59.0951073,50.552103 56.1512446,53.2515021 C55.3464378,53.9896996 54.3636052,54.8906438 53.9179399,55.1502146 C53.4686695,54.8944206 52.4777682,53.9900429 51.6660944,53.2494421 C48.7090129,50.5509013 44.2403433,46.4729614 39.4034335,46.4729614 L39.2702146,46.4729614 L39.2702146,37.288412 L51.3696137,42.3260086 C53.1386711,42.9650979 55.0755778,42.9650979 56.8446352,42.3260086 L68.4547639,37.4920172 L68.4547639,46.4729614 Z M75.4492704,53.8947639 C74.1726621,53.8885945 73.1294959,52.8739679 73.0879251,51.5980217 C73.0463544,50.3220755 74.0212645,49.2416992 75.2947639,49.1524464 C75.4916129,49.229866 75.7078328,49.2433798 75.9127897,49.191073 C77.1049094,49.435368 77.9197921,50.540825 77.8004573,51.751853 C77.6811224,52.9628809 76.6661441,53.8880232 75.4492704,53.8949356 L75.4492704,53.8947639 Z"
                    fill="#FFC221"></path>
                </svg>
              </div>
              <div class="counter-item-03__content"> <span class="counter-item-03__count"><span class="count"
                    data-count="25700">0</span>+</span>
                <p class="counter-item-03__text">Parents Counselled</p>
              </div>
            </div>
            <!-- Counter Item End -->
          </div>
        </div>
      </div>
      <!-- Counter End -->
    </div>
  </div>
  <!-- Counter End -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('RequestCallbackForm');
      const nameInput = form.querySelector('input[name="name"]');
      const phoneInput = form.querySelector('input[name="phone"]');
      const pincodeInput = form.querySelector('input[name="pincode"]');
      const seekingClassSelect = form.querySelector('select[name="seeking_class"]');
      const submitButton = form.querySelector('#submitButton');
      const nameError = document.getElementById('nameError');
      const phoneError = document.getElementById('phoneError');
      const pincodeError = document.getElementById('pincodeError');
      const seekingClassError = document.getElementById('seekingClassError');
      // Define the list of allowed class values
      const allowedClasses = [
        " ",
        "Nursery",
        "LKG",
        "UKG",
        "Class 1",
        "Class 2",
        "Class 3",
        "Class 4",
        "Class 5",
        "Class 6",
        "Class 7",
        "Class 8",
        "Class 9",
        "Class 10",
        "Class 11",
        "Class 12"
      ];
      // Function to validate and show/hide error messages
      function checkForm() {
        const name = nameInput.value.trim();
        const phone = phoneInput.value.trim();
        const pincode = pincodeInput.value.trim();
        const seekingClass = seekingClassSelect.value;
        // Reset error messages
        nameError.textContent = '';
        phoneError.textContent = '';
        pincodeError.textContent = '';
        seekingClassError.textContent = '';
        if (name) {
          if (!isValidName(name)) {
            nameError.textContent = 'Invalid name format.';
          }
        }
        if (phone && !isValidPhoneNumber(phone)) {
          phoneError.textContent = 'Please enter 10 digits of your mobile number';
        }
        if (pincode) {
          if (!isValidPincode(pincode)) {
            pincodeError.textContent = 'Invallid pincode format.';
          }
        }
        if (!seekingClass || !allowedClasses.includes(seekingClass)) {
          seekingClassError.textContent = 'Please select a valid class.';
        }
        // Hide error message elements when there is no error
        nameError.style.display = nameError.textContent ? 'block' : 'none';
        phoneError.style.display = phoneError.textContent ? 'block' : 'none';
        pincodeError.style.display = pincodeError.textContent ? 'block' : 'none';
        seekingClassError.style.display = seekingClassError.textContent ? 'block' : 'none';
        // Enable or disable the submit button based on errors
        const hasErrors = !!nameError.textContent || !!phoneError.textContent || !!pincodeError.textContent || !!
          seekingClassError.textContent;
        submitButton.disabled = hasErrors;
      }
      // Function to check the validity of a name (you can customize this function)
      function isValidName(name) {
        return name.length >= 3; // Example: Require at least 3 characters
      }
      // Function to check if the phone number is valid
      function isValidPhoneNumber(phone) {
        return /^[6-9]\d{9}$/.test(phone); // Example: Requires +91 followed by 10 digits
      }
      // Function to check if the pin code has exactly six numbers
      function isValidPincode(pincode) {
        return /^\d{6}$/.test(pincode);
      }
      // Add event listeners to input fields and the select for input changes
      nameInput.addEventListener('input', checkForm);
      phoneInput.addEventListener('input', checkForm);
      pincodeInput.addEventListener('input', checkForm);
      seekingClassSelect.addEventListener('change', checkForm);
      // Initial check when the page loads
      checkForm();
      // Add an event listener to the form to handle submission (you can add your own logic here)
      form.addEventListener('submit', function(event) {});
    });
  </script>
@endsection
@push('js')
@endpush
