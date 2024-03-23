@extends('layout.index')
@section('lihatpoll')
<div class="col-4" style="transform: translateX(40px)">
    <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#poll">
        lihat poll
    </button>
    <div class="modal fade" id="poll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">poll</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="judul_poll">Judul Poll</label>
                            <input type="text" class="form-control" id="judul_poll" value="WFH / WFO" name="title" placeholder="Enter judul poll">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_poll">Deskripsi Poll</label>
                            <input type="text" class="form-control" id="deskripsi_poll" name="description" value="Lebih baik WFH atau WFO" placeholder="Enter deskripsi poll">
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" value="2024-03-23" placeholder="deadline">
                        </div>
                        <div class="form-group" id="choices-container">
                            <label for="choices">Choices</label>
                            <div class="choice-input mb-2">
                                <input type="text" class="form-control choice" name="choices[]" placeholder="Enter choice">
                                <button type="button" class="btn btn-danger remove-choice">Remove</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="add-choice">Add Choice</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
