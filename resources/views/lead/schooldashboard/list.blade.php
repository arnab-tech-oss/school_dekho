@extends('layouts.lead.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List School Dashboards</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">List Dashboards</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">

        <div class="d-flex flex-wrap">
            @foreach ($school_dashboards as $school)
              @if (isset($school->school))
                <div class="card  mx-2 m-b-15" style="width: 45%">
                    <div class="card-body">
                        @if ($school->school?->school_logo)
                          <img src="{{ $school->school?->school_logo }}" height="200" width="200">
                        @endif
                        <h5 class="card-title font-18">{{ $school->school?->name }}</h5>
                        <div>
                            @if (isset($school->school?->school_address[0]))
                                <p class="card-text">{{ $school->school?->school_address[0]?->address }}
                                </p>
                                <p class="card-text">
                                    {{ $school->school?->school_address[0]?->pincode }}
                                </p>
                            @endif
                        </div>

                    </div>
                    <br>
                </div>
              @endif
            @endforeach
        </div>
        {{ $school_dashboards->appends($_GET)->render('pagination::bootstrap-4') }}

    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->

@endsection

@push('js')
@endpush
