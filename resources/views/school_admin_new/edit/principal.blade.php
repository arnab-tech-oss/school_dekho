@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <style>
        .nav-tab {
            overflow-x: auto;
            display: flex;
            flex-wrap: nowrap !important;
        }

        .nav-tab li a {
            display: flex !important;
            flex-wrap: nowrap;
            white-space: nowrap;
        }
    </style>
    @if (!$school_exists)
        <script>
            alert("You are not authorized");
            window.location.reload(history.back());
        </script>
    @endif
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Update Details: <span
                    class="text-primary">{{ $school_principal_details->name }}</span></h4>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <!-- Dashboard Tabs Start -->
                <div class="dashboard-tabs-menu">
                    <ul class="nav-tab">
                        <li><a href="{{ route('schooladmin.about_new.edit', $school_principal_details->id) }}">About</a></li>
                        <li><a class="active" href="#">Principal</a></li>
                        <li><a
                                href="{{ route('schooladmin.contact_new.edit', $school_principal_details->id) }}">Contacts</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.eligibility_new.edit', $school_principal_details->id) }}">Eligibility</a>
                        </li>
                        <li><a href="{{ route('schooladmin.fees_new.edit', $school_principal_details->id) }}">Fees
                                Structure</a></li>
                        <li><a href="{{ route('schooladmin.opening_hour_new.edit', $school_principal_details->id) }}">Opening
                                Hours</a></li>
                        <li><a
                                href="{{ route('schooladmin.facilities_new.edit', $school_principal_details->id) }}">Facilities</a>
                        </li>
                        <li><a href="{{ route('schooladmin.gallery_new.edit', $school_principal_details->id) }}">Gallery</a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <form action="{{ route('schooladmin.principal_new.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="" type="hidden" name="school_id" value="{{ $school_principal_details->id }}">
                    <div class="row gy-6">
                        <div class="col">
                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">
                                <h4 class="dashboard-content-box__title">Principal Details</h4>
                                <p>Provide valid details below to update your principal profile</p>
                                <div class="row">
                                    <div class=col-md-9>
                                        <div class="row gy-4">
                                            <div class="col-md-12">
                                                <!-- Account Account details Start -->
                                                <div class="dashboard-content__input">
                                                    <label class="form-label-02">Name of the Principal</label>
                                                    <input name="principal_name" type="text" class="form-control"
                                                        value="{{ $school_principal_details->principal_name }}">
                                                </div>
                                                <!-- Account Account details End -->
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Account Account details Start -->
                                                <div class="dashboard-content__input">
                                                    <label class="form-label-02">From the Desk of The Principal</label>
                                                    <textarea name="principal_desk" class="form-control">{{ $school_principal_details->principal_desk }}</textarea>
                                                </div>
                                                <!-- Account Account details End -->
                                            </div>

                                            <div class="col-md-12">
                                                <!-- Account Account details Start -->
                                                <div class="dashboard-content__input">
                                                    <label class="form-label-02">Upload Principal Photo</label>
                                                    <input type="file" name="principal_pic" class="form-control" />
                                                </div>
                                                <!-- Account Account details End -->
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-3">-->
                                    <!--    <div class="col-md-12">-->
                                    <!--        <div id="dashboard-profile-cover-photo-editor"-->
                                    <!--            class="dashboard-settings-profile">-->
                                    <!--            <input name="principal_pic" id="dashboard-photo-dialogue-box"-->
                                    <!--                class="dashboard-settings-profile__input" type="file"-->
                                    <!--                accept=".png,.jpg,.jpeg" />-->

                                    <!--            <label class="form-label-02">Upload/Edit Picture</label>-->
                                    <!--            <div id="profile-photo"-->
                                    <!--                class="dashboard-settings-profile__photo_principal dashboard-settings-profile__photo"-->
                                    <!--                data-fallback="assets/images/avatar-placeholder.jpg"-->
                                    <!--                style="background-image:url(assets/images/avatar-placeholder.jpg)">-->
                                    <!--                <div class="overlay">-->
                                    <!--                    <i class="far fa-camera"></i>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--            <div id="profile-photo-option"-->
                                    <!--                class=" dashboard-settings-profile__photo-option dashboard-settings-profile__photo-option-principal">-->
                                    <!--                <span class="profile-photo-uploader"><i class="far fa-upload"></i>-->
                                    <!--                    Upload Photo</span>-->
                                    <!--                <span class="profile-photo-deleter"><i class="far fa-trash-alt"></i>-->
                                    <!--                    Delete</span>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                <div class="dashboard-announcement-add__btn mt-5">
                                    <div class="widget-filter__item">
                                        <label for="categories13">
                                            I agree to the terms & conditions for updating the school profile.
                                            <input type="checkbox" id="categories13">
                                        </label>
                                    </div>
                                    <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                </div>
                            </div>
                            <!-- Dashboard Settings Info End -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- Dashboard Settings End -->
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
