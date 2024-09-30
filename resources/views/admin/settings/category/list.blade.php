@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School Category List</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Category List</li>
                </ol>
            </div>
        </div>
        {{-- <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            <a href="{{url('medium/add')}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Medium</a>
            </div>
        </div> --}}
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
                                <h5 class="card-title">School Category List</h5>
                            </div>
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table table-borderless">
                                            <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($category_list as $category)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$category->category}}</td>
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