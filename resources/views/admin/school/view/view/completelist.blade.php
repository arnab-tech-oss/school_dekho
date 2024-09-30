@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">List School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">List School</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            <a href="{{ route('admin.school.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add School</a>
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
                                <h5 class="card-title">All Registered Schools</h5>
                            </div>
                            <div class="card-body">
                                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                                {{-- <div class="table-responsive"> --}}
                                    <table id="school-table" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>School Name</th>
                                            <th>Address</th>
                                            <th>View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($complete_schools as $list)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->address->address}}</td>
                                            <td>
                                                <a href="{{ route('admin.school.details', $list->id) }}" class="btn btn-info">View</a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $complete_schools->render("pagination::bootstrap-4")  }}
                            {{-- </div> --}}
                        </div>
                    {{-- </div> --}}
                    </div>
                    <!-- End col -->
                
                <!-- End row -->
            
            <!-- End Contentbar -->




@endsection

@push('js')
    
@endpush