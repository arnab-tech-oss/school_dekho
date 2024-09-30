<div class="card-body">
    @if(Session::has('success'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
    @endif
    
        
        <div class="row">
            <div class="col-lg-12">
                <div class="chat-list">
                    <div class="chat-search">
                       
                            <div class="form-group">
                        <label for="inputAddress">Select schools</label>
                    </div>
                            <div class="input-group">
                                <input wire:model.debounce.500ms="search" type="search" class="form-control" placeholder="Search schools by title...">
                            </div>
                        
                    </div>
                    <div class="chat-user-list" style="height:510">
                        <ul class="list-unstyled mb-0">
                            @if ($allschools!=null)
                                    <li class="media">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="form-check-label" id="" value="" name="school">
                                            <label class="form-check-label" for=""></label>
                                        </div>
                                        
                                        <div class="media-body">
                                            <h5>No school selected.</h5>
                                        </div>
                                    </li>
                                @foreach ($allschools as $school)
                                    <li class="media">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="form-check-label" id="school" name="school" wire:model="schools" value="{{$school->id}}">
                                            <label class="form-check-label" for="{{$school->id}}"></label>
                                        </div>
                                        <div class="media-body">
                                            <p><b>{{ $school->name}}</b>
                                            <br>{{ $school->address }}
                                            Pin - {{ $school->pincode}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
