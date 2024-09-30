@extends('layouts.school.app')

@section('title','School Dashboard')

@push('css')

@endpush


@section('content')
<style>
    
	.suggest-contianer {
		position: absolute;
		z-index: 98888;
		left: 10px;
		right: 10px;
		flex: 1;
		background-color: white;
		padding: 5px;
		box-shadow: 1px 1px 1px 1px silver;
		align-items: flex-start;
		justify-content: flex-start;
	}
</style>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">List School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">List School</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('school.add.new') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add School</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->

<!-- Start row -->

<!-- Start col -->

<!-- End col -->
<!-- Start col -->



<div class="contentbar">
    <!-- Start Container -->

    <div class="card m-b-24">
        <div class="card-header">
            <h5 class="card-title">Search School</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="search_claim_key" placeholder="Enter your school for search">
            </div>
            <div id="suggesstion-claim-box" class="suggest-contianer" style="display: none">

            </div>
        </div>
    </div>
<br>
<!-- End Container -->
               
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        @foreach($schoollist as $list)
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-10">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-xl-5">
                                <div class="product-slider-box product-box-nav">
                                    <div class="product-preview">
                                        <img src="{{ $list->school?->school_logo  }}" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me" height="300" width="300">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-7">                            
                                <h2 class="font-22">{{$list->school->name}}</h2>
                                
                                <p class="text-primary font-16 f-w-7 my-3">{{ $list->school?->address?->address }}</p>
                                <p class="mb-4">{{ $list->school?->about }}</p>                                        
                                @if ($list->verify == '9' && sizeof($list->payments)==0)
                                    <a href="{{ route('school.application.form', $list->id) }}" class="btn btn-primary-rgba font-18"><span><i class="feather icon-clipboard"></i> Application Form</span></a>
                                    
                                    <form method="post" action="{{route('school.pay')}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="school_id" value="{{$list->school->id}}" />
                                        <input type="hidden" name="school_claim_id" value="{{$list->id}}" />
                                        <!-- <script src="https://checkout.razorpay.com/v1/payment-button.js"
                                        data-payment_button_id="pl_KDLmdaLeutOkk3"></script> -->
                                        <script 
                                        src="https://checkout.razorpay.com/v1/checkout.js" 
                                        data-key="rzp_test_TPkj926bwIWcjG" 
                                        
                                        data-amount="1000" 
                        
                                        data-name="schooldekho.org" 
                                        data-description="Razorpay" 
                                        data-image="{{ asset('assets/images/logo.png') }}" 
                                         
                                        async
                                        >
                                        </script>
                                        <!-- <script src="https://checkout.razorpay.com/v1/payment-button.js" 
                                        data-payment_button_id="pl_KDLmdaLeutOkk3" async>
                                        </script>  -->


                                        <style>
                                            .razorpay-payment-button {
                                                background-color: rgba(0, 102, 255);
                                                color: white;
                                                margin-top: 20px;
                                                width: 35%;
                                                border: 1px solid;
                                                height: 40px;
                                            }
                                        </style>

                                    </form>

                                @elseif($list->verify == '9' && $list->expiry_date < date('Y-m-d'))
                                <a href="{{ route('school.application.form', $list->id) }}" class="btn btn-primary-rgba font-18"><span><i class="feather icon-clipboard"></i> Application Form</span></a>
                                <form method="post" action="{{route('school.pay')}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="school_id" value="{{$list->school->id}}" />
                                        <input type="hidden" name="school_claim_id" value="{{$list->id}}" />
                                        <!-- <script src="{{asset('assets')}}/js/razorpay.js" 
                                        data-key="rzp_test_TPkj926bwIWcjG" 
                                        data-amount="1000" 
                                        data-buttonText="Subscribe"
                                        data-name="schooldekho.org" 
                                        data-description="Razorpay" 
                                        data-image="{{ asset('assets/images/logo.png') }}" 
                                        data-prefill.name="name" 
                                        data-prefill.email="email" 
                                        data-theme.color="#ff7529"
                                        > -->
                                        </script>
                                        <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_K6eA98jtOWPjba" async> </script>
                                        
                                    </form>
                                @else
                                <label>Your subscription upto {{App\Core\Helper::GetDate($list->expiry_date)}}</label>
                                </br> 
                                <a href="{{ route('school.application.form', $list->id) }}" class="btn btn-primary-rgba font-18"><span><i class="feather icon-clipboard"></i> Application Form</span></a>
                                @endif
                                <div class="button-list mt-5 mb-5">
                                    {{-- <button type="button" class="btn btn-danger-rgba font-18"><i class="feather icon-heart"></i></button> --}}
                                    {{-- <a href="{{ route('school.view.details', $list->id) }}" class="btn btn-primary">View</a> --}}
                                @if ($list->verify == '1')
                                    <button class="btn btn-secondary-rgba font-18" ><span><i class="feather icon-clock"></i> Verification Pending</span></button>
                                @elseif ($list->verify == '2')
                                    <a href="#" class="btn btn-danger-rgba font-18"><span><i class="feather  icon-x"></i> Rejected </span></a>
                                @elseif ($list->verify == '9')
                                    <a href="#" class="btn btn-primary-rgba font-18"><span><i class="feather icon-check"></i> Claimed </span></a>     
                                @endif
                                   
                                    <a href="{{ route('school.view.details', $list->school->id) }}" type="button" class="btn btn-success-rgba font-18"><span><i class="feather icon-heart"></i> View Details </span></a>
                                </div>
                                {{-- <div class="button-list">
                                    <h6 class="mb-3">Share this product</h6>
                                    <a href="#" class="btn btn-primary-rgba font-18"><i class="feather icon-facebook"></i></a>
                                    <a href="#" class="btn btn-info-rgba font-18"><i class="feather icon-twitter"></i></a>
                                    <a href="#" class="btn btn-danger-rgba font-18"><i class="feather icon-instagram"></i></a>
                                    <a href="#" class="btn btn-warning-rgba font-18"><i class="feather icon-linkedin"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End col -->
    </div>
    <!-- End row -->
    
   
</div>



@endsection

@push('js')

<script>
        $("#search_claim_key").keyup(function() {
            var keyword = $(this).val();
            var url = `/school/search/claim?key=${keyword}`;
            console.log(url);
            $.ajax({
                type: "GET",
                url: `/school/search/claim?key=${keyword}`,
                success: function(data) {
                    if (keyword.length > 0) {
                        $("#suggesstion-claim-box").show();
                        $("#suggesstion-claim-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    } else {
                        $("#suggesstion-claim-box").hide();
                    }
                }
            });
        })
    </script>
@endpush
