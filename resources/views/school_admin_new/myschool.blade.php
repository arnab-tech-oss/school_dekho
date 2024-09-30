@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
<style>
  .status {
    padding: 3px 12px;
  }

  .status-Pending {
    background: orange;
    color: white;
    border-radius: 5px;
  }

  .status-Rejected {
    background: red;
    color: white;
    border-radius: 5px;
  }

  .status-Claimed {
    background: green;
    color: white;
    border-radius: 5px;
  }

  @media only screen and (max-width: 767px) {
    .custom-img {
      display: flex;
      max-width: 60px;
      max-height: 60px;
      height: auto;
      width: auto;
      margin-top: 25px
    }

    .dashboard-m {
      display: flex !important;
      flex-direction: row !important;
      gap: 12px;
    }

    .dashboard-courses__action {
      margin: 0px;
      gap: 5px;
    }

    .school-status {
      position: relative;
    }

    .school-status div {
      position: absolute;
      margin-left: -38px !important;
      margin-top: 32px;
      font-size: 10px !important;
    }
  }

  .school-status div {
    margin-left: 12px;
    font-size: 13px;
  }
</style>
@section('content')
  <div style="padding-top:44px;" class="container">
    <h4 class="dashboard-title">My Schools</h4>
    <!-- Dashboard My Courses Start -->
    <div class="dashboard-courses">
      <!-- Dashboard Course Item Start -->
      @foreach ($schoollist as $list)
        <div class="dashboard-courses__item dashboard-m">
          <div class="dashboard-courses__thumbnail custom-img">
            <img src="{{ $list->school?->school_logo }}" alt="Courses" width="260" height="174">
          </div>
          <div class="dashboard-courses__content">
            <h3 class="dashboard-courses__title d-flex school-status flex">{{ $list->school->name }}
              <div>
                @switch($list->verify)
                  @case('1')
                    <div class="status status-Pending">Pending</div>
                  @break

                  @case('2')
                    <div class="status status-Rejected">Rejected</div>
                  @break

                  @case('9')
                    <div class="status status-Claimed">Claimed</div>
                  @break
                @endswitch
              </div>
            </h3>
            <p style="    margin-bottom: 0;">{{ $list->school?->address?->address }}</p>
            <div class="dashboard-courses__rating">
              <div class="rating-star">
                <div class="rating-label" style="width:  {{ number_format($list->review, 2) * 20 }}%;">
                </div>
              </div>
            </div>
            <div style="margin-top:0 " class="dashboard-courses__footer">
              @if (sizeof($list->payments) != 0)
                <ul class="dashboard-courses__meta">
                  <li style="display: flex; gap: 4px ; flex-wrap: wrap;">
                    <div style=" display:flex; gap:5px"> <span class="meta-label pr-2">Subscription:
                      </span><span class="meta-value">
                        Premium</span></div>
                    <div style=" display:flex; gap:5px">
                      <span class="meta-label"> Valid upto:
                      </span><span class="meta-value pr-2">{{ App\Core\Helper::GetDate($list->expiry_date) }}</span>
                    </div>
                  </li>
                </ul>
              @endif
              <div style="margin-top:12px " class="col-12 dashboard-courses__action">
                @if ($list->verify == '9' && $list->expiry_date > date('Y-m-d'))
                  <a class="action" href="{{ route('schooladmin.application.form', [$list->school->id]) }}"><i
                      class="fal fa-pencil-alt"></i> Create Enquiry
                    Form</a>
                  <a class="action" href="{{ route('schooladmin.about_new.edit', $list->school->id) }}"><i
                      class="far fa-edit"></i>
                    Edit School</a>
                  <a class="action" {{-- href=" {{ route('schooladmin.about_new.edit', $list->school->id) }}" --}}><i class="far fa-cog"></i>
                    Manage school</a>
                  {{-- <a class="action" href="#"><i class="fal fa-clone"></i> Renew Subscription</a> --}}
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <!-- Dashboard My Courses End -->
    <div class="small text-black-50 pt-5 text-center">Copyright © <?php echo date('Y'); ?> School Dekho. All rights
      reserved.</div>
  </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
