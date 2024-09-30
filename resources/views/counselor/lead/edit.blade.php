@extends('layouts.counselor.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <h4 class="page-title">Lead Details</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.leads.all') }}">Leads</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Container -->
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Lead details</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">

                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success col-md-12">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                 
                    <div class="col-md-8 col-lg-8">
                        <form action="{{ route('counselor.lead.update') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Name</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" name="name" id="" value="{{ $lead_details?->name }}"
                                        class="form-control">
                                    <input type="hidden" name="id" value="{{ $lead_details?->id }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Email</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="email" name="email" id="" value="{{ $lead_details?->email }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Location</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" name="location" id="" value="{{ $lead_details?->location }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Pincode</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" name="pincode" id="" value="{{ $lead_details?->pincode }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Interested Board</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" name="board" id="" value="{{ $lead_details?->board }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Contact Number</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" name="phone" id="" value="{{ $lead_details?->phone }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Parent Name</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" name="parent_name" id=""
                                        value="{{ $lead_details?->parent_name }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Parent Whatsapp Number</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" name="parent_whatsapp_number" id=""
                                        value="{{ $lead_details?->parent_whatsapp_number }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="">Date Of Birth</label>
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="date" name="date_of_birth" id=""
                                        value="{{ $lead_details?->date_of_birth }}"class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="">Admission For</label>
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" name="admission_for" id=""
                                        value="{{ $lead_details?->admission_for }}"class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="">location of school</label>
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" name="location_for_school" id=""
                                        value="{{ $lead_details?->location_for_school }}"class="form-control"
                                        placeholder="please enter the interested school location">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="">Academic year</label>
                                </div>
                                <div class="form-group col-md-5">
                                    <select name="academic_year" id="" class="form-control">
                                        <option value="">--Select Academic Year--</option>
                                        <option value="2022-23"@if ($lead_details?->academic_year == '2022-23') selected @endif>2022-23</option>
                                        <option value="2023-24"@if ($lead_details?->academic_year == '2023-24') selected @endif>2023-24</option>
                                        <option value="2024-25"@if ($lead_details?->academic_year == '2024-25') selected @endif>2024-25</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="">Remarks for School</label>
                                </div>
                                <div class="form-group col-md-5">
                                    <textarea name="remarks_school" id="" cols="30" rows="10">{{ $lead_details?->remarks_school }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3"></div>
                                <div class="col-md-4"><input type="submit" value="update" class="btn btn-primary"></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">
                            <p>Search school</p>
                            @livewire('school-around')
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('js')
@endpush
