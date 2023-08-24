@extends('layouts.admin')
@section('title', 'Data Users')

@section('admin_content')
    <div class="container my-5">
        <h1 class="">Data Users</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="/admin/add-user" class="btn btn-primary">Add User Data</a>
            <a href="/admin/deleted-users" class="btn btn-info">Show Deleted User</a>
        </div>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->index + $users->firstItem() }}</th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="/admin/edit-user/{{ $user->id }}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-item-id="{{ $user->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                @if ($users->isNotEmpty())
                    @include('partials.modal._modal_delete_user')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $users->withQueryString()->links() }}
    </div>

    @include('partials._toastr')
@endsection
