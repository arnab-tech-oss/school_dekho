@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
<style>
    .nav-tab {
        overflow-x: auto;
        display: flex ;
        flex-wrap: nowrap !important;
    }
    .nav-tab li a {
        display: flex !important ;
        flex-wrap: nowrap ;
        white-space: nowrap;
    }
</style>
    @if(!$school_exists)
    <script>
        alert("You are not authorized");
        window.location.reload(history.back());
    </script>
    @endif
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Update Details: <span class="text-primary">{{$school_details->name}}</span></h4>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <!-- Dashboard Tabs Start -->
                <div class="dashboard-tabs-menu">
                    <ul class="nav-tab">
                        <li><a href="{{ route('schooladmin.about_new.edit', $school_gallery->school_id) }}">About</a></li>
                        <li><a href="{{ route('schooladmin.principal_new.edit', $school_gallery->school_id) }}">Principal</a>
                        </li>
                        <li><a href="{{ route('schooladmin.contact_new.edit', $school_gallery->school_id) }}">Contacts</a>
                        </li>
                        <li><a
                                href="{{ route('schooladmin.eligibility_new.edit', $school_gallery->school_id) }}">Eligibility</a>
                        </li>
                        <li><a href="{{ route('schooladmin.fees_new.edit', $school_gallery->school_id) }}">Fees
                                Structure</a></li>
                        <li><a href="{{ route('schooladmin.opening_hour_new.edit', $school_gallery->school_id) }}">Opening
                                Hours</a></li>
                        <li><a
                                href="{{ route('schooladmin.facilities_new.edit', $school_gallery->school_id) }}">Facilities</a>
                        </li>
                        <li><a class="active" href="#">Gallery</a></li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <div class="row gy-6">
                    <div class="col-lg-10">
                        <!-- Dashboard Settings Info Start -->
                        <div class="dashboard-content-box">
                            <h4 class="dashboard-content-box__title">Gallery</h4>
                            <p>Max 5 Uploads.</p>
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <style>
                                        .c-button {
                                            background: #0071dc;
                                            color: #FFFFFF;
                                            border: none;
                                            cursor: pointer;
                                            font-weight: 600;
                                            /* position: absolute; */
                                            /* left: 22px;
                                                                                                                                                                                                                                                    bottom: 22px; */
                                            padding: 0 20px;
                                            height: 52px;
                                            line-height: 52px;
                                            border-radius: 5px;
                                            font-size: 14px;
                                        }
                                        .output {
                                            margin-left: auto;
                                            margin-right: auto;
                                            height: 200px;
                                        }
                                        .dashboard-settings-profile {
                                            display: flex;
                                        }
                                        .action-panel {
                                            display: flex;
                                            flex-direction: column;
                                            gap: 10px;
                                        }
                                        .dashboard-settings-profile {
                                            height: unset;
                                            position: unset;
                                        }
                                        .dashboard-settings-profile__photo-meta {
                                            text-align: unset;
                                            padding-left: unset;
                                        }
                                    </style>
                                    <!-- Dashboard Settings Info Start -->
                                    <input type="hidden" name="" id="id"
                                        value="{{ $school_gallery->school_id }}">
                                    @foreach ($school_gallery->school_image as $key => $school_image)
                                        <div class="dashboard-content-box">
                                            <h4 class="dashboard-content-box__title">Picture {{ $loop->iteration }}</h4>
                                            <div class="dashboard-settings-profile">
                                                <img src="{{ $school_image }}" class="output">
                                                <div id="photo-meta-area" class="dashboard-settings-profile__photo-meta">
                                                    <div class="action-panel"><span>Photo Size: Max<strong> 2
                                                                Mb</strong></span>
                                                        <button class="c-button" id="fileButton{{ $loop->iteration }}">
                                                            <i class="far fa-camera"></i> &nbsp; Select Image
                                                        </button>
                                                        <input type="file" class="file"
                                                            id="hiddenFileInput{{ $loop->iteration }}"
                                                            style="display: none;"onchange="loadFile(event,'{{ $key }}')">
                                                        <button class="c-button" id="fileButton{{ $loop->iteration }}"
                                                            onclick="updateimage('{{ $key }}')">
                                                            <i class="far fa-edit"></i> &nbsp; Change
                                                        </button>
                                                        <button style="background: #dc0000;" class="c-button"
                                                            id="fileButton{{ $loop->iteration }}"
                                                            onclick="deleteimage('{{ $key }}')">
                                                            <i class="far fa-trash"></i> &nbsp; Delete
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="profile-photo-option"
                                                    class="dashboard-settings-profile__photo-option">
                                                    <span class="profile-photo-uploader"><i class="far fa-upload"></i>
                                                        Upload Photo</span>
                                                    <span class="profile-photo-deleter"><i class="far fa-trash-alt"></i>
                                                        Delete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Dashboard Settings Info End -->
                                    @endforeach
                                </div>
                            </div>
                            <script>
                                const numButtons = 5; // Change this to the number of sets of IMAGES and inputs
                                for (let i = 1; i <= numButtons; i++) {
                                    const fileButton = document.getElementById(`fileButton${i}`);
                                    const hiddenFileInput = document.getElementById(`hiddenFileInput${i}`);
                                    fileButton.addEventListener('click', () => {
                                        hiddenFileInput.click();
                                    });
                                }
                                function loadFile(event, index) {
                                    var output = document.getElementsByClassName('output')[index];
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src) // free memory
                                    }
                                }
                                function updateimage(index) {
                                    debugger
                                    var file = document.getElementsByClassName('file')[index].files[0];
                                    var model = new FormData();
                                    model.append("file", file);
                                    model.append("position", index);
                                    model.append("id", document.getElementById("id").value);
                                    console.log({
                                        file: file,
                                        id: document.getElementById("id").value,
                                        position: index
                                    });
                                    var request = fetch('/image/update', {
                                        method: "post",
                                        body: model,
                                    }).then(res => {
                                        return res.json();
                                    });
                                    request.then(res => {
                                        if (!res.is_success) {
                                            alert(res.message);
                                            return;
                                        } else {
                                            alert(res.message);
                                            window.history.go(0);
                                        }
                                    }).catch(res => {
                                        console.log(res)
                                    })
                                }
                                function deleteimage(index) {
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
                                        if (!res.is_success) {
                                            alert(res.message);
                                            return;
                                        } else {
                                            alert(res.message);
                                            window.history.go(0);
                                        }
                                    }).catch(res => {
                                        console.log(res)
                                    })
                                }
                            </script>
                            @if ($total_images < 5)
                                <form action="{{ route('schooladmin.gallery.new.upload') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $school_gallery->school_id }}">
                                    <div class="dashboard-announcement-add__btn mt-5">
                                        <input type="file" class="form-control" name="filenewnames[]" id="logo_path"
                                            multiple>
                                        <button type="submit" class="btn btn-primary btn-hover-secondary mt-3">Upload New
                                            Image</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <!-- Dashboard Settings Info End -->
                    </div>
                </div>
            </div>
            <!-- Dashboard Settings End -->
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
