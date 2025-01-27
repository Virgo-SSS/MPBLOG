@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card mx-auto" style="max-width: 600px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
                        <div class="card-body">
                            <!-- Author and Date -->
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('images/virgo.jpeg') }}"
                                    alt="Author" class="author-img me-3">
                                <div>
                                    <h6 class="mb-0 font-weight-bold"> Virgo Stevanus <small class="text-primary">follow</small></h6>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                    
                            <!-- Content -->
                            <p class="content">
                                {{ $post->content }}
                            </p>
                    
                            <!-- Image -->
                            @if($post->image)
                                <img src="{{ asset('storage/post/images/' . $post->image) }}"
                                    alt="Post Image" class="img-fluid rounded mb-3">
                            @endif

                            <!-- Tags -->
                            <div class="d-flex flex-wrap">
                                @foreach($post->tags as $tag)
                                    <span class="tag">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
