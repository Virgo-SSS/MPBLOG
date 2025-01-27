@extends('admin.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between">
            <h4>Category List</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Add Category
            </button>
        </div>

        <table class="table table-responsive mt-3">
            <thead>
                <tr class="table-dark text-center">
                    <th>No</th>
                    <th>Category Name</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-warning" onclick="editCategory({{ json_encode($category->only(['id', 'name'])) }})">Edit</a> 
                            
                            <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      

        <!-- Modal -->
        <div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addCategoryModalLabel">Add Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="name">
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editCategoryModalLabel">Edit Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="name">
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
        function editCategory(data) {
            let url = "{{ route('category.update', ':id') }}";
            url = url.replace(':id', data.id);

            const editCategoryModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
            const form = document.querySelector('#editCategoryModal form');
            form.action = url;
            form.querySelector('input[name="name"]').value = data.name;
            editCategoryModal.show();
        }
    </script>
@endsection
