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
                    <li class="breadcrumb-item active" aria-current="page">Fees Structure</li>
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
                                <h5 class="card-title">Fees Structure</h5>
                            </div>

                             <div class="card-body">
                                <form action="{{ route('admin.school.fees.update') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Pre Nursery</label>
                                        </div>
                                        <input type="hidden" name="id" value="{{$schoolfees->school_id}}">
                                        @if($fees=explode(',',$schoolfees->pre_nursery))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="pre_nursery[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Nursery</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->nursery))
                                         @foreach($fees as $fee)
                                          <div class="form-group col-md-3">
                                              <input type="text" class="form-control" name="nursery[]" id="inputAddress" value="{{$fee}}" >
                                                  
                                          </div>
                                          @if($loop->iteration==2)
                                          @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">LKG</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->lkg))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="lkg[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">UKG</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->ukg))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="ukg[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">KG</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->kg))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="kg[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-I</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_one))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_one[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-II</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_two))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_two[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-III</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_three))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_three[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IV</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_four))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_four[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-V</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_five))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_five[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VI</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_six))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_six[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VII</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_seven))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_seven[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VIII</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_eight))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_eight[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IX</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_nine))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_nine[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-X</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_ten))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_ten[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XI</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_eleven))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_eleven[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XII</label>
                                        </div>
                                        @if($fees=explode(',',$schoolfees->class_twelve))
                                         @foreach($fees as $fee)
                                        <div class="form-group col-md-3">
                                          <input type="text" class="form-control" name="class_twelve[]" id="inputAddress" value="{{$fee}}" >
                                                
                                        </div>
                                        @if($loop->iteration==2)
                                        @break
                                        @endif
                                        @endforeach
                                    @endif
                                    
                                   </div>
                                   
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="isPublic" name="is_public" @if($schoolfees->is_public == 1) checked @endif>
                                            <label class="form-check-label" for="isPublic">
                                            Click to enable public visibility
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                           <button type="submit" name="action" value="next" class="btn btn-primary">Update</button>
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