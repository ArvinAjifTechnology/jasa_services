@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex align-content-center" style="height: 100vh;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-text">{{ $user->full_name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ __('username') }}: {{ $user->username }}</p>
                    <p class="card-text">{{ __('user_code') }}: {{ $user->user_code }}</p>
                    <p class="card-text">{{ __('email') }}: {{ $user->email }}</p>
                    <p class="card-text">{{ __('first_name') }}: {{ $user->first_name }}</p>
                    <p class="card-text">{{ __('last_name') }}: {{ $user->last_name }}</p>
                    <p class="card-text">{{ __('level') }}:
                        @if ($user->role == 'admin')
                        <span class="badge bg-primary">{{ __('admin') }}</span>
                        @elseif ($user->role == 'operator')
                        <span class="badge bg-success">{{ __('user') }}</span>
                        @elseif ($user->role == 'borrower')
                        <span class="badge bg-info">{{ __('mechanic') }}</span>
                        @endif
                    </p>
                    <p class="card-text">{{ __('gender') }}:
                        @if ($user->gender == 'male')
                        <span class="badge bg-primary">{{ __('male') }}</span>
                        @elseif ($user->gender == 'female')
                        <span class="badge bg-success">{{ __('female') }}</span>
                        @endif
                    </p>
                    {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">{{ __('users.edit') }}</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
