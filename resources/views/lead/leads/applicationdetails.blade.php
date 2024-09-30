@extends('layouts.lead.app')

@section('title', 'School Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-6">
                <h4 class="page-title">Lead Details</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Leads</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Add Remarks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-body p-0">
                                <div class="pricing text-center">
                                    <div class="pricing-middle text-left pl-5">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .contentbar {
            padding-bottom: 0px !important;
            margin-bottom: 0px !important;
        }
    </style>
    <div class="contentbar">
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Application Enquiry details</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>#Lead For School</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ $school_application_details->school->name }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                      <div class="form-group col-md-3">#Date of Application</div>
                      <div class="form-group col-md-3">{{ date('d-m-Y', strtotime($school_application_details->created_at)) }}</div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label><strong>Application Data</strong></label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong></strong>
                        </p>
                    </div>
                </div>

                @foreach ($school_application_details->fields as $section)
                    <div style="border:1px solid grey;margin:10px;padding:10px">
                        <h5> {{ $section->section }} </h5>
                        @foreach ($section->elements as $element)
                            <div class="form-row">
                                <div class="col-md-4 form-group">{{ $element->label }}</div>

                                <div class="col-md-8 form-group"><strong>
                                        @if (
                                            $element->type == 'text' ||
                                                $element->type == 'date' ||
                                                $element->type == 'email' ||
                                                $element->type == 'textarea' ||
                                                $element->type == 'select' ||
                                                $element->type == 'radio' ||
                                                $element->type == 'number')
                                            {{ $element->value }}
                                        @endif

                                        @if ($element->type == 'file')
                                            <img src="{{ App\Core\FileHelper::GetFileUrl($element->value, App\Core\FileHelper::$application_image_path) }}"
                                                width="120" height="120" />
                                        @endif

                                        @if ($element->type == 'checkbox')
                                            @foreach ($element->value as $value)
                                                {{ $value }}
                                            @endforeach
                                        @endif
                                    </strong>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <br>

    </div>
    <br>
    <br>
    </div>
    <br>
    <!-- End Container -->

@endsection

@push('js')
@endpush
