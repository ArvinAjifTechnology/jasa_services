<!-- resources/views/user.user-motorcycles/create.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>{{ __('Add Motorcycle') }}</h2>

        <form action="{{ route('user.user-motorcycles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="motorcycle_brand" class="form-label">{{ __('Motorcycle Brand') }}</label>
                <input type="text" class="form-control" id="motorcycle_brand" name="motorcycle_brand" required>
            </div>

            <div class="mb-3">
                <label for="motorcycle_model" class="form-label">{{ __('Motorcycle Model') }}</label>
                <input type="text" class="form-control" id="motorcycle_model" name="motorcycle_model" required>
            </div>

            <div class="mb-3">
                <label for="manufacturing_year" class="form-label">{{ __('Manufacturing Year') }}</label>
                <input type="number" class="form-control" id="manufacturing_year" name="manufacturing_year" required>
            </div>

            <div class="mb-3">
                <label for="license_plate" class="form-label">{{ __('License Plate') }}</label>
                <input type="text" class="form-control" id="license_plate" name="license_plate" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Add Motorcycle') }}</button>
        </form>
    </div>
@endsection
