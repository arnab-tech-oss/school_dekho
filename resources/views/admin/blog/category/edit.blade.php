@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Update Blog Category</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Update Blog Category</li>
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
                <h5 class="card-title">Update Blog Category</h5>
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
                <form action="{{ route('admin.blog.category.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Category Name</label>
                            <input type="text" class="form-control" name="name" id="inputAddress" placeholder="Enter Blog Category" value="{{$blogcategorydetails->name}}">
                            <input type="hidden" name="id" value="{{$blogcategorydetails->id}}">
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Active</label>
                        @if($blogcategorydetails->is_active)
                        <input type="checkbox" name="active" @if($blogcategorydetails->is_active) checked @endif>
                        @endif
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Update Blog Category</button>
                </form>
            </div>
        </div>
{{-- </div> --}}
    </div>

<!-- End Container -->


@endsection

@push('js')

@endpush