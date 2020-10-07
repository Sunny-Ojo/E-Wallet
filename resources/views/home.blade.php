@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-3">
            <div class="card myCardStyle shadow-sm card-body">
                <div class="d-flex justify-content-center">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" width="60px" class="rounded-circle"
                        alt="" srcset="">

                </div>
                <div class="mypadding-bottom">
                    <div class="text-center card-title myCardTitle font-weight-bold">
                        {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}
                    </div>
                    <div class="text-center font-weight-bold userID p-0 mt-4">
                        {{ Auth::user()->wallet_id }}
                    </div>
                    <div class="text-center font-weight-bold userID p-0 mt-4">
                        <h1> &#8358;{{ number_format(Auth::user()->amount) }}</h1>
                    </div>
                    <div class="   mt-4">
                        <a class="text-dark text-decoration-none" href="{{ route('sendMoney') }}">Transfer Funds</a>
                    </div>


                    <div class=" mt-4">
                        <a data-toggle="modal" data-target="#modelId2" class="text-dark text-decoration-none">Fund
                            Wallet</a>
                    </div>

                    <div class=" mt-4">
                        <a class="text-dark text-decoration-none" onclick="showTransactions()"><i class="fa fa-history"
                                aria-hidden="true"></i>
                            Transactions History</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-6" style="display: none" id="transactions">
            <div class="card">
                <div class="card-header text-left">Transaction History</div>
                <div class="card-body">
                    @foreach ($transactions as $item)
                        <div class="border m-2">
                            <li class="list-group-item">Amount: {{ number_format($item->amount) }}</li>
                            <li class="list-group-item">Description: {{ $item->description }}</li>
                            <li class="list-group-item">Date: {{ $item->created_at->diffForHumans() }}</li>

                        </div>

                    @endforeach
                    {{ $transactions->links() }}
                </div>
            </div>

        </div>





    </div>
@endsection
