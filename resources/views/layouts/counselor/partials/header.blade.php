<div class="topbar">
    <!-- Start row -->
    <div class="row align-items-center">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">
            <div class="togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void();">
                                <img src="{{ asset('assets') }}/images/svg-icon/collapse.svg"
                                    class="img-fluid menu-hamburger-collapse"
                                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                <img src="{{ asset('assets') }}/images/svg-icon/close.svg"
                                    class="img-fluid menu-hamburger-close"
                                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                            </a>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="searchbar">
                            <form>

                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="infobar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">

                    </li>
                    <li class="list-inline-item">
                        <div class="notifybar">
                            <div class="dropdown">
                                <a class="dropdown-toggle infobar-icon" href="#" role="button"
                                    id="notoficationlink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><img
                                        src="{{ asset('assets') }}/images/svg-icon/notifications.svg" class="img-fluid"
                                        alt="notifications">
                                    <span class="live-icon"></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                    <div class="notification-dropdown-title">
                                        <h4>Notifications</h4>
                                    </div>
                                    <ul class="list-unstyled">
                                        @if (isset($pending_leads))

                                            @if ($pending_leads > 0)
                                                <li class="media dropdown-item">
                                                    <span class="action-icon badge badge-danger-inverse"><i
                                                            class="feather icon-eye"></i></span>
                                                    <div class="media-body">
                                                        <a href="{{ route('counselor.pending.leads') }}">
                                                            <h5 class="action-title">You have {{ $pending_leads }}
                                                                pending
                                                                leads
                                                            </h5>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endif

                                        @endif
                                        @if (isset($total_followups))

                                            @if ($total_followups > 0)
                                                <li class="media dropdown-item">
                                                    <span class="action-icon badge badge-danger-inverse"><i
                                                            class="feather icon-eye"></i></span>
                                                    <div class="media-body">
                                                        <a href="{{ route('counselor.old.leads') }}">
                                                            <h5 class="action-title">You have {{ $total_followups }}
                                                                follow up
                                                                leads for today
                                                            </h5>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endif

                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="profilebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="profilelink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                        src="{{ asset('assets') }}/images/users/profile.svg" class="img-fluid"
                                        alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span
                                        class="feather icon-chevron-down live-icon"></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                    <div class="dropdown-item">
                                        <div class="profilename">
                                            <h5>{{ Auth::user()->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="userbox">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media dropdown-item">
                                                <a href="#" class="profile-icon"><img
                                                        src="{{ asset('assets') }}/images/svg-icon/user.svg"
                                                        class="img-fluid"
                                                        alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">My
                                                    Profile</a>
                                            </li>
                                            <li class="media dropdown-item">
                                                <a href="{{ route('counselor.logout') }}" class="profile-icon"><img
                                                        src="{{ asset('assets') }}/images/svg-icon/logout.svg"
                                                        class="img-fluid"
                                                        alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">Logout</a>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
