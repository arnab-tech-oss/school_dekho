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
                        <li><a href="{{ route('schooladmin.about_new.edit', $school_fees_structure->school_id) }}">About</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.principal_new.edit', $school_fees_structure->school_id) }}">Principal</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.contact_new.edit', $school_fees_structure->school_id) }}">Contacts</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.eligibility_new.edit', $school_fees_structure->school_id) }}">Eligibility</a>
                        </li>
                        <li><a class="active" href="#">Fees Structure</a></li>
                        <li><a href="{{ route('schooladmin.opening_hour_new.edit', $school_fees_structure->school_id) }}">Opening
                                Hours</a></li>
                        <li><a
                                href="{{ route('schooladmin.facilities_new.edit', $school_fees_structure->school_id) }}">Facilities</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.gallery_new.edit', $school_fees_structure->school_id) }}">Gallery</a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <form action="{{ route('schooladmin.fees_new.update') }}" method="POST">
                    <div class="row gy-6">
                        <div class="col-lg-6">
                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">
                                <h4 class="dashboard-content-box__title">Admission Fees</h4>
                                <p>Provide valid details below to update your fees structure for different classes.</p>
                                <input type="hidden" name="id" value="{{$school_fees_structure->school_id}}">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->pre_nursery)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Pre Nursery</label>
                                            <input type="text" class="form-control" name="class_prenursery_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->nursery)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Nursery</label>
                                            <input type="text" class="form-control" name="class_nursery_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->lkg)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">LKG</label>
                                            <input type="text" class="form-control" name="class_lkg_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->ukg)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">UKG</label>
                                            <input type="text" class="form-control" name="class_ukg_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->kg)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">KG</label>
                                            <input type="text" class="form-control" name="class_kg_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <hr style="opacity: .1;">
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_one)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class I</label>
                                            <input type="text" class="form-control" name="class_one_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_two)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class II</label>
                                            <input type="text" class="form-control" name="class_two_admission" value="{{ $x[0]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_three)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class III</label>
                                            <input type="text" class="form-control" name="class_three_admission" value="{{ $x[0]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_four)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class IV</label>
                                            <input type="text" class="form-control" name="class_four_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_five)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class V</label>
                                            <input type="text" class="form-control" name="class_five_admission" value="{{ $x[0]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_six)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VI</label>
                                            <input type="text" class="form-control" name="class_six_admission" value="{{ $x[0]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_seven)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VII</label>
                                            <input type="text" class="form-control" name="class_seven_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_eight)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VIII</label>
                                            <input type="text" class="form-control" name="class_eight_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_nine)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class IX</label>
                                            <input type="text" class="form-control" name="class_nine_admission" value="{{ $x[0]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_ten)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class X</label>
                                            <input type="text" class="form-control" name="class_ten_admission" value="{{ $x[0]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_eleven)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class XI</label>
                                            <input type="text" class="form-control" name="class_eleven_admission" value="{{ $x[0]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_twelve)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class XII</label>
                                            <input type="text" class="form-control" name="class_twelve_admission" value="{{ $x[0]}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dashboard Settings Info End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">
                                <h4 class="dashboard-content-box__title">Annual Fees</h4>
                                <p>Provide valid details below to update your fees structure for different classes.</p>
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->pre_nursery)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Pre Nursery</label>
                                            <input type="text" class="form-control" name="class_prenursery_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->nursery)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Nursery</label>
                                            <input type="text" class="form-control" name="class_nursery_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->lkg)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">LKG</label>
                                            <input type="text" class="form-control" name="class_lkg_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->ukg)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">UKG</label>
                                            <input type="text" class="form-control" name="class_ukg_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->kg)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">KG</label>
                                            <input type="text" class="form-control" name="class_kg_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <hr style="opacity: .1;">
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_one)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class I</label>
                                            <input type="text" class="form-control" name="class_one_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_two)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class II</label>
                                            <input type="text" class="form-control" name="class_two_annual" value="{{ $x[1]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_three)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class III</label>
                                            <input type="text" class="form-control" name="class_three_annual" value="{{ $x[1]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_four)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class IV</label>
                                            <input type="text" class="form-control" name="class_four_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_five)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class V</label>
                                            <input type="text" class="form-control" name="class_five_annual" value="{{ $x[1]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_six)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VI</label>
                                            <input type="text" class="form-control" name="class_six_annual" value="{{ $x[1]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_seven)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VII</label>
                                            <input type="text" class="form-control" name="class_seven_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_eight)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class VIII</label>
                                            <input type="text" class="form-control" name="class_eight_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_nine)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class IX</label>
                                            <input type="text" class="form-control" name="class_nine_annual" value="{{ $x[1]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_ten)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class X</label>
                                            <input type="text" class="form-control" name="class_ten_annual" value="{{ $x[1]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Account Account details Start -->
                                        @php
                                            $x = explode(',',$school_fees_structure->class_eleven)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class XI</label>
                                            <input type="text" class="form-control" name="class_eleven_annual" value="{{ $x[1]}}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $x = explode(',',$school_fees_structure->class_twelve)
                                        @endphp
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Class XII</label>
                                            <input type="text" class="form-control" name="class_twelve_annual" value="{{ $x[1]}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dashboard Settings Info End -->
                        </div>
                    </div>
                    <div class="page-pagination">
                        <ul class="pagination justify-content-center">
                            <div>
                                <div>
                                    <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                </div>
                            </div>
                        </ul>
                    </div>
                </form>
            </div>
            <!-- Dashboard Settings End -->
        </div>
    </div>
@endsection
@push('js')
@endpush
