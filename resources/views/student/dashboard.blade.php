@extends('layouts.student.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')


<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row" style="margin:20px">
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-primary-inverse mr-0"><a href="{{ route('student.query',['id'=>Auth::user()->id])}}"><i class="feather icon-help-circle"></i></a></span>
                        </div>
                        <div class="col-7 text-right">
                            <h5 class="card-title font-14">Enquiries</h5>
                            <h4 class="mb-0">{{$enquiries}}</h4>
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
                            <span class="action-icon badge badge-primary-inverse mr-0"><a href="{{ route('student.history.list',['id'=>Auth::user()->id])}}"><i class="feather icon-eye"></i></a></span>
                        </div>
                        <div class="col-7 text-right">
                            <h5 class="card-title font-14">Views</h5>
                            <h4 class="mb-0">{{$views}}</h4>
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
        <!-- End col -->
        <!-- Start col -->
        <!-- End col -->
    </div>
    <!-- End row -->
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-9">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <!-- End col -->
                <!-- Start col -->
                <!-- End col -->
                <!-- Start col -->
                <!-- End col -->
                <!-- Start col -->
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-6">
                    <div class="card m-b-30">
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
        <!-- Start col -->

        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection

@push('js')

@endpush