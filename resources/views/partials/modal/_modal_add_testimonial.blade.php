<div class="modal fade" id="modalAddTestimonial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-purple d-flex justify-content-center text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Testimonial</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addForm" action="/testimonial" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="text" class="form-control" id="user_id" value="{{ auth()->user()->name }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="psychologist_id" class="form-label">Psychologist</label>
                        <select name="psychologist_id" id="psychologist_id" class="form-control" required>
                            <option value="" selected disabled>Select Psychologist</option>
                            @foreach ($psychologists as $psychologist)
                                <option value="{{ $psychologist->id }}">{{ $psychologist->id }} -
                                    {{ $psychologist->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Message</label>
                        <textarea name="content" id="content" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="id" id="id">
                    <button type="submit" class="btn btn-purple">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
