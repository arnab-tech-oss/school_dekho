@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">School Details</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.school.list') }}">Schools</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    @if (Auth::user()->role == 1)
                        @if ($schooldetails->is_complete == '1')
                            <a href="#" class="btn btn-primary-rgba"><i
                                    class="feather icon-check mr-2"></i>Complete</a>
                        @endif
                        @if ($schooldetails->status == '1')
                            <a href="{{ route('admin.school.approve', [$schooldetails->id, '0']) }}"
                                class="btn btn-primary-rgba"><i class="feather icon-check mr-2"></i>Approved</a>
                        @else
                            <a href="{{ route('admin.school.approve', [$schooldetails->id, '1']) }}"
                                class="btn btn-danger-rgba"><i class="feather icon-x mr-2"></i>Pending</a>
                        @endif
                    @else
                        @if ($schooldetails->is_complete == '0')
                            <a href="{{ route('admin.school.complete', [$schooldetails->id, '1']) }}"
                                class="btn btn-danger-rgba"><i class="feather icon-x mr-2"></i>Mark as Complete</a>
                        @else
                            <a href="{{ route('admin.school.complete', [$schooldetails->id, '0']) }}"
                                class="btn btn-primary-rgba"><i class="feather icon-check mr-2"></i>Completed</a>
                        @endif
                        @if ($schooldetails->status == '1')
                            <a href="#" class="btn btn-primary-rgba"><i
                                    class="feather icon-check mr-2"></i>Approved</a>
                        @else
                            <a href="#" class="btn btn-danger-rgba"><i class="feather icon-x mr-2"></i>Pending</a>
                        @endif
                    @endif

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
                        <h4 class="page-title">School</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">
                            <a href="{{ route('admin.school.info.edit', $schooldetails->id) }}"
                                class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label><strong>School Name</strong></label>
                        <p>
                            {{ $schooldetails?->name }}
                        </p>
                    </div>
                    <div class="form-froup col-md-3">
                        <img src="{{ $schooldetails->school_logo }}" height="100" width="100">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label><strong>About School</strong></label>
                        <p>
                            {{ $schooldetails?->about }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label><strong>Name of the principal</strong></label>
                        <p>
                            {{ $schooldetails?->principal_name }}
                        </p>
                    </div>
                    <div class="form-froup col-md-3">
                        <img src="{{ $schooldetails?->principal_pic }}" height="100" width="100">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><strong>Designation of principal</strong></label>
                        <p>
                            {{ $schooldetails?->principal_designation }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label><strong>Principal Message</strong></label>
                        <p>
                            {{ $schooldetails?->principal_desk }}
                        </p>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label><strong>Board Name</strong></label>
                        <p>{{ $schooldetails?->boards?->board_name }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><strong>School Category</strong></label>
                        <p>{{ $schooldetails->categories?->category }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label><strong>Medium</strong></label>
                        <p>{{ $schooldetails->medium?->medium }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><strong>School Type</strong></label>
                        <p>{{ $schooldetails->school_type }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label><strong>Registration Number</strong></label>
                        <p>{{ $schooldetails->registration_no }}</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">About School</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">
                            <a href="{{ route('admin.school.about.edit', $schooldetails?->id) }}"
                                class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">

                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress"><strong>Address Line</strong></label>

                        <p>
                            {{ $schoolcontact?->address }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>State</strong></label>
                        <p>
                            {{ $schoolcontact?->states?->state }}
                        </p>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>City</strong></label>
                        <p>
                            {{ $schoolcontact?->city }}
                        </p>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>Lattitude</strong></label>
                        <p>
                            {{ $schoolcontact?->lattitude }}
                        </p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>Longitude</strong></label>
                        <p>
                            {{ $schoolcontact?->longitude }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>District</strong></label>
                        <p>
                            {{ $schoolcontact?->districts?->district }}
                        </p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>Pincode</strong></label>
                        <p>
                            {{ $schoolcontact?->pincode }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>Email</strong></label>
                        <p>
                            {{ $schoolcontact?->email }}
                        </p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>Phone</strong></label>
                        <p>
                            {{ $schoolcontact?->contact }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress"><strong>Facebook Link</strong></label>
                        <p>{{ $schoolcontact?->fb }}</p>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress"><strong>Instagram Link</strong></label>
                        <p>{{ $schoolcontact?->insta }}</p>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress"><strong>Twitter Link</strong></label>
                        <p>{{ $schoolcontact?->twitter }}</p>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress"><strong>LinkedIn</strong></label>
                        <p>{{ $schoolcontact?->linkedin }}</p>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState"><strong>Alternate Phone Number</strong></label>
                        <p>{{ $schoolcontact?->alt_contact }}</p>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <div inass="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">School Eligibility</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">
                            <a href="{{ route('admin.school.eligibility.edit', $schooleligibility?->school_id) }}"
                                class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Min Qualification</strong></label>
                        <p>{{ $schooleligibility?->min_qualification }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Max Qualification</strong></label>
                        <p>{{ $schooleligibility?->max_qualification }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Pre Nursery</strong></label>
                        <p>
                            {{-- {{$schooleligibility->pre_nursery ."+ yrs"}} --}}
                            {{ $schooleligibility->pre_nursery != null ? $schooleligibility->pre_nursery . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Nursery</strong></label>
                        <p>
                            {{-- {{$schooleligibility->nursery ."+ yrs"}} --}}
                            {{ $schooleligibility->nursery != null ? $schooleligibility->nursery . '+ yrs' : '-' }}

                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>LKG</strong></label>
                        <p>
                            {{-- {{$schooleligibility->lkg ."+ yrs"}} --}}
                            {{ $schooleligibility->lkg != null ? $schooleligibility->lkg . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>UKG</strong></label>
                        <p>
                            {{-- {{$schooleligibility->ukg ."+ yrs"}} --}}
                            {{ $schooleligibility->ukg != null ? $schooleligibility->ukg . '+ yrs' : '-' }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>KG</strong></label>
                        <p>
                            {{-- {{$schooleligibility->kg ."+ yrs"}} --}}
                            {{ $schooleligibility->kg != null ? $schooleligibility->kg . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-I</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_one ."+ yrs"}} --}}
                            {{ $schooleligibility->class_one != null ? $schooleligibility->class_one . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-II</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_two ."+ yrs"}} --}}
                            {{ $schooleligibility->class_two != null ? $schooleligibility->class_two . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-III</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_three ."+ yrs"}} --}}
                            {{ $schooleligibility->class_three != null ? $schooleligibility->class_three . '+ yrs' : '-' }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Class-IV</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_four ."+ yrs"}} --}}
                            {{ $schooleligibility->class_four != null ? $schooleligibility->class_four . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-V</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_five ."+ yrs"}} --}}
                            {{ $schooleligibility->class_five != null ? $schooleligibility->class_five . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-VI</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_six ."+ yrs"}} --}}
                            {{ $schooleligibility->class_six != null ? $schooleligibility->class_six . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-VII</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_seven ."+ yrs"}} --}}
                            {{ $schooleligibility->class_seven != null ? $schooleligibility->class_seven . '+ yrs' : '-' }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Class-VIII</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_eight ."+ yrs"}} --}}
                            {{ $schooleligibility->class_eight != null ? $schooleligibility->class_eight . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-IX</strong></label>
                        <p>
                            {{ $schooleligibility->class_nine != null ? $schooleligibility->class_nine . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-X</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_ten."+ yrs"}} --}}
                            {{ $schooleligibility->class_ten != null ? $schooleligibility->class_ten . '+ yrs' : '-' }}
                        </p>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Class-XI</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_eleven ."+ yrs"}} --}}
                            {{ $schooleligibility->class_eleven != null ? $schooleligibility->class_eleven . '+ yrs' : '-' }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Class-XII</strong></label>
                        <p>
                            {{-- {{$schooleligibility->class_twelve."+ yrs"}} --}}
                            {{ $schooleligibility->class_twelve != null ? $schooleligibility->class_twelve . '+ yrs' : '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="card m-b-24">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Academic Performance</h4>                    
                </div>
                <div class="col-md-4 col-lg-4 ">
                    <div class="widgetbar">
                    <a href="{{ route('admin.school.academic.edit', $schooldetails->id) }}" class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Academic Year</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{ $academics[0]?->academic_year }}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Number of Students appeared</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{$academics[0]?->student_appear}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Number of Students passed</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{$academics[0]?->student_passed}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Above 95%</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                        {{$academics[0]?->abv_nine_five}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Above 90%</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                        {{$academics[0]?->abv_ninty}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Above 80%</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{$academics[0]?->abv_eighty}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Academic Year</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{$academics[1]?->academic_year}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Number of Students appeared</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{$academics[1]?->student_appear}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Number of Students passed</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{$academics[1]?->student_passed}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Above 95%</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                        {{$academics[1]?->abv_nine_five}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Above 90%</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                        {{$academics[1]?->abv_ninty}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Above 80%</strong></label>
                        </div>
                        <div class="form-group col-md-3">
                            {{$academics[1]?->abv_eighty}}
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> --}}
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Fees Structure</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">
                            <a href="{{ route('admin.school.fees.edit', $schoolfees?->school_id) }}"
                                class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Class</strong></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Admission</strong></label>
                    </div>
                    <div class="form-group col-md-3">
                        <label><strong>Annual</strong></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Pre Nursery</strong></label>
                    </div>
                    @if ($fees = explode(',', $schoolfees->pre_nursery))
                        @foreach ($fees as $fee)
                            <div class="form-group col-md-3">
                                <label><strong>{{ $fee }}</strong></label>
                            </div>
                            @if ($loop->iteration == 2)
                            @break
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Nursery</strong></label>
                </div>
                @if ($fees = explode(',', $schoolfees->nursery))
                    @foreach ($fees as $fee)
                        <div class="form-group col-md-3">
                            <label><strong>{{ $fee }}</strong></label>
                        </div>
                        @if ($loop->iteration == 2)
                        @break
                    @endif
                @endforeach
            @endif
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label><strong>LKG</strong></label>
            </div>
            @if ($fees = explode(',', $schoolfees->lkg))
                @foreach ($fees as $fee)
                    <div class="form-group col-md-3">
                        <label><strong>{{ $fee }}</strong></label>
                    </div>
                    @if ($loop->iteration == 2)
                    @break
                @endif
            @endforeach
        @endif
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label><strong>UKG</strong></label>
        </div>
        @if ($fees = explode(',', $schoolfees->ukg))
            @foreach ($fees as $fee)
                <div class="form-group col-md-3">
                    <label><strong>{{ $fee }}</strong></label>
                </div>
                @if ($loop->iteration == 2)
                @break
            @endif
        @endforeach
    @endif
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label><strong>KG</strong></label>
    </div>
    @if ($fees = explode(',', $schoolfees->kg))
        @foreach ($fees as $fee)
            <div class="form-group col-md-3">
                <label><strong>{{ $fee }}</strong></label>
            </div>
            @if ($loop->iteration == 2)
            @break
        @endif
    @endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
    <label><strong>Class-I</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_one))
    @foreach ($fees as $fee)
        <div class="form-group col-md-3">
            <label><strong>{{ $fee }}</strong></label>
        </div>
        @if ($loop->iteration == 2)
        @break
    @endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-II</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_two))
