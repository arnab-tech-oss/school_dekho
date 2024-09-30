@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')

        <!-- Start Container -->
        
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">Add New School</h5>
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
                                <form action="{{ url('admin/updateschool/') }}" method="POST">
                                   {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputAddress">School Name</label>
                                        <input type="text" class="form-control" name="name" id="inputAddress" placeholder="Summit School" value="{{$schooldetails->name}}" required>
                                        <input type="hidden" value="{{$schooldetails->id}}" name="id" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        
                                        <textarea class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>{{$schooldetails->address}}</textarea>
                                        
                                    </div>

                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">City</label>
                                            <select id="inputState" class="form-control" name="city_id" required>
                                                <option value="{{$schooldetails->city_id}}">{{$schooldetails->city_id}}</option>
                                                @foreach($allcities as $allcities)
                                                <option value="{{$allcities->city}}">{{$allcities->city}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">State</label>
                                            <select id="inputState" class="form-control" name="state_id" required>
                                                <option value="{{$schooldetails['state']->id}}">{{$schooldetails['state']->state}}</option>
                                                @foreach($allstates as $allstates)
                                                <option value="{{$allstates->id}}">{{$allstates->state}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">District</label>
                                            <select id="inputState" class="form-control" name="district_id" required>
                                                <option value="{{$schooldetails['district']->id}}">{{$schooldetails['district']->district}}</option>
                                                @foreach($alldistricts as $alldistricts)
                                                <option value="{{$alldistricts->id}}">{{$alldistricts->district}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputZip">Zip</label>
                                            <input type="text" class="form-control" name="pincode" id="inputZip" value="{{$schooldetails->pincode}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Status</label>
                                            <select id="inputState" class="form-control" name="status" required>
                                                <option value="{{$schooldetails->status}}">{{$schooldetails->status}}</option>
                                                
                                                <option value="approved">approved</option>
                                                <option value="rejected">rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                       <div class="form-group col-md-6">
                                            <label for="inputZip">Board Name</label>
                                            <input type="text" class="form-control" id="inputZip" placeholder="Board Name" name="school_board_id" value="{{$schooldetails->school_board_id}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Medium</label>
                                            <select id="inputState" class="form-control" name="school_medium_id" required>
                                                <option value="{{$schooldetails['medium']->id}}">{{$schooldetails['medium']->medium}}</option>
                                                @foreach($allmedium as $medium)
                                                <option value="{{$medium->id}}">{{$medium->medium}}</option>
                                                @endforeach
                                            </select>
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
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
        <!-- End Container -->


@endsection

@push('js')
    
@endpush