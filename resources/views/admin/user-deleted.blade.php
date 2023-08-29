@extends('layouts.admin')
@section('title', 'Deleted Admins')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Deleted Data Admins</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="/admin/users" class="btn btn-primary">Back</a>
        </div>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedUsers as $user)
                    <tr>
                        <th scope="row">{{ $loop->index + $deletedUsers->firstItem() }}</th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="d-flex justify-content-around justify-items-center">
                                <a href="/admin/restore-user/{{ $user->id }}" class="btn btn-primary me-2">Restore</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-item-id="{{ $user->id }}">
                                    Delete Permanent
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($deletedUsers->isNotEmpty())
                    @include('partials.modal._modal_delete_permanent_user')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $deletedUsers->links() }}
    </div>


@endsection
