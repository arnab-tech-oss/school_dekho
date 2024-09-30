@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
  <style>
    .template-gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      grid-gap: 20px;
    }

    .action {
      display: inline-block;
      border: 1px solid #eee;
      background-color: #fff;
      border-radius: 4px;
      padding: 2px 16px;
      font-size: 13px;
      font-weight: 500;
      line-height: 26px;
      color: #7e7e7e;
    }

    .dashboard-table__text .action:hover {
      background-color: #0071dc;
      border-color: #0071dc;
      color: #FFFFFF;
    }

    .open_tab {
      display: none;
      position: absolute;
      bottom: 6px;
      right: 6px;
    }

    .image-wrapper {
      display: flex;
      justify-content: center;
      margin-inline: auto;
      max-height: 250px;
    }

    .image-wrapper img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      object-position: center;
      border-radius: 3px;
      border: var(--bs-light);
    }
  </style>
  <div class="dashboard-content">
    <div class="container">
      <h4 class="dashboard-title">Complimentary Service</h4>
      <!-- Dashboard Tabs Start -->
      <!-- Dashboard Tabs End -->
      <!-- Dashboard Announcement Start -->
      <div class="dashboard-announcement">
        <!-- Dashboard Announcement Box Start -->
        <!-- Dashboard Announcement Box End -->
        <!-- Dashboard Announcement Box Start -->
        <div class="dashboard-content-box">
          <form method="GET" action="{{ route('schooladmin.leads.filter') }}">
            <div class="row gy-4">
              <div class="col-lg-6">
                <div class="dashboard-content__input">
                  <label class="form-label-02">Select School To Use the following templates</label>
                  @foreach ($schools as $school)
                    <select id="select_school_id" class="form-select" name="school_id">
                      <option value="">Select School</option>
                      <option value="{{ $school?->school?->id }}">{{ $school?->school?->name }}</option>
                    </select>
                  @endforeach
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Dashboard Announcement Box End -->
        <!-- Dashboard Question & Answer Start -->
        <div class="dashboard-question-answer">
          <div class="template-gallery">
            @foreach ($event_pictures as $picture)
              <div class="">
                <div style="position: relative">
                  <div class="image-wrapper">
                    <img src="{{ asset('storage/complimentary/' . $picture->image) }}" alt="">
                  </div>
                  <div class="open_tab" style="">
                    <a class="action" href="{{ route('schooladmin.complimentary.use.image', $picture->id) }}"
                      target="_blank"><i class="fad fa-edit"></i> <span class="text">Use this</span>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Dashboard Announcement End -->
    </div>
  </div>
  <div class="small text-black-50 pt-5 text-center">Copyright © <?php echo date('Y'); ?> School Dekho. All rights reserved.
  </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    // code to get all records from table via select box
    $("#select_school_id").change(function() {
      var school_id = $(this).find(":selected").val();
      if ($('div').hasClass('open_tab')) {
        // Show the div if it exists
        $('.open_tab').show();
      }
      $.ajax({
        type: "get",
        url: "{{ route('schooladmin.complimentary.school.selection', '') }}" + "/" + school_id,
        data: school_id,
        success: function() {
          console.log("success");
        }
      });
    })
  });
</script>
