@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
            <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">User Add</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.list') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{url('user/add')}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add User</a>
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
                                <h5 class="card-title">Add New User</h5>
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
                                <form action="{{ route('admin.user.add.new') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        
                                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                                        
                                    </div>
                                   
                                   </div>
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        
                                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                                        
                                    </div>
                                   
                                   </div>
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        
                                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                                        
                                    </div>
                                   
                                   </div>
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select name="role" class="form-control">
                                           <option selected>choose role...</option>
                                           <option value="admin">Admin</option>
                                           <option value="school_admin">School Admin</option>
                                           <option value="lead_admin">Lead Administrator</option>
                                           <option value="accountant">Accountant</option>
                                        </select>
                                    </div>
                                   
                                   </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                           <button type="submit" name="action" class="btn btn-primary">Add New User</button>
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