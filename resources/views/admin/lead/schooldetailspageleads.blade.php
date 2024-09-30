@extends('layouts.admin.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
  <!-- Start Breadcrumbbar -->
  <div class="breadcrumbbar">
    <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
        <h4 class="page-title">List School Details Page Leads</h4>
        <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">List School Details Page Leads</li>
          </ol>
        </div>
      </div>
      <div class="col-md-4 col-lg-4">
        
      </div>
    </div>
  </div>
  <!-- End Breadcrumbbar -->
  <!-- Start Contentbar -->
  <!-- Start row -->
  <!-- Start col -->
  <!-- End col -->
  <!-- Start col -->
  <div class="contentbar">
    {{-- <div class="col-md-6"> --}}
    <div class="card m-b-10">
      <div class="card-header">
        <h5 class="card-title">All School Details Page Leads</h5>
      </div>
            @if (Session::has('message'))
        <div class="alert alert-danger col-md-12">
          {{ Session::get('message') }}
          @php
            Session::forget('message');
          @endphp
        </div>
      @endif
       <form method="POST" action="{{ route('admin.school.details.page.lead.export') }}">
        <div class="form-row" style="padding-left: 30px;">
          <div class="form-group col-md-3">
            <select id="" name="school_id" class="form-control example">
              <option value="">Select School</option>
              <option value="all">All School</option>
              @foreach ($all_schools as $school)
                @if (isset($school->school_address[0]?->address))
                  <option value="{{ $school->id }}">
                    {{ $school->name }}&nbsp;{{ $school->school_address[0]?->address }}
                  </option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-3">
            <input id="" type="date" name="start_date" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <input id="" type="date" name="end_date" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <button type="submit" class="btn btn-primary">Export</button>
          </div>
        </div>
      </form>
      <div class="card-body">
        {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
        <div class="table-responsive">
          <table id="datatable-buttons" class="table-bordered table">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Class</th>
                <th>School</th>
                <th>Address</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_school_details_page_leads as $lead)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $lead->name }}</td>
                  <td>{{ $lead->phone }}</td>
                  <td>{{ $lead->class_seeking }}</td>
                  <td>{{ $lead->school->name }}</td>
                  <td>{{ $lead->school->school_address[0]->address }}</td>
                  <td>{{ App\Core\Helper::GetDate($lead->created_at) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $all_school_details_page_leads->render('pagination::bootstrap-4') }}
      </div>
    </div>
    {{-- </div> --}}
  </div>
  <!-- End col -->
  <!-- End row -->
  <!-- End Contentbar -->
@endsection
@push('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.example').select2();
    });
  </script>
@endpush
