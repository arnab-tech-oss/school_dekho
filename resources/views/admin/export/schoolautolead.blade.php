@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
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
                    <!--<a href="{{ route('admin.lead.manual') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Lead</a>-->
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
    <style>
        .filter {
            display: flex;
            margin: 5px;
        }

        .filter-item {
            margin: 10px;
            width: 300px;
        }
    </style>
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-10">
            <div class="card-header">
                <h5 class="card-title">Export Leads Schoolwise</h5>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-danger col-md-12">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                {{-- <div class="table-responsive"> --}}
                <form method="post" action="{{ route('admin.lead.export.schoolwise.autotransfer.submit') }}">
                    {{ csrf_field() }}
                    <div class="filter">

                        <div class="filter-item">
                            <label for="select school">Select School</label>
                            <select class="form-control example" style="width: 400px;margin-top: 40px;" name="school_id"
                                class="form-control" required>
                                <option>select school</option>
                                <option value="all_schools">All School</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">
                                        @if (isset($school->school_address[0]?->address))
                                            {{ $school->name }},{{ $school->school_address[0]?->address }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="" class="form-control" required>
                        </div>
                        <div class="filter-item">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="" class="form-control" required>
                        </div>
                        <div class="filter-item" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-primary">Export</button>
                        </div>

                    </div>
                </form>
             
            </div>
            {{-- {{ $leads->render('pagination::bootstrap-4') }} --}}
            {{-- </div> --}}
        </div>
        {{-- </div> --}}
    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.example').select2();
        });
    </script>
@endpush
