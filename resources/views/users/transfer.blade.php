@extends('layouts.app')
@section('title', 'Smart Wallet | Transfer Money')

@section('content')
    <div class="container ">
        <div class="row justify-content-center my-5  pb-5">
            <div class="col-md-12 col-lg-6">

                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h4>{{ __('Transfer Money') }}</h4>
                    </div>
                    <div class="card-body text-left">
                        <form method="POST" action="{{ route('transferFunds') }}">
                            @csrf
                            <div class="form-group">
                                <label for="wallet_id">{{ __('Users Wallet id') }}</label>
                                <input id="wallet_id" type="text"
                                    class="form-control @error('wallet_id') is-invalid @enderror" name="wallet_id"
                                    value="{{ old('wallet_id') }}" required autocomplete="wallet_id" autofocus>

                                @error('wallet_id')
                                <li class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="amount">{{ __('Amount') }}</label>
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                                    name="amount" value="{{ old('amount') }}" required autocomplete="amount" min="100"
                                    autofocus>

                                @error('amount')
                                <li class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </li>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks"
                                    rows="4">{{ old('remarks') }}</textarea>
                                @error('remarks')
                                <li class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Transfer Money</button>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
