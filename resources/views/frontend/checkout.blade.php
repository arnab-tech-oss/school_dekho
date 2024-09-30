@extends("layouts.frontend.app")
@section("canonical")
    <link rel="canonical" href="https://www.schooldekho.org/about-us" />
@endsection
@push("css")
@endpush
@section("content")
    <style>
        .section-padding-02 {
            margin-top: 0 !important;
        }

        .h-margin {
            margin-top: 65px;
        }

        .stick-container {
            position: sticky;
            top: 100px;
        }
    </style>
    <div class="checkout-section section-padding-90">
        <div class="custom-container container">

            <div class="row gy-8">
                <div class="col-lg-7">
                    <!-- Checkout Form Start -->
                    <div class="checkout-form">

                        <!-- Checkout Form Info Start -->
                        <div class="checkout-form__info">
                            <p>Returning customer? <button class="info-toggle" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">Click here to login</button></p>
                        </div>
                        <!-- Checkout Form Info End -->

                        <!-- Checkout Form Info Start -->
                        <div class="checkout-form__info">
                            <p>Have a coupon? <button class="info-toggle" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample">Click here to enter your code</button></p>
                            <div id="collapseExample" class="collapse">
                                <div class="checkout-form__item">
                                    <input type="text" class="form-control" placeholder="Coupon code">
                                    <button class="coupon-btn"><i class="fal fa-gift"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Form Info End -->

                        <!-- Checkout Form Start -->
                        <div class="checkout-form__details">

                            <h4 class="checkout-form__title">Billing details</h4>

                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">First name *</label>
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Last name *</label>
                                        <input type="text" class="form-control" placeholder="Last name">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-12">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Company name *</label>
                                        <input type="text" class="form-control" placeholder="Company name">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-12">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Country *</label>
                                        <input type="text" class="form-control" placeholder="Country name">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>

                                <div class="col-md-8">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Street address *</label>
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-4">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Apartment, suite, unit, etc. *</label>
                                        <input type="text" class="form-control"
                                            placeholder="Apartment, suite, unit, etc.">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Town / City *</label>
                                        <input type="text" class="form-control" placeholder="Town / City">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">State *</label>
                                        <input type="text" class="form-control" placeholder="State">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Zip *</label>
                                        <input type="text" class="form-control" placeholder="Zip">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Phone *</label>
                                        <input type="text" class="form-control" placeholder="Phone">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Checkout Form Input Start -->
                                    <div class="checkout-form__input">
                                        <label class="form-label">Email address *</label>
                                        <input type="email" class="form-control" placeholder="Email address">
                                    </div>
                                    <!-- Checkout Form Input End -->
                                </div>
                            </div>

                            <!-- Checkout Form Input Start -->
                            <div class="checkout-form__input form-check mt-4">
                                <input id="account" type="checkbox">
                                <label for="account">Create an account?</label>
                            </div>
                            <!-- Checkout Form Input End -->

                            <!-- Checkout Form Account Start -->
                            <div class="checkout-form__account mt-4">
                                <!-- Checkout Form Input Start -->
                                <div class="checkout-form__input">
                                    <label class="form-label">Create account password *</label>
                                    <input type="password" class="form-control" placeholder="password">
                                </div>
                                <!-- Checkout Form Input End -->
                            </div>
                            <!-- Checkout Form Account End -->

                            <!-- Checkout Form Input Start -->
                            <div class="checkout-form__input form-check mt-4">
                                <input id="shipping" type="checkbox">
                                <label for="shipping"> Ship to a different address?</label>
                            </div>
                            <!-- Checkout Form Input End -->

                            <!-- Checkout Form Shipping Start -->
                            <div class="checkout-form__shipping mt-4">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">First name *</label>
                                            <input type="text" class="form-control" placeholder="Your Name">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Last name *</label>
                                            <input type="text" class="form-control" placeholder="Last name">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Company name *</label>
                                            <input type="text" class="form-control" placeholder="Company name">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Country / Region*</label>
                                            <select class="select2">
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                                <option value="01">option 01</option>
                                            </select>
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Street address *</label>
                                            <input type="text" class="form-control" placeholder="Your Name">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Apartment, suite, unit, etc. *</label>
                                            <input type="text" class="form-control"
                                                placeholder="Apartment, suite, unit, etc.">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Town / City *</label>
                                            <input type="text" class="form-control" placeholder="Town / City">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">State *</label>
                                            <input type="text" class="form-control" placeholder="State">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Zip *</label>
                                            <input type="text" class="form-control" placeholder="Zip">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Phone *</label>
                                            <input type="text" class="form-control" placeholder="Phone">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Checkout Form Input Start -->
                                        <div class="checkout-form__input">
                                            <label class="form-label">Email address *</label>
                                            <input type="email" class="form-control" placeholder="Email address">
                                        </div>
                                        <!-- Checkout Form Input End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Form Shipping End -->

                            <!-- Checkout Form Input Start -->
                            <div class="checkout-form__input mt-4">
                                <label class="form-label">Order notes </label>
                                <textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                            <!-- Checkout Form Input End -->

                        </div>
                        <!-- Checkout Form End -->

                        <!-- Checkout Payment Method End -->
                        <div class="checkout-form__payment">
                            <h4 class="checkout-form__title">Payment information</h4>

                            <ul class="checkout-form__payment-methods">

                                <li class="checkout-form__payment-method">
                                    <input id="bank" class="payment-method" type="radio" name="payment-method">
                                    <label class="checkout-form__payment-title" for="bank">
                                        <span class="payment-icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512.16 512.16">
                                                <g>
                                                    <path
                                                        d="M272.067,336.147H408.6c5.12,0,8.533-3.413,8.533-8.533v-76.8c0-5.12-3.413-8.533-8.533-8.533H272.067
                                                                                                                                                        c-5.12,0-8.533,3.413-8.533,8.533v76.8C263.533,332.733,266.947,336.147,272.067,336.147z M280.6,259.347h119.467v59.733H280.6
                                                                                                                                                        V259.347z">
                                                    </path>
                                                    <path
                                                        d="M41.667,225.213h68.267c5.12,0,8.533-3.413,8.533-8.533s-3.413-8.533-8.533-8.533H41.667
                                                                                                                                                        c-5.12,0-8.533,3.413-8.533,8.533S36.547,225.213,41.667,225.213z">
                                                    </path>
                                                    <path
                                                        d="M144.067,225.213h68.267c5.12,0,8.533-3.413,8.533-8.533s-3.413-8.533-8.533-8.533h-68.267
                                                                                                                                                        c-5.12,0-8.533,3.413-8.533,8.533S138.947,225.213,144.067,225.213z">
                                                    </path>
                                                    <path
                                                        d="M41.667,259.347H152.6c5.12,0,8.533-3.413,8.533-8.533s-3.413-8.533-8.533-8.533H41.667c-5.12,0-8.533,3.413-8.533,8.533
                                                                                                                                                        S36.547,259.347,41.667,259.347z">
                                                    </path>
                                                    <path
                                                        d="M212.333,242.28h-25.6c-5.12,0-8.533,3.413-8.533,8.533s3.413,8.533,8.533,8.533h25.6c5.12,0,8.533-3.413,8.533-8.533
                                                                                                                                                        S217.453,242.28,212.333,242.28z">
                                                    </path>
                                                    <path
                                                        d="M503.32,136.467c-5.973-7.68-13.653-11.947-23.04-12.8l-20.48-2.482V97.213V80.147c0-18.773-15.36-34.133-34.133-34.133
                                                                                                                                                        H33.133C14.36,46.013-1,61.373-1,80.147v17.067v68.267v187.733c0,15.413,10.357,28.518,24.453,32.718
                                                                                                                                                        c-0.43,17.262,12.631,32.248,30.161,33.842l394.24,44.373c0.853,0,2.56,0,3.413,0c17.067,0,32.427-12.8,34.133-29.013
                                                                                                                                                        l25.6-273.92C511.853,152.68,509.293,143.293,503.32,136.467z M16.067,105.747h426.667v22.187v29.013H16.067V105.747z
                                                                                                                                                         M33.133,63.08h392.533c9.387,0,17.067,7.68,17.067,17.067v8.533H16.067v-8.533C16.067,70.76,23.747,63.08,33.133,63.08z
                                                                                                                                                         M16.067,353.213v-179.2h426.667v179.2c0,9.387-7.68,17.067-17.067,17.067H33.987h-0.853
                                                                                                                                                        C23.747,370.28,16.067,362.6,16.067,353.213z M493.933,157.8l-25.6,273.92c-0.853,9.387-9.387,16.213-18.773,15.36
                                                                                                                                                        L56.173,402.707c-8.533-0.853-14.507-7.68-15.36-15.36h384.853c18.773,0,34.133-15.36,34.133-34.133V165.48v-28.16l19.627,1.707
                                                                                                                                                        c4.267,0,8.533,2.56,11.093,5.973C493.08,148.413,494.787,153.533,493.933,157.8z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="payment-name">Direct bank transfer</span>
                                    </label>

                                    <div class="payment-details">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the
                                            payment reference. Your order will not be shipped until the funds have cleared
                                            in our account.</p>
                                    </div>
                                </li>

                            </ul>

                            <div class="checkout-form__place-order">
                                <!-- Checkout Form Input Start -->
                                <div class="checkout-form__input form-check">
                                    <input id="conditions" type="checkbox">
                                    <label for="conditions">I have read and agree to the website terms and conditions
                                        *</label>
                                </div>
                                <!-- Checkout Form Input End -->
                                <button class="btn btn-primary btn-hover-secondary">Place order</button>
                            </div>
                        </div>
                        <!-- Checkout Payment Method End -->

                    </div>
                    <!-- Checkout Form End -->
                </div>
                <div class="col-lg-5">
                    <!-- Checkout Form Start -->
                    <div class="checkout-order stick-container">
                        <h4 class="checkout-order__title">Order summary</h4>

                        <div class="checkout-order__details table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="checkout-order__cart-item">
                                        <td class="checkout-order__info">

                                            <div class="checkout-order__product">
                                                <div class="checkout-order__product-thumbnail">
                                                    <img src="assets/images/product/product-1.png" alt="Product"
                                                        width="80" height="80">
                                                </div>
                                                <div class="checkout-order__product-caption">
                                                    <h3 class="checkout-order__name">Attached <span
                                                            class="quantity">x1</span></h3>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="checkout-order__total">
                                            <span class="sale-price">₹72<span class="separator">.00</span></span>
                                        </td>
                                    </tr>
                                    <tr class="checkout-order__cart-item">
                                        <td class="checkout-order__info">

                                            <div class="checkout-order__product">
                                                <div class="checkout-order__product-thumbnail">
                                                    <img src="assets/images/product/product-2.png" alt="Product"
                                                        width="80" height="80">
                                                </div>
                                                <div class="checkout-order__product-caption">
                                                    <h3 class="checkout-order__name">Awesome for Websites <span
                                                            class="quantity">x1</span></h3>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="checkout-order__total">
                                            <span class="sale-price">₹78<span class="separator">.00</span></span>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td>
                                            <span class="subtotal-price">₹131<span class="separator">.00</span></span>
                                        </td>
                                    </tr>
                                    <tr class="cart-shipping">
                                        <th>Shipping</th>
                                        <td>Free shipping <span class="shipping-fee ms-1">₹5<span
                                                    class="separator">.00</span></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <span class="total-price">₹136<span class="separator">.00</span></span>
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
@endsection
@push("js")
@endpush
