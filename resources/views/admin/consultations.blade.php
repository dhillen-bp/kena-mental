@extends('layouts.admin')
@section('title', 'Data Consultations')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Data Consultations</h1>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Consultation ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Psychologist</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
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
                        <td>{{ optional($consultation->paymentConsultation)->status }}</td>
                        <td>
                            <a href="/admin/consultation-detail/{{ $consultation->id }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $consultations->links() }}
    </div>

@endsection
