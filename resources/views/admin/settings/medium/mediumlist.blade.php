@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School Medium List</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Medium List</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            <a href="{{ route('admin.medium.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Medium</a>
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
                                <h5 class="card-title">School Medium List</h5>
                            </div>
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table table-borderless">
                                            <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Board</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($medium_list as $mediums)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$mediums->medium}}</td>
                                                <td>
                                                    <div class="button-list">
                                                        <a href="{{ route('admin.medium.edit', $mediums->id)}}" class="btn btn-primary-rgba"><i class="feather icon-edit"></i></a>
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