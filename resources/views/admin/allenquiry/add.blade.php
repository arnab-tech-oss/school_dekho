@extends('layouts.admin.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
  <!-- Start Breadcrumbbar -->
  <div class="breadcrumbbar">
    <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
        <h4 class="page-title">Add Complimentary Event</h4>
        <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Add Complimentary Event</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbbar -->
  <!-- Start Container -->
  <div class="contentbar">
    {{-- <div class="col-md-6"> --}}
    <div class="card m-b-10">
      <div class="card-header">
        <h5 class="card-title">Add New Complimentary Event</h5>
      </div>
      @if (Session::has('success'))
        <div class="alert alert-success col-md-12">
          {{ Session::get('success') }}
          @php
            Session::forget('success');
          @endphp
        </div>
      @endif
      @if (Session::has('failure'))
        <div class="alert alert-danger col-md-12">
          {{ Session::get('failure') }}
          @php
            Session::forget('failure');
          @endphp
        </div>
      @endif
      <div class="card-body">
        <form action="{{ route('admin.all.enquiry.manual.submit')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Parent Enquiries</label>
              <input id="inputAddress" type="text" class="form-control" name="total_parent_enquiry"
                placeholder="Enter parent enquiry" value="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Parent Counsell</label>
              <input id="inputAddress" type="text" class="form-control" name="total_parent_counselled"
                placeholder="Enter parent counsell" value="">
            </div>
          </div>
        
          <button type="submit" class="btn btn-primary">Add </button>
        </form>
      </div>
    </div>
    {{-- </div> --}}
  </div>
  <!-- End Container -->
@endsection
@push('js')
@endpush
