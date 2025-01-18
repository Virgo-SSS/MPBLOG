@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Tag</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTagModal">
            Add Tag
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addTagModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addTagModalLabel">Add Tag</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tagName" class="form-label">Tag Name</label>
                                <input type="text" class="form-control" id="tagName" name="name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tag Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tag->name }}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-warning" onclick="editTag({{ json_encode($tag->only(['id', 'name'])) }})">Edit</a> 
                            
                            <form action="{{ route('tag.delete', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editTagModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editTagModalLabel">Edit Tag</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tagName" class="form-label">Tag Name</label>
                            <input type="text" class="form-control" id="tagName" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function editTag(data) {
            let url = "{{ route('tag.update', ':id') }}";
            url = url.replace(':id', data.id);

            const editTagModal = new bootstrap.Modal(document.getElementById('editTagModal'));
            const form = document.querySelector('#editTagModal form');
            form.action = url;
            form.querySelector('input[name="name"]').value = data.name;
            editTagModal.show();
        }
    </script>
@endsection
