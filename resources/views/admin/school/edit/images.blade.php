@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<script>
    function loadFile(event, index) {
        var output = document.getElementsByClassName('output')[index];
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    }

    function updateimage(index) {
        var file = document.getElementsByClassName('file')[index].files[0];

        var model = new FormData();
        model.append("file", file);
        model.append("position", index);
        model.append("id", document.getElementById("id").value);

        console.log({file:file,id:document.getElementById("id").value,position:index});

        var request = fetch('/image/update', { 
            method: "post",
            body: model,
            
        }).then(res => {
            return res.json();
        });

        request.then(res => {
            if(!res.is_success){
                alert(res.message);
                return;
            }
            else{
                alert(res.message);
                window.history.go(0);
            }
        }).catch(res=>{
            console.log(res)
        })

    }
    function deleteimage(index)
    {
        var file = document.getElementsByClassName('file')[index].files[0];

        var model = new FormData();
        model.append("file", file);
        model.append("position", index);
        model.append("id", document.getElementById("id").value);
        var request = fetch('/image/delete', {
            method: "post",
            body: model,

        }).then(res => {
            return res.json();
        });

        request.then(res => {
            if(!res.is_success){
                alert(res.message);
                return;
            }
            else{
                alert(res.message);
                window.history.go(0);
            }
        }).catch(res=>{
            console.log(res)
        })

    }
</script>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
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
            <form action="{{ route('admin.school.image.new') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" id="id" name="id" value="{{$images->school_id}}">
                <div class="form-row">
                    
                    @if($images=$images->school_image)
                    @foreach($images as $key => $image)
                    <div class="form-group col-md-4">
                        <img src="{{$image}}" class="output" height="100" width="100">
                    </div>
                    <div class="form-group col-md-2">

                        <input type="file" class="form-control file" name="filenames[]" id="logo_path" onchange="loadFile(event,'{{$key}}')">

                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-primary" onclick="updateimage('{{$key}}')">Change</button>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-danger" onclick="deleteimage('{{$key}}')">Delete</button>
                    </div>
                    @endforeach
                    @endif
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Add School Gallery pictures</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Upload pictures</label>
                        <input type="file" class="form-control" name="filenewnames[]" id="logo_path" multiple>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <button type="submit" name="action" value="previous" class="btn btn-primary">Update</button>
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