@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
<style>
    .form-group {
        margin-bottom: 1rem;
    }

    label {
        font-size: 1rem;
    }

    input.form-control,
    textarea.form-control,
    select.form-control {
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        padding: 0.375rem 0.75rem;
    }

    input.form-control::placeholder,
    textarea.form-control::placeholder {
        color: #6c757d;
        opacity: 1;
    }

    input.form-control:focus,
    textarea.form-control:focus,
    select.form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
@endpush

@section('content')
<!-- Start Breadcrumbbar -->

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add Article</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Add Article</li>
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
                <h5 class="card-title">Add New Article</h5>
            </div>
            @if (Session::has('success'))
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
                <form action="{{ route('admin.article.submit') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Article Title -->
                    <div class="form-group">
                        <label for="articleTitle" class="font-weight-bold">Article Title</label>
                        <input type="text" class="form-control" id="articleTitle" name="blog_title"
                            placeholder="Article Title" value="" required>
                        @error('blog_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Article URL -->
                    <div class="form-group">
                        <label for="articleUrl" class="font-weight-bold">Article Url</label>
                        <input type="text" class="form-control" id="articleUrl" name="custom_url"
                            placeholder="Article URL" value="">

                    </div>
                    <div class="form-group">
                        <label for="articleBannerImage" class="font-weight-bold">Article Banner Image</label>
                        <input type="file" class="form-control" id="articleUrl" name="banner_image">

                    </div>
                    <div class="form-group">
                        <label for="school">Do you want to add it on school?</label>
                        <select class="form-control" name="" id="school_choice" onchange="SchoolChoice()">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group" id="select_school" style="display: none;">
                        <label for="school">Select School</label>
                        <select class="form-control select2" name="school_id" id="">
                            <option value="">Select School</option>
                            @foreach ($all_schools as $school)
                            @if (isset($school->school_address[0]))
                            <option value="{{ $school->id }}">
                                {{ $school->name }},{{ $school?->school_address[0]?->address }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- Category -->
                    <script>
                        function SchoolChoice() {
                            if ($('#school_choice').val() == 'Yes') {
                                $('#select_school').show();
                            } else {
                                $('#select_school').hide();
                            }
                        }
                    </script>
                    <div class="form-group">
                        <label for="articleCategories" class="font-weight-bold">Category</label>
                        <select class="form-control select2" id="articleCategories" name="article_blog_category_id"
                            required>
                            <option value="">Select Category</option>
                            @foreach ($all_article_blog_categories as $Articlecategory)
                            <option value="{{ $Articlecategory->id }}">{{ $Articlecategory->category_name }}</option>
                            @endforeach
                        </select>
                        @error('article_blog_category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="form-group">
                        <label for="metaDescription" class="font-weight-bold">Meta Description</label>
                        <textarea id="summernote" name="blog_meta_description" class="form-control" rows="4"
                            placeholder="Article Meta Description" required></textarea>
                        @error('blog_meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- <script>
                        $('#summernote').summernote({
                            placeholder: 'Article Meta Description',
                            tabsize: 2,
                            height: 150
                        });
                    </script> --}}

                    <!-- Article Description -->
                    <div class="form-group">
                        <label for="articleDescription" class="font-weight-bold">Article Description</label>
                        <textarea type="text" id="summernote2" name="blog_content" class="form-control"
                            placeholder="Article Description" required>
                        </textarea>
                        @error('article_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <script>
                        $('#summernote2').summernote({
                            placeholder: 'Article Description',
                            tabsize: 2,
                            height: 300,
                            toolbar: [
                                ['style', ['style']],
                                ['font', ['bold', 'italic', 'underline', 'clear', 'superscript', 'subscript']],

                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph', 'height']],
                                ['insert', ['link', 'picture', 'video', 'hr']],
                                ['table', ['table']],
                                ['view', ['fullscreen', 'codeview', 'help']],
                                ['misc', ['undo', 'redo']]
                            ],
                            callbacks: {
                                onInit: function() {
                                    $('#summernote').on('summernote.change', function() {

                                    });
                                },
                                onEnter: function() {
                                    console.log('Enter/Return key pressed');
                                },
                                onFocus: function() {
                                    console.log('Editable area is focused');
                                },
                                onBlur: function() {
                                    console.log('Editable area loses focus');
                                },
                                onKeyup: function(e) {
                                    console.log('Key is released:', e.keyCode);
                                },

                            }
                        });
                    </script>

                    <!-- Writer Profile -->
                    <div class="form-group">
                        <label class="font-weight-bold mb-2">Writer Profile</label>
                        <div class="form-group">
                            <label for="writerName" class="font-weight-bold">Name</label>
                            <select class="form-control" name="blog_article_writer_id" id="" required>
                                <option value="">Select a Writer</option>
                                @foreach ($all_article_writers as $articleWriter)
                                <option value="{{ $articleWriter->id }}">{{ $articleWriter->writer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add New Article</button>
                </form>
            </div>
        </div>

    </div>

    <!-- End Container -->

    @endsection

    @push('js')
    @endpush