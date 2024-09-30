@extends("layouts.frontend.app")
@push("css")
@endpush
@section("content")
    <style>
        svg#freepik_stories-job-hunt:not(.animated) .animable {
            opacity: 0;
        }

        svg#freepik_stories-job-hunt.animated #freepik--background-complete--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomOut;
            animation-delay: 0s;
        }

        svg#freepik_stories-job-hunt.animated #freepik--Shadow--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomIn;
            animation-delay: 0s;
        }

        svg#freepik_stories-job-hunt.animated #freepik--Briefcases--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        svg#freepik_stories-job-hunt.animated #freepik--Character--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomIn;
            animation-delay: 0s;
        }

        @keyframes zoomOut {
            0% {
                opacity: 0;
                transform: scale(1.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .course-list-info__meta {
            gap: 4px
        }

        .comment-form-c {
            display: flex;
        }

        @media (max-width: 768px) {
            .comment-form-c {
                flex-direction: column
            }
        }

        @media only screen and (max-width: 767px) {
            .section-padding-01 {
                padding-top: 26px;
                padding-bottom: 50px;
            }

            .course-list-info {
                padding-left: 0;
                padding-top: 0px;
            }

            .footer-section {
                padding-top: 25px;
            }
    </style>
    <main class="main-wrapper">
        <div class="page-banner bg-color-05" style="margin-top: 150.641px;">
            <div class="page-banner__wrapper" style="margin-top: 150.641px;">
                <div class="container">
                    <div class="page-breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Careers</li>
                        </ul>
                    </div>
                    <div class="page-banner__caption text-center">
                        <h2 style="text-align:left  ;" class="page-banner__main-title">Careers</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses-section section-padding-01">
      <div class="container">
        @foreach ($all_job_posts as $job)
          <div class="course-list-item">  <div class="course-list-info">
              <h3 class="course-list-info__title"><a href="course-single-layout-01.html">{{ $job->job_title }}</a></h3>
              <div class="course-list-info__meta"> <span><i class="far fa-map-marker-alt"></i></i> Kolkata, India</span>
                <span><i class="far fa-clock"></i> {{$job->working_hours}} ({{$job->no_of_days}} Days/Week)</span> <span><i class="far fa-sliders-h"></i>{{ $job->experince }}</span> <span><i class="far fa-pen-nib"></i>Posted on: {{$job->created_at->format('F j, Y')}}</span>
              </div>
              <div class="course-list-info__description">
                <p style="text-align: justify;">
                
                   {!! $job->job_description !!}
                 
                </p>
              </div>
              <div class="course-list-info__action"> <a href="{{ route('career.apply',$job->id)}}" class="btn btn-primary btn-hover-secondary"
                  >Apply Now</a> 
                  {{--<button
                  class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top"
                  data-bs-original-title="Add to wishlist" title="" aria-label="Add to wishlist"><i
                    class="far fa-heart"></i></button>--}}
                     </div>
            </div>
          </div>
        @endforeach

      </div>
    </div> 
        */
        <button id="backBtn" class="back-to-top backBtn" style="display: none;">
            <i class="arrow-top fal fa-long-arrow-up"></i>
            <i class="arrow-bottom fal fa-long-arrow-up"></i>
        </button>
        <script>
            function scrollToForm() {
                var element = document.getElementById("application-form");
                element.scrollIntoView({
                    behavior: "smooth"
                });
            }
        </script>
    </main>
@endsection
@push("js")
@endpush
