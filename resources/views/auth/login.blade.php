@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-sm-12">
        
        <form method="POST" action="{{ route('login') }}" class="md-float-material form-material">
            @csrf
            <div class="text-center">
                <!-- <img src="{{ asset('theme_admin/images/logo.png') }}" alt="logo"> -->
                SYS.COBRANZA
            </div>
            <div class="auth-box card">
                <div class="card-block">
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <h3 class="text-center txt-primary">Inciar Sesión</h3>
                        </div>
                    </div>
                    <!-- <div class="row m-b-20">
                        <div class="col-md-6">
                            <button class="btn btn-facebook m-b-20 btn-block"><i class="icofont icofont-social-facebook"></i>facebook</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-twitter m-b-20 btn-block"><i class="icofont icofont-social-twitter"></i>twitter</button>
                        </div>
                    </div> -->
                    <!-- <p class="text-muted text-center p-b-5">Sign in with your regular account</p> -->
                    <div class="form-group form-primary">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- <input type="text" name="user-name" class="form-control" required=""> -->
                        <span class="form-bar"></span>
                        <label class="float-label">Username</label>
                    </div>
                    <div class="form-group form-primary">
                        <!-- <input type="password" name="password" class="form-control" required=""> -->
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="form-bar"></span>
                        <label class="float-label">Password</label>
                    </div>
                    <div class="row m-t-25 text-left">
                        <div class="col-12">
                            <!-- <div class="checkbox-fade fade-in-primary">
                                <label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                    <span class="text-inverse">{{ __('Remember Me') }}</span>
                                </label>
                            </div> -->
                            <!-- <div class="forgot-phone text-right float-right">
                                @if (Route::has('password.request'))
                                    <a class="text-right f-w-600" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div> -->
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                Entrar
                            </button>
                            <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button> -->
                        </div>
                    </div>
                    <!-- <p class="text-inverse text-left">Don't have an account?<a href="{{ route('register') }}"> <b>Register here </b></a>for free!</p> -->
                </div>
            </div>
        </form>
    </div>
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection
