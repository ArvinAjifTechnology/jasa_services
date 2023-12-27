@extends('layouts.main')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center d-flex align-content-center">
        <div class="col">
            <a href="{{ route('admin.type-of-services.create') }}" class="btn btn-primary mb-4 mt-2">{{ __('add_service') }}</a>
            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>{{ __('type_of_service') }}</th>
                        <th>{{ __('description') }}</th>
                        <th>{{ __('price') }}</th>
                        <th>{{ __('image') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeOfServices as $typeOfService)
                    <tr>
                        <td>{{ $typeOfService->type_of_service }}</td>
                        <td>{{ $typeOfService->description }}</td>
                        <td>{{ $typeOfService->price }}</td>
                        <td><img src="{{ asset('/storage/'.$typeOfService->image) }}" alt="Image" style="width: 100px"></td>
                        <td>
                            <a href="{{ route('admin.type-of-services.show', $typeOfService->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> {{ __('show') }}</a>
                            <a href="{{ route('admin.type-of-services.edit', $typeOfService->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> {{ __('edit') }}</a>
                            <form action="{{ route('admin.type-of-services.destroy', $typeOfService->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('are_you_sure_delete_service') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
