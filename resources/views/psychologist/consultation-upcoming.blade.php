@extends('layouts.psychologist')
@section('title', 'Consultation Upcoming')

@section('psychologist_content')

    <div class="container my-5">
        <h1 class="mb-4">Data Consultation Upcoming</h1>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-4">Consultation ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Psychologist</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $consultation)
                    <tr>
                        <th scope="row">{{ $loop->index + $consultations->firstItem() }}</th>
                        <td>{{ $consultation->id }}</td>
                        <td>{{ $consultation->users->name }}</td>
                        <td>{{ $consultation->psychologists->name }}</td>
                        <td>{{ $consultation->booking_date }}</td>
                        <td>{{ Str::limit($consultation->notes, 10, '...') }}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $consultations->links() }}
    </div>
    @include('partials._toastr')
@endsection
