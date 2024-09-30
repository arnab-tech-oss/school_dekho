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
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
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

                             <div class="card-body">
                                <form action="{{ route('school.hour.update') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Monday</label>    
                                        </div>
                                        <input type="hidden" name="id" value="{{$hour->school_id}}">
                                        @foreach($hour->mon as $x)
                                        <div class="form-group col-md-3">
                                            @if($loop->iteration==1)
                                            <label for="inputAddress">From</label>
                                            @else
                                            <label for="inputAddress">To</label>
                                            @endif
                                            <input type="time" class="form-control timepicker" name="mon[]" value="{{$x}}">click
                                        </div>
                                        @if($loop->iteration==2)
                                        @break 
                                        @endif
                                        @endforeach
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Tuesday</label>    
                                        </div>
                                     
                                        @foreach($hour->tue as $x)
                                        <div class="form-group col-md-3">
                                            @if($loop->iteration==1)
                                            <label for="inputAddress">From</label>
                                            @else
                                            <label for="inputAddress">To</label>
                                            @endif
                                            <input type="time" class="form-control timepicker" name="tue[]" value="{{$x}}">
                                        </div>
                                        @if($loop->iteration==2)
                                        @break 
                                        @endif
                                        @endforeach
                                        
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Wednesday</label>    
                                        </div>
                                     
                                        @foreach($hour->wed as $x)
                                        <div class="form-group col-md-3">
                                            @if($loop->iteration==1)
                                            <label for="inputAddress">From</label>
                                            @else
                                            <label for="inputAddress">To</label>
                                            @endif
                                            <input type="time" class="form-control timepicker" name="wed[]" value="{{$x}}">
                                        </div>
                                        @if($loop->iteration==2)
                                        @break 
                                        @endif
                                        @endforeach
                                        
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Thursday</label>    
                                        </div>
                                     
                                        @foreach($hour->thu as $x)
                                        <div class="form-group col-md-3">
                                            @if($loop->iteration==1)
                                            <label for="inputAddress">From</label>
                                            @else
                                            <label for="inputAddress">To</label>
                                            @endif
                                            <input type="time" class="form-control timepicker" name="thu[]" value="{{$x}}">
                                        </div>
                                        @if($loop->iteration==2)
                                        @break 
                                        @endif
                                        @endforeach
                                        
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Friday</label>    
                                        </div>
                                     
                                        @foreach($hour->fri as $x)
                                        <div class="form-group col-md-3">
                                            @if($loop->iteration==1)
                                            <label for="inputAddress">From</label>
                                            @else
                                            <label for="inputAddress">To</label>
                                            @endif
                                            <input type="time" class="form-control timepicker" name="fri[]" value="{{$x}}">
                                        </div>
                                        @if($loop->iteration==2)
                                        @break 
                                        @endif
                                        @endforeach
                                        
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Saturday</label>    
                                        </div>
                                     
                                        @foreach($hour->sat as $x)
                                        <div class="form-group col-md-3">
                                            @if($loop->iteration==1)
                                            <label for="inputAddress">From</label>
                                            @else
                                            <label for="inputAddress">To</label>
                                            @endif
                                            <input type="time" class="form-control timepicker" name="sat[]" value="{{$x}}">
                                        </div>
                                        @if($loop->iteration==2)
                                        @break 
                                        @endif
                                        @endforeach
                                        
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Sunday</label>    
                                        </div>
                                     
                                        @foreach($hour->sun as $x)
                                        <div class="form-group col-md-3">
                                            @if($loop->iteration==1)
                                            <label for="inputAddress">From</label>
                                            @else
                                            <label for="inputAddress">To</label>
                                            @endif
                                            <input type="time" class="form-control timepicker" name="sun[]" value="{{$x}}">
                                        </div>
                                        @if($loop->iteration==2)
                                        @break 
                                        @endif
                                        @endforeach
                                        
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
                                           <button type="submit" name="action" class="btn btn-primary">Update</button>
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