@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')
<style>
     .product-slider-box {
    background-color: #f9f9f9; 
    padding: 10px; 
    margin-bottom: 20px; 
}

.product-previe {
    display: flex;
    flex-direction: column;
}
</style>
@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{trans ('custom.interview.view.title')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.students.all') }}">Students</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-10">
                <div class="card-body">
                    <div class="row d-flex">
                        <div class="col-lg-6 col-xl-5">
                            <div class="product-slider-box product-box-for">
                                <div class="product-previe">
                                    <p class="text-primary font-18 f-w-7 my-3"> Name : {{ $view->name }}</p>
                                    <p class="text-primary font-18 f-w-7 my-3"> Contact Number : {{ $view->number }}</p>
                                    <p class="text-primary font-18 f-w-7 my-3 mb-2">Address : {{ $view->address }}</p>
                                </div>
                            </div>
                        </div>

                      <div class="col-lg-6 col-xl-7">
                            <p class="mb-4">
                            <p class="text-primary font-18 f-w-7 my-3"> School Name : {{ $view->school_name }}</p>
                            <p class="text-primary font-18 f-w-7 my-3">Designation : {{ $view->designation }}</p>
                            <p class="text-primary font-18 f-w-7 my-3 mb-2">Experience : {{ $view->experience }}</p>
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-10">
                {{-- <div class="card-body"> --}}
                {{-- <div class="row"> --}}

                {{-- <div class="col-lg-6 col-xl-7"> --}}
                {{-- <p><span class="badge badge-light font-16">Pupular</span></p> --}}


                <div class="card-body">
                <div class="form-row">
                    <!-- <div class="form-group col-md-9">
                        <label><strong>School Name</strong></label>
                        <p>
                            Loreto Convent
                        </p>
                    </div> -->
                    <!-- <div class="form-froup col-md-3">
                        <img src="http://127.0.0.1:8000/storage/logo//ndbtsd1b7eow8sk0o00koog44o4wk8o.jpg" height="100" width="100">
                    </div> -->
                </div>
                <div class="form-row">
                        @if ($view && $view->interview)
                    <div class="form-group col-md-12">
                        <label><strong>{{trans('custom.interview.view.q1')}}</strong></label>
                        <p>
                        <td>{{ $view->interview->vision }}</td>
                        </p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                </div>
                <div class="form-row">
                @if ($view && $view->interview)
                    <div class="form-group col-md-9">
                        <label><strong>{{trans('custom.interview.view.q2')}}</strong></label>
                        <p>
                        <td>{{ $view->interview->prepare_students }}</td>
                        </p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                </div>
                <div class="form-row">
                @if ($view && $view->interview)
                    <div class="form-group col-md-6">
                        <label><strong>{{trans('custom.interview.view.q3')}}</strong></label>
                        <p>
                        <td>{{ $view->interview->difference }}</td>
                        </p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                </div>
                <div class="form-row">
                @if ($view && $view->interview)
                    <div class="form-group col-md-12">
                        <label><strong>{{trans('custom.interview.view.q4')}}</strong></label>
                        <p>
                        <td>{{ $view->interview->balance_learning }}</td>
                        </p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                </div>
                <div class="form-row">
                @if ($view && $view->interview)
                    <div class="form-group col-md-12">
                        <label><strong>{{trans('custom.interview.view.q5')}}</strong></label>
                        <p><td>{{ $view->interview->teaching_methods }}</td></p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                </div>
                <div class="form-row">
                @if ($view && $view->interview)
                    <div class="form-group col-md-6">
                        <label><strong>{{trans('custom.interview.view.q6')}}</strong></label>
                        <p><td>{{ $view->interview->improve_skills }}</td></p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                </div>
                <div class="form-row">
                    @if ($view && $view->interview)
                    <div class="form-group col-md-6">
                        <label><strong>{{trans('custom.interview.view.q7')}}</strong></label>
                        <p><td>{{ $view->interview->friendly_school }}</td></p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                </div>
                <div class="form-row">
                @if ($view && $view->interview)
                    <div class="form-group col-md-6">
                        <label><strong>{{trans('custom.interview.view.q8')}}</strong></label>
                        <p><td>{{ $view->interview->involve_parents }}</td></p>
                    </div>
                    @else
                    <tr>
                     <td colspan="6">No queries.</td>
                     </tr>
                      @endif
                      </div>
                      <div class="form-row">
                            @if ($view && $view->interview)
                         <div class="form-group col-md-6">
                         <label><strong>{{trans('custom.interview.view.q9')}}</strong></label>
                            <p><td>{{ $view->interview->facilities }}</td></p>
                         </div>
                         @else
                          <tr>
                             <td colspan="6">No queries.</td>
                          </tr>
                         @endif
                        </div>
                        <div class="form-row">
                            @if ($view && $view->interview)
                         <div class="form-group col-md-6">
                         <label><strong>{{trans('custom.interview.view.q10')}}</strong></label>
                            <p><td>{{ $view->interview->technology }}</td></p>
                         </div>
                         @else
                          <tr>
                             <td colspan="6">No queries.</td>
                          </tr>
                         @endif
                        </div>
                </div>
            </div>
            </div>
        </div>
        <!-- End col -->
    </div>
</div>
<!-- End Contentbar -->
@endsection

@push('js')
<script src="{{ asset('assets')}}/js/custom/custom-ecommerce-single-product.js"></script>

@endpush