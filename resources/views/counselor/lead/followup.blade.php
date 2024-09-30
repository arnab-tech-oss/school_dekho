@extends('layouts.counselor.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List of followup leads</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Followup Lead List</li>
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
                <h5 class="card-title">Old Leads</h5>
                <form action="{{ route('counselor.lead.search') }}" method="get">
                    <div style="display:flex">
                        <div>
                            <input type="text" name="lead_name" class="form-control" placeholder="Enter name for search">
                        </div>
                        <div style="padding-left: 20px;">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>
                    </div>
                </form>
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
                            @foreach ($leads_followups as $counselor_leads)
                                <tr>
                                    <td>{{ $counselor_leads?->lead?->name }}</td>
                                    <td>{{ $counselor_leads?->lead?->location }}</td>
                                    <td>{{ $counselor_leads?->lead?->admission_for }}</td>
                                    @if ($counselor_leads->lead->status == '3')
                                        <td style="color:orange">No Response</td>
                                    @elseif($counselor_leads?->lead?->status == '2')
                                        <td style="color:red">Not Interested</td>
                                    @elseif ($counselor_leads?->lead?->status == '1')
                                        <td style="color:green">Interested</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('counselor.lead.details', [$counselor_leads?->lead?->id, $counselor_leads?->id]) }}"
                                            class="btn btn-primary">View</a>
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
