<div class="card-body">
    @if (Session::has('success'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <form wire:submit.prevent="transferLead">
        {{-- {{ csrf_field() }} --}}
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
                                        <div style="color:rgb(47, 240, 47)">
                                            @if ($lead->is_mou)
                                                Mou Signed
                                            @endif
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
