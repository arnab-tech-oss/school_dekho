@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">List Career Jobs</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">List Career Jobs</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('admin.career.job.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Job</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->

<!-- Start row -->

<!-- Start col -->

<!-- End col -->
<!-- Start col -->
<div class="contentbar">
    {{-- <div class="col-md-6"> --}}
    <div class="card m-b-10">
        <div class="card-header">
            <h5 class="card-title">All Jobs</h5>
        </div>
        <div class="card-body">
            {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
            <div class="table-responsive">
                <table id="datatable-buttons" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Job Title</th>
                            <th>Experience</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allJobs as $job)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$job->job_title}}</td>
                            <td>{{$job->experince}}</td>
                            <td>{{$job->salary}}</td>
                            <td>
                                <div class="button-list">
                                    <a href="{{route('admin.career.job.edit.details', $job->id)}}" class="btn btn-primary-rgba"><i class="feather icon-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    {{-- </div> --}}
</div>
<!-- End col -->

<!-- End row -->

<!-- End Contentbar -->

@endsection

@push('js')

@endpush