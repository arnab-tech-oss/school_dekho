@extends('layouts.frontend.app')
<title>
    Interview Form | School Dekho
</title>

@push('css')
@endpush
@section('content')
<div class="page-banner bg-color-04">
    <div class="page-banner__wrapper">
        <div class="page-banner__shape-01"></div>
        <div class="page-banner__shape-02"></div>
        <div class="page-banner__shape-03"></div>
        <div class="container">
            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Interview Form</a></li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->
            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption-02">
                <h2 class="page-banner__main-title-02">Interview Form</h2>
            </div>
            <!-- Page Banner Caption End -->
        </div>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<div class="blog-section section-padding-01">
    <div class="custom-container container">
        <form id="form_id" action="{{ route('interview.showfrom.store') }}" method="POST">
            @csrf
            <input type="hidden" name="personal_details_id" value="{{ session('personal_details_id') }}">
            <div class="banner-big-box banner-bg-4 aos-init aos-animate" style="padding-inline: 40px" data-aos="fade-up" data-aos-duration="1000">

                <div class="banner-caption-03" style="max-width: unset;">
                    @foreach ($formSteps as $step => $fields)
                    <div data-form-step="{{ $step }}" class="row gy-4 {{ $step > 1 ? 'd-none' : '' }}">
                        <h3 class="banner-caption-03__title">{{ $stepTitles[$step] }}</h3>
                        @foreach ($fields as $field)
                        <div class="col-md-{{ $field['size'] }}">
                            <div class="comment-form__input">
                                <label class="form-label" for="{{ $field['id'] }}">{{ $field['label'] }}</label>
                                @if ($field['type'] === 'textarea')
                                <textarea class="form-control" id="{{ $field['id'] }}" name="{{ $field['id'] }}" placeholder="{{ $field['placeholder'] }}"></textarea>
                                @else
                                <input type="{{ $field['type'] }}" class="form-control" id="{{ $field['id'] }}" name="{{ $field['id'] }}" placeholder="{{ $field['placeholder'] }}">
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach

                    <div class="col-md-12 mt-3">
                        <div class="comment-form__input justify-content-between d-flex">
                            <button id="prev-btn" type="button" class="btn btn-white btn-hover-primary">Previous</button>
                            <button id="next-btn" type="button" class="btn btn-primary btn-hover-secondary">Next</button>
                            <button id="submit-btn" type="submit" class="btn btn-primary btn-hover-secondary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>

</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const steps = document.querySelectorAll('[data-form-step]');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');

        let currentStep = 1;

        function showStep(step) {
            steps.forEach((el) => {
                el.classList.add('d-none');
            });
            document.querySelector(`[data-form-step="${step}"]`).classList.remove('d-none');
        }

        function updateButtons() {
            if (currentStep === 1) {
                prevBtn.disabled = true;
            } else {
                prevBtn.disabled = false;
            }

            if (currentStep === steps.length) {
                nextBtn.disabled = true;
                nextBtn.classList.add('d-none');
                submitBtn.classList.remove('d-none');
            } else {
                nextBtn.disabled = false;
                submitBtn.classList.add('d-none');
            }
        }

        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                updateButtons();
            }
        });

        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentStep < steps.length) {
                currentStep++;
                showStep(currentStep);
                updateButtons();
            }
        });

        submitBtn.addEventListener('click', (event) => {
            event.preventDefault();
            alert('Form submitted');
            swal.fire({
                title: 'Success!',
                text: 'Form submitted successfully.',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(function() {
                document.getElementById('form_id').submit();
                window.location.href = "{{url ('/')}}"
            }, 3000);
        });

        showStep(currentStep);
        updateButtons();
    });
</script>
@endpush