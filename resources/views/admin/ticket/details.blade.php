@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <h4 class="page-title">School Details</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.ticket.list') }}">Tickets</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ticket Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Container -->
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Ticket details</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{ dd($lead) }} --}}
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>#Ticket ID</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ $ticket_details->id }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>School Admin</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ $ticket_details->school_admin->name }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Issue</label>
                    </div>
                    <div class="form-group col-md-9">
                        {{ $ticket_details->issue }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Problem Description</label>
                    </div>
                    <div class="form-group col-md-9">
                        {{ $ticket_details->description }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Image</label>
                    </div>
                    <div class="form-group col-md-9">
                        <img src="{{ $ticket_details->image }}" alt="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Status</label>
                    </div>
                    <div class="form-group col-md-9">
                        @if ($ticket_details->status == 1)
                            <a href="" class="btn btn-success">Solved</a>
                        @else
                            <a href="" class="btn btn-warning">Under Process</a>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    </div>
                    <div class="form-group col-md-9">
                        @if ($ticket_details->status == 0)
                            <a href="{{ route('admin.ticket.solve', [$ticket_details->id]) }}"
                                class="btn btn-success">Solve</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br>

    </div>

    </div>

    <!-- End Container -->

@endsection

@push('js')
@endpush
