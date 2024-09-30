@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
</script>
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add Blog</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
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
            <h5 class="card-title">Add New Blog</h5>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
        @endif
        @if (Session::has('failure'))
        <div class="alert alert-danger col-md-12">
            {{ Session::get('failure') }}
            @php
            Session::forget('failure');
            @endphp
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('admin.blog.add.new') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Blog Title</label>
                        <input type="text" class="form-control" name="name" id="inputAddress" placeholder="Blog Title" value="">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Category</label>
                        <select class="form-control select2" id="blog_categories" name="blog_categories[]" multiple>
                            @foreach($allblogcategories as $blogcategory)
                            <option value="{{$blogcategory->id}}">{{$blogcategory->name}}</option>
                            @endforeach
                        </select>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Meta Key Words</label>
                        <input type="text" class="tags" style="width:100%" name="meta_keywords" id="inputAddress" placeholder="Blog Meta Keywords" value="">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Tag</label>
                        <select class="form-control select2" id="blog_tags" name="blog_tags[]" multiple>
                            @foreach($allblogtags as $blogtag)
                            <option value="{{$blogtag->id}}">{{$blogtag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="altImage">Alt Tag For Image</label>
                            <input type="text" name="alt_image" class="form-control"
                                placeholder="Enter alt tag for image">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tagImage">Image Title</label>
                            <input type="text" name="image_title" class="form-control"
                                placeholder="Enter title for image">
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="inputAddress">Meta Description</label>
                        <textarea id="summernote" name="meta_description" class="form-control"></textarea>
                    </div>
                    <script>
                        $('#summernote').summernote({
                            placeholder: 'Blog Meta Description',
                            tabsize: 5,
                            height: 300
                        });
                    </script>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="inputAddress">Blog Description</label>
                        <textarea id="summernote2" name="blog_description" class="form-control"></textarea>
                    </div>
                    <script>
                        $('#summernote2').summernote({
                            placeholder: 'Blog  Description',
                            tabsize: 5,
                            height: 300
                        });
                    </script>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Short Description</label>
                        <input type="text" class="form-control" name="short_description">
                    </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Approximate time</label>
                            <input type="text" class="form-control" name="approaximate_time"
                                placeholder="Enter approaximate time">
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Upload Blog Picture</label>
                        <input type="file" name="file">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add New Blog</button>
            </form>
        </div>
    </div>
    {{-- </div> --}}
</div>

<!-- End Container -->

@endsection

@push('js')

@endpush