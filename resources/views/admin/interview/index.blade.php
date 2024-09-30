@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')

    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{trans ('custom.interview.index.head')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li> --}}

                        <li class="breadcrumb-item active" aria-current="page">{{trans ('custom.interview.index.sub-head')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <!-- <div class="widgetbar">
                    <a href="{{ route('admin.article.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Article</a>
                </div> -->
            </div>
        </div>
    </div>

    <div class="contentbar">

        <div class="card m-b-10">
            <div class="card-header">
                <h5 class="card-title">{{trans ('custom.interview.index.title')}}</h5>
            </div>
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>School Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_interview as $interview)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $interview->name }}</td>
                                <td>{{ $interview->number }}</td>
                                <td>{{ $interview->school_name }}</td>
                                <td>
                                    <a href="{{route('admin.interview.view', $interview->id)}}" target="_blank" class="btn btn-info">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $all_interview->render("pagination::bootstrap-4")  }}
            </div>
        </div>

    </div>

@endsection

@push('js')
@endpush
