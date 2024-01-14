<!-- service_selection.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>{{ __('Select Service') }}</h2>

        <form action="{{ route('process-service-selection') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="service">{{ __('Select Service') }}:</label>
                <select name="service" id="service" class="form-control">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->type_of_service }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Proceed') }}</button>
        </form>
    </div>
@endsection
