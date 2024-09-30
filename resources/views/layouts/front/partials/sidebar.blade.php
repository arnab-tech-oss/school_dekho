<aside class="sidebar-part">
    <div class="sidebar-body">
        <div class="sidebar-header">
            <a href="{{ route('schools.index') }}" class="sidebar-logo"><img src="{{asset('assets/images/logo.png')}}" sSchool Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
            <button class="sidebar-cross"><i class="fas fa-times"></i></button>
        </div>
        @if (!Auth::check())
            <div class="sidebar-content">
            <div class="user-form-title" style="margin-top: 20px;">
                <h3>Login</h3>
                <p>Setup a new account in a minute.</p>
            </div>
            <ul class="user-form-option">
                <li><a href="{{route('facebook.login')}}"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>
                <li><a href="{{route('google.login')}}"><i class="fab fa-google"></i><span>google</span></a></li>
            </ul>
            <div class="user-form-devider">
                <p>or</p>
            </div>
            <form method="POST" action="">
                <div class="row p-3">
                    <div class="col-12">
                        <div class="form-group"><input type="text" class="form-control" name="email" placeholder="Enter Username" required><small class="form-alert">Please follow this example - 01XXXXXXXXX</small></div>
                    </div>
                    <div class="col-12">
                        <div class="form-group"><input type="password" class="form-control" name="password" placeholder="Enter Password" required><button class="form-icon"><i class="eye fas fa-eye"></i></button><small class="form-alert">Password must be 6 characters</small></div>
                    </div>

                    <div class="col-12">
                        <div class="form-group"><button type="submit" class="btn btn-inline" ><i class="fas fa-unlock"></i><span>Login</span></button></div>
                    </div>
                </div>
            </form>
        
        </div>
        @else
            <div class="sidebar-content">
                <div class="sidebar-profile">
                    @if(Auth::user()->role == "3")
                    <a href="#" class="sidebar-avatar"><img src="{{ asset('assets/images/suggest/students.png') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                    @else
                    <a href="#" class="sidebar-avatar"><img src="{{ asset('assets/images/suggest/admission-open.png') }}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                    @endif
                    <h4><a href="#" class="sidebar-name">{{ Auth::user()->name }}</a></h4></div>
                <div class="sidebar-menu">
                    <ul class="nav nav-tabs">
                        <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Dashboard</a></li>
                        <li><a href="#author-menu" class="nav-link" data-toggle="tab">Menu</a></li>
                    </ul>
                    <div class="tab-pane active" id="main-menu">
                        <ul class="navbar-list">
                            @if(Auth::user()->role == '1')
                                <li class="navbar-item"><a class="navbar-link" href="{{ route('admin.home') }}">Admin Panel</a></li>
                            @endif
                            @if(Auth::user()->role == '2')
                                <li class="navbar-item"><a class="navbar-link" href="{{ route('school.home') }}">Admin Panel</a></li>
                            @endif
                            @if(Auth::user()->role == '3')
                                <li class="navbar-item"><a class="navbar-link" href="{{ route('student.home')}}">Admin Panel</a></li>
                            @endif
                            @if(Auth::user()->role == '1')
                                <li class="navbar-item"><a class="navbar-link" href="{{ route('admin.home')}}">Leads Manager</a></li>
                            @endif
                            @if(auth()->user()->role == '3')
                                <li class="navbar-item"><a class="navbar-link" href="{{ route('student.password.view') }}">Settings</a></li>
                            @endif
                            @if(Auth::user()->role == '1')
                                <li class="navbar-item"><a class="navbar-link" href="{{route('admin.logout.perform')}}">Logout</a></li>                            
                            @endif
                            @if(Auth::user()->role == '2')
                                <li class="navbar-item"><a class="navbar-link" href="{{route('school.logout')}}">Logout</a></li>
                            @endif
                            @if(Auth::user()->role == '3')
                                <li class="navbar-item"><a class="navbar-link" href="{{route('student.logout')}}">Logout</a></li>
                            @endif
                            

                            {{-- @if(auth()->user()->role == '3')
                                <li class="navbar-item"><a class="navbar-link" href="{{route('student.front.logout')}}">Logout</a></li>
                            @else
                                <li class="navbar-item"><a class="navbar-link" href="{{route('school.logout')}}">Logout</a></li>
                            @endif --}}
                        </ul>
                    </div>
                    
                </div>
                <div class="sidebar-footer">
                    <p>All Rights Reserved By <a href="#">SchoolDekho</a></p>
                    
                </div>
            </div>
        @endif
        
                
    </div>
</aside>
{{-- <nav class="mobile-nav">
    <div class="container">
        <div class="mobile-group"><a href="index.html" class="mobile-widget"><i class="fas fa-home"></i><span>home</span></a><a href="user-form.html" class="mobile-widget"><i class="fas fa-user"></i><span>join me</span></a><a href="ad-post.html" class="mobile-widget plus-btn"><i class="fas fa-plus"></i><span>Ad Post</span></a><a href="notification.html" class="mobile-widget"><i class="fas fa-bell"></i><span>notify</span><sup>0</sup></a><a href="message.html" class="mobile-widget"><i class="fas fa-envelope"></i><span>message</span><sup>0</sup></a></div>
    </div>
</nav> --}}