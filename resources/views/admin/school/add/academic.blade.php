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
                    <li class="breadcrumb-item active" aria-current="page">Academic Performance</li>
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
                                <h5 class="card-title">Academic Performance</h5>
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
                                <form action="{{ route('admin.school.academic.new') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   {{-- <div class="form-row"> --}}
                                   <input type="hidden" name="school_id" value="{{session()->get('id')}}">
                                        {{-- <div class="form-group col-md-3">
                                                <label for="inputCity">Select Academic Year</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select id="inputState" class="form-control" name="year" Enter no of students>
                                                <option value="">Choose...</option>
                                                
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                
                                            </select>
                                            
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">No. of students appeared</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="student_appear" id="inputAddress" placeholder="Enter no of students" Enter no of students>
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">No. of students Passed</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="student_passed" id="inputAddress" placeholder="Enter no of students" Enter no of students>
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 95%</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="abv_nine_five" id="inputAddress" placeholder="Enter no of students" Enter no of students>
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 90%</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="abv_ninty" id="inputAddress" placeholder="Enter no of students" Enter no of students>
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 80%</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="abv_eighty" id="inputAddress" placeholder="Enter no of students" Enter no of students>
                                        </div>
                                    
                                   </div> --}}
                                    {{-- <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                            Check me out
                                            </label>
                                        </div>
                                    </div> --}}

                                    <div class="form-row">
                                        {{-- <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="hidden" name="academic_id_1" value="{{ $academics[0]->id }}"/>
                                        <input type="hidden" name="academic_id_2" value="{{ $academics[1]->id }}"/>
                                         --}}
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Academic Year</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="academic_year_1" id="inputAddress">
                                           {{-- <strong> {{ $academics[0]?->academic_year }} </strong> --}}
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="academic_year_2" id="inputAddress">
                                            {{-- <strong>{{ $academics[1]?->academic_year }} </strong> --}}
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">No. of students appeared</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                         <input type="text" class="form-control" name="student_appear1" id="inputAddress" >
                                        </div>
                                        <div class="form-group col-md-3">
                                         <input type="text" class="form-control" name="student_appear2" id="inputAddress" >
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">No. of students Passed</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="student_passed1" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="student_passed2" id="inputAddress">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 95%</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_nine_five1" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_nine_five2" id="inputAddress">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 90%</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_ninty1" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_ninty2" id="inputAddress">
                                        </div>
                                    
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="inputCity">Above 80%</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_eighty1" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="abv_eighty2" id="inputAddress">
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