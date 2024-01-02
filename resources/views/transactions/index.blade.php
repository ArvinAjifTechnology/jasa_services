<!-- resources/views/transactions/index.blade.php -->

@extends('layouts.main')

@section('content')
    @can('user')
    <div class="container">
        <h2>{{ __('Transactions') }}</h2>

        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">{{ __('Add Transaction') }}</a>

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('User') }}</th>
                    <th>{{ __('Service Type') }}</th>
                    <th>{{ __('Total Amount') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Payment Method') }}</th>
                    <th>{{ __('Payment Status') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->user->username }}</td>
                        <td>{{ $transaction->typeOfService->type_of_service }}</td>
                        <td>{{ $transaction->total_amount }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->payment_method }}</td>
                        <td>{{ $transaction->payment_status }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}"
                                class="btn btn-info">{{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan

    @can('admin')
    <div class="container">
        <h2>{{ __('Transactions') }}</h2>

        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">{{ __('Add Transaction') }}</a>

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('User') }}</th>
                    <th>{{ __('Service Type') }}</th>
                    <th>{{ __('Total Amount') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Payment Method') }}</th>
                    <th>{{ __('Payment Status') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->user->username }}</td>
                        <td>{{ $transaction->typeOfService->type_of_service }}</td>
                        <td>{{ $transaction->total_amount }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->payment_method }}</td>
                        <td>{{ $transaction->payment_status }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}"
                                class="btn btn-info">{{ __('View') }}</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                class="btn btn-warning">{{ __('Edit') }}</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('{{ __('Are you sure you want to delete this transaction?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan
    @can('mechanic')
    <div class="container">
        <h2>{{ __('Transactions') }}</h2>

        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">{{ __('Add Transaction') }}</a>

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('User') }}</th>
                    <th>{{ __('Service Type') }}</th>
                    <th>{{ __('Total Amount') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Payment Method') }}</th>
                    <th>{{ __('Payment Status') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->user->username }}</td>
                        <td>{{ $transaction->typeOfService->type_of_service }}</td>
                        <td>{{ $transaction->total_amount }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->payment_method }}</td>
                        <td>{{ $transaction->payment_status }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}"
                                class="btn btn-info">{{ __('View') }}</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                class="btn btn-warning">{{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan
@endsection
