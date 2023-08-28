<div class="modal fade" id="editModalQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning d-flex justify-content-center text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Question</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="/admin/edit-question/{{ $question->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id" class="form-label">Question ID</label>
                        <input type="text" class="form-control" name="id" id="id"
                            value="{{ $question->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="test_id" class="form-label">Test ID</label>
                        <input type="text" class="form-control" name="test_id" id="test_id"
                            value="{{ $question->test_id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Question Content</label>
                        <textarea name="content" name="content" id="content" rows="5" class="form-control">{{ $question->content }}</textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="id" id="id">
                    <button type="submit" class="btn btn-warning">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
