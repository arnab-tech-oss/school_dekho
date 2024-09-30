@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Student Details</h4>
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
                    <div class="row">
                        <div class="col-lg-6 col-xl-5">
                            <div class="product-slider-box product-box-for">
                                <div class="product-preview">
                                    <img src="{{ asset('storage/profile/default.svg') }}" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                    {{-- <p><span class="badge badge-success font-14">25% off</span></p> --}}
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            {{-- <p><span class="badge badge-light font-16">Pupular</span></p> --}}
                            <h2 class="font-22">{{ $student->name }}</h2>
                            {{-- <p class="text-primary font-26 f-w-7 my-3"><sup class="font-16">$</sup>350</p> --}}

                            <p class="mb-4">
                            <p class="text-primary font-18 f-w-7 my-3">Gurdian's Name : {{ $profile?->fname }}</p>
                            <p class="text-primary font-18 f-w-7 my-3">Email Id : {{ $student?->email }}</p>
                            <p class="text-seccess font-18 f-w-7 my-3 mb-2">Mobile : {{ $profile?->fname }}</p>
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
                    <h2 class="font-22">School queries</h2>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>School Name</th>
                                    <th>School Address</th>
                                    <th>Question</th>
                                    <th>Message</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($queries as $query)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $query->school->name }}</td>
                                    <td>{{ $query->school->address->address }}</td>
                                    <td>{{ $query->question }}</td>
                                    <td>{{ $query->message }}</td>
                                    <td>{{ $query->profile?->phone}}</td>
                                </tr>
                                @empty
                                <p>No queries.</p>

                                @endforelse




                            </tbody>
                        </table>
                        {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
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