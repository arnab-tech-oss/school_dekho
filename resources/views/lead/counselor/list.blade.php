@extends('layouts.lead.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List School</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">List Counselor</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('lead.counselor.add') }}" class="btn btn-primary-rgba"><i
                            class="feather icon-plus mr-2"></i>Add Counselor</a>
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
        {{-- <div class="col-md-6 col-lg-6 col-xl-4"> --}}
        <div class="d-flex flex-wrap">
            @foreach ($counselors as $counselor)
                <div class="card  mx-2 m-b-15" style="width: 45%">
                    <div class="card-body">
                        <h5 class="card-title font-18">{{ $counselor->name }}</h5>
                        <div style="display:flex;">
                           <p class="card-tet"><strong>Total Lead Assigned {{ sizeof($counselor->assign_leads) }}</strong></p>
                        </div>
                        <a href="{{ route('lead.counselor.details', [$counselor->id]) }}"
                            class="btn btn-primary">Details</a>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
        {{ $counselors->appends($_GET)->render('pagination::bootstrap-4') }}
        {{-- </div> --}}

        {{-- </div> --}}
    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->




@endsection

@push('js')
@endpush
