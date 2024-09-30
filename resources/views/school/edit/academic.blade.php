@extends('layouts.school.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
        <!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Academic Performance</li>
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
                                <h5 class="card-title">Academic Performance</h5>
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
                                <form action="{{ route('school.academic.update') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                   <input type="hidden" name="id" value="{{ $id }}">
                                        <div class="form-group col-md-4">
                                                <label for="inputCity">Academic Year</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                           <strong> {{ $academics1?->academic_year }} </strong>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <strong>{{ $academics2?->academic_year }} </strong>
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">No. of students appeared</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                         <input type="text" class="form-control" name="student_appear1" id="inputAddress" value="{{$academics1?->student_appear}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                         <input type="text" class="form-control" name="student_appear2" id="inputAddress" value="{{$academics2?->student_appear}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">No. of students Passed</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="student_passed1" id="inputAddress" value="{{$academics1?->student_passed}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="student_passed2" id="inputAddress" value="{{$academics2?->student_passed}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 95%</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_nine_five1" id="inputAddress" value="{{$academics1?->abv_nine_five}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_nine_five2" id="inputAddress" value="{{$academics2?->abv_nine_five}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 90%</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_ninty1" id="inputAddress" value="{{$academics1?->abv_ninty}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_ninty2" id="inputAddress" value="{{$academics2?->abv_ninty}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 80%</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_eighty1" id="inputAddress" value="{{$academics1?->abv_eighty}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_eighty2" id="inputAddress" value="{{$academics2?->abv_eighty}}">
                                        </div>
                                    
                                   </div>
                                    <div class="form-row">
                                        <div class="col-md-8">
                                           <button type="submit" class="btn btn-primary">Update</button>
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