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
                <a href="{{ route('admin.school.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add School</a>
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
    {{-- <div class="col-md-6"> --}}
    <div class="card m-b-10">
        <div class="card-header col-12">
            <h5 class="card-title">All Registered Schools</h5>
            <form method="GET"  action="{{route('admin.school.list')}}">
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="search" class="form-control" name="q" value="{{isset($q)?$q:''}}" >
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn-md btn-primary" style="padding: 6px;">Search</button>
                </div>
            </div>
            </form>
        </div>
        <div class="card-body">
            {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
            {{-- <div class="table-responsive"> --}}
            <table id="school-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>School Name</th>
                        <th>Address</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_verified_school_list as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->name}}</td>
                        <td>@if ($list->school_address)
                            {{ $list->school_address[0]->address }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.school.details', $list->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.school.remove.verification', $list->id) }}" class="btn btn-danger">Remove Blue Tick</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $all_verified_school_list->appends($_GET)->render("pagination::bootstrap-4")  }}
        {{-- </div> --}}
    </div>
    {{-- </div> --}}
</div>
<!-- End col -->

<!-- End row -->

<!-- End Contentbar -->

@endsection

@push('js')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
   $(document).ready(function(){
    $('#state_dropdown').on('change',function(){
        var state_id = $(this).val();
        $('#district_dropdown').html('<option value="">-- Select State First --</option>');
        $.ajax({
            url: "{{route('admin.district.list')}}",
            type: "GET",
            data: {
                // _token: "{{ csrf_token() }}",
                state_id:state_id
            },
            success: function (data) {
                $('#district_dropdown').html('<option value="">-- Select District --</option>');
                $.each(data,function(key,value){
                    $('#district_dropdown').append('<option value="'+value.id+'">'+value.district+'</option>');
                })
            }
        })       
    })
   });
 </script>
@endpush