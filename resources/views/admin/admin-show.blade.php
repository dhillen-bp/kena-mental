@extends('layouts.admin')
@section('title', 'Data Admins')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-3">Data Admins</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="/admin/add-admin" class="btn btn-primary">Add Admin</a>
            <a href="/admin/deleted-admins" class="btn btn-info">Show Deleted Admins</a>
        </div>
        <div class="row d-flex justify-content-between mt-4">
            <div class="col-12 col-sm-5 mb-3">
                <form action="" method="get" class="">
                    <div class="input-group">
                        <input type="text" class="form-control" id="" name="keyword"
                            placeholder="Search Keyword">
                        <button class="input-group-text btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Psychologist ID</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <th scope="row">{{ $loop->index + $admins->firstItem() }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td>{{ $admin->psychologist_id }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="/admin/edit-admin/{{ $admin->id }}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-item-id="{{ $admin->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                @if ($admins->isNotEmpty())
                    @include('partials.modal._modal_delete_admin')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $admins->withQueryString()->links() }}
    </div>


@endsection
