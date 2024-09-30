@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')

@endpush

@section('content')

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add Article Blog Writer</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Add Article Blog Writer</li>
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
                <h5 class="card-title">Add New Article Blog Writer</h5>
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
                <form action="{{ route('admin.article.writer.submit')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Writer Name</label>
                            <input type="text" class="form-control" name="writer_name" id="inputAddress" placeholder="Enter Article Blog Writer" value="">
                            @error('writer_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Writer About</label>
                            <input type="text" class="form-control" name="writer_about" id="inputAddress" placeholder="Enter Article Blog Writer About" value="">
                            @error('writer_about')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Social Media</label>
                            <input type="text" class="form-control" name="social_media" id="inputAddress" placeholder="Enter Social Media" value="">
                            @error('writer_about')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Writer description</label>
                            <textarea class="form-control" name="writer_description" id="" cols="30" rows="10"></textarea>
                            @error('writer_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Article Blog Writer</button>
                </form>
            </div>
        </div>
{{-- </div> --}}
    </div>

@endsection