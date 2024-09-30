@extends('layouts.frontend.app')
@push('css')
@endpush
<style>
  .error-message {
    margin-top: 4px;
    background-color: #ffe8e8;
    text-align: left;
    color: #ff5757;
    padding: 3px;
    border-radius: 5px;
    padding-left: 20px;
    font-size: 12px;
    transition: all 0.3s ease;
  }

  .countdown-register__input span {
    position: absolute;
    top: 15px;
    left: 15px;
    font-size: 14px;
    color: #666666;
    min-width: 20px;
  }

  @media only screen and (max-width: 991px) {
    .custom-css {
      flex-direction: column-reverse !important;
    }
</style>
@section('content')
  <div id="counselling" class="countdown-signup-section bg-color-02 section-padding-01 scene" style = "padding-top:130px;">
    <div class="container">
      <div class="row custom-css gy-10 align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-sm-10">
          <div class="countdown-widget" data-aos="fade-up" data-aos-duration="1000">
            <div class="countdown-title">
              <h2 class="countdown-title__title">Get in touch with our Expert
                <mark>Counsellors
                </mark>
              </h2>
              <p>Guaranteed call back within 24 hours from our expert counsellors.</p>
            </div>
            <div class="countdown-wrap">
              <div class="countdown-clock countdown" data-countdown="2023/04/29" data-format="short">
                <div class="countdown-item hours">
                  <span class="countdown-item__number hoursLeft"></span>
                  <span class="countdown-item__text hoursText"></span>
                </div>
                <div class="countdown-clock__divider"></div>
                <div class="countdown-item minutes">
                  <span class="countdown-item__number minsLeft"></span>
                  <span class="countdown-item__text minsText"></span>
                </div>
                <div class="countdown-clock__divider"></div>
                <div class="countdown-item seconds">
                  <span class="countdown-item__number secsLeft"></span>
                  <span class="countdown-item__text secsText"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-10">
          <div class="countdown-image scene text-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="countdown-image__image">
              <img src="{{ asset('assets/school/images/Somnath Sir.svg') }}" alt="resourse image" width="346">
            </div>
            <div class="countdown-image__shape-01" data-depth="0.8"></div>
            <div class="countdown-image__shape-02" data-depth="-0.8"></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-10">
          <div class="countdown-register text-center" data-aos="fade-up" data-aos-duration="1000">
            <h4 class="countdown-register__title">Request a Callback</h4>
            <form id="RequestCallbackForm" class="setting-form" method="POST"
              action="{{ route('front.counsellor.enquiry') }}">
              @csrf
              <div class="countdown-register__form">
                <div class="countdown-register__input">
                  <i class="far fa-user"></i>
                  <input class="form-control" name="name" type="text" placeholder="Full Name" required>
                  <p id="nameError" class="error-message"></p>
                </div>
                <div class="countdown-register__input">
                  <span display="flex">
                    <i style="position: static; margin-right: 5px;" class="far fa-phone"></i>
                    +91
                  </span>
                  <input style="padding-left: 67px; " class="form-control" name="phone" type="text" required>
                  <p id="phoneError" class="error-message"></p>
                </div>
                <div class="countdown-register__input">
                  <i class="far fa-map-marker-alt"></i>
                  <input class="form-control" name="pincode" type="text" placeholder="Pincode" required>
                  <p id="pincodeError" class="error-message"></p>
                </div>
                <div class="countdown-register__input">
                  <i class="edumi edumi-open-book"></i>
                  <select class="form-control" name="seeking_class" required>
                    <option value=" " disabled selected>Select a Class</option>
                    <option value="Nursery">Nursery </option>
                    <option value="LKG">LKG </option>
                    <option value="UKG">UKG </option>
                    <option value="Class 1">Class 1 </option>
                    <option value="Class 2">Class 2 </option>
                    <option value="Class 3">Class 3 </option>
                    <option value="Class 4">Class 4 </option>
                    <option value="Class 5">Class 5 </option>
                    <option value="Class 6">Class 6 </option>
                    <option value="Class 7">Class 7 </option>
                    <option value="Class 8">Class 8 </option>
                    <option value="Class 9">Class 9 </option>
                    <option value="Class 10">Class 10 </option>
                    <option value="Class 11">Class 11 </option>
                    <option value="Class 12">Class 12 </option>
                  </select>
                  <p id="seekingClassError" class="error-message"></p>
                </div>
                <div class="countdown-register__btn">
                  <button id="submitButton" class="btn btn-primary btn-hover-secondary w-100" disabled>Submit</button>
                </div>
              </div>
            </form>
            {{-- <p class="small pt-2">
              You are already the
              <span style="font-weight: 600; font-size: 12px"
                class="text-primary">{{ $total_number_rows + 2000 }}<sup>th</sup>
              </span>
              person <br>who will request a
              call
            </p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="countdown-signup-section__shape-01" data-depth="-0.4"></div>
    <div class="countdown-signup-section__shape-02" data-depth="0.5"></div>
    <div class="countdown-signup-section__shape-03" data-depth="-0.5"></div>
  </div>
  <style>
    .content-item {
      max-height: 190px;
      /* Set a maximum height for the content */
      overflow: hidden;
      /* Hide overflow content */
    }
  </style>
  <script>
    function toggleContent(link) {
      var content = link.previousElementSibling;
      if (content.style.maxHeight === "190px" || content.style.maxHeight === "") {
        content.style.maxHeight = "none";
        link.innerHTML = "Show Less";
      } else {
        content.style.maxHeight = "190px";
        link.innerHTML = "Show More...";
      }
    }
    window.addEventListener('DOMContentLoaded', function() {
      var targetedDiv = document.querySelectorAll(".content-item");
      var links = document.querySelectorAll(".showMoreLink");
      for (var i = 0; i < targetedDiv.length; i++) {
        if (targetedDiv[i].clientHeight >= 190) {
          links[i].style.display = "inline";
        } else {
          links[i].style.display = "none";
        }
      }
    });
  </script>
  <!-- Counter End -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('RequestCallbackForm');
      const nameInput = form.querySelector('input[name="name"]');
      const phoneInput = form.querySelector('input[name="phone"]');
      const pincodeInput = form.querySelector('input[name="pincode"]');
      const seekingClassSelect = form.querySelector('select[name="seeking_class"]');
      const submitButton = form.querySelector('#submitButton');
      const nameError = document.getElementById('nameError');
      const phoneError = document.getElementById('phoneError');
      const pincodeError = document.getElementById('pincodeError');
      const seekingClassError = document.getElementById('seekingClassError');
      // Define the list of allowed class values
      const allowedClasses = [
        " ",
        "Nursery",
        "LKG",
        "UKG",
        "Class 1",
        "Class 2",
        "Class 3",
        "Class 4",
        "Class 5",
        "Class 6",
        "Class 7",
        "Class 8",
        "Class 9",
        "Class 10",
        "Class 11",
        "Class 12"
      ];
      // Function to validate and show/hide error messages
      function checkForm() {
        const name = nameInput.value.trim();
        const phone = phoneInput.value.trim();
        const pincode = pincodeInput.value.trim();
        const seekingClass = seekingClassSelect.value;
        // Reset error messages
        nameError.textContent = '';
        phoneError.textContent = '';
        pincodeError.textContent = '';
        seekingClassError.textContent = '';
        if (name) {
          if (!isValidName(name)) {
            nameError.textContent = 'Invalid name format.';
          }
        }
        if (phone && !isValidPhoneNumber(phone)) {
          phoneError.textContent = 'Please enter 10 digits of your mobile number';
        }
        if (pincode) {
          if (!isValidPincode(pincode)) {
            pincodeError.textContent = 'Invallid pincode format.';
          }
        }
        if (!seekingClass || !allowedClasses.includes(seekingClass)) {
          seekingClassError.textContent = 'Please select a valid class.';
        }
        // Hide error message elements when there is no error
        nameError.style.display = nameError.textContent ? 'block' : 'none';
        phoneError.style.display = phoneError.textContent ? 'block' : 'none';
        pincodeError.style.display = pincodeError.textContent ? 'block' : 'none';
        seekingClassError.style.display = seekingClassError.textContent ? 'block' : 'none';
        // Enable or disable the submit button based on errors
        const hasErrors = !!nameError.textContent || !!phoneError.textContent || !!pincodeError.textContent || !!
          seekingClassError.textContent;
        submitButton.disabled = hasErrors;
      }
      // Function to check the validity of a name (you can customize this function)
      function isValidName(name) {
        return name.length >= 3; // Example: Require at least 3 characters
      }
      // Function to check if the phone number is valid
      function isValidPhoneNumber(phone) {
        return /^[6-9]\d{9}$/.test(phone); // Example: Requires +91 followed by 10 digits
      }
      // Function to check if the pin code has exactly six numbers
      function isValidPincode(pincode) {
        return /^\d{6}$/.test(pincode);
      }
      // Add event listeners to input fields and the select for input changes
      nameInput.addEventListener('input', checkForm);
      phoneInput.addEventListener('input', checkForm);
      pincodeInput.addEventListener('input', checkForm);
      seekingClassSelect.addEventListener('change', checkForm);
      // Initial check when the page loads
      checkForm();
      // Add an event listener to the form to handle submission (you can add your own logic here)
      form.addEventListener('submit', function(event) {});
    });
  </script>
@endsection
@push('js')
@endpush
