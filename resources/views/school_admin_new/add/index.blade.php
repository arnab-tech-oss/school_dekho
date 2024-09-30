@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
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

        .circle span {
            display: flex;
            align-items: center;
            justify-items: center;
            font-size: 11px;
        }

        .circle span i {
            line-height: unset;
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
            content: "\f128";
            /* FontAwesome question icon */
        }
    </style>
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Add Details: </h4>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <!-- Dashboard Tabs Start -->
                <div>
                    <div>
                        <div id="multi-step-form-container">
                            <!-- Form Steps / Progress Bar -->
                            <ul class="form-stepper form-stepper dashboard-content-box mx-auto text-center">
                                <!-- Step 1 -->
                                <li class="form-stepper-active form-stepper-list text-center" step="1">
                                    <a class="mx-2">
                                        <span class="circle">
                                            <span><i class="fal "></i></span>
                                        </span>
                                        <div class="text">Basic Information</div>
                                    </a>
                                </li>
                                <!-- Step 2 -->
                                <li class="form-stepper-unfinished form-stepper-list text-center" step="2">
                                    <a class="mx-2">
                                        <span class="circle text-muted">
                                            <span><i class="far "></i></span>
                                        </span>
                                        <div class="text text-muted">Opening Hours</div>
                                    </a>
                                </li>
                                <!-- Step 3 -->
                                <li class="form-stepper-unfinished form-stepper-list text-center" step="3">
                                    <a class="mx-2">
                                        <span class="circle text-muted">
                                            <span><i class="far "></i></span>
                                        </span>
                                        <div class="text text-muted">Conatct Information</div>
                                    </a>
                                </li>
                                <li class="form-stepper-unfinished form-stepper-list text-center" step="4">
                                    <a class="mx-2">
                                        <span class="circle text-muted">
                                            <span><i class="far "></i></span>
                                        </span>
                                        <div class="text text-muted">Eligibility Details</div>
                                    </a>
                                </li>
                                <li class="form-stepper-unfinished form-stepper-list text-center" step="5">
                                    <a class="mx-2">
                                        <span class="circle text-muted">
                                            <span><i class="far "></i></span>
                                        </span>
                                        <div class="text text-muted">Admission Fees</div>
                                    </a>
                                </li>
                                <li class="form-stepper-unfinished form-stepper-list text-center" step="6">
                                    <a class="mx-2">
                                        <span class="circle text-muted">
                                            <span><i class="far "></i></span>
                                        </span>
                                        <div class="text text-muted">Gallery</div>
                                    </a>
                                </li>
                            </ul>
                            <!-- Step Wise Form Content -->
                            <div id="userAccountSetupForm">
                                <!-- Step 1 Content -->
                                <section id="step-1" class="form-step">
                                    <!-- Step 1 input fields -->
                                    <div class="mt-3">
                                        <div> @livewire('school-admin.info')</div>
                                    </div>
                                </section>
                                <!-- Step 2 Content, default hidden on page load. -->
                                <section id="step-2" class="form-step d-none">
                                    <!-- Step 2 input fields -->
                                    <div class="mt-3">
                                        <div> @livewire('school-admin.openinghour')</div>
                                    </div>
                                </section>
                                <!-- Step 3 Content, default hidden on page load. -->
                                <section id="step-3" class="form-step d-none">
                                    <!-- Step 3 input fields -->
                                    <div class="mt-3">
                                        @livewire('school-admin.contact')
                                    </div>
                                </section>
                                <section id="step-4" class="form-step d-none">
                                    <!-- Step 3 input fields -->
                                    <div class="mt-3">
                                        @livewire('school-admin.eligibility')
                                    </div>
                                </section>
                                <section id="step-5" class="form-step d-none">
                                    <!-- Step 3 input fields -->
                                    <div class="mt-3">
                                        @livewire('school-admin.feesstructure')
                                    </div>
                                </section>
                                <section id="step-6" class="form-step d-none">
                                    <!-- Step 3 input fields -->
                                    <div class="mt-3">
                                        @livewire('school-admin.gallery')
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Settings End -->
            </div>
            <script>
                /**
                 * 
                 * Define a function to navigate betweens form steps.
                 * It accepts one parameter. That is - step number.
                 */
                // if (element !== null && element.innerHTML !== null) {
                //   // Do something with the innerHTML
                //   console.log(element.innerHTML);
                // } else {
                //   console.log("Element or innerHTML is null.");
                // }
                const navigateToFormStep = (stepNumber) => {
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
                        navigateToFormStep(stepNumber);
                    });
                });
            </script>
        </div>
    @endsection
    {{-- </div> --}}
    <!-- Dashboard Content End -->
    @push('js')
        <script>
            $(document).ready(function() {
                // Loop through each li element
                $('ul.form-stepper li').each(function() {
                    var $span = $(this).find('.circle span'); // Find the span element within li
                    if ($(this).hasClass('form-stepper-completed')) {
                        $span.addClass('fal fa-check'); // Add fal and check icon classes
                    } else if ($(this).hasClass('form-stepper-active')) {
                        $span.addClass('fal fa-pencil'); // Add fal and pencil icon classes
                    } else if ($(this).hasClass('form-stepper-unfinished')) {
                        $span.addClass('fal fa-question'); // Add fal and question icon classes
                    }
                });
            });
        </script>
    @endpush
