@extends('layouts.app')

@section('content')
    <div class="container ">

        <div class="row justify-content-center m-5 pt-5 pb-5">
            <div class="col-md-12 col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body text-left">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
