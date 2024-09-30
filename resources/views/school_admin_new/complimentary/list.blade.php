@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
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
          <form method="GET" action="{{ route('schooladmin.complimentary.list') }}">
            <div class="row gy-4">
              <div class="col-lg-6">
                <div class="dashboard-content__input">
                  <label class="form-label-02">Select Month</label>
                  <select class="form-select" name="month">
                    <option value="">Select Month</option>
                    @foreach ($months as $key => $value)
                      <option value="{{ $key }}" @if (request()->get('month') == $key && request()->get('month') != null) selected @endif>
                        {{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xxl-2 col-lg-3 col-sm-6 d-flex">
                <div style="margin-top: auto;" class="dashboard-content__input">
                  <div class="dashboard-announcement-add__btn">
                    <button name="select_month" type="submit" class="btn btn-secondary btn-hover-secondary">View
                      Events</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Dashboard Announcement Box End -->
        <!-- Dashboard Question & Answer Start -->
        <div class="dashboard-question-answer">
          <div class="dashboard-table table-responsive">
            <table id="school-table" class="table">
              <thead>
                <tr>
                  <th class="question">ID #</th>
                  <th class="student">Event Name</th>
                  <th class="student">Date of Event</th>
                  <th class="student">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($events as $event)
                  <tr>
                    <td>
                      <div class="dashboard-table__mobile-heading">Sl. No.</div>
                      <div class="dashboard-table__text">
                        {{ $loop->iteration }}
                      </div>
                    </td>
                    <td>
                      <div class="dashboard-table__questioner-info">
                        <div class="questioner-info">
                          <h5 class="questioner-name">
                          </h5>
                          <span class="question-post-date small">{{ $event->event_title }}</span>
                          </span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="dashboard-table__questioner-info">
                        <div class="questioner-info">
                          <h5 class="questioner-name">
                          </h5>
                          <span
                            class="question-post-date small">{{ Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</span>
                          </span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="dashboard-table__text">
                        <a class="action" href="{{ route('schooladmin.complimentary.event.pictures', $event->id) }}"><i
                            class="far fa-eye"></i> <span class="text">Open</span>
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
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
