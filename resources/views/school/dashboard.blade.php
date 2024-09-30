@extends('layouts.school.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
@section('content')
    <style>
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 5%;
        }
    </style>
    <!-- Start Contentbar -->
    <div class="contentbar">
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.list') }}"><i class="feather icon-book"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">No. of School Claimed</h5>
                                <h4 class="mb-0">{{ $claimed_schools_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.list') }}"><i
                                            class="feather icon-shopping-bag success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Your Schools</h5>
                                <h4 class="mb-0">{{ $verified_school_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.leads.all') }}"><i
                                            class="feather icon-users primary-rgba text-primary"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Total Leads</h5>
                                <h4 class="mb-0">{{ $lead_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.leads.all') }}"><i
                                            class="feather icon-users success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title w-100 font-14">No. of Admissions Completed</h5>
                                <h4 class="mb-0">{{ $total_admission_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('js')
@endpush
{{--@extends('layouts.school.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <div class="row" style="margin:20px">
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.list') }}"><i class="feather icon-book"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">No. of School Claimed</h5>
                                <h4 class="mb-0">{{ $claimed_schools_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.list') }}"><i
                                            class="feather icon-shopping-bag success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Your Schools</h5>
                                <h4 class="mb-0">{{ $verified_school_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.leads.all') }}"><i
                                            class="feather icon-users primary-rgba text-primary"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Total Leads</h5>
                                <h4 class="mb-0">{{ $lead_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('school.leads.all') }}"><i
                                            class="feather icon-users success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title w-100 font-14">No. of Admissions Completed</h5>
                                <h4 class="mb-0">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('js')
@endpush
{{--@extends('layouts.school.app')
@section('title','School Dashboard')
@push('css')
@endpush
@section('content')
<!-- Start Contentbar -->
<div class="contentbar">
    <div class="row" style="margin:20px">
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-success-inverse mr-0"><a href="{{ route('school.list')}}"><i class="feather icon-book"></i></a></span>
                        </div>
                        <div class="col-7 text-right">
                            <h5 class="card-title font-14">claim Schools</h5>
                            <h4 class="mb-0">{{$claimed_schools_count}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="font-13"></span>
                        </div>
                        <div class="col-4 text-right">
                            <span class="badge badge-warning"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-success-inverse mr-0"><a href="{{ route('school.list')}}"><i class="feather icon-shopping-bag success-rgba text-success"></i></a></span>
                        </div>
                        <div class="col-7 text-right">
                            <h5 class="card-title font-14">Verify Schools</h5>
                            <h4 class="mb-0">{{$verified_school_count}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="font-13"></span>
                        </div>
                        <div class="col-4 text-right">
                            <span class="badge badge-warning"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-success-inverse mr-0"><a href="{{ route('school.leads.all')}}"><i class="feather icon-users primary-rgba text-primary"></i></a></span>
                        </div>
                        <div class="col-7 text-right">
                            <h5 class="card-title font-14">Leads</h5>
                            <h4 class="mb-0">{{$lead_count}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="font-13"></span>
                        </div>
                        <div class="col-4 text-right">
                            <span class="badge badge-warning"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-success-inverse mr-0"><a href="{{ route('school.leads.all')}}"><i class="feather icon-users success-rgba text-success"></i></a></span>
                        </div>
                        <div class="col-7 text-right">
                            <h5 class="card-title font-14">Admissions</h5>
                            <h4 class="mb-0">0</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="font-13"></span>
                        </div>
                        <div class="col-4 text-right">
                            <span class="badge badge-warning"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contentbar -->
@endsection
@push('js')
@endpush --}}