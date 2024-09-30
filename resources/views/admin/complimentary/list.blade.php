@extends('layouts.admin.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
  <!-- Start Breadcrumbbar -->
  <div class="breadcrumbbar">
    <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
        <h4 class="page-title">List Blog Categories</h4>
        <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">List Complimentary Event</li>
          </ol>
        </div>
      </div>
      <div class="col-md-4 col-lg-4">
        <div class="widgetbar">
          <a href="{{ route('admin.complimentary.add') }}" class="btn btn-primary-rgba"><i
              class="feather icon-plus mr-2"></i>Add Complimentary Event</a>
        </div>
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
        <h5 class="card-title">All Blog Categories</h5>
      </div>
      <div class="card-body">
        {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
        <div class="table-responsive">
          <table id="datatable-buttons" class="table-bordered table">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Title</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_complementaries as $complementary)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $complementary->event_title }}</td>
                  <td>{{ Carbon\Carbon::parse($complementary->event_date)->format('d F Y') }}</td>
                  <td>
                    <div class="button-list">
                      <a href="{{ route('admin.complimentary.edit', $complementary->id) }}"
                        class="btn btn-primary-rgba"><i class="feather icon-edit"></i></a>
                      <a href="{{ route('admin.complimentary.upload', $complementary->id) }}"
                        class="btn btn-primary-rgba"><i class="feather icon-upload"></i></a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{-- </div> --}}
  </div>
  <!-- End col -->
  <!-- End row -->
  <!-- End Contentbar -->
@endsection
@push('js')
@endpush
