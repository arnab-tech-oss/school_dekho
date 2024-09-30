
@extends('layouts.app')

@section('content')
    <div id="containerbar" class="containerbar authenticate-bg">
        <div class="container">
            <div class="auth-box login-box">
                <div class="row no-gutters align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-head" style="justify-content:center;display:flex;margin-bottom:20px">
                                        <a href="/" class="logo">
                                            <img src="{{ asset('/assets/images/logo.png') }}" class="img-fluid"
                                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"
                                                height="100" width="200"></a>
                                        <br>

                                    </div>
                                    <div style="justify-content:center;display:flex;margin-bottom:20px; text-align:center;">
                                        <p>Please enter your credentials to log into your account and <br> manage your
                                            school.</p>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        {{-- <div class="d-flex justify-content-center"> --}}

                                        <div class="col-md-8 gap-3 ">
                                            <button type="submit" class="w-100 mb-3 py-2 px-1 m-auto btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            <a class="btn mt-4 btn-link py-2 px-1 w-100 m-auto"
                                                href="{{ route('forget.password.get') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>

                                        </div>
                                    </div>
                                    <div style="justify-content:center;display:flex;margin-bottom:20px; text-align:center;">
                                        If you are not a school admin, then &nbsp;<a
                                            href="{{ route('user.signup') }}">sign up</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection























{{-- @extends('layouts.app')

@section('content')
<div id="containerbar" class="containerbar authenticate-bg">
    <div class="container">
        <div class="auth-box login-box">
            <div class="row no-gutters align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-head" style= "justify-content:center;display:flex;margin-bottom:20px">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('/assets/images/logo.png')}}" class="img-fluid" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me" height="100" width="200"></a>
                                        <br>

                                </div>
                                <div style= "justify-content:center;display:flex;margin-bottom:20px; text-align:center;"><p>Please enter your credentials to log into your account and <br> manage your school.</p></div>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>


                                        <a class="btn btn-link" href="{{ route('forget.password.get') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>

                                    </div>
                                </div>
                                <div style= "justify-content:center;display:flex;margin-bottom:20px; text-align:center;">If you are not a school admin, then &nbsp;<a href="{{  route('schooladmin.signup')}}">sign up</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
