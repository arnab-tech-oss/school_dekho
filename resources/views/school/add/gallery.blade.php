@extends('layouts.school.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('school.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
                                <h5 class="card-title">Add School Pictures</h5>
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
                                <form action="{{ route('school.gallery.new') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Add School Gallery pictures</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Upload pictures</label>
                                        <input type="file" class="form-control" name="filenames[]" id="logo_path" multiple>
                                        
                                    </div>
                                   
                                   </div>
                                    <div class="form-row">
                                        <div class="col-md-8">
                                           <button type="submit" name="action" value="previous" class="btn btn-primary">&laquo;Previous</button>
                                        </div>
                                        <div class="col-md-4">
                                           <button type="submit" name="action" value="next" class="btn btn-primary">Save & Next&raquo;</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    {{-- </div> --}}
                    </div>
        <!-- End Container -->


@endsection

@push('js')
    
@endpush