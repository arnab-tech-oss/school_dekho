@extends('layouts.frontend.app')
@push('css')
@endpush
@section('content')
<main class="main-wrapper " ">
    <div class=" page-banner bg-color-05" style="margin-top: 150.641px;">
    <div class="page-banner__wrapper" style="margin-top: 150.641px;">
        <div class="container">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-main.html">Home</a></li>
                    <li class="breadcrumb-item active">Executive Counselling</li>
                </ul>
            </div>
            <div class="page-banner__caption text-center">
                <h2 style="text-align:left  ;" class="page-banner__main-title">Request for Executive Counselling
                </h2>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div style="display: flex">
            <div class="comment-form  p-5">
                {{-- <h2 style="    font-size: 32px;" class="course-list-info__title pb-5"><a
                        href="course-single-layout-01.html">Application form</a></h2> --}}
                <form action="#">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">First name</label>
                                <input class="form-control" type="text">
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Last name</label>
                                <input class="form-control" type="text">
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Phone Number</label>
                                <input class="form-control" type="text">
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Email Id</label>
                                <input class="form-control" type="email">
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Previous counsellor name</label>
                                <select class="form-control">
                                    <option value="N/A">Select</option>
                                    <option value="Trisha">Trisha</option>
                                    <option value="Suchismita">Suchismita</option>
                                    <option value="Madhumita">Madhumita</option>
                                    <option value="Palabi">Palabi</option>
                                </select>
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Prefered Date </label>
                                <input class="form-control" type="date">
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Account Account details Start -->
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Prefered Time Frame</label>
                                <select class="form-control">
                                    <option value="N/A">Select</option>
                                    <option value="10am - 12pm">10am - 12pm</option>
                                    <option value="12pm - 2pm ">12pm - 2pm</option>
                                    <option value="2pm - 4pm">2pm - 4pm</option>
                                </select>
                            </div>
                            <!-- Account Account details End -->
                        </div>
                        <div class="col-md-12">
                            <div class="comment-form__input">
                                <button class="btn btn-primary btn-hover-secondary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button class="back-to-top backBtn" id="backBtn" style="display: none;">
        <i class="arrow-top fal fa-long-arrow-up"></i>
        <i class="arrow-bottom fal fa-long-arrow-up"></i>
    </button>
</main>
@endsection
@push('js')
@endpush