@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush


@section('content')

    <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Product List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">eCommerce</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
    <!-- End Breadcrumbbar -->
    <div class="contentbar">
        <!-- Start Container -->
        
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">View School</h5>
                </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputAddress">School Name</label>
                            <input type="text" class="form-control" name="name" id="inputAddress" value="{{$schooldetails->name}}" disabled>
                            
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            
                            <textarea class="form-control" id="inputAddress" name="address" disabled>{{$schooldetails->address}}</textarea>
                            
                        </div>

                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="name" id="inputAddress" value="{{$schooldetails->city_id}}" disabled>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">State</label>
                                <input type="text" class="form-control" id="inputZip" value="{{$schooldetails['state']->state}}" disabled>
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">District</label>
                                <input type="text" class="form-control" id="inputZip" value="{{$schooldetails['district']->district}}" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" name="pincode" id="inputZip" value="{{$schooldetails->pincode}}" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Status</label>
                                <input type="text" class="form-control" id="inputZip" value="{{$schooldetails->status}}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputZip">Board Name</label>
                                <input type="text" class="form-control" id="inputZip" value="{{$schooldetails->school_board_id}}" disabled>
                            </div>
                
                            <div class="form-group col-md-6">
                                <label for="inputState">Medium</label>
                                <input type="text" class="form-control" id="inputZip" value="{{$schooldetails['medium']->medium}}" disabled>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- End Container -->
    </div>

@endsection

@push('js')
    
@endpush