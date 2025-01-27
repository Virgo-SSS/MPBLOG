@extends('admin.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="table-responsive">
            <table class="table table-responsive table-borderless">
                <thead>
                    <tr class="bg-dark">
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('post.delete', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