@foreach ($fees as $fee)
    <div class="form-group col-md-3">
        <label><strong>{{ $fee }}</strong></label>
    </div>
    @if ($loop->iteration == 2)
    @break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-III</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_three))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
    <label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-IV</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_four))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-V</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_five))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-VI</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_six))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-VII</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_seven))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-VIII</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_eight))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-IX</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_nine))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-X</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_ten))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-XI</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_eleven))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
<div class="form-row">
<div class="form-group col-md-3">
<label><strong>Class-XII</strong></label>
</div>
@if ($fees = explode(',', $schoolfees->class_twelve))
@foreach ($fees as $fee)
<div class="form-group col-md-3">
<label><strong>{{ $fee }}</strong></label>
</div>
@if ($loop->iteration == 2)
@break
@endif
@endforeach
@endif
</div>
</div>
</div>
<br>
{{-- <div class="card m-b-24">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Seat Availibility</h4>                    
                </div>
                <div class="col-md-4 col-lg-4 ">
                    <div class="widgetbar">
                    <a href="{{ route('admin.school.seat.edit', $schoolseats?->school_id) }}" class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Class</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Seat Available</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Seat Available</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Pre-Nursery</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->pre_nursery}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class-V</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_five}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Nursery</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->nursery}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class-VI</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_six}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>LKG</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->lkg}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class-VII</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_seven}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>UKG</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->ukg}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class-VIII</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_eight}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>KG</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->kg}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class-IX</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_nine}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Class-I</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_one}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class-X</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_ten}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Class-II</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_two}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class-XI</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_eleven}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Class-III</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_three}}</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>Class_XII</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_twelve}}</strong></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><strong>Class-IV</strong></label>
                </div>
                <div class="form-group col-md-3">
                    <label><strong>{{$schoolseats->class_four}}</strong></label>
                </div>
            </div>
        </div>
    </div> --}}
