@extends('layouts.app')

@section('content')
<div class="container">
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
                <div class="card-footer text-center">
                    <a href="{{ route('login.social', 'facebook') }}" class="btn btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                        <!--Ingresa con Facebook-->
                    </a>

                    <a href="{{ route('login.social', 'twitter') }}" class="btn btn-twitter">
                        <i class="fab fa-twitter"></i>
                        <!--Ingresa con Twitter-->
                    </a>

                    <a href="{{ route('login.social', 'google') }}" class="btn btn-google">
                        <i class="fab fa-google"></i>
                        <!--Ingresa con Google-->
                    </a>

                    <a href="{{ route('login.social', 'linkedin') }}" class="btn btn-linkedin">
                        <i class="fab fa-linkedin"></i>
                        <!--Ingresa con Linkedin-->
                    </a>

                    <a href="{{ route('login.social', 'github') }}" class="btn btn-github">
                        <i class="fab fa-github"></i>
                        <!--Ingresa con GitHub-->
                    </a>

                    <a href="{{ route('login.social', 'gitlab') }}" class="btn btn-gitlab">
                        <i class="fab fa-gitlab"></i>
                        <!--Ingresa con GitLab-->
                    </a>

                    <a href="{{ route('login.social', 'bitbucket') }}" class="btn btn-bitbucket">
                        <i class="fab fa-bitbucket"></i>
                        <!--Ingresa con Bitbucket-->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
