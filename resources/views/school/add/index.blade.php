@extends('layouts.school.app')

@section('title','Admin Dashboard')

@push('css')
 
@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Add School</li>
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
                <h5 class="card-title">Add New School</h5>
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
                <form action="{{ route('school.school.new') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">School Name</label>
                            <input type="text" class="form-control" name="name" id="inputAddress" placeholder="Summit School" value="">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Upload Logo</label>
                            <input type="file" class="form-control" name="logo_path" id="logo_path" required>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">About</label>

                        <textarea class="form-control" id="inputAddress" name="about" placeholder="Our School is.." required></textarea>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Name of the Principal</label>
                        <input type="text" class="form-control" name="principal_name" id="inputAddress" placeholder="Enter Principal Name" required>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Upload Principal's Pic</label>
                        <input type="file" class="form-control" name="principal_path" id="principal_path" required>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Principal Message</label>

                        <textarea class="form-control" id="inputAddress" name="principal_desk" placeholder="Principal Desk.." required></textarea>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">School Category</label>
                            <select id="inputState" class="form-control" name="category" required>
                                <option value="">Choose...</option>
                                @foreach($allcategory as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Registration Number</label>
                            <input type="text" class="form-control" name="registration_no" id="inputZip" placeholder="Enter Registration Number" required>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputZip">Board Name</label>
                            <select id="inputState" class="form-control" name="board" required>
                                <option value="">Choose...</option>
                                @foreach($allboards as $boards)
                                <option value="{{$boards->id}}">{{$boards->board_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Medium</label>
                            <select id="inputState" class="form-control" name="school_medium_id" required>
                                <option value="">Choose...</option>
                                @foreach($allmedium as $medium)
                                <option value="{{$medium->id}}">{{$medium->medium}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type">School Type</label>
                            <select class="form-control" name="school_type">
                                <option value="">choose</option>
                                <option value="Boys">Boys</option>
                                <option value="Girls">Girls</option>
                                <option value="Co-ed">Co-ed</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add New School</button>
                </form>
            </div>
        </div>
{{-- </div> --}}
    </div>

<!-- End Container -->


@endsection

@push('js')

@endpush