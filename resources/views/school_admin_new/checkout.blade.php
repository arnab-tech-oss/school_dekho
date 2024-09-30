@extends('layouts.schooladmin.app')

@section('title', 'School Dashboard')

@push('css')
@endpush
@section('content')
    <style>
        .section-padding-02 {
            margin-top: 0 !important;
        }

        .h-margin {
            margin-top: 65px;
        }

        .stick-container {
            position: sticky;
            top: 38px;
        }

        .dashboard-title {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 31px;
        }

        .form-select,
        .form-control {
            border: 1px solid #dddddd;
        }
    </style>
 
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Checkout</h4>

            <div class="dashboard-info">
                <div class="dashboard-info__card-box" style="background: #fdfdfd ; ">
                    <div class="col-lg-5">
                        <!-- Checkout Form Start -->
                        <div class="checkout-order stick-container">
                            <h4 class="checkout-order__title">Subscription Charges</h4>

                            <div class="checkout-order__details table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="checkout-order__cart-item">
                                            <td class="checkout-order__info">

                                                <div class="checkout-order__product">
                                                    <div class="checkout-order__product-thumbnail">
                                                        {{-- <img src="assets/images/product/product-1.png" alt="Product"
                                                            width="80" height="80"> --}}
                                                    </div>
                                                    <div class="checkout-order__product-caption">
                                                        <h3 class="checkout-order__name">Amount <span
                                                                class="quantity"></span></h3>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="checkout-order__total">
                                                <span class="sale-price">₹35<span class="separator">,000</span></span>
                                            </td>
                                        </tr>
                                        <tr class="checkout-order__cart-item">
                                            <td class="checkout-order__info">

                                                <div class="checkout-order__product">
                                                    <div class="checkout-order__product-thumbnail">
                                                        {{-- <img src="assets/images/product/product-2.png" alt="Product"
                                                            width="80" height="80"> --}}
                                                    </div>
                                                    <div class="checkout-order__product-caption">
                                                        <h3 class="checkout-order__name">GST(18%) <span
                                                                class="quantity"></span></h3>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="checkout-order__total">
                                                <span class="sale-price">₹6<span class="separator">,300</span></span>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                       
                                        <tr class="order-total">
                                             <th>Total Payable</th>
                                            <td>
                                                <span class="subtotal-price">₹41<span class="separator">,300</span></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Checkout Form End -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body text-center"> 
        <form action="{{ route('schooladmin.pay') }}" method="POST">
            @csrf
            <input type="hidden" name="school_id" value="{{$school_details->id}}">
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <script src="{{asset('assets')}}/js/razorpay.js" data-key="rzp_live_bs5xjXp2e9VmoR" data-amount="4130000"
                data-buttontext="Pay 41300 INR" data-name="schoodekho.org" data-description="Pay Online"
                data-image="https://www.schooldekho.org/assets/images/SD-Logo-(R).png" data-prefill.name="name"
                data-prefill.email="email" data-theme.color="#ff7529"></script>
        </form>
    </div>
@endsection
@push('js')
@endpush
