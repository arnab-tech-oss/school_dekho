@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add Admission School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Add Trending School</li>
                </ol>
            </div>
        </div>

    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Container -->
<div class="contentbar">
    {{-- <div class="col-md-6"> --}}
    <div class="card m-b-10">
        <div class="card-header">
            <h5 class="card-title">Trending Schools</h5>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('admin.school.trending.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputAddress">School Name</label>
                        <select class="form-control example" name="selected_schools[]" multiple>
                         @foreach($school_trending as $school)
                            <option value="{{$school->id}}"
                            @if(in_array($school->id,$school_ids))
                            selected
                            @endif
                            >{{$school->name}}&nbsp;{{ $school->address }}</option>
                         @endforeach
                        </select>
                        
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Trending</button>
            </form>
        </div>
    </div>
    {{-- </div> --}}
</div>

<!-- End Container -->



@endsection

@push('js')
<script type="text/javascript">
   $(document).ready(function() {
    $('.example').select2();
});
</script>
@endpush

