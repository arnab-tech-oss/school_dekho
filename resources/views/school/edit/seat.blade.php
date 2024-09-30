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
                    <li class="breadcrumb-item active" aria-current="page">Seat Availability</li>
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
                                <h5 class="card-title">Seat Available</h5>
                            </div>

                             <div class="card-body">
                                <form action="{{ route('school.seat.update') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Pre Nursery</label>
                                        </div>
                                        <input type="hidden" name="id" value="{{$seats->school_id}}">
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="pre_nursery" id="inputAddress" value="{{$seats->pre_nursery}}"> 
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Nursery</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="nursery" id="inputAddress" value="{{$seats->nursery}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">LKG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="lkg" id="inputAddress" value="{{$seats->lkg}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">UKG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="ukg" id="inputAddress" value="{{$seats->ukg}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">KG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="kg" id="inputAddress" value="{{$seats->kg}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-I</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_one" id="inputAddress" value="{{$seats->class_one}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-II</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_two" id="inputAddress" value="{{$seats->class_two}}"> 
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-III</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_three" id="inputAddress" value="{{$seats->class_three}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IV</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_four" id="inputAddress" value="{{$seats->class_four}}">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-V</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_five" id="inputAddress" value="{{$seats->class_five}}">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VI</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_six" id="inputAddress" value="{{$seats->class_six}}">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_seven" id="inputAddress" value="{{$seats->class_seven}}">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VIII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_eight" id="inputAddress" value="{{$seats->class_eight}}">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IX</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_nine" id="inputAddress" value="{{$seats->class_nine}}">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-X</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_ten" id="inputAddress" value="{{$seats->class_ten}}">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XI</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_eleven" id="inputAddress" value="{{$seats->class_eleven}}">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_twelve" id="inputAddress" value="{{$seats->class_twelve}}">
                                                
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
                                           <button type="submit" name="action" value="previous" class="btn btn-primary">Update</button>
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