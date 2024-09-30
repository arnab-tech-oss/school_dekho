@extends('layouts.frontend.app')
@push('css')
@endpush
@section('content')
    <style>
        .section-padding-02 {
            margin-top: 0 !important;
        }
        .h-margin {
            margin-top: 65px;
        }
    </style>
  <div class="container">
    <div class=" ">
            <!-- Modal Wrapper Start -->
            <div style="padding-top: 100px ">
                <!-- Modal Content Start -->
                <div class="">
                    <div class="mb-5">
                        <h5 class="section-title__title-03">Be a Part of School Dekho</h5>
                    </div>
                    <div class="modal-body">
                        <form class="adpost-form" method="POST" action="{{ route('school.claimquery.submit') }}">
                            @csrf
                            <div class="adpost-card">
                                <div class="adpost-title">
                                    <!-- <h3></h3> -->
                                    <h3 class="sidebar-widget-02__title">School Information</h3>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">School Name</label>
                                            <input type="text" class="form-control"
                                                placeholder="Type your School Name here" name="school_name"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Address of the School</label>
                                            <input type="text" class="form-control"
                                                placeholder="Type School Address here" name="location"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Official Contact Number</label>
                                            <input type="number" class="form-control"
                                                placeholder="Official contact number" name="official_contact"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Official Email Id</label>
                                            <input type="email" class="form-control"
                                                placeholder="Official Email ID" name="officila_email" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="adpost-card">
                                <div class="adpost-title">
                                    <h3 class="sidebar-widget-02__title">Contact Information</h3>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" placeholder="Your Name"
                                                name="contact_person" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" placeholder="Your Designation"
                                                name="designation" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="number" class="form-control" placeholder="Your Number"
                                                name="contact_number" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Email Id</label>
                                            <input type="email" class="form-control" placeholder="Your Email"
                                                name="email_id" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="adpost-card pb-2">
                                <div class="form-check">
                                    <input type="checkbox" id="T&C">
                                    <label for="T&C">By clicking checkbox, I accept the Terms &amp; Conditions and
                                        Privacy Policy of
                                        School Dekho.</label>
                                </div>
                                <div class="form-group text-right mt-3">
                                    <button
                                        class="header-user__signup btn btn-primary btn-hover-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Content End -->
            </div>
            <!-- Modal Wrapper End -->
        </div>
        <!-- Modal Wrapper End -->
  </div>
@endsection
@push('js')
@endpush
