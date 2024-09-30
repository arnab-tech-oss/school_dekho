    <div class="col">
        <!-- Dashboard Settings Info Start -->
        <div class="dashboard-content-box" style="position: relative">
            <h4 class="dashboard-content-box__title">Basic Information</h4>
            <p>Provide valid details below to update your school profile</p>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form id="basicInfo" wire:submit.prevent="save">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <!-- Account Account details Start -->
                        <div class="dashboard-content__input">
                            <label class="form-label-02">School Name</label>
                            <input id="schoole_name" type="text" class="form-control" wire:model="school_name">
                        </div>
                        <!-- Account Account details End -->
                    </div>
                    <div class="col-md-12">
                        <!-- Account Account details Start -->
                        <div class="dashboard-content__input">
                            <label class="form-label-02">Registration Number</label>
                            <input type="text" class="form-control" wire:model="registration_no">
                        </div>
                        <!-- Account Account details End -->
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-content__input">
                            <label class="form-label-02">School Catagory</label>
                            <select required class="form-select" wire:model="category">
                                <option value="">--select category--</option>
                                @foreach ($categories as $category)
                                    <option value="">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-content__input">
                            <label class="form-label-02">School Type</label>
                            <select class="form-select" wire:model="school_type">
                                <option value="">-- select type--</option>
                                <option value="Boys">Boys</option>
                                <option value="Girls">Girls</option>
                                <option value="Co-Ed">Co-Ed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-content__input">
                            <label class="form-label-02">Board</label>
                            <select class="form-select" wire:model="board">
                                <option value="">-- Select Board --</option>
                                @foreach ($boards as $board)
                                    <option value="{{ $board->id }}">{{ $board->board_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-content__input">
                            <label class="form-label-02">Medium</label>
                            <select class="form-select" wire:model="medium">
                                <option value="">--Select Medium--</option>
                                @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}">{{ $medium->medium }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- Account Account details Start -->
                        <div class="dashboard-content__input">
                            <label class="form-label-02">About School (Introduction)</label>
                            <textarea class="form-control" wire:model="about"></textarea>
                        </div>
                        <!-- Account Account details End -->
                    </div>
                </div>
                <div class="dashboard-announcement-add__btn mt-5">
                    <div class="widget-filter__item">
                    </div>
                    <button type="submit" class="btn btn-light btn-hover-primary mt-3"
                        onclick="nextPage()">Save</button>
                </div>
            </form>

            @if (session()->has('message'))
                <div class="button-wrapper mt-3">
                    <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="2">Next</button>
                </div>
            @endif
        </div>
        <!-- Dashboard Settings Info End -->
    </div>
