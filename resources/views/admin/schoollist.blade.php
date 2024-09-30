@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')

            <!-- Start Contentbar -->    
                           
                <!-- Start row -->
                
                    <!-- Start col -->
                    
                    <!-- End col -->
                    <!-- Start col -->
                    
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">Data Export Table</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>School Name</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($schoollist as $list)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->address}}</td>
                                            <td>{{$list->city_id}}</td>
                                            <td>
                                                <a href="{{ url('admin/viewschool/') }}/{{$list->id}}"><i class="fa fa-eye"></i></a>
                                                <a href="{{ url('admin/editschool/') }}/{{$list->id}}"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                    <!-- End col -->
                
                <!-- End row -->
            
            <!-- End Contentbar -->




@endsection

@push('js')
    
@endpush