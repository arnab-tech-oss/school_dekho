@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Careers</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Job Add</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                {{-- <div class="widgetbar">
                    <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Board</button>
                </div>                         --}}
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <div class="contentbar">
        <!-- Start Container -->
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-10">
            <div class="card-header">
                <h5 class="card-title">Add Job</h5>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success col-md-12">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.career.job.post') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" class="form-control" name="job_title" placeholder="Enter title of job">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <select name="experince" class="form-control"  id="">
                                <option value="">Select Experience</option>
                                <option value="Freshers">Freshers</option>
                                <option value="1-3 years">1-3 years</option>
                                <option value="3-5 years">3-5 years</option>
                                <option value="above 5 years">above 5 years</option>
                            </select>

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="working_hours" placeholder="Enter Working hours">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="no_of_days" placeholder="Number of days in a week">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <textarea name="job_description" class="form-control summernote" cols="30" rows="10"></textarea>
                        </div>
                            <script>
                                $('.summernote').summernote({
                                    //placeholder: 'Blog Description',
                                    //tabsize: 5,
                                    height: 300,
                                    toolbar: [
                                        ['style', ['style']],
                                        ['font', ['bold', 'italic', 'underline', 'clear']],
                                        ['fontname', ['fontname']],
                                        ['fontsize', ['fontsize']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        ['height', ['height']],
                                        ['insert', ['picture', 'link', 'video', 'table', 'hr']],
                                        ['misc', ['fullscreen', 'codeview', 'help']]
                                    ]
                                });
                            </script>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6"><input type="text" class="form-control" name="salary" placeholder="Enter Salary Range"></div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" name="action" class="btn btn-primary">Add Job</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <!-- End Container -->
    </div>
                        
@endsection

@push('js')
@endpush
