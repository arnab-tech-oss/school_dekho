@extends('layouts.frontend.app')
@push('css')
@endpush
@section('content')
    <div class="slider-section">
        <div class="slider-wrapper scene">
            <div class="container">
                <h4 class="dashboard-title">Compare Schools</h4>
                <style>
                    .course-header-02__badge {
                        position: absolute;
                        top: 0;
                        right: 0;
                        left: auto;
                    }
                    .course-header-02__badge .price {
                        background-color: #00000054;
                        color: white;
                    }
                    .empty {
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        /* padding: 1.1429rem 0; */
                        min-height: 0px;
                        cursor: pointer;
                        position: relative;
                    }
                    .modal-close1 {
                        position: absolute;
                        top: 0px;
                        right: 0;
                        padding: 0;
                        line-height: 1;
                        width: 40px;
                        height: 40px;
                        font-size: 28px;
                        border: 0;
                        background: none;
                        color: #000000;
                    }
                    .course-item-02 {
                        min-height: 0px;
                    }
                    .course-info-02 {
                        padding: 30px 20px 20px;
                        min-width: 370px;
                    }
                    @media only screen and (max-width: 767px) {
                        .dashboard-table .table tbody td {
                            display: table-cell;
                            min-width: 370px;
                        }
                    }
                </style>
                <!-- Dashboard Assignments Start -->
                <div class="dashboard-assignments">
                    <div class="dashboard-table table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    @foreach ($all_schools as $school)
                                        <td>
                                            <div class="course-item-02 mb-1">
                                                <div class=" course-header-02">
                                                    <div class="">
                                                        <span class="price"> <button class="modal-close1"><a
                                                                    href="{{ route('school.compare.remove', $school->id) }}"><i
                                                                        class="fal fa-times"></i></a></button> </span>
                                                    </div>
                                                </div>
                                                <div class="course-info-02">
                                                    <div class="dashboard-header__user">
                                                        <div class="dashboard-header__user-avatar">
                                                            <img src="{{ $school->school_logo }}" alt="Avatar"
                                                                width="90" height="90">
                                                        </div>
                                                        <div class="dashboard-header__user-info">
                                                            <h3 class="course-info-02__title"><a
                                                                    href="course-single-layout-01.html">{{ $school->name }}
                                                                    <i class="fas fa-badge-check text-primary"></i></a>
                                                            </h3>
                                                            <div style="white-space:normal" class="dashboard-header__user-rating">
                                                                <div class="course-info-02__description">
                                                                    <p class="event-item__location">
                                                                        <i style=" margin-right: 8px"
                                                                            class="far fa-map-marker-alt">
                                                                        </i>
                                                                        {{ $school->address->address }}
                                                                    </p>
                                                                    <!-- <p>Negotiation is a skill well worth mastering – by putting …</p> -->
                                                                </div>
                                                            </div>
                                                            <div class="tutor-course-top-info__meta-rating">
                                                                <div class="rating-star">
                                                                    <div class="rating-label"
                                                                        style="width: {{ $school->reviews->avg('rating') * 20 }}%;">
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="rating-average"><strong> 4.0</strong> /5</div> --}}
                                                                <div class="rating-count">({{ $school->reviews->count() }})
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($all_schools as $school)
                                        <td style="min-width: 390px;">
                                            <div class="accordion-item">
                                                <button class="accordion-button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"> <i
                                                        class="tutor-icon"></i> Educational </button>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    data-bs-parent="#accordionCourse">
                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-alt"></i> -->
                                                                Library
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('Library', json_decode($school->facilities->education) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-alt"></i> -->
                                                                Career Counseling
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('Career Counseling', json_decode($school->facilities->education) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-edit"></i> -->
                                                                Student Exchange
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('Student Exchange', json_decode($school->facilities->education) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <button class="accordion-button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="true"> <i
                                                        class="tutor-icon"></i> Classroom </button>
                                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                                    data-bs-parent="#accordionCourse">
                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-alt"></i> -->
                                                                AV Class rooms
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('AV Class rooms', json_decode($school->facilities->classroom) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-alt"></i> -->
                                                                AC Classroom
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('AC Classroom', json_decode($school->facilities->classroom) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-edit"></i> -->
                                                                Lockers
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('Lockers', json_decode($school->facilities->classroom) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <button class="accordion-button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="true"> <i
                                                        class="tutor-icon"></i>Extra Facilities </button>
                                                <div id="collapseThree" class="accordion-collapse collapse show"
                                                    data-bs-parent="#accordionCourse">
                                                    <div class="course-curriculum__lessons">
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-alt"></i> -->
                                                                AV Facilities
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('AV Facilities', json_decode($school->facilities->digital) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-alt"></i> -->
                                                                Interactive Boards
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('Interactive Boards', json_decode($school->facilities->digital) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-edit"></i> -->
                                                                School App
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('School App', json_decode($school->facilities->digital) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="course-curriculum__lesson">
                                                            <span class="course-curriculum__title">
                                                                <!-- <i class="far fa-file-alt"></i> -->
                                                                Wi-fi
                                                            </span>
                                                            <span class="course-curriculum__icon">
                                                                @if (in_array('Wi-fi', json_decode($school->facilities->digital) ?? []))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                    <td>
                                        <div></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Assignments End -->
    </div>
@endsection
@push('js')
@endpush
