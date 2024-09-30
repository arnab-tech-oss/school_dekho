@extends('layouts.student.app')

@section('title','Student Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Student</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
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
                <h5 class="card-title">Edit Student Details</h5>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-{{Session::get('message_type')}} col-md-12">
                {{ Session::get('message') }}
                @php
                Session::forget('message');
                @endphp
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('student.detail.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Student Name</label>
                            <input type="text" class="form-control" name="name" id="inputAddress" placeholder="Name of the student" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Upload Picture</label>
                            <input type="file" class="form-control" name="file" id="inputAddress"  value="">
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="form-group col-md-6">
                        <label for="inputAddress">Address Line -I</label>
                        <textarea class="form-control" id="inputAddress" name="adress_line_1" placeholder="Our School is.."></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress">Address Line -II</label>
                        <textarea class="form-control" id="inputAddress" name="adress_line_2" placeholder="Our School is.." ></textarea>
                      </div>
                    </div>
                  
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type">Available phone number</label>
                            <input type="text" class="form-control" name="phone" value=""/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
{{-- </div> --}}
    </div>

<!-- End Container -->


@endsection

@push('js')

@endpush