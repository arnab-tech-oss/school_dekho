@extends('layouts.lead.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Lead Add</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lead.counselor.list') }}">Lead</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                <h5 class="card-title">Edit Lead</h5>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success col-md-12">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('lead.lead.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ $lead_details->name }}">
                            <input type="hidden" value="{{ $lead_details->id }}" name="id">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="location" placeholder="Enter location"
                                value="{{ $lead_details->location }}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="pincode" placeholder="Enter pincode"
                                value="{{ $lead_details->pincode }}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ $lead_details->email }}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="board" placeholder="Enter board"
                                value="{{ $lead_details->board }}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="phone" placeholder="Enter phone"
                                value="{{ $lead_details->phone }}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="parent_name" placeholder="Enter parent name"
                                value="{{ $lead_details->parent_name }}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="admission_for"
                                placeholder="Enter Admission for" value="{{ $lead_details->admission_for }}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <textarea name="remarks" id="" cols="30" rows="10" placeholder="Enter remarks">{{ $lead_details->remarks }}</textarea>

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" name="action" class="btn btn-primary">Update Lead</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>
    <!-- End Container -->


@endsection

@push('js')
@endpush
