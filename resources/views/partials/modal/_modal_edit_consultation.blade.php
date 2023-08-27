<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary d-flex justify-content-center text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Consultation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="/admin/psychologist/consultation-completed/{{ $consultation->id }}"
                method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <input type="text" class="form-control" id="user_id" name="user_id"
                            value="{{ $consultation->users->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="psychologist_id" class="form-label">Psychologist</label>
                        <input type="text" class="form-control" id="psychologist_id" name="psychologist_id"
                            value="{{ $consultation->psychologists->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea name="notes" id="notes" rows="6" class="form-control">{{ $consultation->notes }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Booking Date</label>
                        <input type="datetime-local" class="form-control" id="booking_date" name="booking_date"
                            value="{{ $consultation->booking_date }}" readonly>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="id" id="id">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
