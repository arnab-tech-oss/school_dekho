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
            <h5 class="card-title">All Front Enquiry List</h5>
        </div>
       
        <div class="card-body">
            
            <table id="school-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Enquiry ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Query For</th>
                        <th>Date of Query</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($enquiries as $enquery)
                    <tr>
                        <td>{{ $enquery->id }}</td>
                        <td>{{ $enquery->name }}</td>
                        <td>{{ $enquery->phone }}</td>
                        <td>{{ $enquery->class_enquiry }}</td>
                        <td>{{ $enquery->created_at }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $enquiries->render("pagination::bootstrap-4")  }}
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