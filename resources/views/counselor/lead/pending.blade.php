@extends('layouts.counselor.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List of Pending leads</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Pending Lead List</li>
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
                            @foreach ($counselor_leads as $pending_lead)
                                <tr>
                                    <td>{{ $pending_lead?->lead?->name }}</td>
                                    <td>{{ $pending_lead?->lead?->location }}</td>
                                    <td>{{ $pending_lead?->lead?->admission_for }}</td>
                                    @if ($pending_lead?->lead?->status == '3')
                                    <td style="color: orange">No Response</td>
                                    @endif
                                    <td>
                                        @if (isset($pending_lead?->lead?->id) && $pending_lead?->id)
                                            <a href="{{ route('counselor.lead.details', [$pending_lead?->lead?->id, $pending_lead?->id]) }}"
                                                class="btn btn-primary">View</a>
                                            <a href="{{ route('counselor.lead.edit', [$pending_lead?->lead?->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $counselor_leads->render('pagination::bootstrap-4') }}
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
