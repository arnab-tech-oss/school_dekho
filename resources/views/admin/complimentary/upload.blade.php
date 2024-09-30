@extends('layouts.admin.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
  <style>
    .image-wrapper {
      position: relative;
    }

    .image-wrapper img {
      width: auto;
      height: 250px;
      object-fit: cover;
      border-radius: 0.25rem;
    }

    .image-wrapper button {
      all: unset;
      padding: 6px;
      position: absolute;
      bottom: 6px;
      right: 6px;
      cursor: pointer;
      background: rgba(0, 0, 0, 0.432);
      transition: all 0.3s;
      border-radius: 0.25rem;
    }

    .image-wrapper button:hover {
      background: black;
    }

    .image-wrapper button svg {
      width: 20px;
      height: 20px;
    }

    .form-row {
      margin-bottom: .5rem !important;
    }
  </style>
  <!-- Start Breadcrumbbar -->
  <div class="breadcrumbbar">
    <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
        <h4 class="page-title">Upload Complimentary Event</h4>
        <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Upload Complimentary Event</li>
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
        <h5 class="card-title">Upload Complimentary Event Pictures</h5>
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
        <div class="form-row">
          <div class="col-md-6">
            <strong>Event Title</strong>
            {{ $complimentary_details->event_title }}
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <strong>Month</strong>
            @foreach ($months as $key => $value)
              @if ($key == $complimentary_details->month)
                {{ $value }}
              @endif
            @endforeach
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <strong>Date</strong>
            {{ $complimentary_details->event_date }}
          </div>
        </div>
        @if (sizeof($complimentary_details->complimentary_image) > 0)
          <div class="form-row">
            <div class="col">
              <strong>Pictures</strong>
              <div style="display: flex;  flex-wrap: wrap; align-items: center; gap: 20px ; margin-top: 20px">
                @foreach ($complimentary_details->complimentary_image as $image)
                  <div class="image-wrapper" style="">
                    <img src="{{ asset('storage/complimentary/' . $image->image) }}" alt="">
                    <button onclick="deleteImage('{{ $image->id }}')"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                        y="0px" viewBox="0 0 128 128" style="fill:#FFFFFF;">
                        <path
                          d="M 49 1 C 47.34 1 46 2.34 46 4 C 46 5.66 47.34 7 49 7 L 79 7 C 80.66 7 82 5.66 82 4 C 82 2.34 80.66 1 79 1 L 49 1 z M 24 15 C 16.83 15 11 20.83 11 28 C 11 35.17 16.83 41 24 41 L 101 41 L 101 104 C 101 113.37 93.37 121 84 121 L 44 121 C 34.63 121 27 113.37 27 104 L 27 52 C 27 50.34 25.66 49 24 49 C 22.34 49 21 50.34 21 52 L 21 104 C 21 116.68 31.32 127 44 127 L 84 127 C 96.68 127 107 116.68 107 104 L 107 40.640625 C 112.72 39.280625 117 34.14 117 28 C 117 20.83 111.17 15 104 15 L 24 15 z M 24 21 L 104 21 C 107.86 21 111 24.14 111 28 C 111 31.86 107.86 35 104 35 L 24 35 C 20.14 35 17 31.86 17 28 C 17 24.14 20.14 21 24 21 z M 50 55 C 48.34 55 47 56.34 47 58 L 47 104 C 47 105.66 48.34 107 50 107 C 51.66 107 53 105.66 53 104 L 53 58 C 53 56.34 51.66 55 50 55 z M 78 55 C 76.34 55 75 56.34 75 58 L 75 104 C 75 105.66 76.34 107 78 107 C 79.66 107 81 105.66 81 104 L 81 58 C 81 56.34 79.66 55 78 55 z">
                        </path>
                      </svg></button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endif
        <form style="gap: 20px" class="d-flex flex-column" action="{{ route('admin.complimentary.upload.submit') }}"
          method="post" enctype="multipart/form-data">
          @csrf
          <div> <input type="hidden" name="id" value="{{ $complimentary_details->id }}"></div>
          <div> <input id="" type="file" name="image"></div>
          <div> <button type="submit" class="btn btn-primary">Upload Complimentary Picture</button></div>
        </form>
      </div>
    </div>
    {{-- </div> --}}
  </div>
  <script>
    function deleteImage(id) {
      console.log(id);
      $.ajax({
        url: "{{ route('admin.complimentary.delete.image', '') }}" + "/" + id,
        type: "GET",
        success: function(data) {
          alert("Image Deleted");
          window.history.go(0);
        }
      })
    }
  </script>
  <!-- End Container -->
@endsection
@push('js')
@endpush
