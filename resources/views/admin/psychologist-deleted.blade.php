@extends('layouts.admin')
@section('title', 'Deleted Psychologists')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Deleted Psychologists</h1>
        <div class="d-flex justify-content-between">
            <a href="/admin/add-psychologist" class="btn btn-primary">Back</a>

        </div>
        <table class="table-striped table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Alumni</th>
                    <th scope="col">Topics</th>
                    <th scope="col">Session Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedPsychologists as $psychologist)
                    <tr class="text-center">
                        <th scope="row">{{ $psychologist->id }}</th>
                        <td>{{ $psychologist->name }}</td>
                        <td>{{ optional($psychologist->psychologistDetail)->university }} -
                            {{ optional($psychologist->psychologistDetail)->degree }}
                            {{ optional($psychologist->psychologistDetail)->year }}
                        </td>
                        <td>{{ optional($psychologist->psychologistDetail)->topics }}</td>
                        <td>{{ optional($psychologist->psychologistDetail)->session_count }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="/admin/restore-psychologist/{{ $psychologist->id }}"
                                    class="btn btn-primary me-2">Restore</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-item-id="{{ $psychologist->id }}">
                                    Delete Permanent
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
                @include('partials._delete_modal')
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $deletedPsychologists->withQueryString()->links() }}
    </div>

    @include('partials.toastr')
@endsection
