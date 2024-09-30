<div class="card-body">
    @if (Session::has('success'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <form wire:submit.prevent="saveLead">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="inputAddress">Name of the Student</label>
                    <input type="text" class="form-control" id="student" wire:model="student"
                        placeholder="Student name..." required />
                </div>
                <div class="form-group">
                    <label for="inputAddress">Guardian's name</label>
                    <input type="text" class="form-control" id="parent_name" wire:model="parent_name"
                        placeholder="Guardian's name..." required />
                </div>
                <div class="form-group">
                    <label for="inputAddress">Primary contact 1</label>
                    <input type="number" class="form-control" wire:model="contact_1" id="contact_1"
                        placeholder="Enter contact no 1..." required />
                </div>
                <div class="form-group">
                    <label for="inputAddress">Contact 2</label>
                    <input type="number" class="form-control" wire:model="contact_2" id="contact_2"
                        placeholder="Enter contact no 2..." />
                </div>
                <div class="form-group">
                    <label for="inputAddress">Admission For</label>
                    <input type="text" class="form-control" wire:model="admission_for" id="admission_for"
                        placeholder="Admission seeking for..." required />
                </div>
                <div class="form-group">
                    <label for="inputAddress">pincode</label>
                    <input type="text" class="form-control" wire:model="pincode" id="pincode"
                        placeholder="Enter pincode" />
                </div>
                <div class="form-group">
                    <label for="inputAddress">date of birth</label>
                    <input type="date" class="form-control" wire:model="date_of_birth" id="date_of_birth" required />
                </div>
                <div class="form-group">
                    <label for="inputAddress">board</label>
                    <input type="text" class="form-control" wire:model="board" id="board"
                        placeholder="Enter board name" required />
                </div>
                <div class="form-group">
                    <label for="inputAddress">location</label>
                    <input type="text" class="form-control" wire:model="location" id="location"
                        placeholder="Location of the student" required />
                </div>
                <div class="form-group">
                    <label for="inputAddress">location for school</label>
                    <input type="text" class="form-control" wire:model="location_for_school" id="location_for_school"
                        placeholder="Location of the school" required />
                </div>
                <div class="form-group">
                    <label for="">Remarks for school</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control" wire:model="remarks_school"
                        id="remarks_school"></textarea>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="chat-list">
                    <div class="chat-search">
                        {{-- <form> --}}
                        <div class="form-group">
                            <label for="inputAddress">Select schools</label>
                        </div>
                        <div class="input-group">
                            <input wire:model.debounce.500ms="search" type="search" class="form-control"
                                placeholder="Search schools by title..." name="location" id="location" required>
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div class="chat-user-list" style="height:510">
                        <ul class="list-unstyled mb-0">
                            @if ($leads != null)

                                @foreach ($leads as $lead)
                                    <li class="media">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="{{ $lead->school_id }}" wire:model="schools"
                                                value="{{ $lead->school_id }}">
                                            <label class="custom-control-label psn-abs"
                                                for="{{ $lead->school_id }}"></label>
                                        </div>
                                        <!--<img class="align-self-center rounded-circle" src="{{ $lead->school_logo }} alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">-->
                                        <div class="media-body">
                                            <h5>{{ $lead->name }}</h5>
                                            <p>{{ $lead->address }}</p>
                                            <p>Pin - {{ $lead->pincode }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <p>Specify search keyword...</p>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Transfer Leads</button>
    </form>
</div>

<script>
    "use strict";
    $(document).ready(function() {
        $('.chat-user-list ul').slimscroll({
            height: '565',
            position: 'right',
            size: "7px",
            color: '#CFD8DC'
        });
        $('.chat-body').slimscroll({
            height: '510',
            position: 'right',
            size: "7px",
            color: '#CFD8DC'
        });
    });
</script>
