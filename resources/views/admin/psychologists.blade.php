@extends('layouts.admin')
@section('title', 'Data Psychologists')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Data Psychologists</h1>
        <div class="d-flex justify-content-between">
            <a href="/admin/add-psychologist" class="btn btn-primary">Add Psychologist Data</a>
            <a href="/admin/deleted-psychologist" class="btn btn-info">Show Deleted Psychologist</a>
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
                    <th scope="col">Alumni</th>
                    <th scope="col">Topics</th>
                    <th scope="col">Session Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($psychologists as $psychologist)
                    <tr>
                        <th scope="row">{{ $psychologist->id }}</th>
                        <td>{{ $psychologist->name }}</td>
                        <td>{{ optional($psychologist->psychologistDetail)->university }} -
                            {{ optional($psychologist->psychologistDetail)->degree }}
                            {{ optional($psychologist->psychologistDetail)->year }}
                        </td>
                        <td>{{ optional($psychologist->psychologistDetail)->topics }}</td>
                        <td>{{ optional($psychologist->psychologistDetail)->session_count }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="/admin/show-psychologist/{{ $psychologist->id }}"
                                    class="btn btn-primary me-2">Detail</a>
                                {{-- <a href="/admin/delete-psychologist/{{ $psychologist->id }}"
                                    class="btn btn-danger">Delete</a> --}}
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-item-id="{{ $psychologist->id }}">
                                    Delete
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
                @if ($psychologists->isNotEmpty())
                    @include('partials.modal._modal_delete_psychologist')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $psychologists->withQueryString()->links() }}
    </div>

    @include('partials._toastr')
@endsection
