@extends('layouts.school.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('school.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Opening Hours</li>
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
                                <h5 class="card-title">Opening Hours</h5>
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
                                <form action="{{ route('school.hours.new') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Monday</label>    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker" name="mon[]" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker" name="mon[]" >
                                        </div>
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Tuesday</label>    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker" name="tue[]" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker" name="tue[]" >
                                        </div>
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Wednesday</label>    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker" name="wed[]" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker" name="wed[]" >
                                        </div>
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Thursday</label>    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker" name="thu[]" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker" name="thu[]" >
                                        </div>
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Friday</label>    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker" name="fri[]" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker" name="fri[]" >
                                        </div>
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Saturday</label>    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker" name="sat[]" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker" name="sat[]" >
                                        </div>
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Sunday</label>    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker" name="sun[]" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker" name="sun[]" >
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
                                           <button type="submit" name="action" value="Finish" class="btn btn-primary">Finish</button>
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