<br>
<div class="card m-b-24">
<div class="card-header">
<div class="card-header">
<div class="row align-items-center">
<div class="col-md-8 col-lg-8">
<h4 class="page-title">Opening Hours</h4>
</div>
<div class="col-md-4 col-lg-4 ">
<div class="widgetbar">
<a href="{{ route('admin.school.hour.edit', $schoolseats?->school_id) }}"
class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
</div>
</div>
</div>
</div>
<hr>

</div>
<div class="card-body">
<div class="form-row">
<?php

use Illuminate\Support\Arr;

$flag = 0; ?>
<div class="form-row col-md-6">
<label><strong>Monday</strong></label>
</div>

<div class="form-row col-md-6">
@foreach ($schoolhours?->mon as $hour)
<?php 
                $abc=App\Models\SchoolHour::getTime($hour);
                if($abc=="12:00 AM" && $flag!=1)
                  {  
                      $flag=1; 

                      echo "
                        <label><strong>Closed</strong></label>
                    ";
                      
                  }
                  elseif($flag!=1){
                  ?>
<label><strong>{{ App\Models\SchoolHour::getTime($hour) }}</strong></label>&nbsp;&nbsp;
@if ($loop->iteration == 2)
@break
@endif
<?php }?>
@endforeach

</div>

