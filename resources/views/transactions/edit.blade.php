@extends('layouts.main')

@section('content')
<div class="container">
    @can('admin')
    <form action="{{ route('transactions.update', ['transaction' => $transaction->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Tambahkan method PUT untuk update -->
        <div class="mb-3">
            <label for="user_id" class="form-label">User Name:</label>
            <input type="text" name="user_id" class="form-control" placeholder="{{ $transaction->user->full_name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total Amount:</label>
            <input type="text" name="total_amount" class="form-control" placeholder="{{ $transaction->total_amount }}" readonly>
        </div>
        <div class="mb-3">
            <label for="type_of_service" class="form-label">Jenis Layanan</label>
            <input type="text" name="type_of_service" class="form-control" placeholder="{{ $transaction->typeOfService->type_of_service }}" readonly>
        </div>
        <div class="mb-3">
            <label for="payment_proof" class="form-label">Payment Proof:</label>
            @if ($transaction->payment_proof)
            <img src="{{ asset('storage/' . $transaction->payment_proof) }}" alt="Payment Proof" width="200px">
            @else
            <p>No payment proof available</p>
            @endif
        </div>
        {{-- <div class="mb-3">
            <label for="mechanic_id" class="form-label">Mekanik</label>
            <select name="mechanic_id" class="form-select" readonly>
                <option value="{{ $mechanics->id }}">{{ $mechanics->first_name . ' ' .$mechanics->first_name }}</option>
            </select>
            @error('mechanic_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="payment_status" class="form-label">Payment Status:</label>
            <select name="payment_status" class="form-select">
                <option value="unpaid" {{ old('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="verified" {{ old('payment_status') == 'verified' ? 'selected' : '' }}>Verified</option>
                <option value="canceled" {{ old('payment_status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('payment_status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_queue" {{ old('status') == 'in_queue' ? 'selected' : '' }}>In Queue</option>
                <option value="in_process" {{ old('status') == 'in_process' ? 'selected' : '' }}>In Process</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endcan
    @can('mechanic')
    <form action="{{ route('transactions.update', ['transaction' => $transaction->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Tambahkan method PUT untuk update -->
        <div class="mb-3">
            <label for="user_id" class="form-label">User Name:</label>
            <input type="text" name="user_id" class="form-control" placeholder="{{ $transaction->user->full_name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total Amount:</label>
            <input type="text" name="total_amount" class="form-control" placeholder="{{ $transaction->total_amount }}" readonly>
        </div>
        <div class="mb-3">
            <label for="type_of_service" class="form-label">Jenis Layanan</label>
            <input type="text" name="type_of_service" class="form-control" placeholder="{{ $transaction->typeOfService->type_of_service }}" readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" class="form-control select2" data-toggle="select2">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_queue" {{ old('status') == 'in_queue' ? 'selected' : '' }}>In Queue</option>
                <option value="in_process" {{ old('status') == 'in_process' ? 'selected' : '' }}>In Process</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endcan
</div>
@endsection
