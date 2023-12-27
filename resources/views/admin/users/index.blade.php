@extends('layouts.main')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center d-flex align-content-center">
        <div class="col">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-4 mt-2">{{ __('add_user')
                }}</a>
            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('username') }}</th>
                        <th>{{ __('email') }}</th>
                        <th>{{ __('first_name') }}</th>
                        <th>{{ __('last_name') }}</th>
                        <th>{{ __('level') }}</th>
                        <th>{{ __('gender') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name. ' ' . $user->last_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>
                            @if ($user->role == 'admin')
                            <span class="badge bg-primary">{{ __('admin') }}</span>
                            @elseif ($user->role == 'user')
                            <span class="badge bg-success">{{ __('user') }}</span>
                            @elseif ($user->role == 'mechanic')
                            <span class="badge bg-info">{{ __('mechanic') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->gender == 'male')
                            <span class="badge bg-primary">{{ __('male') }}</span>
                            @elseif ($user->gender == 'female')
                            <span class="badge bg-success">{{ __('female') }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-eye"></i> {{ __('show') }}</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i
                                    class="fas fa-edit"></i> {{ __('edit') }}</a>
                            <form action="" method="POST"
                                class="d-inline" onsubmit="return confirm('{{ __('are_you_sure_reset_password') }}')">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-key"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('{{ __('are_you_sure_delete_user') }}')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tampilkan tautan navigasi halaman -->
            {{-- {{ Illuminate\Pagination\Paginator::render($users, 'full') }} --}}
            {{-- {{ $users->links('pagination::bootstrap-4') }} --}}
        </div>
    </div>
</div>
@endsection