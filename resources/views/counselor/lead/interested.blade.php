@extends('layouts.counselor.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List of Interested Blogs</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Interested Lead List</li>
                    </ol>
                </div>
            </div>
            {{--  --}}

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
                <h5 class="card-title">All Leads</h5>
            </div>
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Interested for</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interested_leads as $counselor_leads)
                                @if (isset($counselor_leads))
                                    <tr>
                                        <td>{{ $counselor_leads?->name }}</td>
                                        <td>{{ $counselor_leads?->location }}</td>
                                        <td>{{ $counselor_leads?->admission_for }}</td>
                                        @if ($counselor_leads?->status == '3')
                                            <td style="color:orange">No Response</td>
                                        @elseif($counselor_leads?->status == '2')
                                            <td style="color:red">Not Interested</td>
                                        @elseif ($counselor_leads?->status == '1')
                                            <td style="color:green">Interested</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('counselor.lead.details', [$counselor_leads?->id, $counselor_leads?->id]) }}"
                                                class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endif
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
