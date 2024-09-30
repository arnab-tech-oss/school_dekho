@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
    <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Medium Add</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Medium Add</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{route('admin.medium.add')}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Medium</a>
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
                                <h5 class="card-title">Add Medium</h5>
                            </div>
                            @if(Session::has('message'))
                                <div class="alert alert-success col-md-12">
                                    {{ Session::get('message') }}
                                    @php
                                        Session::forget('message');
                                    @endphp
                                </div>
                                @endif
                             <div class="card-body">
                                <form action="{{ route('admin.medium.add.new') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        
                                        <input type="text" class="form-control" name="medium" placeholder="Enter new medium">
                                        
                                    </div>
                                   
                                   </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                           <button type="submit" name="action" class="btn btn-primary">Add New Medium</button>
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