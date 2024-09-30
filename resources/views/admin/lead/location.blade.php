@extends('layouts.admin.app')

@section('title','Admin Dashboard')

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
            <h5 class="card-title">All Registered Schools</h5>
        </div>
        @if(Session::has('message'))
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
            <form method="post" action="{{route('admin.leads.location.export')}}">
                {{ csrf_field() }}
                <div class="filter">

                    <div class="filter-item">
                        <label for="select city">Select City</label>
                        <select class="form-control example" style="width: 400px;margin-top: 40px;" name="city" class="form-control" required>
                            <option>select city</option>
                            <option value="all_schools">All School</option>
                            @foreach($cities as $city)
                            <option value="{{$city->city}}">{{$city->city}}</option>
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
            <table id="school-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Lead ID</th>
                        <th>Student Name</th>
                        <th>Location</th>
                        <th>Admission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($leads as $lead)
                    <tr>
                        <td>{{$lead->id}}</td>

                        @if ($lead->student_name)
                        <td>{{ $lead->student_name }}</td>
                        @else
                        <td>
                            @php
                            $x= $lead->application;
                            $val = ($x[0]->elements[0]->value);
                            echo $val;
                            @endphp

                        </td>
                        @endif
                        <td>{{$lead->location}}</td>
                        <td>
                            @php
                            if($lead->admission == 1)
                            echo '<span class="badge badge-success-inverse">Yes</span>';
                            else
                            echo '<span class="badge badge-warning-inverse">No</span>';
                            @endphp
                        </td>

                        <td>
                            <a href="{{ route('admin.lead.details', $lead->id) }}" class="btn btn-info">View</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $leads->render("pagination::bootstrap-4")  }}
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