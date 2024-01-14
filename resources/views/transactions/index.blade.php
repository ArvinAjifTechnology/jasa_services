<!-- resources/views/transactions/index.blade.php -->

@extends('layouts.main')

@section('content')
    @can('user')
    <div class="container">
        <h2>{{ __('transactions') }}</h2>

        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">{{ __('add_transaction') }}</a>

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('user') }}</th>
                    <th>{{ __('service_type') }}</th>
                    <th>{{ __('total_amount') }}</th>
                    <th>{{ __('status') }}</th>
                    <th>{{ __('payment_method') }}</th>
                    <th>{{ __('payment_status') }}</th>
                    <th>{{ __('actions') }}</th>
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
                                class="btn btn-info">{{ __('view') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan

    @can('admin')
    <div class="container">
        <h2>{{ __('transactions') }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('user') }}</th>
                    <th>{{ __('service_type') }}</th>
                    <th>{{ __('total_amount') }}</th>
                    <th>{{ __('status') }}</th>
                    <th>{{ __('payment_method') }}</th>
                    <th>{{ __('payment_status') }}</th>
                    <th>{{ __('actions') }}</th>
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
                                class="btn btn-info">{{ __('view') }}</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                class="btn btn-warning">{{ __('edit') }}</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('{{ __('are_you_sure_you_want_to_delete_this_transaction') }}')">{{ __('delete') }}</button>
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
        <h2>{{ __('transactions') }}</h2>

        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">{{ __('add_transaction') }}</a>

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('user') }}</th>
                    <th>{{ __('service_type') }}</th>
                    <th>{{ __('total_amount') }}</th>
                    <th>{{ __('status') }}</th>
                    <th>{{ __('payment_method') }}</th>
                    <th>{{ __('payment_status') }}</th>
                    <th>{{ __('actions') }}</th>
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
                                class="btn btn-info">{{ __('view') }}</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                class="btn btn-warning">{{ __('edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan
@endsection
