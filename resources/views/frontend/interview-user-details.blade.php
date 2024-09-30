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
  

    <div class="blog-section section-padding-01">
        <div class="custom-container container">
        <form action="{{route ('interview.userdetails.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="banner-big-box banner-bg-4 aos-init aos-animate" style="padding-inline: 40px" data-aos="fade-up"
        data-aos-duration="1000">

        <div class="banner-caption-03" style="max-width: unset;">
            @foreach ($formSteps as $step => $fields)
                <div data-form-step="{{ $step }}" class="row gy-4 {{ $step > 1 ? 'd-none' : '' }}">
                    <h3 class="banner-caption-03__title">{{ $stepTitles[$step] }}</h3>
                    @foreach ($fields as $field)
                        <div class="col-md-{{ $field['size'] }}">
                            <div class="comment-form__input">
                                <label class="form-label" for="{{ $field['id'] }}">{{ $field['label'] }} </label>
                                @if ($field['type'] === 'textarea')
                                    <textarea class="form-control" id="{{ $field['id'] }}" name="{{ $field['id'] }}" placeholder="{{ $field['placeholder'] }}"></textarea>
                                    
                                @else
                                    <input type="{{ $field['type'] }}" class="form-control"
                                        id="{{ $field['id'] }}" name="{{ $field['id'] }}" placeholder="{{ $field['placeholder'] }}">
                                @endif

                                @error($field['id'])
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="col-md-12 mt-3">
                <div class="comment-form__input justify-content-between d-flex">
                    <button type="submit" id="submit-btn" class="btn btn-primary btn-hover-secondary">Submit & Next</button>
                </div>
            </div>
        </div>
    </div>
</form>


        </div>

    </div>
@endsection

@push('js')
@endpush
