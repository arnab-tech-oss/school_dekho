@extends('layouts.frontend.app')
@push('css')
@endpush
@section('content')
  <style>
    .header-sticky,
    .footer-section {
      display: none !important;
    }

    .constom-grid {
      display: grid;
      grid-template-rows: 65px 1fr 50px;
      height: 100%;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 70px;
      height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: #0071dc;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #0071dc;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(36px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    .card {
      /* border: 1px solid black; */
      /* padding: 1rem; */
      display: flex;
      border: 1px solid #ededed;
      background-color: #FFFFFF;
      border-radius: 5px;
      /* flex-direction: row; */
      overflow: hidden;
      /* position: relative; */
      padding: 19px 20px;
      max-width: 924px;
    }
  </style>
  <div style="padding-top:44px;" class="constom-grid container">
    <h4 class="dashboard-title">My Schools</h4>
    <!-- Dashboard My Courses Start -->
    <div class="dashboard-courses">
      <!-- Dashboard Course Item Start -->
      <div class="card">
        <form ">
                  <div class="row justify-content-between d-flex align-items-center">
                    {{-- <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
            </div> --}}
                    <div class="col-md-6">
                      <label class="form-label">Select a school</label>
                      <div class="form-group">
                        <select class="form-control">
                          <option disabled selected>Select</option>
                          <option>School 1</option>
                          <option>School 2</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 justify-content-between d-flex align-items-center mt-5">
                      <label class="form-label">Admission <span id="toggleStatus"></span></label>
                      <div class="align-items-center d-flex">
                        <label class="switch">
                          <input id="toggleCheckbox" class="form-check-input" type="checkbox">
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-6 mt-5">
                      <label class="form-label">Admission Open for </label>
                      <div class="form-group">
                        <select class="form-control">
                          <option disabled selected>Year</option>
                          <option>2023-2024</option>
                          <option>2024-2025</option>
                          <option>2025-2026</option>
                          <option>2026-2027</option>
                          <option>2027-2028</option>
                        </select>
                      </div>
                    </div>
                    <div class="mt-5">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- Dashboard My Courses End -->
            <div class="small text-black-50 pt-5 text-center">Copyright © 2023 School Dekho. All rights
              reserved.</div>
          </div>
          <script>
            // Get the checkbox and span elements
            var checkbox = document.getElementById("toggleCheckbox");
            var toggleStatusSpan = document.getElementById("toggleStatus");
            // Add an event listener to the checkbox to detect changes
            checkbox.addEventListener("change", function() {
              // Update the content of the span based on the checkbox state
              toggleStatusSpan.textContent = checkbox.checked ? " Open " : "Close";
            });
            // Initialize the content of the span based on the initial state of the checkbox
            toggleStatusSpan.textContent = checkbox.checked ? "Open" : "Close";
          </script>
@endsection
@push('js')
@endpush
