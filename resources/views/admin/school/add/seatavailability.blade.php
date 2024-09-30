@extends('layouts.admin.app')

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
                            @if(Session::has('success'))
                                <div class="alert alert-success col-md-12">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                                @endif
                             <div class="card-body">
                                <form action="{{ route('admin.school.seatavailable.new') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Pre Nursery</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="pre_nursery" id="inputAddress" placeholder="Number of seat available"> 
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Nursery</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="nursery" id="inputAddress" placeholder="Number of seat available">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">LKG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="lkg" id="inputAddress" placeholder="Number of seat available">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">UKG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="ukg" id="inputAddress" placeholder="Number of seat available">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">KG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="kg" id="inputAddress" placeholder="Number of seat available">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-I</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_one" id="inputAddress" placeholder="Number of seat available">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-II</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_two" id="inputAddress" placeholder="Number of seat available"> 
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-III</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_three" id="inputAddress" placeholder="Number of seat available">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IV</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_four" id="inputAddress" placeholder="Number of seat available">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-V</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_five" id="inputAddress" placeholder="Number of seat available">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VI</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_six" id="inputAddress" placeholder="Number of seat available">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_seven" id="inputAddress" placeholder="Number of seat available">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VIII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_eight" id="inputAddress" placeholder="Number of seat available">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IX</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_nine" id="inputAddress" placeholder="Number of seat available">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-X</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_ten" id="inputAddress" placeholder="Number of seat available">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XI</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_eleven" id="inputAddress" placeholder="Number of seat available">
                                                
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="class_twelve" id="inputAddress" placeholder="Number of seat available">
                                                
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