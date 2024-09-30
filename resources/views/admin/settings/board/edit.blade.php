@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush


@section('content')

    <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">School Board Edit</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Board edit</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Board</button>
                </div>                        
            </div>
        </div>          
    </div>
    <!-- End Breadcrumbbar -->
    <div class="contentbar">
        <!-- Start Container -->
        {{-- <div class="col-md-6"> --}}
            <div class="card m-b-10">
                <div class="card-header">
                    <h5 class="card-title">Edit School Board Name</h5>
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
                    <form action="{{ route('admin.board.update') }}" method="POST" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <div class="form-row">
                        {{-- <div class="form-group col-md-6">
                            <label for="inputAddress">Edit Board Name</label>
                        </div> --}}
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" value="{{$board_details->id}}">
                            <input type="text" class="form-control" name="board" value="{{$board_details->board_name}}">
                        </div>
                       
                       </div>
                        <div class="form-row">
                            <div class="col-md-8">
                               <button type="submit" name="action" class="btn btn-primary">Update</button>
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