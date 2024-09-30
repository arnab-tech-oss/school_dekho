 @extends('layouts.admin.app')

 @section('title', 'Admin Dashboard')

 @push('css')
 @endpush

 @section('content')
     <div class="breadcrumbbar">
         <div class="row align-items-center">
             <div class="col-md-8 col-lg-8">
                 <h4 class="page-title">List Article Categories</h4>
                 <div class="breadcrumb-list">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                         {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                         <li class="breadcrumb-item active" aria-current="page">List Article Categories</li>
                     </ol>
                 </div>
             </div>
             <div class="col-md-4 col-lg-4">
                 <div class="widgetbar">
                     <a href="{{ route('admin.article.category.add') }}" class="btn btn-primary-rgba"><i
                             class="feather icon-plus mr-2"></i>Add Article Category</a>
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
                                 <th>Title</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($blog_article_categories as $category)
                                 <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $category->category_name }}</td>

                                     <td>
                                         <a href="" class="btn btn-info" onclick="showData({{$category}})" data-toggle="modal"
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
                <form action="{{route('admin.article.category.update')}}" method="POST">
                    @csrf
                     <div class="modal-body">
                         <div class="form-row">
                            <div class="form-group col-md-4"><label for="">Category Name</label></div>
                            <div class="form-group col-md-4">
                                <input type="hidden"  id="category_id" name="id">
                                <input type="text" class="form-control" id="content_data" name="category_name">
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
     <!-- End row -->

     <!-- End Contentbar -->

 @endsection

 @push('js')
 <script>
  function showData(category) 
   {
    console.log(category);
    document.getElementById("content_data").value = category.category_name;
    document.getElementById("category_id").value = category.id;
   }

 </script>
 @endpush
