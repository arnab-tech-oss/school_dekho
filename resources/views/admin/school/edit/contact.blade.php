@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Edit About School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Edit About School</li>
                </ol>
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
            <h5 class="card-title">Edit About School</h5>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('admin.school.about.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputAddress">Address Line</label>

                    <textarea class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">{{$schoolcontacts?->address}}</textarea>
                    <input type="hidden" name="school_id" value="{{$schoolcontacts?->school_id}}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control" name="state_id" required>
                             <option value="{{$schoolcontacts?->states?->id}}">{{$schoolcontacts?->states?->state}}</option>
                            @foreach($allstates as $states)
                                <option value="{{$states->id}}" @if ($states->id == $schoolcontacts?->states?->id) echo "selected"; @endif>{{$states->state}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">City</label>
                    
                            <input type="text"  class="form-control" name="city" value="{{$schoolcontacts?->city}}">
                            
                    

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">District</label>
                        <select id="inputState" class="form-control" name="district_id" required>
                             <option value="{{$schoolcontacts?->districts?->id}}">{{$schoolcontacts?->districts?->district}}</option> 
                            @foreach($alldistricts as $district)
                                <option value="{{$district->id}}">{{$district->district}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="inputZip" placeholder="Enter Pincode Number" value="{{$schoolcontacts?->pincode}}">
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Lattitude</label>
                            <input type="text" class="form-control" name="lattitude" id="inputZip"
                                placeholder="Enter Lattitude" value="{{ $schoolcontacts?->lattitude }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="inputZip"
                                placeholder="Enter Longitude" value="{{ $schoolcontacts?->longitude }}">
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Email</label>
                        <input type="email" class="form-control" name="email" id="inputZip" placeholder="Enter Email address" value="{{$schoolcontacts?->email}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Phone</label>
                        <input type="text" class="form-control" name="phone" id="inputZip" placeholder="Enter Contact Number" value="{{$schoolcontacts?->contact}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Facebook Link</label>
                        <input type="text" class="form-control" name="fb_link" id="inputAddress" placeholder="https://www.facebook.com/regentinstitute/" value="{{$schoolcontacts?->fb}}">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Instagram Link</label>
                        <input type="text" class="form-control" name="insta_link" id="inputAddress" placeholder="https://www.instagram.com/regentinstitute/" value="{{$schoolcontacts?->insta}}">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Twitter Link</label>
                        <input type="text" class="form-control" name="twitt_link" id="inputAddress" placeholder="https://www.twitter.com/regentinstitute/" value="{{$schoolcontacts?->twitter}}">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">LinkedIn</label>
                        <input type="text" class="form-control" name="linkedin" id="inputAddress" placeholder="https://www.linkedin.com/regentinstitute/" value="{{$schoolcontacts?->linkedin}}">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Alternate Phone Number</label>
                        <input type="text" class="form-control" name="alt_phone" id="inputZip" placeholder="Enter Alternate Contact Number" value="{{$schoolcontacts?->alt_contact}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
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