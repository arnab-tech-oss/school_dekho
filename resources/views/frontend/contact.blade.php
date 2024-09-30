@extends("layouts.frontend.app")
@section("canonical")
    <link rel="canonical" href="https://www.schooldekho.org/contact" />
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

        .section-title> :first-child {
            /* margin-top: -8px; */
            text-align: center !important;
        }
    </style>
    <!-- Contact us Section Start -->
    <div class="instructor-banner">
        <div class="custom-container container">
            <div class="row align-items-end align-items-xl-center">
                <div class="col-lg-12">
                    <div class="contact-section section-padding-02">
                        <div class="custom-container h-margin container">
                            <div class="page-breadcrumb">
                                <div class="container">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index-main.html">Home</a></li>
                                        <li class="breadcrumb-item active">Contact Us</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Instructor Banner Start -->
                            <div class="instructor-banner__content aos-init aos-animate" data-aos="fade-up"
                                data-aos-duration="1000">
                                <!-- Section Title Start -->
                                <div class="section-title">
                                    <h2 class="section-title__title-03">Contact Us</h2>
                                </div>
                                <!-- Section Title End -->
                            </div>
                            <!-- Instructor Banner End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Info Start -->

            <div class="contact-form">
                <!-- Section Title Start -->
                <div class="section-title aos-init aos-animate text-center" data-aos="fade-up" data-aos-duration="1000">
                    {{-- <h2 class="section-title__title">Fill the form below so we can get to know
                        you and your needs better.
                    </h2> --}}
                </div>
                <!-- Section Title End -->
                <!-- Contact Form Wrapper Start -->
                <div class="d-flex flex-column flex-lg-row">
                    <div class="contact-info col-lg-6">
                        <div class="col">
                            <div class="mb-5">
                                <!-- Contact Info Start -->
                                <div class="contact-info__item aos-init aos-animate" data-aos="fade-up"
                                    data-aos-duration="1000">
                                    <div class="contact-info__icon">
                                        <i style="width: 32px" class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-info__content">
                                        <h3 class="contact-info__title">Address</h3>
                                        <p>Sati Plaza, Barrackpore <br>
                                            Kolkata - 700120</p>
                                    </div>
                                </div>
                                <!-- Contact Info End -->
                            </div>
                            <div class="mb-5">
                                <!-- Contact Info Start -->
                                <div class="contact-info__item aos-init aos-animate" data-aos="fade-up"
                                    data-aos-duration="1000">
                                    <div class="contact-info__icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    <div class="contact-info__content">
                                        <h3 class="contact-info__title">Contact</h3>
                                        <p>Mobile: <strong>18002588074</strong></p>
                                        <p>info@schooldekho.org</p>
                                    </div>
                                </div>
                                <!-- Contact Info End -->
                            </div>
                            <div class="mb-5">
                                <!-- Contact Info Start -->
                                <div class="contact-info__item aos-init aos-animate" data-aos="fade-up"
                                    data-aos-duration="1000">
                                    <div class="contact-info__icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="contact-info__content">
                                        <h3 class="contact-info__title">Hour of operation</h3>
                                        <p>Monday - Friday: 09:00 - 20:00</p>
                                        <p>Sunday &amp; Saturday: 10:30 - 22:00</p>
                                    </div>
                                </div>
                                <!-- Contact Info End -->
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{ route("school.submit.contact") }}" class="col-lg-6">
                        <div class="contact-form__wrapper aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="contact-form__input">
                                        <input class="form-control" type="text" placeholder="Your name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form__input">
                                        <input class="form-control" type="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form__input">
                                        <input class="form-control" type="text" placeholder="Phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form__input">
                                        <textarea class="form-control" placeholder="Message" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-form__input text-center">
                                        <button class="btn btn-primary btn-hover-secondary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact Form Wrapper End -->
            </div>

            <div class="contact-map section-padding-02 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <iframe id="gmap_canvas"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29434.73079443103!2d88.36916579999999!3d22.752710049999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89aefcc6fe3a7%3A0x6a6d434ac504dbc5!2sBarrackpore%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1693385295656!5m2!1sen!2sin"></iframe>
            </div>

            <!-- Contact Form End -->
        </div>
    </div>
    <!-- Contact us Section End -->
@endsection
@push("js")
@endpush
