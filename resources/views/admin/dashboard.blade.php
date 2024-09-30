@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')


<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    
        <!-- Start col -->
        
            <!-- Start row -->
            <div class="row" style="margin: 20px 0px;">


                <div class="col-lg-6 col-xl-3">
                    <a href="{{ route('admin.students.all')}}">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                                    </div>
                                    <div class="col-7 text-right">
                                        <h5 class="card-title font-14">Students</h5>
                                        <h4 class="mb-0">{{$total_students}}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <span class="font-13"></span>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span class="badge badge-warning"></span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </a>
                </div>


                <div class="col-lg-6 col-xl-3">
                    <a href="{{route('admin.school.list')}}">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-book"></i></span>
                                    </div>
                                    <div class="col-7 text-right">
                                        <h5 class="card-title font-14">Schools</h5>
                                        <h4 class="mb-0">{{$total_schools}}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <span class="font-13"></span>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span class="badge badge-warning"></span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-success-inverse mr-0"><a href="{{route('admin.school.list')}}"><i class="feather icon-book"></i></a></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-12">Approved Schools</h5>
                                    <h4 class="mb-0">{{$total_approved_schools}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13"></span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"></span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-success-inverse mr-0"><a href="{{route('admin.blog.list')}}"><i class="feather icon-book-open"></i></a></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Blogs</h5>
                                    <h4 class="mb-0">{{$total_blogs}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13"></span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"></span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- <div class="col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-success-inverse mr-0"><a href="{{route('admin.blog.list')}}"><i class="feather icon-book-open"></i></a></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Leads Manager</h5>
                                    <h4 class="mb-0">{{$total_blogs}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13"></span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"></span>
                                </div>
                            </div>
                        </div> ->
                    </div>
                </div> -->
            </div>
            <!-- End row -->
        
        <!-- End col -->
        <!-- Start col -->
        <!-- End col -->
    
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