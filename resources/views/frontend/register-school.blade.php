@extends('layouts.frontend.app')
@section('canonical')
    <link rel="canonical" href="{{url()->current()}}" />
    <meta name="title" content="Add Your School for Free Listing at School Dekho">
    <meta name="description"
        content="List your school for free on School Dekho! Enhance visibility, attract more students, and join our trusted educational platform today">
@endsection
@push('css')
@endpush
@section('content')
    <div class="custom-container container  h-margin  aos-init aos-animate">
        <div style="padding-top: 110px;" class="modal-header">
            <h4 class="about-section-title__sub-title">Be a part of school dekho</h4>
            <h1 class="modal-title">Add Your School For Free!</h1>
        </div>
        <div class="">
            <form id="RegisterYourSchool" class="adpost-form" method="POST"
                action="{{ route('school.claimquery.submit') }}">
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
                                    <input id="school_name" class="form-control" name="school_name" type="text"
                                        placeholder="Type your School Name here" required>
                                    <p id="school_name-error" class="error-message" style="display: none;">Please enter the
                                        School Name.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="location">Address of the School</label>
                                <div class="input-with-error">
                                    <textarea id="location" style=" height: 52px;   padding: 13px  20px 3px 20px;" class="form-control" name="location"
                                        type="text" placeholder="Type School Address here" required></textarea>
                                    <p id="location-error" class="error-message" style="display: none;">Please enter the
                                        Address.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="officialContactNumber">Official Contact Number</label>
                                <div class="input-with-error">
                                    <input id="officialContactNumber" class="form-control" name="official_contact"
                                        type="number" placeholder="Official contact number" required>
                                    <p id="officialContactNumber-error" class="error-message" style="display: none;">Please
                                        enter
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
                                    <p id="officialEmail-error" class="error-message" style="display: none;">Please enter a
                                        valid
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
                                    <p id="contactPerson-error" class="error-message" style="display: none;">Please enter
                                        the
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
                                    <p id="designation-error" class="error-message" style="display: none;">Please enter
                                        the
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
                                    <p id="Mobile_number-error" class="error-message" style="display: none;">Please enter
                                        the
                                        Contact Number.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="emailId">Email Id</label>
                                <div class="input-with-error">
                                    <input id="emailId" class="form-control" name="email_id" type="email"
                                        placeholder="Your Email" required>
                                    <p id="emailId-error" class="error-message" style="display: none;">Please enter a
                                        valid Email
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
            {{-- <script>
              document.addEventListener('DOMContentLoaded', function() {
                var form = document.getElementById('RegisterYourSchool');
                form.addEventListener('submit', function(event) {
                  if (!validateForm()) {
                    event.preventDefault();
                  }
                });
                function validateForm() {
                  var fieldsToValidate = [{
                      name: 'school_name',
                      message: 'Please enter the School Name.'
                    },
                    {
                      name: 'location',
                      message: 'Please enter the Address.'
                    },
                    {
                      name: 'official_contact',
                      message: 'Please enter the Official Contact Number.'
                    },
                    {
                      name: 'official_email',
                      message: 'Please enter a valid Official Email ID.',
                      type: 'email'
                    },
                    {
                      name: 'contact_person',
                      message: 'Please enter the Contact Person Name.'
                    },
                    {
                      name: 'designation',
                      message: 'Please enter the Designation.'
                    },
                    {
                      name: 'contact_number',
                      message: 'Please enter the Contact Number.'
                    },
                    {
                      name: 'email_id',
                      message: 'Please enter a valid Email ID.',
                      type: 'email'
                    },
                    {
                      name: 'T&C',
                      message: 'Please accept the Terms and Conditions.',
                      type: 'checkbox'
                    }
                  ];
                  var isValid = true;
                  fieldsToValidate.forEach(function(field) {
                    var element = form.querySelector('[name="' + field.name + '"]');
                    var value = element.type === 'checkbox' ? element.checked : element.value.trim();
                    var errorContainer = document.getElementById(field.name + '-error');
                    if (field.type === 'checkbox' && !value) {
                      showError(errorContainer, field.message);
                      isValid = false;
                    } else if (field.type === 'email' && !isValidEmail(value)) {
                      showError(errorContainer, field.message);
                      isValid = false;
                    } else if (!value) {
                      showError(errorContainer, field.message);
                      isValid = false;
                    } else {
                      hideError(errorContainer);
                    }
                  });
                  return isValid;
                }
                function isValidEmail(email) {
                  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                  return emailRegex.test(email);
                }
                function showError(element, message) {
                  if (element) {
                    element.textContent = message;
                    element.style.display = 'block';
                  }
                }
                function hideError(element) {
                  if (element) {
                    element.textContent = '';
                    element.style.display = 'none';
                  }
                }
              });
            </script> --}}
        </div>
    </div>
    <!-- Modal Content End -->
@endsection
@push('js')
@endpush
