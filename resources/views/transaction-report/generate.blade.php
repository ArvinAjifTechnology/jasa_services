@extends('layouts.main')

@section('content')

<div class="container mb-1 mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('transaction-report.generate') }}" method="post" class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="start_date" class="form-label">{{ __('startdate') }}:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="end_date" class="form-label">{{ __('enddate') }}:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="search" class="form-label">{{ __('search') }}:</label>
                            <input type="text" id="search" name="search" class="form-control" />
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('generatereport') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('revenue') }}</div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    {{ formatCurrency($sum_of_total_amount) }}
                </div>
            </div>
            @if (!empty($transactions))
            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>{{ __('transactioncode') }}</th>
                        <th>{{ __('createdat') }}</th>
                        <th>{{ __('updatedat') }}</th>
                        <th>{{ __('userid') }}</th>
                        <th>{{ __('usermotorcycleid') }}</th>
                        <th>{{ __('mechanicid') }}</th>
                        <th>{{ __('typeofserviceid') }}</th>
                        <th>{{ __('totalamount') }}</th>
                        <th>{{ __('status') }}</th>
                        <th>{{ __('queuenumber') }}</th>
                        <th>{{ __('paymentmethod') }}</th>
                        <th>{{ __('paymentstatus') }}</th>
                        <th>{{ __('paymentproof') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_code }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                        <td>{{ $transaction->user_id }}</td>
                        <td>{{ $transaction->user_motorcycle_id }}</td>
                        <td>{{ $transaction->mechanic_id }}</td>
                        <td>{{ $transaction->type_of_service_id }}</td>
                        <td>{{ formatCurrency($transaction->total_amount) }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->queue_number }}</td>
                        <td>{{ $transaction->payment_method }}</td>
                        <td>{{ $transaction->payment_status }}</td>
                        <td>{{ $transaction->payment_proof }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>{{ __('notransactiondatafound') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
