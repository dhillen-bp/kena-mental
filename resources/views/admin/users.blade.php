@extends('layouts.admin')
@section('title', 'Data Users')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Data Users</h1>
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
                        <td>
                            <a href="/admin/user-detail/{{ $user->id }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $users->withQueryString()->links() }}
    </div>

@endsection
