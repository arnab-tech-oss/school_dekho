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
                                <img src="{{asset('assets')}}/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                <img src="{{asset('assets')}}/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                            </a>
                        </div>
                    </li>
                    {{--<li class="list-inline-item">
                                    <div class="searchbar">
                                        <form>
                                            <div class="input-group">
                                              <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                              <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2"><img src="{{asset('assets')}}/images/svg-icon/search.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></button>
            </div>
        </div>
        </form>
    </div>
    </li>--}}
    </ul>
</div>
<div class="infobar">
    <ul class="list-inline mb-0">


        <li class="list-inline-item">
            <div class="profilebar">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets')}}/images/users/profile.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"><span class="feather icon-chevron-down live-icon"></span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                        <div class="dropdown-item">
                            <div class="profilename">
                                <h5>{{Auth::user()->name}}</h5>
                            </div>
                        </div>
                        <div class="userbox">
                            <ul class="list-unstyled mb-0">
                                <li class="media dropdown-item">
                                    <a href="{{ route('school.logout') }}" class="profile-icon"><img src="{{asset('assets')}}/images/svg-icon/logout.svg" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">Logout</a>
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