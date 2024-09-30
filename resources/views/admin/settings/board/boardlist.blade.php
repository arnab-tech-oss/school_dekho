@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush


@section('content')

    <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">School Boards List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Board List</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('admin.board.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Board</a>
                </div>                        
            </div>
        </div>          
    </div>
    <!-- End Breadcrumbbar -->
    <div class="contentbar">
        <!-- Start Container -->
        {{-- <div class="col-lg-12"> --}}
            <div class="card m-b-10">
                <div class="card-header">
                    <h5 class="card-title">School Board List</h5>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table table-borderless">
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Board</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($board_list as $boards)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$boards->board_name}}</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{ route('admin.board.edit', $boards->id) }}" class="btn btn-primary-rgba"><i class="feather icon-edit"></i></a>
                                        </div>
                                    </td>
                            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>          
                    </div>

                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- End Container -->
    </div>

@endsection

@push('js')
    
@endpush