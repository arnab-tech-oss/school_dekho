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
                    <li class="breadcrumb-item active" aria-current="page">Edit School Eligibility</li>
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
                        <h5 class="card-title">Edit Eligibility Criteria</h5>
                </div>
                <div class="card-body">
                        <form action="{{ route('school.eligibility.update') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Pre Nursery</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="pre_nursery" id="inputAddress" value="{{$schooleligibility->pre_nursery}}">
                                                <input type="hidden" name="id" value="{{$schooleligibility->school_id}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Nursery</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="nursery" id="inputAddress" value="{{$schooleligibility->nursery}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">LKG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="lkg" id="inputAddress" value="{{$schooleligibility->lkg}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">UKG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="ukg" id="inputAddress" value="{{$schooleligibility->ukg}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">KG</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="kg" id="inputAddress" value="{{$schooleligibility->kg}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-I</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="one" id="inputAddress" value="{{$schooleligibility->class_one}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-II</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="two" id="inputAddress" value="{{$schooleligibility->class_two}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-III</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="three" id="inputAddress" value="{{$schooleligibility->class_three}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IV</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="four" id="inputAddress" value="{{$schooleligibility->class_four}}">
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-V</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="five" id="inputAddress" value="{{$schooleligibility->class_five}}">

                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VI</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="six" id="inputAddress" value="{{$schooleligibility->class_six}}">

                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="seven" id="inputAddress" value="{{$schooleligibility->class_seven}}">

                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-VIII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="eight" id="inputAddress" value="{{$schooleligibility->class_eight}}">

                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-IX</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="nine" id="inputAddress" value="{{$schooleligibility->class_nine}}">

                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-X</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="ten" id="inputAddress" value="{{$schooleligibility->class_ten}}">

                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XI</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="eleven" id="inputAddress" value="{{$schooleligibility->class_eleven}}">

                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Class-XII</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="twelve" id="inputAddress" value="{{$schooleligibility->class_twelve}}">

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