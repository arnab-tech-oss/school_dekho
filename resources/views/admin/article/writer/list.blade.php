 @extends('layouts.admin.app')

 @section('title', 'Admin Dashboard')

 @push('css')
 @endpush

 @section('content')
     <div class="breadcrumbbar">
         <div class="row align-items-center">
             <div class="col-md-8 col-lg-8">
                 <h4 class="page-title">List Article Writers</h4>
                 <div class="breadcrumb-list">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                         {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                         <li class="breadcrumb-item active" aria-current="page">List Article Writers</li>
                     </ol>
                 </div>
             </div>
             <div class="col-md-4 col-lg-4">
                 <div class="widgetbar">
                     <a href="{{ route('admin.article.writer.add') }}" class="btn btn-primary-rgba"><i
                             class="feather icon-plus mr-2"></i>Add Article Writer</a>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Breadcrumbbar -->
     <!-- Start Contentbar -->

     <!-- Start row -->

     <!-- Start col -->

     <!-- End col -->
     <!-- Start col -->
     <div class="contentbar">
         {{-- <div class="col-md-6"> --}}
         <div class="card m-b-10">
             <div class="card-header">
                 <h5 class="card-title">All Article Categories</h5>
             </div>
             <div class="card-body">
                 {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                 <div class="table-responsive">
                     <table id="datatable-buttons" class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>Sl No</th>
                                 <th>Writer Name</th>
                                 <th>Writer About</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($all_writers as $writer)
                                 <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $writer->writer_name }}</td>
                                     <td>{{ $writer->writer_about }}</td>
                                     <td>
                                         <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                             data-target="#viewModal" onclick="showData({{$writer}})">View</a>
                                         <a href="#" class="btn btn-info btn-sm" onclick="updateData({{$writer}})" data-toggle="modal"
                                             data-target="#editModal">Edit</a>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- </div> --}}
     </div>
     <!-- End col -->
     <!-- Modal -->
    
     <!-- End row -->
     <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">View Writer Details</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
              
                    @csrf
                     <div class="modal-body">
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Writer Name</label></div>
                            <div class="form-group col-md-4" id="writer_name">
                                
                            </div>
                         </div> 
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Writer About</label></div>
                            <div class="form-group col-md-4" id="writer_about">
                                
                            </div>
                         </div> 
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Social Media</label></div>
                            <div class="form-group col-md-4" id="social_media">
                                
                            </div>
                         </div> 
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Writer Description</label></div>
                            <div class="form-group col-md-4" id="writer_description">
                                
                            </div>
                         </div> 
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         
                     </div>
               
             </div>
         </div>
     </div>
     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                <form action="{{route('admin.article.writer.update')}}" method="POST">
                    @csrf
                     <div class="modal-body">
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Writer's  Name</label></div>
                            <div class="form-group col-md-4">
                                <input type="hidden"  id="writer_id" name="writer_id">
                                <input type="text" class="form-control" id="writer_name_id" name="writer_name">
                            </div>
                         </div>
                          <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Writer About</label></div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="writer_about_id" name="writer_about">
                            </div>
                         </div> 
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Social Media</label></div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="social_media_id" name="social_media">
                            </div>
                         </div> 
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Writer Description</label></div>
                            <div class="form-group col-md-4" id="">
                                <textarea class="form-control" name="writer_description" id="writer_description_id" cols="30" rows="10"></textarea>
                            </div>
                         </div>  
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
                     </div>
                </form>
             </div>
         </div>
     </div>
     <!-- End Contentbar -->

 @endsection

 @push('js')
 <script>
    function showData(writer)
    {
        document.getElementById('writer_name').innerHTML = writer.writer_name;
        document.getElementById('writer_about').innerHTML = writer.writer_about;
        document.getElementById('social_media').innerHTML = writer.social_media;
        document.getElementById('writer_description').innerHTML = writer.writer_description;
    }

    function updateData(writer)
    {
        document.getElementById('writer_id').value = writer.id;
        document.getElementById('writer_name_id').value = writer.writer_name;
        document.getElementById('writer_about_id').value = writer.writer_about;
        document.getElementById('social_media_id').value = writer.social_media;
        document.getElementById('writer_description_id').value = writer.writer_description;
    }
 </script>
 @endpush
