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
                        <li><a href="{{ route('schooladmin.about_new.edit', $school_contact_details->school_id) }}">About</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.principal_new.edit', $school_contact_details->school_id) }}">Principal</a>
                        </li>
                        <li><a class="active"
                                href="{{ route('schooladmin.eligibility_new.edit', $school_contact_details?->school_id) }}">Contacts</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.eligibility_new.edit', $school_contact_details?->school_id) }}">Eligibility</a>
                        </li>
                        <li><a href="{{ route('schooladmin.fees_new.edit', $school_contact_details->school_id) }}">Fees
                                Structure</a></li>
                        <li><a href="{{ route('schooladmin.opening_hour_new.edit', $school_contact_details->school_id) }}">Opening
                                Hours</a></li>
                        <li><a
                                href="{{ route('schooladmin.facilities_new.edit', $school_contact_details->school_id) }}">Facilities</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.gallery_new.edit', $school_contact_details->school_id) }}">Gallery</a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                {{-- <form action="#"> --}}
                    <div class="row gy-6">
                        <div class="col-lg-10">
                                <!-- Dashboard Settings Info Start -->
                                <div class="dashboard-content-box">
                                    <form action="{{ route('schooladmin.contact_new.update')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="school_id" value="{{$school_contact_details->school_id}}">
                                    <h4 class="dashboard-content-box__title">Conatct Information</h4>
                                    <p>Provide valid details below to update your school profile</p>
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <!-- Account Account details Start -->
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Street Address</label>
                                                <input type="text" class="form-control" name="address" value="{{$school_contact_details->address}}">
                                            </div>
                                            <!-- Account Account details End -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">State</label>
                                                <select class="form-select" id="inputState" name="state_id" required>
                                                    @foreach($allstates as $states)
                                                        <option value="{{$states?->id}}" @if ($states?->id == $school_contact_details?->state_id) selected @endif>{{$states?->state}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">District</label>
                                                <select class="form-select" name="district_id" required>
                                                    @foreach($alldistricts as $district)
                                                        <option value="{{$district?->id}}" @if($district?->id == $school_contact_details?->district_id) selected @endif>{{$district?->district}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">City</label>
                                                <input type="text" class="form-control" name="city" id="inputZip" placeholder="Enter City" value="{{$school_contact_details->city}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Pincode</label>
                                                <input type="text" class="form-control" name="pincode" value="{{$school_contact_details?->pincode}}">
                                            </div>
                                        </div>
                                        <hr style="opacity: .1;">
                                        {{-- <div class="col-md-4">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Fax</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Landline/Mobile</label>
                                                <input type="text" class="form-control" name="phone" value="{{$school_contact_details?->contact}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Alternative Contact</label>
                                                <input type="text" class="form-control" name="alt_phone" value="{{$school_contact_details?->alt_contact}}">
                                            </div>
                                        </div>
                                        <hr style="opacity: .1;">
                                        <div class="col-md-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Facebook Page</label>
                                                <input type="text" class="form-control" name="fb_link" value="{{$school_contact_details?->fb}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Instagram</label>
                                                <input type="text" class="form-control" name="insta_link" value="{{$school_contact_details?->insta}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Twitter</label>
                                                <input type="text" class="form-control" name="twitt_link" value="{{$school_contact_details?->twitter}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Linked In</label>
                                                <input type="text" class="form-control" name="linkedin" value="{{$school_contact_details?->linkedin}}">
                                            </div>
                                        </div>
                                        <hr style="opacity: .1;">
                                        <div class="col-md-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Lattitude</label>
                                                <input type="text" class="form-control" name="lat" value="{{$school_contact_details?->lattitude}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Longitude</label>
                                                <input type="text" class="form-control" name="long" value="{{$school_contact_details?->longitude}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-announcement-add__btn mt-5">
                                        <div class="widget-filter__item">
                                            <input type="checkbox" id="categories13" name="terms">
                                            <label for="categories13">I agree to the <a href="#">terms & conditions</a>
                                                for updating the school profile.</label>
                                        </div>
                                        <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                                    </div></form>
                                </div>
                                <!-- Dashboard Settings Info End -->
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
            <!-- Dashboard Settings End -->
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
