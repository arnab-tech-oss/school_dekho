<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="email" content="">
    <meta name="profile" content="">
    <meta name="name" content="School Dekho">
    <meta name="type" content="School Search Portal">
    <meta name="title" content="School Dekho - India's First Search Engine for School Admissions">
    <meta name="keywords" content="">
    <title>Login | School Dekho | Best School near me | Indias first school search portal | Dekho Phir Chuno</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/main.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/dashboard.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/index.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/slick.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/ad-details.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/setting.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/user-form.css">
    <style>
        .user-form-content a img {
            width: 120px;
            height: auto;
        }
    </style>
</head>

<body>
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content">
                <a href="#"><img src="{{asset('assets')}}/images/logo-login.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                <h1>School Dekho<span>Dekho Phir Chuno</span></h1>
                <p>India's No. 1 School Search Engine</p>
            </div>
        </div>
        <div class="user-form-category">
            <div class="user-form-header"><a href="#"><img src="{{asset('assets')}}/images/logo.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a><a href="{{route('school.index')}}"><i class="fas fa-arrow-left"></i></a></div>
            <div class="user-form-category-btn">
                <ul class="nav nav-tabs">
                    <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign up</a></li>

                </ul>
            </div>
            <div class="tab-pane active" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Use credentials to access your account.</p>
                </div>
                <form method="POST" action="{{ route('schooladmin.register')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group"><input type="text" name="name" class="form-control" placeholder="Enter your name" required /></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group"><input type="text" name="email" class="form-control" placeholder="Enter email" required><small class="form-alert">Please follow this example - 01XXXXXXXXX</small></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group"><input type="password" name="password" class="form-control" id="pass" placeholder="Password" required><button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button><small class="form-alert">Password must be 6 characters</small></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="signup-check"><label class="custom-control-label" for="signup-check">I agree to all the <a href="{{ route('school.terms')}}">terms & conditions&nbsp;</a>of the website.</label></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group"><button type="submit" class="btn btn-inline"><i class="fas fa-user-check"></i><span>Enter your account</span></button></div>
                        </div>
                    </div>
                </form>
                <div class="user-form-direction">
                    <p>Already have an account? Please, <span><a href="{{ route('student.login.register') }}">( sign in )</a></span>.</p>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('assets')}}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/custom/main.js"></script>
    <script src="{{asset('assets')}}/js/sweetalert.min.js"></script>


</body>

</html>