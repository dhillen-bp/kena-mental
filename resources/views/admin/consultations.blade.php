@extends('layouts.admin')
@section('title', 'Data Consultations')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Data Consultations</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="/admin/add-consultation" class="btn btn-primary">Add Consultation Data</a>
            <a href="/admin/deleted-consultations" class="btn btn-info">Show Deleted Consultations</a>
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
                    <th scope="col">Consultation ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Psychologist</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Action</th>
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
                        <td class="d-flex justify-content-between">
                            <a href="/admin/show-consultation/{{ $consultation->id }}" class="btn btn-primary">Detail</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-item-id="{{ $consultation->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                @if ($consultations->isNotEmpty())
                    @include('partials.modal._modal_delete_consultation')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $consultations->withQueryString()->links() }}
    </div>

    @include('partials._toastr')
@endsection
