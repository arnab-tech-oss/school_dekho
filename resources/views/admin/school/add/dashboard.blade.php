@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add School</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Add School Dashboard</li>
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
                <h5 class="card-title">Add New School Dashboard</h5>
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
                <form action="{{ route('admin.school.submit.dashboard') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Select School</label>
                            <select class="form-control example" name="school_id">
                                <option value=""> --Select School-- </option>
                                @foreach ($all_schools as $school)
                                    @if (isset($school->school_address[0]?->address))
                                        <option value="{{ $school->id }}">
                                            {{ $school->name }}&nbsp;{{ $school->school_address[0]?->address }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Claimer Name">Claimer Name</label>

                            <input class="form-control" type="text" name="name" id=""
                                placeholder="Enter name of the claimer">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="Claimer Name">Phone Number</label>

                            <input class="form-control" type="text" name="phone" id=""
                                placeholder="Enter phone number of claimer" required>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Email Address</label>
                            <input type="email" class="form-control" name="email" id="inputAddress"
                                placeholder="Enter Email address" required>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Password</label>
                            <input type="password" class="form-control" name="password" id="inputAddress"
                                placeholder="Enter password">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Designation of claimer</label>
                        <input type="text" class="form-control" name="claimer_designation" id="inputAddress"
                            placeholder="Enter claimer's Designation">

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Amount Paid</label>

                            <input type="text" name="amount" placeholder="Enter amount" class="form-control">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Enter Expiry Date</label>

                            <input type="date" name="validation_date" class="form-control">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Dashboard</button>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>

    <!-- End Container -->

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.example').select2();
        });
    </script>
@endpush
