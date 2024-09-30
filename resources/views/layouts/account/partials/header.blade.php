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
                    {{-- <li class="list-inline-item">
                        <div class="settingbar">
                            <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                <img src="{{asset('assets')}}/images/svg-icon/settings.svg" class="img-fluid"
            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
            </a>
    </div>
    </li> --}}

                    {{-- <li class="list-inline-item">
                        <div class="languagebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-de flag-icon-squared"></i>German</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-bl flag-icon-squared"></i>France</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>Russian</a>
                                </div>
                            </div>
                        </div>
                    </li> --}}
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
                                            {{-- <li class="media dropdown-item">
                                                <a href="#" class="profile-icon"><img src="{{asset('assets')}}/images/svg-icon/email.svg"
                            class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">Email</a>
    </li> --}}
                                            <li class="media dropdown-item">
                                                <a href="{{ route('account.logout') }}" class="profile-icon"><img
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
