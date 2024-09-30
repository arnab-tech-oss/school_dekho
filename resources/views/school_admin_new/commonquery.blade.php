@extends('layouts.schooladmin.app')

@section('title', 'School Dashboard')

@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <div class="dashboard-content">

        <div class="container">
            <h4 class="dashboard-title">FAQ</h4>
<p> Updating soon</p>
            {{-- <!-- Dashboard Info Start -->
            <div class="tutor-course-segment">

                <div class="tutor-course-segment__header">

                </div>

                <div class="course-curriculum accordion">

                    <div class="accordion-item">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne"> <i
                                class="tutor-icon"></i> Q1. Lorem ipsum dolor sit amet consectetur adipisicing elit?
                        </button>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionCourse">

                            <div class="course-curriculum__lessons">
                                <p style="padding: 30px; border-top: solid 2px #e9ecef;">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis soluta quas est
                                    tenetur commodi odit deleniti doloribus, maiores voluptas alias architecto rerum,
                                    voluptatem quo sed reprehenderit vel quis omnis consequuntur.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            <i class="tutor-icon"></i> Q2. Lorem ipsum dolor sit amet consectetur adipisicing elit?</button>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionCourse">

                            <div class="course-curriculum__lessons">
                                <p style="padding: 30px; border-top: solid 2px #e9ecef;">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis soluta quas est
                                    tenetur commodi odit deleniti doloribus, maiores voluptas alias architecto rerum,
                                    voluptatem quo sed reprehenderit vel quis omnis consequuntur.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree"> <i class="tutor-icon"></i> Q3. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit?</button>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionCourse">

                            <div class="course-curriculum__lessons">
                                <p style="padding: 30px; border-top: solid 2px #e9ecef;">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis soluta quas est
                                    tenetur commodi odit deleniti doloribus, maiores voluptas alias architecto rerum,
                                    voluptatem quo sed reprehenderit vel quis omnis consequuntur.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <!-- Dashboard Info End --> --}}

            <div class="small text-center text-black-50 pt-5">Copyright © <?php echo date('Y'); ?> School Dekho. All rights
                reserved.</div>
        </div>

    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->

@push('js')
@endpush
