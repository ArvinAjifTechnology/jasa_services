@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex align-content-center" style="height: 100vh;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-text">{{ $typeOfService->type_of_service }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ __('description') }}: {{ $typeOfService->description }}</p>
                    <p class="card-text">{{ __('price') }}: {{ $typeOfService->price }}</p>
                    <p class="card-text">{{ __('image') }}: {{ $typeOfService->image }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
