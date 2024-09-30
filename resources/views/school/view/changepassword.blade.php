@extends('layouts.school.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">School Admin</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </div>
            </div>
            {{-- <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
                </div>                        
            </div> --}}
        </div>
    </div>

    <!-- Start Container -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Change Password</h5>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-{{ Session::get('message_type') }} col-md-12">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('school.changepassword') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="form-group col-md-6">

                            <input type="password" class="form-control" name="pass_new" placeholder="Enter new password">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="password" class="form-control" name="pass_conf" placeholder="Confirm new password">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" name="action" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Container -->

@endsection

@push('js')
@endpush


{{-- @extends('layouts.school.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Admin</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
                </div>                        
            </div>
        </div>          
    </div>
    
        <!-- Start Container -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">Change Password</h5>
                            </div>
                            @if(Session::has('message'))
                                <div class="alert alert-{{Session::get('message_type')}} col-md-12">
                                    {{ Session::get('message') }}
                                    @php
                                        Session::forget('message');
                                    @endphp
                                </div>
                                @endif
                             <div class="card-body">
                                <form action="{{ route('school.changepassword') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                       <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    <div class="form-group col-md-6">
                                        
                                        <input type="password" class="form-control" name="pass_new" placeholder="Enter new password">
                                        
                                    </div>
                                   
                                   </div>
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        
                                        <input type="password" class="form-control" name="pass_conf" placeholder="Confirm password">
                                        
                                    </div>
                                   
                                   </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                           <button type="submit" name="action" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        <!-- End Container -->


@endsection

@push('js')
    
@endpush --}}