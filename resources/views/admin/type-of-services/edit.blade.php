@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row justify-content-center d-flex align-content-center" style="height:100vh">
        <div class="col-md-6">
            <form action="{{ route('admin.type-of-services.update', $typeOfService->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="type_of_service">{{ __('type_of_service') }}</label>
                    <input type="text" id="type_of_service" name="type_of_service" class="form-control @error('type_of_service') is-invalid @enderror" value="{{ old('type_of_service', $typeOfService->type_of_service) }}" required>
                    @error('type_of_service')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">{{ __('description') }}</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description', $typeOfService->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">{{ __('price') }}</label>
                    <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $typeOfService->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">{{ __('image') }}</label>
                    <input type="file" id="image" name="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">{{ __('save') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
