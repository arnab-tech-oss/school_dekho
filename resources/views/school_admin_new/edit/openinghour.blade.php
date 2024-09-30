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
    @if(!$school_exists)
    <script>
        alert("You are not authorized");
        window.location.reload(history.back());
    </script>
    @endif
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Update Details: <span class="text-primary">{{$school_details->name}}</span></h4>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <!-- Dashboard Tabs Start -->
                <div class="dashboard-tabs-menu">
                    <ul class="nav-tab">
                        <li><a href="{{ route('schooladmin.about_new.edit', $school_opening_hour->school_id) }}">About</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.principal_new.edit', $school_opening_hour->school_id) }}">Principal</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.contact_new.edit', $school_opening_hour->school_id) }}">Contacts</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.eligibility_new.edit', $school_opening_hour->school_id) }}">Eligibility</a>
                        </li>
                        <li><a href="{{ route('schooladmin.fees_new.edit', $school_opening_hour->school_id) }}">Fees
                                Structure</a></li>
                        <li><a class="active" href="#">Opening Hours</a></li>
                        <li><a
                                href="{{ route('schooladmin.facilities_new.edit', $school_opening_hour->school_id) }}">Facilities</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.gallery_new.edit', $school_opening_hour->school_id) }}">Gallery</a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <form action="{{ route('schooladmin.opening_hour_new.update') }}" method="post">
                    <div class="row gy-6">
                        <div class="col-lg-6">
                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">
                                @csrf
                                <input name="id" type="hidden" value="{{ $school_opening_hour->school_id }}">
                                <h4 class="dashboard-content-box__title">Opening Hours</h4>
                                <p>Provide valid details below to update your opening hours.</p>
                                <div class="row gy-4">
                                    <div class="col-md-3">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Monday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="mon_f" type="time"
                                                value="{{ $school_opening_hour->mon[0] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="mon_t" type="time"
                                                value="{{ $school_opening_hour->mon[1] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Tuesday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="tue_f" type="time"
                                                value="{{ $school_opening_hour->tue[0] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="tue_t" type="time"
                                                value="{{ $school_opening_hour->tue[1] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Wednesday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="wed_f" type="time"
                                                value="{{ $school_opening_hour->wed[0] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="wed_t" type="time"
                                                value="{{ $school_opening_hour->wed[1] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Thursday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="thu_f" type="time"
                                                value="{{ $school_opening_hour->thu[0] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="thu_t" type="time"
                                                value="{{ $school_opening_hour->thu[1] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Friday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="fri_f" type="time"
                                                value="{{ $school_opening_hour->fri[0] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="fri_t" type="time"
                                                value="{{ $school_opening_hour->fri[1] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Saturday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="sat_f" type="time"
                                                value="{{ $school_opening_hour->sat[0] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="sat_t" type="time"
                                                value="{{ $school_opening_hour->sat[1] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Sunday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="sun_f" type="time"
                                                value="{{ $school_opening_hour->sun[0] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <input class="form-control" name="sun_t" type="time"
                                                value="{{ $school_opening_hour->sun[1] }}">
                                        </div>
                                    </div>
                                    <div class="dashboard-announcement-add__btn mt-5">
                                        {{-- <div class="widget-filter__item">
                                            <input type="checkbox" id="categories13" >
                                            <label for="categories13">I agree to the <a href="#">terms &
                                                    conditions</a>
                                                for updating the opening hours.</label>
                                        </div> --}}
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
