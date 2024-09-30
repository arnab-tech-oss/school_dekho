@extends('layouts.student.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
    <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Student History</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.students.all') }}">Students</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student details</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">

                </div>                        
            </div>
        </div>          
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->    
    <div class="contentbar">                
        
        <div class="row">
            <!-- Start col -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-10">
                    {{-- <div class="card-body"> --}}
                        {{-- <div class="row"> --}}
                    
                            {{-- <div class="col-lg-6 col-xl-7"> --}}
                                {{-- <p><span ="badge badge-light font-16">Pupular</span></p> --}}
                               
                                
                                <div class="card-body">
                                    <h2 class="font-22">History</h2>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Logo</th>
                                                    <th>School Name</th>
                                                    <th>School Address</th>
                                                    <th>Date</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($history as $history)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</th>
                                                    <td> <img src="{{$history->schools->school_logo}}" height="100" width="100"></td>
                                                    <td>{{ $history->schools->name }}</td>
                                                    <td>{{ $history->schooldetails->address }}</td>  
                                                    <td>{{date('d-m-Y', strtotime($history->created_at))}}</td>  
                                                    <td>{{ $history->count}}</td>                                                
                                                </tr>
                                                @empty
                                                    <p>No data.</p>
                                                @endforelse                                                
                                               
                                            </tbody>
                                        </table>
                                        
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>            
            <!-- End col -->
        </div>
        {{-- {{ $history->links() }} --}}
    </div>
    <!-- End Contentbar -->
@endsection

@push('js')
    <script src="{{ asset('assets')}}/js/custom/custom-ecommerce-single-product.js"></script>
    
@endpush