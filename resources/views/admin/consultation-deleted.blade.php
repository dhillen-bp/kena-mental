@extends('layouts.admin')
@section('title', 'Deleted Consultations')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Deleted Data Consultations</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="/admin/consultations" class="btn btn-primary">Back</a>
        </div>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Consultation ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Psychologist</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedConsultations as $consultation)
                    <tr>
                        <th scope="row">{{ $loop->index + $deletedConsultations->firstItem() }}</th>
                        <td>{{ $consultation->id }}</td>
                        <td>{{ $consultation->users->name }}</td>
                        <td>{{ $consultation->psychologists->name }}</td>
                        <td>{{ $consultation->booking_date }}</td>
                        <td>{{ optional($consultation->paymentConsultation)->status }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="/admin/restore-consultation/{{ $consultation->id }}"
                                class="btn btn-primary me-2">Restore</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-item-id="{{ $consultation->id }}">
                                Delete Permanent
                            </button>
                        </td>
                    </tr>
                @endforeach
                @if ($deletedConsultations->isNotEmpty())
                    @include('partials.modal._modal_delete_permanent_consultation')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $deletedConsultations->links() }}
    </div>


@endsection