</div>
<div class="form-row">
<?php $flag = 0; ?>
<div class="form-row col-md-6">
<label><strong>Tuesday</strong></label>
</div>

<div class="form-row col-md-6">
@foreach ($schoolhours?->tue as $hour)
<?php 
                $abc=App\Models\SchoolHour::getTime($hour);
                if($abc=="12:00 AM" && $flag!=1)
                  {  
                      $flag=1; 

                      echo "
                        <label><strong>Closed</strong></label>
                    ";
                      
                  }
                  elseif($flag!=1){
                  ?>
<label><strong>{{ App\Models\SchoolHour::getTime($hour) }}</strong></label>&nbsp;&nbsp;
@if ($loop->iteration == 2)
@break
@endif
<?php }?>
@endforeach

</div>
</div>
<div class="form-row">
<?php $flag = 0; ?>
<div class="form-row col-md-6">
<label><strong>Wednesday</strong></label>
</div>

<div class="form-row col-md-6">
@foreach ($schoolhours?->wed as $hour)
<?php 
                $abc=App\Models\SchoolHour::getTime($hour);
                if($abc=="12:00 AM" && $flag!=1)
                  {  
                      $flag=1; 

                      echo "
                        <label><strong>Closed</strong></label>
                    ";
                      
                  }
                  elseif($flag!=1){
                  ?>
<label><strong>{{ App\Models\SchoolHour::getTime($hour) }}</strong></label>&nbsp;&nbsp;
@if ($loop->iteration == 2)
@break
@endif
<?php }?>
@endforeach

</div>
</div>
<div class="form-row">
<?php $flag = 0; ?>
<div class="form-row col-md-6">
<label><strong>Thursday</strong></label>
</div>

<div class="form-row col-md-6">
@foreach ($schoolhours?->thu as $hour)
<?php 
                $abc=App\Models\SchoolHour::getTime($hour);
                if($abc=="12:00 AM" && $flag!=1)
                  {  
                      $flag=1; 

                      echo "
                        <label><strong>Closed</strong></label>
                    ";
                      
                  }
                  elseif($flag!=1){
                  ?>
<label><strong>{{ App\Models\SchoolHour::getTime($hour) }}</strong></label>&nbsp;&nbsp;
@if ($loop->iteration == 2)
@break
@endif
<?php }?>
@endforeach

</div>
</div>

<div class="form-row">
<?php $flag = 0; ?>
<div class="form-row col-md-6">
<label><strong>Friday</strong></label>
</div>

