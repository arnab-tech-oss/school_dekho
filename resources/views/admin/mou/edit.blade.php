@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Update Mou</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Update mou</li>
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
                <h5 class="card-title">Update Mou </h5>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success col-md-12">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.mou.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $mou_school->id }}">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputAddress">School Name</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">{{ $mou_school->name }}</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Active</label>

                            <input type="checkbox" name="mou_active" @if ($mou_school->is_mou) checked @endif>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Update
                        Mou</button>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>

    <!-- End Container -->

@endsection

@push('js')
@endpush
