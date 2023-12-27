<!-- resources/views/user_motorcycles/show.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>{{ __('Motorcycle Details') }}</h2>

        <p><strong>ID:</strong> {{ $userMotorcycle->id }}</p>
        <p><strong>{{ __('Brand') }}:</strong> {{ $userMotorcycle->motorcycle_brand }}</p>
        <p><strong>{{ __('Model') }}:</strong> {{ $userMotorcycle->motorcycle_model }}</p>
        <p><strong>{{ __('Manufacturing Year') }}:</strong> {{ $userMotorcycle->manufacturing_year }}</p>
        <p><strong>{{ __('License Plate') }}:</strong> {{ $userMotorcycle->license_plate }}</p>

        <a href="{{ route('user_motorcycles.index') }}" class="btn btn-primary">{{ __('Back to List') }}</a>
    </div>
@endsection
