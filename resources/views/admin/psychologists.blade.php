@extends('layouts.admin')
@section('title', 'Data Psychologists')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Data Psychologists</h1>
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
                        <th scope="row">{{ $loop->index + $psychologists->firstItem() }}</th>
                        <td>{{ $psychologist->name }}</td>
                        <td>{{ optional($psychologist->psychologistDetail)->university }} -
                            {{ optional($psychologist->psychologistDetail)->degree }}
                            {{ optional($psychologist->psychologistDetail)->year }}
                        </td>
                        <td>{{ optional($psychologist->psychologistDetail)->topics }}</td>
                        <td>{{ optional($psychologist->psychologistDetail)->session_count }}</td>
                        <td>
                            <a href="/admin/psycholog-detail/{{ $psychologist->id }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $psychologists->withQueryString()->links() }}
    </div>

@endsection
