@extends('admin.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-dark text-white">Edit New Post</div>
            <div class="card-body">
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $post->title }}" id="title" name="title" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tags-input" class="form-label">Tags</label>
                        <select class="form-select" id="tags-input" name="tags[]" 
                            multiple 
                            data-allow-new="true"
                            data-allow-clear="true"
                        >
                            <option disabled hidden value="">Choose a tag...</option>
                            @foreach($post->tags as $tag)
                                <option value="{{ $tag->name }}" selected="selected">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="showPreview(event)">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <img src="{{ asset('storage/post/images/' . $post->image) }}" id="image-preview" alt="Image Preview" style="width: 300px;" 
                        @class([
                            'img-thumbnail',
                            'd-none' => !$post->image,
                            'd-block' => $post->image
                        ])>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                        <select class="form-control" id="category" name="category_id" required>
                            <option value="" disabled selected>Choose a category...</option>
                            @foreach($categories as $id => $category)
                                <option value="{{ $id }}" @selected($id == $post->category_id)>{{ $category }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="content" class="form-label">Content<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Update Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("image-preview");
                preview.src = src;
                preview.classList.remove("d-none");
                preview.classList.add("d-block");
            }
        }
    </script>
@endsection