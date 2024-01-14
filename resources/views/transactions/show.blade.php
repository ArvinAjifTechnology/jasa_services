@extends('layouts/main')

@section('content')
    <div class="container">
        <h1>{{ __('transaction_detail') }}</h1>
        <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('transaction_id') }}: {{ $transaction->id }}</h5>
                            <p class="card-text">{{ __('user_id') }}: {{ $transaction->user_id }}</p>
                            <p class="card-text">{{ __('user_motorcycle_id') }}: {{ $transaction->userMotorcycle->motorcycle_brand }}</p>
                            <p class="card-text">{{ __('mechanic_id') }}: {{ $transaction->mechanic_id }}</p>
                            <p class="card-text">{{ __('type_of_service_id') }}: {{ $transaction->typeOfService->type_of_service }}</p>
                            <p class="card-text">{{ __('total_amount') }}: {{ $transaction->total_amount }}</p>
                            <p class="card-text">{{ __('status') }}: {{ $transaction->status }}</p>
                            <p class="card-text">{{ __('transaction_code') }}: {{ $transaction->transaction_code }}</p>
                            <p class="card-text">{{ __('payment_method') }}: {{ $transaction->payment_method }}</p>
                            <p class="card-text">{{ __('payment_status') }}: {{ $transaction->payment_status }}</p>
                            <p class="card-text">{{ __('payment_proof') }}: <img src="{{ asset('storage/'. $transaction->payment_proof) }}" alt="" width="200px"></p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
