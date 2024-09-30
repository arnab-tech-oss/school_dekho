@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List Tickets</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">List Ticket</li>
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
                <h5 class="card-title">All Tickets</h5>
            </div>
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name of the claimer</th>
                                <th>Date of Issue</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_tickets as $ticket)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ticket->school_admin->name }}</td>
                                    <td>{{ $ticket->created_at->format('d-M-Y') }}</td>
                                    <td>
                                        @if ($ticket->status)
                                            <a href="" class="btn btn-success">Solved</a>
                                        @else
                                            <a href="" class="btn btn-warning">Under Process</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ticket.details', [$ticket->id]) }}" target="_blank"
                                            class="btn btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $all_tickets->render('pagination::bootstrap-4') }}
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
