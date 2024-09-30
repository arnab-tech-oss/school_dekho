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
                <h4 class="page-title">Edit Article</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
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
                <h5 class="card-title">Edit Article</h5>
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
                <form action="{{ route('admin.article.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Article Title -->
                    <div class="form-group">
                        <label for="articleTitle" class="font-weight-bold">Article Title</label>
                        <input type="text" class="form-control" id="articleTitle" name="blog_title"
                            placeholder="Article Title" value="{{ $article_details->blog_title }}" required>
                        <input type="hidden" class="form-control" name="blog_id" value="{{ $article_details->id }}">
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
                            placeholder="Article URL" value="{{ $article_details->custom_url }}">

                    </div>
                    <div class="form-group">
                        <label for="articleBannerImage" class="font-weight-bold">Article Banner Image</label>
                        <input type="file" class="form-control" id="articleUrl" name="banner_image">

                    </div>
                    @if (isset($article_details->school_id))
                        <div class="form-group">
                            <label for="school">Do you want to add it on school?</label>
                            <select class="form-control" name="" id="school_choice" onchange="SchoolChoice()">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="school">Do you want to add it on school?</label>
                            <select class="form-control" name="" id="school_choice2" onchange="SchoolChoice2()">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    @endif
                    @if (isset($article_details->school_id))
                        <div class="form-group" id="select_school">
                            <label for="select_school">Select School</label>
                            <select name="school_id" id="choice_school" class="form-control select2">
                                <option value="">Select School</option>

                                @foreach ($all_schools as $school)
                                    @if (isset($school->school_address[0]))
                                        <option value="{{ $school->id }}"
                                            @if ($article_details->school_id == $school->id) selected @endif>
                                            {{ $school->name }},{{ $school?->school_address[0]?->address }}
                                        </option>
                                    @endif
                                @endforeach

                            </select>

                        </div>
                    @else
                        <div class="form-group" id="select_school2" style="display: none;">
                            <label for="select_school">Select School</label>
                            <select name="school_id" id="choice_school2" class="form-control select2">
                                <option value="">Select School</option>
                                @foreach ($all_schools as $school)
                                    @if (isset($school->school_address[0]))
                                        <option value="{{ $school->id }}"
                                            @if ($article_details->school_id == $school->id) selected @endif>
                                            {{ $school->name }},{{ $school?->school_address[0]?->address }}
                                        </option>
                                    @endif
                                @endforeach

                            </select>

                        </div>
                    @endif
                    <script>
                        function SchoolChoice() {
                            if ($('#school_choice').val() == 'Yes') {
                                $('#select_school').show();
                            } else {
                                $('#choice_school').val('');
                                $('#select_school').hide();
                            }
                        }
                        function SchoolChoice2() {
                            if ($('#school_choice2').val() == 'Yes') {
                                $('#select_school2').show();
                            } else {
                                $('#choice_school2').val('');
                                $('#select_school2').hide();
                            }
                        }
                    </script>
                    <!-- Category -->
                    <div class="form-group">
                        <label for="articleCategories" class="font-weight-bold">Category</label>
                        <select class="form-control select2" id="articleCategories" name="article_blog_category_id"
                            required>
                            <option value="">Select Category</option>
                            @foreach ($all_article_blog_categories as $Articlecategory)
                                <option value="{{ $Articlecategory->id }}"
                                    @if ($article_details->article_blog_category_id == $Articlecategory->id) selected @endif>{{ $Articlecategory->category_name }}
                                </option>
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
                            placeholder="Article Meta Description" required>{{ $article_details->blog_meta_description }}</textarea>
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
                        <textarea id="summernote2" name="blog_content" class="form-control" placeholder="Article Description" required>{{ $article_details->blog_content }}</textarea>
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
                                // ['fontname', ['fontname']],
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
                                    console.log('Summernote is launched');
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
                                // onImageUpload: function(files) {
                                //     for (let i = 0; i < files.length; i++) {
                                //         uploadImage(files[i]);
                                //     }
                                // },
                                // onMediaDelete: function(target) {
                                //     deleteImage(target[0].src);
                                // }
                            }
                        });

                        // function uploadImage(file) {
                        //     const data = new FormData();
                        //     data.append("file", file);

                        //     const progressBar = $('.progress');
                        //     const progressBarStatus = $('.progress-bar');

                        //     progressBar.show();
                        //     progressBarStatus.width('0%').attr('aria-valuenow', 0);

                        //     $.ajax({
                        //         url: '/upload_image', 
                        //         method: 'POST',
                        //         data: data,
                        //         contentType: false,
                        //         cache: false,
                        //         processData: false,
                        //         xhr: function() {
                        //             const xhr = new window.XMLHttpRequest();
                        //             xhr.upload.addEventListener("progress", function(evt) {
                        //                 if (evt.lengthComputable) {
                        //                     const percentComplete = evt.loaded / evt.total * 100;
                        //                     progressBarStatus.width(percentComplete + '%').attr('aria-valuenow',
                        //                         percentComplete);
                        //                 }
                        //             }, false);
                        //             return xhr;
                        //         },
                        //         success: function(response) {

                        //             const imageUrl = response.url;
                        //             $('#summernote2').summernote('insertImage', imageUrl);

                        //             progressBar.hide();
                        //         },
                        //         error: function(xhr, status, error) {
                        //             console.error('Image upload failed:', status, error);
                        //             alert('Image upload failed. Please try again.');

                        //             progressBar.hide();
                        //         }
                        //     });
                        // }

                        // function deleteImage(src) {
                        //     $.ajax({
                        //         url: '/delete_image', 
                        //         method: 'POST',
                        //         data: {
                        //             src: src
                        //         },
                        //         success: function(response) {
                        //             console.log('Image deleted:', src);
                        //         },
                        //         error: function(xhr, status, error) {
                        //             console.error('Image deletion failed:', status, error);
                        //             alert('Image deletion failed. Please try again.');
                        //         }
                        //     });
                        // };
                    </script>
                    <div class="form-group">
                        <label for="">Active/Deactive</label>
                        <select class="form-control" name="status" id="article_status" required>
                            <option value="" selected disabled>Select</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                    <!-- Writer Profile -->
                    <div class="form-group">
                        <label class="font-weight-bold mb-2">Writer Profile</label>
                        <div class="form-group">
                            <label for="writerName" class="font-weight-bold">Name</label>
                            <select class="form-control" name="blog_article_writer_id" id="" required>
                                <option value="">Select a Writer</option>
                                @foreach ($all_article_writers as $articleWriter)
                                    <option value="{{ $articleWriter->id }}"
                                        @if ($article_details->blog_article_writer_id == $articleWriter->id) selected @endif>{{ $articleWriter->writer_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Article</button>
                </form>
            </div>
        </div>

    </div>

    <!-- End Container -->

@endsection

@push('js')
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var select = document.getElementById('article_status');
            if (select.value === "") {
                select.setCustomValidity('Please select an option.');
            } else {
                select.setCustomValidity('');
            }
        });
    </script>
@endpush
