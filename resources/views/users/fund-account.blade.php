@extends('layouts.app')
@section('title', 'Smart Wallet | Fund Your Account')
@section('content')

    <div class="container ">

        <div class="row justify-content-center m-5 pt-5 pb-5">
            <div class="col-md-12 col-lg-6">
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h4>{{ __('Fund My Smart E-wallet') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('initializeFunding') }}">
                            @csrf
                            <div class="form-group">
                                <label for="amount">{{ __('Amount') }}</label>
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                                    name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"
                                    rows="6">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Fund Wallet</button>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
