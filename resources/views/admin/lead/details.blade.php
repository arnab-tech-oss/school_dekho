@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <h4 class="page-title">School Details</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.leads.all') }}">Leads</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
                </ol>
            </div>
        </div>
        {{-- <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                @if (Auth::user()->role == 1)
                    @if ($schooldetails->is_complete=='1')
                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-check mr-2"></i>Complete</a>
                    @endif
                    @if ($schooldetails->status == '1')
                        <a href="{{ route('admin.school.approve',[$schooldetails->id, '0']) }}" class="btn btn-primary-rgba"><i class="feather icon-check mr-2"></i>Approved</a>
                    @else
                        <a href="{{ route('admin.school.approve', [$schooldetails->id, '1']) }}" class="btn btn-danger-rgba"><i class="feather icon-x mr-2"></i>Pending</a>
                    @endif
                @else
                    @if ($schooldetails->is_complete=='0')
                        <a href="{{ route('admin.school.complete',[$schooldetails->id, '1']) }}" class="btn btn-danger-rgba"><i class="feather icon-x mr-2"></i>Mark as Complete</a>
                    @else
                        <a href="{{ route('admin.school.complete',[$schooldetails->id, '0']) }}" class="btn btn-primary-rgba"><i class="feather icon-check mr-2"></i>Completed</a>
                    @endif
                    @if ($schooldetails->status == '1')
                        <a href="#" class="btn btn-primary-rgba"><i class="feather icon-check mr-2"></i>Approved</a>
                    @else
                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-x mr-2"></i>Pending</a>
                    @endif
                @endif


            </div>
        </div> --}}
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
                        {{-- <a href="{{ route('admin.school.info.edit', $schooldetails->id) }}" class="btn btn-primary-rgba"><i class="feather icon-edit mr-2"></i>Edit</a> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ dd($lead) }} --}}
        <div class="card-body">
            <div class="form-row">
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
                    <label>#Lead Mode</label>
                </div>
                <div class="form-group col-md-9">
                    <p><strong>{{ strtoupper($lead->lead_mode) }}</strong>
                    </p>
                </div>
            </div>

            <!-- <div class="form-row">-->
            <!--    <div class="form-group col-md-3">-->
            <!--        <label>School Lead</label>-->
            <!--    </div>-->
            <!--    <div class="form-group col-md-9">-->
            <!--        @foreach($school_name as $name)-->
            <!--        <h5>{{$name['name']}}</h5>-->
            <!--        @endforeach-->
            <!--    </div>-->
            <!--</div>-->
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
                        <label>Student Name</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ strtoupper($lead->student_name) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Parent Name</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ strtoupper($lead->parent_name) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Contact 1</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ strtoupper($lead->student_contact1) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Contact 2</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ strtoupper($lead->student_contact2) }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Admission Seeking for</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ strtoupper($lead->admission_for) }}</strong>
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
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Location of interest / Search Keyword</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ strtoupper($lead->location) }}</strong>
                        </p>
                    </div>
                </div>
         @if (!$lead->admission == '1')
            <form action="{{ route('admin.lead.admission')}}" method="post">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Admit Student</label>
                        <input type="hidden" name="lead_id" value="{{$lead->id}}">
                    </div>
                    <div class="form-group col-md-6">
                        <select name="school_id" class="form-control">
                            <option value="">Select School</option>
                            @foreach($school_name as $name)
                            <option value="{{$name['id']}}">{{$name['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary-rgba">Admit</button>
                    </div>
                </div>
            </form>
            @endif
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

                @foreach($lead->application as $section)
                    <div style="border:1px solid grey;margin:10px;padding:10px">
                        <h5> {{$section->section}} </h5>
                        @foreach($section->elements as $element)
                            <div class="form-row">
                                <div class="col-md-4 form-group">{{$element->label}}</div>

                                <div class="col-md-8 form-group"><strong>
                                    @if(($element->type=="text") || ($element->type=="date") || ($element->type=="email") || ($element->type=="textarea") || ($element->type=="select") || ($element->type=="radio") || ($element->type=="number"))
                                        {{$element->value}}
                                    @endif

                                    @if(($element->type=="file"))
                                        <img src="{{App\Core\FileHelper::GetFileUrl($element->value,App\Core\FileHelper::$application_image_path)}}" width="120" height="120"/>
                                    @endif

                                    @if($element->type=="checkbox")
                                        @foreach($element->value as $value)
                                            {{$value}}
                                        @endforeach
                                    @endif
                                    </strong>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @if (!$lead->admission == '1')
                <form action="{{ route('admin.lead.admission')}}" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Admit Student</label>
                            <input type="hidden" name="lead_id" value="{{$lead->id}}">
                        </div>
                        <div class="form-group col-md-6">
                            <select name="school_id" class="form-control">
                                <option value="">Select School</option>
                                @foreach($school_name as $name)
                                <option value="{{$name['id']}}">{{$name['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary-rgba">Admit</button>
                        </div>
                    </div>
                </form>
                @endif
            @endif
        </div>
        <div class="card-body">
           <table id="school-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Lead School Name</th>
                        <th>Lead Status</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($school_leads as $schoolLead)
                    <tr>
                        <td>{{ $schoolLead->school->name }}<br>{{ $schoolLead->school->contact->address}},&nbsp;{{ $schoolLead->school->contact->city}},&nbsp;{{ $schoolLead->school->contact->pincode}}</td>
                        <td>
                            @php
                                if($schoolLead['status'] == '0')
                                    echo '<span class="badge badge-warning-inverse">New Leads</span>';
                                elseif($schoolLead['status'] == '1')
                                    echo '<span class="badge badge-primary-inverse">Interested</span>';
                                elseif($schoolLead['status'] == 2)
                                    echo '<span class="badge badge-warning-inverse">Following</span>';
                                elseif($schoolLead['status'] == 3)
                                    echo '<span class="badge badge-warning-inverse">Close</span>';
                                elseif($schoolLead['status'] == 4)
                                    echo '<span class="badge badge-success-inverse">Admission Done</span>';

                            @endphp
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <br>







</div>

</div>


<!-- End Container -->


@endsection

@push('js')

@endpush
