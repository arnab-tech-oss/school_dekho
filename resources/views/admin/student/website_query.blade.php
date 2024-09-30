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
                    <li class="breadcrumb-item"><a href="#">Students</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Website Queries</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">

            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">

    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-10">
            <form method="POST" action="{{ route('admin.student.website.query.export')}}">
                <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="start_date" style="margin: 10px;"><strong>Start Date</strong></label>
                            <input type="date" name="from_date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="end_date" style="margin: 10px;"><strong>End Date</strong></label>
                            <input type="date" name="to_date" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary-rgba" style="margin-top: 44px;margin-left: 15px;">Export</button>
                        </div>
                </div>
            </form>
                <div class="card-body">
                    <h2 class="font-22">School queries</h2>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Student Name</th>
                                    <th>Contact</th>
                                    <th>Pincode</th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($web_queries as $query)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $query->name }}</td>
                                    <td>{{ $query->contact}}</td>
                                    <td>{{ $query->pincode }}</td>
                                    <td>{{ $query->city}}</td>
                                    <td>{{ $query->created_at}}</td>
                                    <td>
                                        @if($query->status=='1')
                                            <span class="badge badge-primary">Seen</span>
                                        @else
                                            <span class="badge badge-danger">Unseen</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.student.website.query.details',$query->id) }}" class="btn btn-primary-rgba">View</a>
                                    </td>
                    </div>
                    </td>
                    </tr>
                    @empty
                    <p>No data.</p>
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
{{ $web_queries->links() }} 
</div>
<!-- End Contentbar -->
@endsection

@push('js')
<script src="{{ asset('assets')}}/js/custom/custom-ecommerce-single-product.js"></script>

@endpush