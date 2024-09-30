@extends("layouts.admin.app")

@section("title", "Admin Dashboard")

@push("css")
@endpush

@section("content")
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Edit School</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Edit School Info</li>
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
                <h5 class="card-title">Edit School</h5>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route("admin.school.info.update") }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">School Name</label>
                            <input id="inputAddress" type="text" class="form-control" name="name"
                                placeholder="Summit School" value="{{ $school->name }}">
                            <input type="hidden" name="id" value="{{ $school->id }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Upload Logo</label>
                            <input id="logo_path" type="file" class="form-control" name="logo_path">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">About School</label>

                        <textarea id="inputAddress" class="form-control" name="about" rows="7" placeholder="Our School is..">{{ $school->about }}</textarea>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Name of the Principal</label>
                            <input id="inputAddress" type="text" class="form-control" name="principal_name"
                                placeholder="Enter Principal Name" value="{{ $school->principal_name }}">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Upload Principal's Pic</label>
                            <input id="principal_path" type="file" class="form-control" name="principal_path">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Designation of Principal</label>
                            <input type="text" class="form-control" name="principal_designation"
                                value="{{ $school?->principal_designation }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Principal Message</label>

                        <textarea id="inputAddress" class="form-control" name="principal_desk" rows="5" placeholder="Principal Desk..">{{ $school->principal_desk }}</textarea>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">School Category</label>
                            <select id="inputState" class="form-control" name="category" required>
                                {{-- <option value="{{$school->categories->id}}">{{$school->categories->category}}</option> --}}
                                @foreach ($allcategory as $category)
                                    <option value="{{ $category->id }}" @if ($school->categories->id == $category->id) selected @endif>
                                        {{ $category->category }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Registration Number</label>
                            <input id="inputZip" type="text" class="form-control" name="registration_no"
                                placeholder="Enter Registration Number" value="{{ $school->registration_no }}">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputZip">Board Name</label>
                            <select id="inputState" class="form-control" name="board" required>
                                {{-- <option value="{{$school->boards->id}}">{{$school->boards->board_name}}</option> --}}
                                @foreach ($allboards as $boards)
                                    <option value="{{ $boards?->id }}" @if ($school?->boards?->id == $boards?->id) selected @endif>
                                        {{ $boards?->board_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Medium</label>
                            <select id="inputState" class="form-control" name="school_medium_id" required>
                                {{-- <option value="{{$school->medium->id}}">{{$school->medium->medium}}</option> --}}
                                @foreach ($allmedium as $medium)
                                    <option value="{{ $medium?->id }}" @if ($school->medium?->id == $medium?->id) selected @endif>
                                        {{ $medium?->medium }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type">School Type</label>
                            <select class="form-control" name="school_type">
                                {{-- <option value="{{$school->school_type}}">{{$school->school_type}}</option> --}}
                                <option value="boys" @if ($school->school_type == "boys") selected @endif>Boys</option>
                                <option value="Girls" @if ($school->school_type == "Girls") selected @endif>Girls</option>
                                <option value="Co-Ed" @if ($school->school_type == "Co-Ed") selected @endif>Co-ed</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>

    <!-- End Container -->

@endsection

@push("js")
@endpush
