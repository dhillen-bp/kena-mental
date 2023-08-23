@extends('layouts.admin')
@section('title', 'Edit Data Consultation')

@section('admin_content')

    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Edit Consultation</h1>
        <form action="/admin/edit-consultation/{{ $consultation->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="" selected disabled>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $consultation->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="psychologist_id" class="form-label">Psychologist</label>
                <select name="psychologist_id" id="psychologist_id" class="form-control" required>
                    <option value="" selected disabled>Select Psychologist</option>
                    @foreach ($psychologists as $psychologist)
                        <option value="{{ $psychologist->id }}"
                            {{ $psychologist->id == $consultation->psychologist_id ? 'selected' : '' }}>
                            {{ $psychologist->id }} - {{ $psychologist->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea name="notes" id="notes" cols="30" rows="5" class="form-control">{{ $consultation->notes }}</textarea>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Booking Date</label>
                <input type="datetime-local" class="form-control" id="booking_date" name="booking_date"
                    value="{{ $consultation->booking_date }}">
            </div>

            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/show-consultation{{ $consultation->id }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    @include('partials.toastr')
@endsection
