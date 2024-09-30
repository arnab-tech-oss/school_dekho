@extends('layouts.frontend.app')
@section('canonical')
  <link rel="canonical" href="https://www.schooldekho.org/faq"/>
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
	</style>
	<div class="tutor-course-main-content section-padding-01 sticky-parent">
		<div class="custom-container container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Tutor Course Main Segment Start -->
					<div class="tutor-course-main-segment">
						<!-- Tutor Course Segment Start -->
						<div class="tutor-course-segment">
							<div
								style="
                      transform: translate3d(0px, 0px, 0px);
                      transform-style: preserve-3d;
                      backface-visibility: hidden;
                      position: relative;
                      display: block;
                      left: 0px;
                      top: 0px;
                    ">
								<!-- Page Breadcrumb Start -->
								<div class="page-breadcrumb">
									<div class="container" style="padding-left: unset">
										<ul class="breadcrumb">
											<li class="breadcrumb-item"><a href="index-main.html">Home</a>
											</li>
											<li class="breadcrumb-item active">FAQ</li>
										</ul>
									</div>
								</div>
								<!-- Page Breadcrumb End -->
								<!-- Instructor Banner Start -->
								<div class="instructor-banner">
									<div class="custom-container container" style="padding-left: unset">
										<div class="row align-items-end align-items-xl-center">
											<div class="col-lg-6">
												<!-- Instructor Banner Start -->
												<div class="instructor-banner__content aos-init aos-animate"
													data-aos="fade-up" data-aos-duration="1000">
													<!-- Section Title Start -->
													<div class="section-title">
														<h2 class="section-title__title-03">Frequently Asked Questions
														</h2>
													</div>
													<!-- Section Title End -->
												</div>
												<!-- Instructor Banner End -->
											</div>
										</div>
									</div>
								</div>
								<!-- Instructor Banner End -->
							</div>
						</div>
						<!-- Tutor Course Segment End -->
						<!-- Tutor Course Segment Start -->
						<div class="tutor-course-segment"></div>
						<!-- Tutor Course Segment End -->
						<!-- Tutor Course Segment Start -->
						<div class="tutor-course-segment">
							<!-- <P>Added Soon</P> -->
							<div class="course-curriculum accordion">
              @php
              $accordionItems = [
              ['title' => 'What Is School Dekho?', 'content' => '<p style="text-align: justify"> School Dekho is an
                online platform that helps parents and students find the best schools for their educational needs. It
                provides detailed information about schools, including their infrastructure, faculty, courses offered,
                fees, admission process, and other relevant details. </p>'],
              ['title' => 'Is School Dekho A Free Service?', 'content' => '<p style="text-align: justify"> Yes, School
                Dekho is completely free to use. You can search for schools, compare them, and get all the information
                you need without any charges.</p>'],
              ['title' => 'How Can I Find Schools On School Dekho?', 'content' => '<p style="text-align: justify"> You
                can use the search bar on the homepage to look for schools based on location, board, or other criteria.
                You can also use the filters to narrow down your search and find schools that meet your specific
                requirements. </p>'],
              ['title' => ' Can I Apply To Schools Through School Dekho?', 'content' => '<p style="text-align: justify">
                No, School Dekho does not offer application services. However, it provides all the information you need
                to make an informed decision about which schools to apply to. </p>'],
              ['title' => 'Can I Get Help With The Admission Process Through School Dekho?', 'content' => '<p
                style="text-align:justify;"> Yes, School Dekho provides guidance and support for the admission process.
                You can get in touch with their experts for advice on filling out applications, preparing for
                interviews, and other related queries. </p>'],
              ['title' => 'Is School Dekho Only For Indian Schools?', 'content' => ' <p style="text-align:justify;">
                Yes, School Dekho is primarily focused on schools in India. You can find information about schools in
                all major cities and towns across the country. </p>'],
              ['title' => 'Can I Review Schools On School Dekho?', 'content' => '<p style="text-align:justify;"> Yes,
                you can leave reviews and ratings for schools on School Dekho. This can help other parents and students
                make informed decisions about which schools to consider. </p>'],
              ['title' => 'How Accurate Is The Information On School Dekho?', 'content' => '<p
                style="text-align:justify;"> School Dekho makes every effort to ensure that the information provided on
                its platform is accurate and up-to-date. However, it is important to note that some details, such as
                fees and admission criteria, may change over time. It is always a good idea to verify the information
                with the school directly before making any decisions. </p>'],
              ];
              @endphp
              @foreach ($accordionItems as $index => $item)
              @php
              $collapseId = 'collapse' . $index;
              $accordionClass = 'accordion-item';
              if ($index === 0) {
              $accordionClass .= ' active';
              }
              @endphp
              <div class="{{ $accordionClass }}">
                <button class="accordion-button{{ $index === 0 ? ' ' : ' collapsed' }}" data-bs-toggle="collapse"
                  data-bs-target="#{{ $collapseId }}">
                  <i class="tutor-icon"></i>
                  {{ $item['title'] }}
                </button>
                <div class="accordion-collapse collapse{{ $index === 0 ? ' show' : '' }}" id="{{ $collapseId }}"
                  data-bs-parent=".accordion">
                  <div class="course-curriculum__lessons">
                    <div class="course-curriculum__lesson">
                      {!! $item['content'] !!}
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div> 
						</div>
						<!-- Tutor Course Segment End -->
					</div>
					<!-- Tutor Course Main Segment End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Tutor Course Main content End -->
@endsection
@push('js')
@endpush
