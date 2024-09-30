@extends('layouts.admin.app')

@section('title','Admin Dashboard')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.student.website.query') }}">Website Queries</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student Query Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Container -->
<div class="contentbar">
    
    <div class="card m-b-24">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Query details</h4>                    
                </div>
                <div class="col-md-4 col-lg-4 ">
                    <div class="widgetbar">

                    </div>
                </div>
            </div>
        </div>
    
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Student Name</label>                   
                </div>
                <div class="form-group col-md-9">
                    <p><strong>{{ $student_details?->name }}</strong>
                    </p>
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Student Contact</label>                   
                </div>
                <div class="form-group col-md-9">
                    <p><strong>{{ $student_details?->contact }}</strong>
                    </p>
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Student Pincode</label>                   
                </div>
                <div class="form-group col-md-9">
                    
                       <h5>{{ $student_details?->pincode }}</h5> 
                                         
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Student City</label>                   
                </div>
                <div class="form-group col-md-9">
                       <h5 class="text-success">{{ $student_details?->city}}</h5>                    
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Class Admission</label>                   
                </div>
                <div class="form-group col-md-9">
                       <h5 class="text-success">{{ $student_details?->class_admission}}</h5>                    
                </div>                
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Student's Remarks</label>                   
                </div>
                <div class="form-group col-md-9">
                       <h5 class="text-success">{{ $student_details?->remarks}}</h5>                    
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