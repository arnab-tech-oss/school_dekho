@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
<style>
    .nav-tab {
        overflow-x: auto;
        display: flex ;
        flex-wrap: nowrap !important;
    }
    .nav-tab li a {
        display: flex !important ;
        flex-wrap: nowrap ;
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
                        <li><a
                                href="{{ route('schooladmin.about_new.edit', $school_eligibility_details->school_id) }}">About</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.principal_new.edit', $school_eligibility_details->school_id) }}">Principal</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.contact_new.edit', $school_eligibility_details->school_id) }}">Contacts</a>
                        </li>
                        <li><a class="active" href="#">Eligibility</a></li>
                        <li><a href="{{ route('schooladmin.fees_new.edit', $school_eligibility_details->school_id) }}">Fees
                                Structure</a></li>
                        <li><a
                                href="{{ route('schooladmin.opening_hour_new.edit', $school_eligibility_details->school_id) }}">Opening
                                Hours</a></li>
                        <li><a
                                href="{{ route('schooladmin.facilities_new.edit', $school_eligibility_details->school_id) }}">Facilities</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.gallery_new.edit', $school_eligibility_details->school_id) }}">Gallery</a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <form action="{{ route('schooladmin.eligibility_new.update')}}" method="POST">
                    <div class="row gy-6">
                        <div class="col-lg-10">
                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">
                                @csrf
                                <input type="hidden" name="id" value="{{$school_eligibility_details->school_id}}">
                                <h4 class="dashboard-content-box__title">Eligibility Details</h4>
                                <p>Provide valid details below to update your eligibility criteria for different classes.
                                </p>
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Pre Nursery</label>
                                            <input type="text" class="form-control" name="pre_nursery" value="{{$school_eligibility_details->pre_nursery}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Nursery</label>
                                            <input type="text" class="form-control" name="nursery" value="{{$school_eligibility_details->nursery}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">LKG</label>
                                            <input type="text" class="form-control" name="lkg" value="{{$school_eligibility_details->lkg}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">UKG</label>
                                            <input type="text" class="form-control" name="ukg" value="{{$school_eligibility_details->ukg}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">KG</label>
                                            <input type="text" class="form-control" name="kg" value="{{$school_eligibility_details->kg}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <hr style="opacity: .1;">
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class I</label>
                                            <input type="text" class="form-control" name="one" value="{{$school_eligibility_details->class_one}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class II</label>
                                            <input type="text" class="form-control" name="two" value="{{$school_eligibility_details->class_two}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class III</label>
                                            <input type="text" class="form-control" name="three" value="{{$school_eligibility_details->class_three}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class IV</label>
                                            <input type="text" class="form-control" name="four" value="{{$school_eligibility_details->class_four}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class V</label>
                                            <input type="text" class="form-control" name="five" value="{{$school_eligibility_details->class_five}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VI</label>
                                            <input type="text" class="form-control" name="six" value="{{$school_eligibility_details->class_six}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VII</label>
                                            <input type="text" class="form-control" name="seven" value="{{$school_eligibility_details->class_seven}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VIII</label>
                                            <input type="text" class="form-control" name="eight" value="{{$school_eligibility_details->class_eight}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class IX</label>
                                            <input type="text" class="form-control"  name="nine" value="{{$school_eligibility_details->class_nine}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class X</label>
                                            <input type="text" class="form-control" name="ten" value="{{$school_eligibility_details->class_ten}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class XI</label>
                                            <input type="text" class="form-control" name="eleven" value="{{$school_eligibility_details->class_eleven}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class XII</label>
                                            <input type="text" class="form-control" name="twelve" value="{{$school_eligibility_details->class_twelve}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-announcement-add__btn mt-5">
                                    <div class="widget-filter__item">
                                        <input type="checkbox" id="categories13" name="term">
                                        <label for="categories13">I agree to the <a href="#">terms & conditions</a>
                                            for updating the eligibility criteria.</label>
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
