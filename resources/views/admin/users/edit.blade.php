@extends('layouts.main')
@section('content')

<!-- ... -->

<div class="container">
    <div class="row justify-content-center d-flex align-content-center" style="height:100vh">
        <div class="col-md-6">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="username">{{ __('username') }}</label>
                    <input type="text" id="username" name="username"
                        class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}"
                        required>
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('email') }}</label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="first_name">{{ __('first_name') }}</label>
                    <input type="text" id="first_name" name="first_name" class="form-control"
                        value="{{ old('first_name', $user->first_name) }}">
                </div>

                <div class="form-group">
                    <label for="last_name">{{ __('last_name') }}</label>
                    <input type="text" id="last_name" name="last_name" class="form-control"
                        value="{{ old('last_name', $user->last_name) }}">
                </div>

                <div class="form-group">
                    <label for="role">{{ __('role') }}</label>
                    <select id="role" name="role" class="form-control select2" data-toggle="select2">
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                            {{ __('admin') }}</option>
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                            {{ __('user') }}</option>
                        <option value="mechanic" {{ old('role', $user->role) == 'mechanic' ? 'selected' : '' }}>
                            {{ __('mechanic') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gender">{{ __('gender') }}</label>
                    <select id="gender" name="gender" class="form-control select2" data-toggle="select2">
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                            {{ __('male') }}</option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                            {{ __('female') }}</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">{{ __('save') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