<div class="form-row col-md-6">
@foreach ($schoolhours?->fri as $hour)
<?php 
                $abc=App\Models\SchoolHour::getTime($hour);
                if($abc=="12:00 AM" && $flag!=1)
                  {  
                      $flag=1; 

                      echo "
                        <label><strong>Closed</strong></label>
                    ";
                      
                  }
                  elseif($flag!=1){
                  ?>
<label><strong>{{ App\Models\SchoolHour::getTime($hour) }}</strong></label>&nbsp;&nbsp;
@if ($loop->iteration == 2)
@break
@endif
<?php }?>
@endforeach

</div>
</div>
<div class="form-row">
<?php $flag = 0; ?>
<div class="form-row col-md-6">
<label><strong>Saturday</strong></label>
</div>

<div class="form-row col-md-6">
@foreach ($schoolhours?->sat as $hour)
<?php 
                $abc=App\Models\SchoolHour::getTime($hour);
                if($abc=="12:00 AM" && $flag!=1)
                  {  
                      $flag=1; 

                      echo "
                        <label><strong>Closed</strong></label>
                    ";
                      
                  }
                  elseif($flag!=1){
                  ?>
<label><strong>{{ App\Models\SchoolHour::getTime($hour) }}</strong></label>&nbsp;&nbsp;
@if ($loop->iteration == 2)
@break
@endif
<?php }?>
@endforeach

</div>
</div>
<div class="form-row">
<?php $flag = 0; ?>
<div class="form-row col-md-6">
<label><strong>Sunday</strong></label>
</div>

<div class="form-row col-md-6">
@foreach ($schoolhours?->sun as $hour)
<?php 
                $abc=App\Models\SchoolHour::getTime($hour);
                if($abc=="12:00 AM" && $flag!=1)
                  {  
                      $flag=1; 

                      echo "
                        <label><strong>Closed</strong></label>
                    ";
                      
                  }
                  elseif($flag!=1){
                  ?>
<label><strong>{{ App\Models\SchoolHour::getTime($hour) }}</strong></label>&nbsp;&nbsp;
@if ($loop->iteration == 2)
@break
@endif
<?php }?>
@endforeach

</div>
</div>
</div>
</div>
<br>
<div class="card m-b-24">
<div class="card-header">
<div class="row align-items-center">
<div class="col-md-8 col-lg-8">
<h4 class="page-title">School Images Gallery</h4>
</div>
<div class="col-md-4 col-lg-4 ">
<div class="widgetbar">
<a href="{{ route('admin.school.image.edit', $schoolseats?->school_id) }}"
class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
</div>
</div>
</div>
<hr>
</div>
<div class="card-body">
<div class="form-row">
@if ($images = $schoolimages?->school_image)
@foreach ($images as $image)
<div class="form-row col-md-3">
<img src="{{ $image }}" height="200" width="200">
</div>
@endforeach
@endif
</div>
</div>
</div>
<br>
<div class="card m-b-24">
<div class="card-header">
<div class="row align-items-center">
<div class="col-md-8 col-lg-8">
<h4 class="page-title">School Facilities</h4>
</div>
<div class="col-md-4 col-lg-4 ">
<div class="widgetbar">
<a href="{{ route('admin.school.facility.edit', $schoolfeatures?->school_id) }}"
class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a>
</div>
</div>
</div>
<hr>
</div>
<div class="card-body">
<div class="form-row">
<div>
<h6>Educational Facilities</h6>
</div>
</div>
<?php
$education = ['Library', 'Career Counsiling', 'Student Exchange', 'Digital Library', 'Counseling', 'Test Center'];
$education1 = array_fill(1, 6, null);
$i = 1;
?>
<div class="form-row">

@if ($features = json_decode($schoolfeatures->education))

@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$education1[$i] = $feature;
?>
</span>
</div>
<?php $i++; ?>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($education,$education1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
<?php
$classroom = ['AC Class rooms', 'AV Class rooms', 'Lockers'];
$classroom1 = array_fill(1, 3, null);
$i = 1;
?>
</div>
<br>
<div class="form-row" style="padding-top: 20px;">

<div>
<h6>Classroom Facilities</h6>
</div>
</div>

<div class="form-row">
@if ($features = json_decode($schoolfeatures->classroom))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$classroom1[$i] = $feature;
?>
</span>
</div>
<?php $i++; ?>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($classroom,$classroom1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
</div>
<?php
$lab = ['Laboratories', 'Computer Labs', 'Robotics Labs', 'Maths Labs', 'Language Lab'];
$lab1 = array_fill(1, 5, null);
$i = 1;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Laboratories Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->lab))
@foreach ($features as $feature)
<div class="form-row col-md-4">

