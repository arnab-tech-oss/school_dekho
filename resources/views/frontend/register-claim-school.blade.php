@extends('layouts.frontend.app')
@section('canonical')
  <link rel="canonical" href="{{ url()->current() }}" />
@endsection
@push('css')
@endpush
@push('meta')
  <meta name="title" content="School Registration | School Dekho">

  <meta name="description"
    content="Join our school directory with a simple registration form. Enroll effortlessly and be part of School Dekho's community.">
@endpush
@section('content')
  <div class="custom-container container  h-margin  aos-init aos-animate">
    <div style="padding-top: 110px;" class="modal-header">
      <h4 class="about-section-title__sub-title">Be a part of school dekho</h4>
      <h1 class="modal-title">Claim Your School</h1>
    </div>
    <div class="">
      <form id="RegisterYourSchool" class="adpost-form" method="POST" action="{{ route('school.claimquery.register.submit') }}">
        @csrf
        <!-- School Information Section -->
        <div class="adpost-card pt-5">
          <div class="adpost-title">
            <h3 class="sidebar-widget-02__title ">School Information</h3>
          </div>
          <div class="row mb-4">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="school_name">School Name</label>
                <div class="input-with-error">
                    <style>
                        .disable_field{
                            pointer-events: none;
                            background-color: grey;
                        }
                    </style>
                  <input id="school_name" class="form-control disable_field" name="school_name" type="text"
                    placeholder="Type your School Name here" value="{{ $school_details->name }}" readonly>
                  <p id="school_name-error" class="error-message" style="display: none;">Please enter the
                    School Name.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="location">Address of the School</label>
                <div class="input-with-error">
                  <textarea id="location" style=" height: 52px;   padding: 13px  20px 3px 20px;" class="form-control disable_field" readonly name="location"
                    type="text" placeholder="Type School Address here" >{{$school_details->school_address[0]->address}}</textarea>
                  <p id="location-error" class="error-message" style="display: none;">Please enter the Address.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="officialContactNumber">Official Contact Number</label>
                <div class="input-with-error">
                  <input id="officialContactNumber" class="form-control" name="official_contact" type="number"
                    placeholder="Official contact number" required>
                  <p id="officialContactNumber-error" class="error-message" style="display: none;">Please enter
                    the Official Contact Number.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="officialEmail">Official Email Id</label>
                <div class="input-with-error">
                  <input id="officialEmail" class="form-control" name="official_email" type="email"
                    placeholder="Official Email ID" required>
                  <p id="officialEmail-error" class="error-message" style="display: none;">Please enter a valid
                    Official Email ID.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Contact Information Section -->
        <div class="adpost-card pt-5">
          <div class="adpost-title">
            <h3 class="sidebar-widget-02__title">Contact Information</h3>
          </div>
          <div class="row mb-4">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="contactPerson">Name</label>
                <div class="input-with-error">
                  <input id="contactPerson" class="form-control" name="contact_person" type="text"
                    placeholder="Your Name" required>
                  <p id="contactPerson-error" class="error-message" style="display: none;">Please enter the
                    Contact Person Name.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="designation">Designation</label>
                <div class="input-with-error">
                  <input id="designation" class="form-control" name="designation" type="text"
                    placeholder="Your Designation" required>
                  <p id="designation-error" class="error-message" style="display: none;">Please enter the
                    Designation.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="Mobile_number">Mobile Number</label>
                <div class="input-with-error">
                  <input id="Mobile_number" class="form-control" name="contact_number" type="number"
                    placeholder="Your Number" required>
                  <p id="Mobile_number-error" class="error-message" style="display: none;">Please enter the
                    Contact Number.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label" for="emailId">Email Id</label>
                <div class="input-with-error">
                  <input id="emailId" class="form-control" name="email_id" type="email" placeholder="Your Email"
                    required>
                  <p id="emailId-error" class="error-message" style="display: none;">Please enter a valid Email
                    ID.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Terms and Conditions Section -->
        <div class="adpost-card pb-2">
          <div class="form-check">
            <input id="T&C" type="checkbox">
            <label for="T&C">By clicking checkbox, I accept the <a href="/terms">Terms & Conditions</a>
              and
              <a href="/privacy"> Privacy Policy</a> of School Dekho.</label>
            <div class="input-with-error">
              <p id="T&C-error" class="error-message" style="display: none;">Please accept the Terms and
                Conditions.</p>
            </div>
          </div>
          <div class="form-group mt-3 text-right">
            <button class="header-user__signup btn btn-primary btn-hover-primary">Submit</button>
          </div>
        </div>
      </form>
      
    </div>
  </div>
  <!-- Modal Content End -->
@endsection
@push('js')
@endpush
