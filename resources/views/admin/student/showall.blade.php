@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
    <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Students List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{  route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student List</li>
                    </ol>
                </div>
            </div>
            
        </div>          
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->    
    <div class="contentbar">                
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-10">
                    <div class="card-header">                                
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">All Students</h5>
                            </div>
                            {{-- <div class="col-6">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item">
                                        <div class="form-group mb-0 amount-spent-select">
                                            <select class="form-control" id="formControlSelect">
                                            <option>All</option>
                                            <option>Last Week</option>
                                            <option>Last Month</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>                                        
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Queries</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach ($students as $student)
                                        <tr>
                                            <th scope="row">{{ $student->id }}</th>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->queries_count }}</td>
                                            <td>
                                                <div class="button-list">
                                                    <a href="{{ route('admin.student.view',$student->id) }}" class="btn btn-success-rgba"><i class="feather icon-eye"></i></a>
                                                    {{-- <a href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach
                                       
                                </tbody>
                            </table>
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection

@push('js')
    
@endpush