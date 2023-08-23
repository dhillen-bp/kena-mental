<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger d-flex justify-content-center text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Delete Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-danger text-white">
                <h6>Are you sure delete this data?</h6>
                <ul>
                    <li>Psychologist ID: <b>{{ $psychologist->id }}</b></li>
                    <li>Psychologist Name: <b>{{ $psychologist->name }}</b></li>
                </ul>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <form id="deleteForm" action="/admin/delete-psychologist/{{ $psychologist->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
