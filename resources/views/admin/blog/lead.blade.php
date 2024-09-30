@extends('layouts.admin.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
  <!-- Start Breadcrumbbar -->
  <div class="breadcrumbbar">
    <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
        <h4 class="page-title">List Blogs</h4>
        <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">List Blog</li>
          </ol>
        </div>
      </div>
      <div class="col-md-4 col-lg-4">
        <div class="widgetbar">
          <a href="{{ route('admin.blog.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add
            Blog</a>
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
        <h5 class="card-title">All Blogs</h5>
      </div>
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
                <th>Blog Name</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_blog_leads as $lead)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $lead->name }}</td>
                  <td>{{ $lead->phone }}</td>
                  <td>{{ $lead->seeking_class }}</td>
                  <td>{{ $lead->blog->title }}</td>
                  <td>{{ App\Core\Helper::GetDate($lead->created_at) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $all_blog_leads->render('pagination::bootstrap-4') }}
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
