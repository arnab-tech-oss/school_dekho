@extends('layouts.whatsapp.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Send message</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Send Message</li>
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
                <h5 class="card-title">Send Messages</h5>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success col-md-12">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('whatsapp.send-message') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Enter Number</label>
                            <input type="text" class="form-control" name="phone" id="inputAddress"
                                placeholder="Enter number to send" value="">
                        </div>
                        <div class="form-group col-md-6" style="margin-top: 30px">
                            <span class="btn btn-primary" onclick='addInput()'>Add</span>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-6 dynamic" id="input-cont"
                            style="padding-top: 10px;gap:12px;display:grid">
                        </div>
                    </div>
                    <style>
                        .dynamic-span {
                            display: inline-block;
                            margin-left: 10px;
                            background-color: #F9F9ED;
                            font-size: 18px;
                            border: thin solid #d4d4d4;
                            margin-top: 10px;
                            padding: 4px 12px;
                        }
                    </style>
                    <div class="form-group form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Upload Image</label>
                            <input type="file" class="form-control" name="logo_path" id="logo_path">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Enter Message</label>
                            <textarea class="form-control" id="inputAddress" name="about" placeholder="Write text message to send..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>
    <script>
        const container = document.getElementById('input-cont');
        // Call addInput() function on button click
        function addInput() {
            let div = document.createElement('div');
            div.style.display = "flex";
            container.appendChild(div);
            let input = document.createElement('input');
            input.placeholder = 'Enter Number';
            input.name = "phone[]";
            input.classList = "form-control";
            input.style.marginTop = "10px";
            div.appendChild(input);
            let minus = document.createElement("span");
            minus.classList = "dynamic-span";
            div.appendChild(minus);
            minus.style.color = "red";
            minus.style.display = "block";
            minus.setAttribute("onclick", "removeField(this)");
            let minusText = document.createTextNode("-");
            minus.appendChild(minusText);
        }

        function removeField(minusElement) {
            minusElement.parentElement.remove();
        }
    </script>
    <!-- End Container -->
@endsection
@push('js')
@endpush
