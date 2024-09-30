@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">About School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">About School</li>
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
            <h5 class="card-title">About School</h5>
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
            <form action="{{ route('admin.school.about.new') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputAddress">Address Line</label>

                    <textarea class="form-control" id="inputAddress" name="address" placeholder="1234 Main St"></textarea>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control" name="state_id" required>
                            <option value="">Choose...</option>
                            @foreach($allstates as $states)
                            <option value="{{$states->id}}">{{$states->state}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">City</label>
                        <input type="text" class="form-control" name="city_id" id="city_id" placeholder="Enter city" required>
                    
                        {{-- <label for="inputState">City</label>
                        <select id="inputState" class="form-control" name="city_id" required>
                            <option value="">Choose...</option>
                            @foreach($allcities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        </select> --}}

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">District</label>
                        <select id="inputState" class="form-control" name="district_id" required>
                            <option value="">Choose...</option>
                            @foreach($alldistricts as $district)
                            <option value="{{$district->id}}">{{$district->district}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="inputZip" placeholder="Enter Pincode Number" required>
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Lattitude</label>
                            <input type="text" class="form-control" name="lattitude" placeholder="Enter lattitude"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Longitude</label>
                            <input type="text" class="form-control" name="longitude" placeholder="Enter Longitude"
                                required>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Email</label>
                        <input type="email" class="form-control" name="email" id="inputZip" placeholder="Enter Email address" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Phone</label>
                        <input type="text" class="form-control" name="phone" id="inputZip" placeholder="Enter Contact Number" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Facebook Link</label>
                        <input type="text" class="form-control" name="fb_link" id="inputAddress" placeholder="https://www.facebook.com/regentinstitute/">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Instagram Link</label>
                        <input type="text" class="form-control" name="insta_link" id="inputAddress" placeholder="https://www.instagram.com/regentinstitute/">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Twitter Link</label>
                        <input type="text" class="form-control" name="twitt_link" id="inputAddress" placeholder="https://www.twitter.com/regentinstitute/">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">LinkedIn</label>
                        <input type="text" class="form-control" name="linkedin" id="inputAddress" placeholder="https://www.linkedin.com/regentinstitute/">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Alternate Phone Number</label>
                        <input type="text" class="form-control" name="alt_phone" id="inputZip" placeholder="Enter Alternate Contact Number" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <button type="submit" name="action" value="previous" class="btn btn-primary">&laquo;Previous</button>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="action" value="next" class="btn btn-primary">Save & Next&raquo;</button>
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