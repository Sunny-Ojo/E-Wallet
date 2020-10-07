@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-md-12 col-lg-6 mb-5">
            <div class="card mb-5 mt-3">
                <div class="card-header text-center">
                    <h4>{{ __('Login to Smart Wallet') }}</h4>
                </div>
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>


                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                <p class="text-center pt-0 mt-0 ">OR</p>
                                <a href="{{ route('login') }}" class="btn btn-warning btn-block">Login</a>
                            @endif
                            <div class="clearfix"></div>
                            <hr class="pt-0 mt-0">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
