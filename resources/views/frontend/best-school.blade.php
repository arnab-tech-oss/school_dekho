@php
  $faqs = [
      ['question' => 'Why should I choose CBSE schools in Kolkata?', 'answer' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, similique?'],
      ['question' => 'What is the academic curriculum in CBSE schools in Kolkata?', 'answer' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, similique?'],
      ['question' => 'How do I choose the right CBSE school for my child in Kolkata?', 'answer' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, similique?'],
      ['question' => 'What is the admission process for CBSE schools in Kolkata?', 'answer' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, similique?'],
      ['question' => 'What is the fee structure for CBSE schools in Kolkata?', 'answer' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, similique?'],
      ['question' => 'Are there any scholarship options available for CBSE students in Kolkata?', 'answer' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, similique?'],
      ['question' => 'What extracurricular activities are available in CBSE schools in Kolkata?', 'answer' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, similique?'],
  ];
@endphp
@extends('layouts.frontend.app')
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
  </style>
  <style>
    .school-rating {
      margin-top: 8px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 5px;
    }

    .school-rating span strong {
      font-weight: 500;
      color: #252525;
    }

    .school-rating span {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .course-list-info__rating {
      margin-top: 0;
    }

    .course-list-info {
      padding-right: unset;
    }

    .school-type {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 5px;
    }

    .school-type span strong {
      font-weight: 500;
      color: #252525;
    }

    .course-list-info__meta span {
      white-space: unset;
    }

    .course-list-info__action {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 5px;
    }

    .page-banner__main-title {
      text-wrap: balance;
    }

    .course-list-info__title {
      text-wrap: balance;
      font-size: 20px;
    }

    .summarise-segment {
      padding-top: 30px;
    }

    .course-list-info p,
    .summarise-segment p {
      margin-top: 8px;
      text-align: justify;
      text-wrap: pretty;
    }

    .summarise-segment p {
      padding-left: 10px;
    }

    .dashboard-table .table thead th,
    .dashboard-table .table tbody td {
      background: #ffffff;
      padding: 10px;
      /* Adjust padding as needed */
    }

    .dashboard-table .table thead th:not(:last-child),
    .dashboard-table .table tbody td:not(:last-child) {
      border-right: 1px solid #f0f0f0;
    }

    .accordion-button {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      text-wrap: pretty;
    }

    .most-searched {
      padding-top: 30px;
    }

    .course-curriculum .accordion-button {
      padding: 10px 30px;
    }

    .segment-overview {
      display: grid;
      grid-template-columns: 1fr;
      gap: 30px;
      padding-top: 30px;
    }

    .sidebar-widget {
      position: sticky;
      top: 75px;
    }

    .dashboard-table .table thead th.sl-no {
      width: 100px;
    }

    .summarise-segment h2,
    .summarise-segment h3 {
      font-size: 20px;
      font-weight: 500;
      line-height: 1.6;
      margin-bottom: 12px;
    }

    .school-rating-table {
      grid-template-columns: 1fr !important;
      justify-content: flex-start;
    }

    @media only screen and (max-width: 630px) {
      .course-list-info__action {
        grid-template-columns: 1fr;
        gap: 10px;
      }

      .school-type {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media only screen and (max-width: 620px) {
      .school-rating {
        display: flex;
        flex-wrap: wrap;
        line-height: 1;
      }
    }

    .course-list-item {
      border-bottom: unset;
    }

    .course-list-item-c {
      display: block;
      padding-bottom: 15px;
      margin-bottom: 15px;
      position: relative;
    }

    .white-bg {
      background: #ffffff;
      padding: 2rem;
      border-radius: .25rem;
      border: 1px solid #eee;
    }

    .course-list-header__thumbnail {
      max-width: 100px;
    }

    .course-list-header {
      display: flex;
      justify-content: center;
    }

    .course-list-header {
      min-width: 100px;
      padding-top: 5px;
    }

    .rating-star {
      display: flex !important;
      align-items: baseline;
    }

    .rating-star strong {
      font-weight: 600;
      font-size: 10px;
    }

    .rating-star span {
      font-size: 10px;
      align-items: baseline;
      margin-left: 6px;
      gap: 6px;
    }

    .course-list-item-c p {
      margin-top: 1rem;
      text-wrap: pretty;
      text-align: justify;
    }

    .countdown-register__input span {
      position: absolute;
      top: 13px;
      left: 15px;
      font-size: 14px;
      color: #666666;
      min-width: 20px;
    }

    .expert-review {
      padding-top: 10px;
    }

    .expert-review span {
      font-weight: 500;
      font-size: 1rem;
    }

    @media only screen and (max-width: 520px) {
      .white-bg {
        padding: 1rem;
      }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1499px) {
      .course-list-info__title {
        font-size: 20px;
      }
    }
  </style>
  <!-- Page Banner Section Start -->
  <div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
      <div class="container">
        <!-- Page Breadcrumb Start -->
        <div class="page-breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="/kolkata">Kolkata</a></li>
            <li class="breadcrumb-item active">CBSE</li>
          </ul>
        </div>
        <!-- Page Breadcrumb End -->
        <!-- Page Banner Caption Start -->
        <div class="page-banner__caption text-center">
          <h1 class="page-banner__main-title">
            Best CBSE Schools in Kolkata 2024: Rank, Admission, Fee
          </h1>
          <div>
            <p>Written & Varified by:
              <a href="https://www.schooldekho.org/about-us"> Team School Dekho</a>
            </p>
          </div>
        </div>
        <!-- Page Banner Caption End -->
      </div>
    </div>
  </div>
  <!-- Page Banner Section End -->
  <!-- Courses Start -->
  <div style="padding-top: 0" class="courses-section section-padding-01 bg-color-05">
    <div class="container">
      <div class="row gy-10 flex-row">
        <div class="col-12 col-lg-9">
          <!-- Archive Filter Bars Start -->
          <div class="archive-filter-bars">
          </div>
          <!-- Archive Filter Bars End -->
          <div id="list" class="tab-pane fade show active">
            <!-- Course List Start -->
            <div class="course-list-item-c white-bg">
              <div class="course-list-item">
                <div class="course-list-header">
                  <div class="course-list-header__thumbnail">
                    <a href="course-single-layout-01.html"><img
                        src="https://www.schooldekho.org/storage/logo//m4f3zbmj5fkwk40s4w4c8owwcws4wgs.png" alt="courses"
                        width="270" height="181" /></a>
                  </div>
                </div>
                <div class="course-list-info">
                  <h2 class="course-list-info__title">
                    <a href="course-single-layout-01.html">
                      1. Stem World School
                      <i class="fas fa-badge-check text-primary small" data-bs-tooltip="tooltip" data-bs-placement="top"
                        data-bs-original-title="Verified" title=""
                        aria-label="Verified School: Stem World School"></i></a>
                  </h2>
                  <div class="course-list-info__meta">
                    <a href="https://maps.app.goo.gl/xDExFnmbwQJe9u198">
                      <span><i class="far fa-map-marker-alt"></i> Near Barrackpore
                        Wireless Gate, On Kalyani Expressway, Barrackpore, West
                        Bengal - 700121</span>
                    </a>
                  </div>
                  <div class="school-rating">
                    <span>
                      <strong> School Dekho Rating</strong>
                      <div class="course-list-info__rating">
                        <div class="rating-star">
                          <div class="rating-label" style="width: 100%"></div> <span> <strong>5/5 </strong>
                          </span>
                        </div>
                      </div>
                    </span>
                    <span>
                      <strong> User Rating</strong>
                      <div class="course-list-info__rating">
                        <div class="rating-star">
                          <div class="rating-label" style="width: 100%"></div>
                          <span> <strong>5/5 </strong>(22 votes) </span>
                        </div>
                      </div>
                    </span>
                  </div>
                  <div class="course-list-info__description">
                    <div class="school-type">
                      <span><strong>Ownership:</strong> Private</span>
                      <span><strong>Boad: </strong>CBSE</span>
                      <span><strong>Grade:</strong> KG - 12 </span>
                      <span><strong>Medium: </strong>English</span>
                      <span><strong>Category:</strong> Co-ed </span>
                      <span><strong>School Type:</strong> Day </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="course-list-info__action">
                <button class="btn btn-primary btn-hover-secondary">
                  Admission Enquiry
                </button>
                <a href="https://api.whatsapp.com/send?phone=8100416842&text=Hi"
                  class="btn-light btn btn-hover-primary"><i class="fab fa-whatsapp"></i>
                  Chat With Us
                </a>
                <button class="btn-light btn btn-hover-primary">
                  School Details
                </button>
              </div>
              <p class="expert-review">
                <span>Expert review:</span>
                Science, Technology, Engineering, and Mathematics (STEM) — and therefore, STEM education — is the process
                of
                teaching that integrates these four disciplines to promote real-world experience, teamwork, and the
                authentic application of technology. Additionally, it also promotes discovery...
              </p>
            </div>
            <div class="course-list-item-c white-bg">
              <div class="course-list-item">
                <div class="course-list-header">
                  <div class="course-list-header__thumbnail">
                    <a href="course-single-layout-01.html"><img
                        src="https://www.schooldekho.org/storage/logo//m4f3zbmj5fkwk40s4w4c8owwcws4wgs.png" alt="courses"
                        width="270" height="181" /></a>
                  </div>
                </div>
                <div class="course-list-info">
                  <h2 class="course-list-info__title">
                    <a href="course-single-layout-01.html">
                      1. Stem World School
                      <i class="fas fa-badge-check text-primary small" data-bs-tooltip="tooltip" data-bs-placement="top"
                        data-bs-original-title="Verified" title=""
                        aria-label="Verified School: Stem World School"></i></a>
                  </h2>
                  <div class="course-list-info__meta">
                    <a href="https://maps.app.goo.gl/xDExFnmbwQJe9u198">
                      <span><i class="far fa-map-marker-alt"></i> Near Barrackpore
                        Wireless Gate, On Kalyani Expressway, Barrackpore, West
                        Bengal - 700121</span>
                    </a>
                  </div>
                  <div class="school-rating">
                    <span>
                      <strong> School Dekho Rating</strong>
                      <div class="course-list-info__rating">
                        <div class="rating-star">
                          <div class="rating-label" style="width: 100%"></div> <span> <strong>5/5 </strong>
                          </span>
                        </div>
                      </div>
                    </span>
                    <span>
                      <strong> User Rating</strong>
                      <div class="course-list-info__rating">
                        <div class="rating-star">
                          <div class="rating-label" style="width: 100%"></div>
                          <span> <strong>5/5 </strong>(22 votes) </span>
                        </div>
                      </div>
                    </span>
                  </div>
                  <div class="course-list-info__description">
                    <div class="school-type">
                      <span><strong>Ownership:</strong> Private</span>
                      <span><strong>Boad: </strong>CBSE</span>
                      <span><strong>Grade:</strong> KG - 12 </span>
                      <span><strong>Medium: </strong>English</span>
                      <span><strong>Category:</strong> Co-ed </span>
                      <span><strong>School Type:</strong> Day </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="course-list-info__action">
                <button class="btn btn-primary btn-hover-secondary">
                  Admission Enquiry
                </button>
                <a href="https://api.whatsapp.com/send?phone=8100416842&text=Hi"
                  class="btn-light btn btn-hover-primary"><i class="fab fa-whatsapp"></i>
                  Chat With Us
                </a>
                <button class="btn-light btn btn-hover-primary">
                  School Details
                </button>
              </div>
              <p class="expert-review">
                <span>Expert review:</span>
                Science, Technology, Engineering, and Mathematics (STEM) — and therefore, STEM education — is the process
                of
                teaching that integrates these four disciplines to promote real-world experience, teamwork, and the
                authentic application of technology. Additionally, it also promotes discovery...
              </p>
            </div>
          </div>
          <!-- Course List End -->
          <div class="summarise-segment white-bg">
            <h2 class="tutor-course-segment__title">Conclusion</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis est inventore nulla hic voluptate
              saepe, repudiandae molestiae placeat quidem, ipsum mollitia repellat eveniet, libero eligendi dolor eaque.
              Doloribus vel iusto nostrum provident commodi, possimus vitae consequuntur numquam mollitia maiores ipsa
              veritatis, quasi fugiat assumenda? Error iste porro, ad nisi similique autem harum excepturi vitae ipsa
              corrupti modi incidunt, reiciendis voluptate quo dolor! Ipsam illo odio quo quae molestias quisquam non
              provident. Nostrum fugiat fuga cum nobis excepturi repellat quos exercitationem fugit. Maiores dolorum sunt
              facere sit, aliquid obcaecati illo neque quisquam itaque? Sit blanditiis ipsa voluptatem magni dolor
              officiis officia itaque labore, iusto repellat similique quo nostrum cum aliquam porro fugiat recusandae,
              impedit unde temporibus earum reprehenderit quibusdam sequi sapiente at! Qui aliquam tempore vel.
            </p>
            {{-- <h3 class="tutor-course-segment__title">
              CBSE Schools in Kolkata Overview
            </h3>
            <div class="tutor-course-segment__content-wrap">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Accusamus voluptatum sit temporibus eveniet at nulla
                consequatur natus sed unde quisquam ab ratione blanditiis
                corrupti labore quos, velit quibusdam quaerat tempore
                distinctio reiciendis iure. Id, rem! Eligendi velit incidunt
                veniam doloremque laudantium, dolorum nesciunt veritatis
                amet, maiores at possimus vitae! Dolores.
              </p>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Voluptate dolorem quo enim minus ipsam, incidunt tenetur
                quod eaque cupiditate in. Pariatur laboriosam illum
                perferendis quasi, corrupti similique sint molestiae odio
                natus iusto, deleniti fuga suscipit!
              </p>
            </div> --}}
          </div>
          <div class="segment-overview">
            <div class="white-bg">
              <h3 class="tutor-course-segment__title">
                List of Top CBSE Schools in Kolkata
              </h3>
              <div class="dashboard-table table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="sl-no">Sl. No.</th>
                      <th class="school">School Name</th>
                      <th class="school course-list-info__rating">Rating</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="dashboard-table__mobile-heading">
                          Sl. No.:
                        </div>
                        <span class="">1</span>
                      </td>
                      <td>
                        <div class="dashboard-table__mobile-heading">
                          School Name:
                        </div>
                        <span class=""> Stem World School </span>
                      </td>
                      <td>
                        <div class="dashboard-table__mobile-heading">
                          Rating:
                        </div>
                        <span style="padding-left: 10px;" class="school-rating school-rating-table">
                          <div class="course-list-info__rating">
                            <div class="rating-star">
                              <div class="rating-label" style="width: 100%">
                              </div> <span> <strong>5/5 </strong> </span>
                            </div>
                          </div>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="dashboard-table__mobile-heading">
                          Sl. No.:
                        </div>
                        <span class="">2</span>
                      </td>
                      <td>
                        <div class="dashboard-table__mobile-heading">
                          School Name:
                        </div>
                        <span class=""> Douglas Memorial Higher Secondary School </span>
                      </td>
                      <td>
                        <div class="dashboard-table__mobile-heading">
                          Rating:
                        </div>
                        <span style="padding-left: 10px;" class="school-rating school-rating-table">
                          <div class="course-list-info__rating">
                            <div class="rating-star">
                              <div class="rating-label" style="width: 100%"></div>
                              <span> <strong>5/5 </strong> </span>
                            </div>
                          </div>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="faq white-bg">
              <div class="tutor-course-segment">
                <h2 class="tutor-course-segment__title">FAQs on CBSE Schools in Kolkata</h2>
                <div class="course-curriculum accordion">
                  @foreach ($faqs as $index => $faq)
                    <div class="accordion-item">
                      <h3>
                        <a class="accordion-button collapsed" data-bs-toggle="collapse"
                          data-bs-target="#collapse{{ $index }}" aria-expanded="false">
                          {{ $faq['question'] }}
                          <span>
                            <i class="tutor-icon"></i>
                          </span>
                        </a>
                      </h3>
                      <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionCourse">
                        <div class="course-curriculum__lessons">
                          <div class="course-curriculum__lesson">
                            <span class="course-curriculum__title">
                              {{ $faq['answer'] }}
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- Course List Start -->
        </div>
        <div class="col-lg-3">
          <!-- Tutor Course Sidebar Start -->
          <div class="sidebar-widget">
            <form id="RequestCallbackForm" class="setting-form">
              <h2 style="font-size: 1.25rem;">Admission Enquiry</h2>
              <input type="hidden">
              <div class="countdown-register__form">
                <div class="countdown-register__input">
                  <i class="far fa-user"></i>
                  <input class="form-control" name="name" type="text" placeholder="Full Name" required="">
                  <p id="nameError" class="error-message" style="display: none;"></p>
                </div>
                <div class="countdown-register__input">
                  <span display="flex">
                    <i style="position: static; margin-right: 5px;" class="far fa-phone"></i>
                    +91 -
                  </span>
                  <input style="padding-left: 80px; " class="form-control" name="phone" type="text"
                    required="">
                  <p id="phoneError" class="error-message" style="display: none;"></p>
                </div>
                <div class="countdown-register__btn">
                  <button id="submitButton" class="btn btn-primary btn-hover-secondary w-100">Request Callback</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button id="backBtn" class="back-to-top backBtn">
    <i class="arrow-top fal fa-long-arrow-up"></i>
    <i class="arrow-bottom fal fa-long-arrow-up"></i>
  </button>
  <!--Back To End-->
@endsection
@push('js')
@endpush