<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php echo $feature;
$lab1[$i] = $feature;
$i++; ?>

</span>
</div>
@endforeach
@endif

<?php
                $result=array(); 
                $result=array_diff($lab,$lab1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
</div>
<?php
$boarding = ['Hostel', 'AC Hostel'];
$boarding1 = array_fill(1, 2, null);
$i = 1;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Boarding Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->boarding))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$boarding1[$i] = $feature;
$i++;
?>
</span>
</div>
@endforeach
@endif

<?php
                $result=array(); 
                $result=array_diff($boarding,$boarding1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>

<?php } ?>
</div>
<?php
$sports = ['Play Area', 'Badminton', 'Cricket', 'Covered Play Area', 'Hockey', 'Football', 'Volleyball', 'Tennis', 'Kabaddi', 'Swimming', 'Table Tennis', 'Athletics', 'Gymnasium', 'Karate', 'Basket Ball'];
$sports1 = array_fill(1, 14, null);
$i = 1;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Sports Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->sports))

@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php echo $feature;
$sports1[$i] = $feature;
?>
</span>
</div>
<?php $i++; ?>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($sports,$sports1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
</div>
<?php
$arts = ['Art', 'Dance', 'Dramatics', 'Music'];
$arts1 = array_fill(1, 4, null);
$i = 1;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Performing Arts Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->arts))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php echo $feature;
$arts1[$i] = $feature;
$i++;
?>
</span>
</div>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($arts,$arts1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
</div>
<?php
$digital = ['AV Facilities', 'Interactive Boards', 'School App', 'Wi-fi'];
$digital1 = [1, 4, null];
$i = 1;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Digital Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->digital))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$digital1[$i] = $feature;
$i++;
?>
</span>
</div>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($digital,$digital1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
</div>
<?php
$food = ['Canteen', 'Meal Served', 'School App', 'Kitchen & Dining Hall'];
$food1 = [1, 4, null];
$i = 1;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Food and Catering Facilities</h6>
</div>

</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->food))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$food1[$i] = $feature;
$i++;
?>
</span>
</div>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($food,$food1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
</div>
<?php
$safety = ['CCTV', 'Fire Alarm', 'School Bus', 'Fire Extinguisher', 'Security Guards', 'Boundary Wall', 'Fenced Boundary Wall', 'Speedometer in Bus', 'GPS in Bus', 'CCTV in Bus', 'Fire Extinguisher in Bus', 'School Bus Tracking App'];
$safety1 = [1, 12, null];
$i = 1;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Safety and Security Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->security))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$safety1[$i] = $feature;
$i++;
?>
</span>
</div>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($safety,$safety1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>
</div>
<?php
$medical = ['Medical Facility', 'Medical Room or Clinic', 'ICU', 'Medical Staff', 'Isolation Room', 'Dedicated Ambulance', 'Resident Doctor'];
$medical1 = [1, 7, null];
$i = 1;
?>
<br>

<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Medical Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->medical))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$medical1[$i] = $feature;
$i++;
?>
</span>
</div>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($medical,$medical1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;">
<?php
echo $value;
?>
</span>
</div>
<?php } ?>

</div>
<?php
$other = ['Kids Play Area', 'Activity Center', 'Toy Room', 'Amphitheatre', 'Auditorium', 'Day Care'];
$other1 = [1, 6, null];
$i = 0;
?>
<br>
<div class="form-row" style="padding-top: 20px;">
<div>
<h6>Other Infra Facilities</h6>
</div>
</div>
<div class="form-row">
@if ($features = json_decode($schoolfeatures->infra))
@foreach ($features as $feature)
<div class="form-row col-md-4">
<i class="fa fa-check" style="font-size:16px;color:green"></i>
<span style="margin-left: 5px;">
<?php
echo $feature;
$other1[$i] = $feature;
$i++;
?>
</span>
</div>
@endforeach
@endif
<?php
                $result=array(); 
                $result=array_diff($other,$other1);
                foreach($result as $key=>$value)
                {
                ?>
<div class="form-row col-md-4">
<i class="fa fa-close" style="font-size:16px;color:red"></i>
<span style="margin-left: 5px;"><?php echo $value; ?></span>
</div>
<?php } ?>
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
