<!-- resources/views/user.user-motorcycles.index.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>{{ __('User Motorcycles') }}</h2>

        <a href="{{ route('user.user-motorcycles.create') }}" class="btn btn-primary mb-3">{{ __('Add Motorcycle') }}</a>

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Brand') }}</th>
                    <th>{{ __('Model') }}</th>
                    <th>{{ __('Manufacturing Year') }}</th>
                    <th>{{ __('License Plate') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userMotorcycles as $userMotorcycle)
                    <tr>
                        <td>{{ $userMotorcycle->id }}</td>
                        <td>{{ $userMotorcycle->motorcycle_brand }}</td>
                        <td>{{ $userMotorcycle->motorcycle_model }}</td>
                        <td>{{ $userMotorcycle->manufacturing_year }}</td>
                        <td>{{ $userMotorcycle->license_plate }}</td>
                        <td>
                            <a href="{{ route('user.user-motorcycles.show', $userMotorcycle->id) }}"
                                class="btn btn-info">{{ __('View') }}</a>
                            <a href="{{ route('user.user-motorcycles.edit', $userMotorcycle->id) }}"
                                class="btn btn-warning">{{ __('Edit') }}</a>
                            <form action="{{ route('user.user-motorcycles.destroy', $userMotorcycle->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('{{ __('Are you sure you want to delete this motorcycle?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
