<div class="modal fade" id="editModalAnswer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary d-flex justify-content-center text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Answer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addForm" action="/admin/edit-answer/{{ $answer->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="question_id" class="form-label">Question ID</label>
                        <input type="text" class="form-control" name="question_id" id="question_id"
                            value="{{ $question->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="choice" class="form-label">Answer Choice</label>
                        <textarea name="choice" name="choice" value="{{ $answer->choice }}" id="choice" rows="3"
                            class="form-control">{{ $answer->choice }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="score" class="form-label">Answer Score</label>
                        <input type="number" value="{{ $answer->score }}" class="form-control" name="score"
                            id="score">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
