<!-- Log In Modal Start -->
<style>
    .dash-header-part {
        margin-top: 00px;
        position: relative;
        z-index: 1;
    }

    .footer-part {
        background: #080229;
        padding: 0;
    }

    .counter-label {
        font-size: 12px;
    }

    .counter-value {
        font-size: 32px;
    }

    .list-avatar a img {
        width: 100%;
        border-radius: 50%;
        border: 3px solid var(--white);
    }

    .list-avatar a {
        width: 100%;
        border-radius: 50%;
        border: 3px solid var(--primary);
    }

    .flex-wrap {
        display: flex;
        flex-wrap: wrap;
    }

    .school-list {
        margin: 0px;
        margin-top: 12px;
        padding: 15px 25px;
        border-radius: 3px;
        background: var(--white);
        box-shadow: var(--primary-bshadow);
        border-left: 3px solid var(--primary);
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        justify-content: space-between;
        position: relative;
    }

    .dash-blue::before {
        background: #5c6fda;
    }

    .account-title button {
        width: 150px;
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 6px;
        /* background-color: #fff; */
        border: 0px solid rgba(0, 0, 0, 0.125);
    }

    .pricing {
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 8px;
    }

    .custom-badge-approved {
        background: #00af1e;
        padding: 3px 6px 3px 6px;
        border-radius: 5px;
        font-weight: bold;
        color: #fff;
        text-transform: uppercase;
    }

    h1 {
        text-align: center;
    }

    h2 {
        margin: 0;
    }

    #multi-step-form-container {
        margin-top: 20px;
    }

    .text-center {
        text-align: center;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .pl-0 {
        padding-left: 0;
    }

    .submit-btn {
        border: 1px solid #0044bb;
        background-color: #0044bb;
    }

    .mt-3 {
        margin-top: 2rem;
    }

    .d-none {
        display: none;
    }

    .font-normal {
        font-weight: normal;
    }

    ul.form-stepper {
        counter-reset: section;
        margin-bottom: 3rem;
    }

    ul.form-stepper .form-stepper-circle {
        position: relative;
    }

    ul.form-stepper .form-stepper-circle span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

    .form-stepper-horizontal {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    ul.form-stepper>li:not(:last-of-type) {
        margin-bottom: 0.625rem;
        -webkit-transition: margin-bottom 0.4s;
        -o-transition: margin-bottom 0.4s;
        transition: margin-bottom 0.4s;
    }

    .form-stepper-horizontal>li:not(:last-of-type) {
        margin-bottom: 0 !important;
    }

    .form-stepper-horizontal li {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: start;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .form-stepper-horizontal li:not(:last-child):after {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        height: 1px;
        content: "";
        top: 32%;
    }

    .form-stepper-horizontal li:after {
        background-color: #dee2e6;
    }

    .form-stepper-horizontal li.form-stepper-completed:after {
        background-color: #4da3ff;
    }

    .form-stepper-horizontal li:last-child {
        flex: unset;
    }

    ul.form-stepper li a .form-stepper-circle {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin-right: 0;
        line-height: 1.7rem;
        text-align: center;
        background: rgba(0, 0, 0, 0.38);
        border-radius: 50%;
    }

    .form-stepper .form-stepper-active .form-stepper-circle {
        background-color: #0044bb !important;
        color: #fff;
    }

    .form-stepper .form-stepper-active .label {
        color: #0044bb !important;
    }

    .form-stepper .form-stepper-active .form-stepper-circle:hover {
        background-color: #0044bb !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-unfinished .form-stepper-circle {
        background-color: #f8f7ff;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle {
        background-color: #4361ee !important;
        color: #fff;
    }

    .form-stepper .form-stepper-completed .label {
        color: #4361ee !important;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle:hover {
        background-color: #4361ee !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-active span.text-muted {
        color: #fff !important;
    }

    .form-stepper .form-stepper-completed span.text-muted {
        color: #fff !important;
    }

    .form-stepper .label {
        font-size: 1rem;
        margin-top: 0.5rem;
    }

    .form-stepper a {
        cursor: default;
    }

    .btn-navigate-form-step {
        border: white;
        background: white;
        border-color: #eee;
        border: 2px;
    }

    .cButton {
        border: 2px solid #0071dc;
        line-height: 48px;
    }
</style>

<div class="modal fade" data-backdrop="static" id="registerSchoolModal" data-keyboard="false">
    <div class="modal-dialog  modal-xl modal-dialog-centered ">

        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>

            <div class="modal-content" style="padding: 30px;">
                <div class="account-title">
                    <h4>Register a new school</h4>

                </div>
                <div class="modal-body" style="padding-top: 0px">
                    <div id="multi-step-form-container">
                        <!-- Form Steps / Progress Bar -->
                        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0 overflow-auto">
                            <!-- Step 1 -->
                            <li class="form-stepper-active text-center form-stepper-list" step="1">
                                <a class="mx-2" style="width: 50%;">
                                    <button class="   btn-navigate-form-step " type=" button" step_number="1">
                                        <span class="form-stepper-circle">
                                            <span>1</span>
                                        </span>
                                        <div class="label">General Info</div>
                                    </button> </a>
                            </li>
                            <!-- Step 2 -->
                            <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                                <a class="mx-2" style="width: 50%;">
                                    <button class="btn-navigate-form-step" type="button" step_number="2">
                                        <span class="form-stepper-circle text-muted">
                                            <span>2</span>
                                        </span>
                                        <div class="label text-muted">About School</div>
                                    </button>
                                </a>
                            </li>
                            <!-- Step 3 -->
                            <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                                <a class="mx-2" style="width: 50%;"> <button class="btn-navigate-form-step"
                                        type="button" step_number="3">
                                        <span class="form-stepper-circle text-muted">
                                            <span>3</span>
                                        </span>
                                        <div class="label text-muted">Add Images</div>
                                    </button>
                                </a>
                            </li>
                            <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                                <a class="mx-2" style="width: 50%;"> <button class="btn-navigate-form-step"
                                        type="button" step_number="4">
                                        <span class="form-stepper-circle text-muted">
                                            <span>4</span>
                                        </span>
                                        <div class="label text-muted">Educational Facilities</div>
                                    </button>
                                </a>
                            </li>
                            <li class="form-stepper-unfinished text-center form-stepper-list" step="5">

                                <a class="mx-2" style="width: 50%;">
                                    <button class="btn-navigate-form-step" type="button" step_number="5">
                                        <span class="form-stepper-circle text-muted">
                                            <span>5</span>
                                        </span>
                                        <div class="label text-muted">
                                            Eligibility Criteria
                                        </div>
                                    </button>
                                </a>
                            </li>
                            <li class="form-stepper-unfinished text-center form-stepper-list" step="6">
                                <a class="mx-2" style="width: 50%;">
                                    <button class="btn-navigate-form-step" type="button" step_number="6"><span
                                            class="form-stepper-circle text-muted">
                                            <span>6</span>
                                        </span>
                                        <div class="label text-muted">Fee Structure</div>
                                    </button>
                                </a>
                            </li>
                            <li class="form-stepper-unfinished text-center form-stepper-list" step="7">
                                <a class="mx-2" style="width: 50%;">
                                    <button class="btn-navigate-form-step" type="button" step_number="7">
                                        <span class="form-stepper-circle text-muted">
                                            <span>7</span>
                                        </span>
                                        <div class="label text-muted">Opening Hours</div>
                                    </button>

                                </a>
                            </li>

                        </ul>
                        <!-- Step Wise Form Content -->
                        <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data"
                            method="POST">
                            <!-- Step 1 Content -->
                            <section id="step-1" class="form-step">
                                <div action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="" />
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">School Name</label>
                                            <input type="text" class="form-control" name="name" id="inputAddress"
                                                placeholder="Summit School" value="" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Upload Logo</label>
                                            <input style="padding: 12px;" type="file" class="form-control"
                                                name="logo_path" id="logo_path" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">About</label>
                                        <textarea class="form-control" id="inputAddress" name="about" placeholder="Our School is.." required=""></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Name of the Principal</label>
                                            <input type="text" class="form-control" name="principal_name"
                                                id="inputAddress" placeholder="Enter Principal Name"
                                                required="" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Upload Principal's Pic</label>
                                            <input style="padding: 12px;" type="file" class="form-control"
                                                name="principal_path" id="principal_path" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Principal Message</label>
                                        <textarea class="form-control" id="inputAddress" name="principal_desk" placeholder="Principal Desk.."
                                            required=""></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">School Category</label>
                                            <select id="inputState" class="form-control" name="category"
                                                required="">
                                                <option value="">Choose...</option>
                                                <option value="0">Undefined</option>
                                                <option value="1">Private</option>
                                                <option value="3">Government</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputZip">Registration Number</label>
                                            <input type="text" class="form-control" name="registration_no"
                                                id="inputZip" placeholder="Enter Registration Number"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputZip">Board Name</label>
                                            <select id="inputState" class="form-control" name="board"
                                                required="">
                                                <option value="">Choose...</option>
                                                <option value="1">ICSE</option>
                                                <option value="2">ISC</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Medium</label>
                                            <select id="inputState" class="form-control" name="school_medium_id"
                                                required="">
                                                <option value="">Choose...</option>
                                                <option value="1">English</option>
                                                <option value="2">Hindi</option>
                                                <option value="3">Bengali</option>
                                                <option value="4">Assamese</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="type">School Type</label>
                                            <select class="form-control" name="school_type">
                                                <option value="">choose</option>
                                                <option value="Boys">Boys</option>
                                                <option value="Girls">Girls</option>
                                                <option value="Co-ed">Co-ed</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3 flex flex-wrap" style="justify-content: space-between;">
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button">Save</button>
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="2">Next</button>
                                </div>
                            </section>
                            <!-- Step 2 Content,  -->
                            <section id="step-2" class="form-step d-none">
                                <div action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="" />
                                    <div class="form-group">
                                        <label for="inputAddress">Address Line</label>

                                        <textarea style="min-height: 50px" class="form-control" id="inputAddress" name="address" placeholder="Address"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">State</label>
                                            <select id="inputState" class="form-control" name="state_id"
                                                required="">

                                                <option value="35">Uttarakhand</option>
                                                <option value="36">West Bengal</option>
                                                <option value="37">All India</option>
                                                <option value="38">Ladakh</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">City</label>

                                            <input type="text" name="city_id" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">District</label>
                                            <select id="inputState" class="form-control" name="district_id"
                                                required="">
                                                <option value="">Choose...</option>
                                                <option value="36">Anantnag</option>
                                                <option value="37">Bandipore</option>
                                                <option value="38">Baramulla</option>
                                                <option value="39">Budgam</option>
                                                <option value="40">Doda</option>
                                                <option value="41">Ganderbal</option>
                                                <option value="42">Jammu</option>
                                                <option value="43">Kargil</option>
                                                <option value="44">Kathua</option>
                                                <option value="45">Kishtwar</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Pincode</label>
                                            <input type="text" class="form-control" name="pincode" id="inputZip"
                                                placeholder="Enter Pincode Number" required="" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Email</label>
                                            <input type="email" class="form-control" name="email" id="inputZip"
                                                placeholder="Enter Email address" required="" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="inputZip"
                                                placeholder="Enter Contact Number" required="" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Facebook Link</label>
                                            <input type="text" class="form-control" name="fb_link"
                                                id="inputAddress" placeholder="" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Instagram Link</label>
                                            <input type="text" class="form-control" name="insta_link"
                                                id="inputAddress" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Twitter Link</label>
                                            <input type="text" class="form-control" name="twitt_link"
                                                id="inputAddress" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">LinkedIn</label>
                                            <input type="text" class="form-control" name="linkedin"
                                                id="inputAddress" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Alternate Phone Number</label>
                                            <input type="text" class="form-control" name="alt_phone"
                                                id="inputZip" placeholder="Enter Alternate Contact Number"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" />
                                            <label class="form-check-label" for="gridCheck"> by checking this box you
                                                are agreeing to the
                                                terms of use and acknowledging the privacy policy. </label>
                                        </div>
                                    </div>

                                    </d>

                                </div>
                                <div class="mt-3 flex flex-wrap" style="justify-content: space-between;">
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="1">Prev</button>
                                    <button class="button btn btn-outline-primary cButton"
                                        type=" button">Save</button>
                                    <button class="button btn btn-outline-primary cButton  btn-navigate-form-step "
                                        type=" button" step_number="3">Next</button>
                                </div>

                            </section>
                            <!-- Step 3 Content, default hidden on page load. -->
                            <section id="step-3" class="form-step d-none">
                                <div action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="" />
                                    <div class="row">
                                        <div class="form-group col-md-6" style="margin: auto;">
                                            <div style=" margin: auto; font-weight: bold;"> Add School Gallery pictures
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Upload pictures: </label>
                                            <input style="padding: 12px;" type="file" class="form-control"
                                                name="filenames[]" id="logo_path" multiple="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3 flex flex-wrap" style="justify-content: space-between;">
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="2">Prev</button>
                                    <button class="button btn btn-outline-primary" type=" button">Save</button>
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="4">Next</button>
                                </div>
                            </section>
                            <section id="step-4" class="form-step d-none">
                                <div class="contentbar">
                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Educational Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="education[]"
                                                        value="Library" />
                                                    <label for="accessories"
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px">Library</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="education[]"
                                                        value="Career Counsiling" />
                                                    <label for="computer"
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px">Career
                                                        Counseling</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="education[]"
                                                        value="Student Exchange" />
                                                    <label for="mobile"
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px">Student
                                                        Exchange</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="education[]"
                                                        value="Digital Library" />
                                                    <label for="headphone"
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px">Digital
                                                        Library</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="education[]"
                                                        value="Counseling" />
                                                    <label for="camera"
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px">Counseling</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="education[]"
                                                        value="Test Center" />
                                                    <label for="camera"
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px">Test
                                                        Center</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />
                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Classroom Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="classroom[]"
                                                        value="AC Class rooms" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">AC Class rooms</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="classroom[]"
                                                        value="AV Class rooms" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">AV Class rooms</label>
                                                </div>

                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="classroom[]"
                                                        value="Lockers" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="mobile">Lockers</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />
                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Laboratories Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="lab[]"
                                                        value="Laboratories" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Laboratories</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="lab[]"
                                                        value="Language Lab" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Language Lab</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="lab[]"
                                                        value="Computer Labs" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="mobile">Computer Labs</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="lab[]"
                                                        value="Robotics Labs" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="robo">Robotics Labs</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="lab[]"
                                                        value="Math Labs" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="camera">Math Labs</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />
                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Boarding Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="boarding[]"
                                                        value="Hostel" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Hostel</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="boarding[]"
                                                        value="AC Hostel" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">AC Hostel</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />
                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Sports Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Play Area" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Play Area</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Badminton" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Badminton</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Cricket" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Cricket</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Covered Play Area" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Covered Play Area</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Hockey" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Hockey</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Football" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Football</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Volleyball" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Volleyball</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Tennis" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Tennis</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Kabaddi" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Kabaddi</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Swimming" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Swimming</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Table Tennis" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Table Tennis</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Athletics" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Athletics</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Gymnasium" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Gymnasium</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="sports[]"
                                                        value="Karate" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Karate</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />

                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Performing Arts Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="arts[]"
                                                        value="Art" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Art</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="arts[]"
                                                        value="Dance" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Dance</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="arts[]"
                                                        value="Dramatics" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="mobile">Dramatics</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="arts[]"
                                                        value="Music" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="headphone">Music</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />

                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Digital Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="digital[]"
                                                        value="AV Facilities" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">AV Facilities</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="digital[]"
                                                        value="Interactive Boards" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Interactive Boards</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="digital[]"
                                                        value="School App" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="mobile">School App</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="digital[]"
                                                        value="Wi-fi" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="headphone">Wi-fi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />

                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Food and Catering Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="food[]"
                                                        value="Canteen" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Canteen</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="food[]"
                                                        value="Meal Served" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="computer">Meal Served</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="food[]"
                                                        value="School App" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="mobile">School App</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="food[]"
                                                        value="Kitchen &amp; Dining Hall" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="headphone">Kitchen &amp; Dining
                                                        Hall</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Safety &amp; Security Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="CCTV" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">CCTV</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="Fire Alarm" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Fire Alarm</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="Fire Extinguisher" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Fire Extinguisher</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="Security Guards" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Security Guards</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="Boundary Wall" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Boundary Wall</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="Fenced Boundary Wall" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Fenced Boundary
                                                        Wall</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="Speedometer in Bus" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Speedometer in Bus</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="GPS in Bus" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">GPS in Bus</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="CCTV in Bus" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">CCTV in Bus</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="Fire Extinguisher in Bus" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Fire Extinguisher in
                                                        Bus</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="security[]"
                                                        value="School Bus Tracking App" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">School Bus Tracking
                                                        App</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Medical Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="medical[]"
                                                        value="Medical Facility" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Medical Facility</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="medical[]"
                                                        value="Medical Room or Clinic" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Medical Room or
                                                        Clinic</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="medical[]"
                                                        value="ICU" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">ICU</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="medical[]"
                                                        value="Medical Staff" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Medical Staff</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="medical[]"
                                                        value="Isolation Room" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Isolation Room</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="medical[]"
                                                        value="Dedicated Ambulance" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Dedicated
                                                        Ambulance</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="medical[]"
                                                        value="Resident Doctor" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Resident Doctor</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                    <div class=" m-b-24">
                                        <div class="dashboard-content-box__title">
                                            <h5 class="card-title">Other Infra Facilities</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="infra[]"
                                                        value="Kids Play Area" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Kids Play Area</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="infra[]"
                                                        value="Activity Center" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Activity Center</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="infra[]"
                                                        value="Toy Room" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Toy Room</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="infra[]"
                                                        value="Amphitheatre" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Amphitheatre</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="infra[]"
                                                        value="Auditorium" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Auditorium</label>
                                                </div>
                                                <div class="row col-md-4">
                                                    <input style="width:auto;" type="checkbox" name="infra[]"
                                                        value="Day Care" />
                                                    <label
                                                        style="margin-left: 10px; margin-top: 0px; width:auto; padding:12px"
                                                        for="accessories">Day Care</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                </div>
                                <div class="mt-3 flex flex-wrap" style="justify-content: space-between;">
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="3">Prev</button>
                                    <button class="button btn btn-outline-primary cButton"
                                        type=" button">Save</button>
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="5">Next</button>
                                </div>
                            </section>
                            <section id="step-5" class="form-step d-none">
                                <div enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="_token" value="" /> -->
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Pre Nursery</label>
                                                <input type="text" class="form-control" name="pre_nursery"
                                                    id="inputAddress" placeholder="5+ age" />
                                                <input type="hidden" name="school_id" value="" />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Nursery</label>
                                                <input type="text" class="form-control" name="nursery"
                                                    id="inputAddress" placeholder="5+ age" />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">LKG</div>
                                            <input type="text" class="form-control" name="lkg"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">UKG</div>
                                            <input type="text" class="form-control" name="ukg"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">KG</div>
                                            <input type="text" class="form-control" name="kg"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-I</div>
                                            <input type="text" class="form-control" name="one"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-II</div>
                                            <input type="text" class="form-control" name="two"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-III</div>
                                            <input type="text" class="form-control" name="three"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-IV</div>

                                            <input type="text" class="form-control" name="four"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-V</div>
                                            <input type="text" class="form-control" name="five"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-VI</div>
                                            <input type="text" class="form-control" name="six"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-VII</div>
                                            <input type="text" class="form-control" name="seven"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-VIII</div>
                                            <input type="text" class="form-control" name="eight"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-IX</div>
                                            <input type="text" class="form-control" name="nine"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-X</div>
                                            <input type="text" class="form-control" name="ten"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-XI</div>
                                            <input type="text" class="form-control" name="eleven"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div style=" margin: auto; font-weight: bold;">Class-XII</div>
                                            <input type="text" class="form-control" name="twelve"
                                                id="inputAddress" placeholder="5+ age" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" />
                                            <label class="form-check-label" for="gridCheck"> by checking this box
                                                you
                                                are agreeing to the
                                                terms of use and acknowledging the privacy policy. </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3 flex flex-wrap" style="justify-content: space-between;">
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="4">Prev</button>
                                    <button class="button btn btn-outline-primary cButton"
                                        type=" button">Save</button>
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="6">Next</button>
                                </div>
                            </section>
                            <section id="step-6" class="form-step d-none">
                                <div>
                                    <input type="hidden" name="_token" value="" />
                                    <div style="gap:10px;margin: auto;" class="row">
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">Pre Nursery</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">Nursery</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">LKG</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">UKG</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">KG</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">class I</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">Class II</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">Class III</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">Class IV</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">Class V</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">Class VI</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">Class VII</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">Class VIII</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">Class XI</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">Class X</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3">
                                            <label for="inputCity">Class XI</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>
                                        <div class="form-group row-3 ">
                                            <label for="inputCity">Class XII</label>
                                            <div class="flex flex-wrap gap-3 justify-between">
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Admission Fees Amount" />
                                                <input type="text" class="form-control " name="pre_nursery[]"
                                                    id="inputAddress" placeholder="Annual Fees Amount" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="is_public"
                                                name="is_public" />
                                            <label class="form-check-label" for="is_public"> Click to enable public
                                                visibility </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3 flex flex-wrap" style="justify-content: space-between;">
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="5">Prev</button>
                                    <button class="button btn btn-outline-primary cButton"
                                        type=" button">Save</button>
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="7">Next</button>
                                </div>
                            </section>
                            <section id="step-7" class="form-step d-none">
                                <div>
                                    <input type="hidden" name="_token" value="" />
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <h6>Monday</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker"
                                                name="mon[]" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker"
                                                name="mon[]" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Tuesday</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker"
                                                name="tue[]" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker"
                                                name="tue[]" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Wednesday</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker"
                                                name="wed[]" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker"
                                                name="wed[]" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Thursday</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker"
                                                name="thu[]" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker"
                                                name="thu[]" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Friday</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker"
                                                name="fri[]" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker"
                                                name="fri[]" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Saturday</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker"
                                                name="sat[]" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker"
                                                name="sat[]" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress"></label>
                                            <label>Sunday</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">From</label>
                                            <input type="time" class="form-control timepicker"
                                                name="sun[]" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputAddress">To</label>
                                            <input type="time" class="form-control timepicker"
                                                name="sun[]" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" />
                                            <label class="form-check-label" for="gridCheck"> by checking this box
                                                you
                                                are agreeing to the
                                                terms of use and acknowledging the privacy policy. </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-3 flex flex-wrap" style="justify-content: space-between;">
                                    <button class="button btn btn-outline-primary cButton btn-navigate-form-step "
                                        type=" button" step_number="6">Prev</button>

                                    <button class="button btn btn-outline-primary cButton"
                                        type="submit">Finish</button>
                                </div>
                            </section>
                            <!-- s
              <section id="step-3" class="form-step d-none">
                <h2 class="font-normal">Personal Details</h2>
                 Step 3 input fields
                 <div class="mt-3">
                  Step 3 input fields goes here..
                </div>
                <div class="mt-3">
                  <button class="button btn btn-outline-primary  btn-navigate-form-step "type="button" step_number="2">Prev</button>
                  <button class="button submit-btn" type="submit">Save</button>
                </div>
              </section>
            e  -->
                        </form>
                    </div>

                    <script>
                        /**
                         * Define a function to navigate betweens form steps.
                         * It accepts one parameter. That is - step number.
                         */
                        const navigateToFormStep = (stepNumber) => {
                            /**
                             * Hide all form steps.
                             */
                            document.querySelectorAll(".form-step").forEach((formStepElement) => {
                                formStepElement.classList.add("d-none");
                            });
                            /**
                             * Mark all form steps as unfinished.
                             */
                            document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                                formStepHeader.classList.add("form-stepper-unfinished");
                                formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
                            });
                            /**
                             * Show the current form step (as passed to the function).
                             */
                            document.querySelector("#step-" + stepNumber).classList.remove("d-none");
                            /**
                             * Select the form step circle (progress bar).
                             */
                            const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
                            /**
                             * Mark the current form step as active.
                             */
                            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
                            formStepCircle.classList.add("form-stepper-active");
                            /**
                             * Loop through each form step circles.
                             * This loop will continue up to the current step number.
                             * Example: If the current step is 3,
                             * then the loop will perform operations for step 1 and 2.
                             */
                            for (let index = 0; index < stepNumber; index++) {
                                /**
                                 * Select the form step circle (progress bar).
                                 */
                                const formStepCircle = document.querySelector('li[step="' + index + '"]');
                                /**
                                 * Check if the element exist. If yes, then proceed.
                                 */
                                if (formStepCircle) {
                                    /**
                                     * Mark the form step as completed.
                                     */
                                    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                                    formStepCircle.classList.add("form-stepper-completed");
                                }
                            }
                        };
                        /**
                         * Select all form navigation buttons, and loop through them.
                         */
                        document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
                            /**
                             * Add a click event listener to the button.
                             */
                            formNavigationBtn.addEventListener("click", () => {
                                /**
                                 * Get the value of the step.
                                 */
                                const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                                /**
                                 * Call the function to navigate to the target form step.
                                 */
                                navigateToFormStep(stepNumber);
                            });
                        });
                    </script>
                </div>
            </div>

        </div>
        <!-- Modal Wrapper End -->

    </div>
</div>
<!-- Log In Modal End -->
