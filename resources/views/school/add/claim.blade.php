@extends('layouts.school.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School Claim</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('school.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">claim</li>
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
                <h5 class="card-title"> School Claim Form</h5>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success col-md-12">
                {{ Session::get('success') }}
                @php
                Session::forget('success');
                @endphp
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('school.claim.submit') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" name="school_id" id="school_id" value="{{ $id }}">
                            <label for="inputAddress">Claimant Name</label>
                            <input type="text" class="form-control" name="name" id="inputAddress" placeholder="Enter Your neme" value="">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Designation</label>
                            <input type="text" class="form-control" name="designation"  placeholder="Enter Your designation" required>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Upload scan copy of School official PAD with official Stamp on it</label>
                        <input type="file" class="form-control" name="file"  required>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Official Phone no(will be verified)</label>
                            <input type="text" class="form-control" name="phone" id="inputAddress" placeholder="Summit School" value="">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Official Email address(will be verified)</label>
                            <input type="text" class="form-control" name="email"  required>

                        </div>

                    </div>

                    <div class="form-row">
                        {{-- <div class="col-md-8">
                            <button type="submit" name="action" value="previous" class="btn btn-primary">&laquo;Previous</button>
                        </div> --}}
                        <div class="col-md-4">
                            <button type="submit" name="action" value="next" class="btn btn-primary">Submit</button>
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