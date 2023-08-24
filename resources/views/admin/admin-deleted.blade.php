@extends('layouts.admin')
@section('title', 'Deleted Admins')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Deleted Data Admins</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="/admin/show-admin" class="btn btn-primary">Back</a>
        </div>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-3">Name</th>
                    <th scope="col" class="col-3">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Psychologist ID</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedAdmins as $admin)
                    <tr>
                        <th scope="row">{{ $loop->index + $deletedAdmins->firstItem() }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td>{{ $admin->psychologist_id }}</td>
                        <td>
                            <div class="d-flex justify-content-around justify-items-center">
                                <a href="/admin/restore-admin/{{ $admin->id }}" class="btn btn-primary me-2">Restore</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-item-id="{{ $admin->id }}">
                                    Delete Permanent
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($deletedAdmins->isNotEmpty())
                    @include('partials.modal._modal_delete_permanent_admin')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $deletedAdmins->links() }}
    </div>

    @include('partials._toastr')
@endsection
