<!-- resources/views/payment_validation_form.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2 class="mb-4">Payment Validation Form</h2>

        <form action="{{ route('process_payment_validation') }}" method="POST">
            @csrf
            <input type="hidden" name="transaction_id" value="{{ $transactionId }}">
            
            <div class="mb-3">
                <label for="user_motorcycle_id" class="form-label">User Motorcycle</label>
                <select name="user_motorcycle_id" class="form-select">
                    <option value="">Select User Motorcycle</option>
                    @foreach($userMotorcycles as $userMotorcycle)
                        <option value="{{ $userMotorcycle->id }}">{{ $userMotorcycle->motorcycle_brand }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount:</label>
                <input type="text" name="total_amount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method:</label>
                <select name="payment_method" class="form-select">
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="GOPAY">GOPAY</option>
                    <option value="OVO">OVO</option>
                    <option value="DANA">DANA</option>
                    <option value="SHOPPE">SHOPPE</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="payment_proof" class="form-label">Payment Proof</label>
                <input type="file" class="form-control" id="payment_proof" name="payment_proof" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Payment Validation</button>
        </form>
    </div>
@endsection
