@extends('layouts.school.app')

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
                        <li class="breadcrumb-item"><a href="{{ route('school.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('school.leads.all') }}">Leads</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
                    </ol>
                </div>
            </div>
              @if ($lead->admission == '0')
                <div class="col-md-6 col-lg-6">
                    <div class="widgetbar">
                        <a href="#" class="btn btn-primary-rgba"data-toggle="modal" data-target=".bd-example-modal-lg"
                            disable><i class="feather icon-check mr-2"></i>Action</a>
                    </div>
                </div>
              @endif
            <!--@if ($lead->admission == '0')-->
            <!--    <div class="col-md-6 col-lg-6">-->
            <!--        <div class="widgetbar">-->
            <!--            @if ($schoolLead->status == '0')-->
            <!--                <a href="{{ route('school.lead.admission', [$lead->id, $school_id, 1]) }}"-->
            <!--                    class="btn btn-primary-rgba">Interested</a>-->
            <!--                <a href="{{ route('school.lead.admission', [$lead->id, $school_id, 2]) }}"-->
            <!--                    class="btn btn-secondary-rgba">Following</a>-->
            <!--                <a href="{{ route('school.lead.admission', [$lead->id, $school_id, 3]) }}"-->
            <!--                    class="btn btn-success-rgba"><i class="feather icon-plus mr-2"></i>Request Admission</a>-->
            <!--            @elseif($schoolLead->status == '1')-->
            <!--                <a href="#" class="btn btn-primary" disabled><i-->
            <!--                        class="feather icon-check mr-2"></i>Interested</a>-->
            <!--                <a href="{{ route('school.lead.admission', [$lead->id, $school_id, 2]) }}"-->
            <!--                    class="btn btn-secondary-rgba" disable>Following</a>-->
            <!--                <a href="{{ route('school.lead.admission', [$lead->id, $school_id, 3]) }}"-->
            <!--                    class="btn btn-success-rgba"><i class="feather icon-plus mr-2"></i>Request Admission</a>-->
            <!--            @elseif($schoolLead->status == '2')-->
            <!--                <a href="#" class="btn btn-primary" disable><i-->
            <!--                        class="feather icon-check mr-2"></i>Following</a>-->
            <!--                <a href="{{ route('school.lead.admission', [$lead->id, $school_id, 3]) }}"-->
            <!--                    class="btn btn-success-rgba"><i class="feather icon-plus mr-2"></i>Request Admission</a>-->
            <!--            @elseif($schoolLead->status == '4')-->
            <!--                <a href="#" class="btn btn-danger"><i class="feather icon-x mr-2"></i>Lead Closed</a>-->
            <!--            @endif-->
            <!--        </div>-->
            <!--    </div>-->
            <!--@endif-->
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
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="">
                            <div class="card-body p-0">
                                <div class="pricing text-center">
                                    <div class="pricing-middle text-left pl-5">
                                        <form action="{{ route('school.lead.remarks.submit') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <input type="hidden" name="lead_id" id=""
                                                    value="{{ $lead->id }}">
                                                <input type="hidden" name="school_id" id=""
                                                    value="{{ $lead_for_school->id }}">
                                                <div class="form-group col-md-4">
                                                    <label for="">Status</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select name="status" id="lead_status" class="form-control" required>
                                                        <option value="">Select Status</option>
                                                        <option value="1">Not Responding</option>
                                                        <option value="2">Not Received</option>
                                                        <option value="3">Not Interested</option>
                                                        <option value="4">Interested</option>
                                                        <option value="5">Admitted</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Remarks</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <textarea class="form-control" name="remarks" id="lead_remarks" cols="30" rows="10"
                                                        placeholder="Enter Remarks" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6"></div>
                                                <div class="form-group">
                                                    <input type="submit" value="Submit" class="btn btn-primary"
                                                        onclick="SubmitRemarks()">
                                                </div>
                                            </div>
                                        </form>
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
                            {{-- <a href="{{ route('admin.school.info.edit', $schooldetails->id) }}" class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{ dd($lead) }} --}}
            <div class="card-body">
                {{-- <div class="form-row">
                <div class="form-group col-md-3">
                    <label>#Lead ID</label>
                </div>
                <div class="form-group col-md-9">
                    <p><strong>{{ $lead->id }}</strong>
                    </p>
                </div>
            </div> 
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Lead Type</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ strtoupper($lead->lead_mode) }}</strong>
                        </p>
                    </div>
                </div> --}}

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Lead For School</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ $lead_for_school->name }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Admission School</label>
                    </div>
                    <div class="form-group col-md-9">
                        @if ($school)
                            <h5>{{ $school->name }}</h5>
                        @else
                            <h5>-</h5>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Admission Status</label>
                    </div>
                    <div class="form-group col-md-9">
                        @if ($lead->admission == '1')
                            <h5 class="text-success">Admission Done</h5>
                        @else
                            <h5 class="text-warning">Admission Pending</h5>
                        @endif
                    </div>
                </div>
                @if ($lead->lead_mode == 'manual')
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Student's Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong>{{ strtoupper($lead->student_name) }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Parent's Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong>{{ strtoupper($lead->parent_name) }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Primary Contact</label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong>{{ $lead->student_contact1 }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Secondary Contact</label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong>
                                    {{ $lead->student_contact2 }}

                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Admission Seeking for Class</label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong>{{ strtoupper($lead->admission_for) }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Academic_year</label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong>{{ $lead->academic_year }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Remarks</label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong>{{ $lead->remarks }}</strong>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><strong>Application Data</strong></label>
                        </div>
                        <div class="form-group col-md-9">
                            <p><strong></strong>
                            </p>
                        </div>
                    </div>

                    @foreach ($lead->application as $section)
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
                @endif
            </div>
        </div>
        <br>

    </div>
     @if (sizeof($lead_remarks_list) > 0)
     <div style=" padding-bottom: 60px !important;" class="contentbar">
        <div class="card m-b-10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Remarks</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lead_remarks_list as $lead_remark)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lead_remark->remarks }}</td>
                                    <td>
                                        @if ($lead_remark->status == 1)
                                            Not Responding
                                        @elseif($lead_remark->status == 2)
                                            Not received
                                        @elseif ($lead_remark->status == 3)
                                            Not Interested
                                        @elseif ($lead_remark->status == 4)
                                            Interested
                                        @elseif ($lead_remark->status == 5)
                                            Admitted
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     @endif
    </div>

    <!-- End Container -->

@endsection

@push('js')
    <script>
        function SubmitRemarks() {
            let lead_status = document.getElementById('lead_status').value;
            let lead_remarks = document.getElementById('lead_remarks').value;

            if (lead_status && lead_remarks) {
                alert("Remarks submitted successfully");
            }
        }
    </script>
@endpush

