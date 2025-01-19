<?php

namespace App\Http\Controllers\Admin;

use App\Action\Admin\Post\CreatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()->latest()->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.post.create');
    }

    public function store(StorePostRequest $request, CreatePostAction $action): RedirectResponse
    {
        $action->execute($request->validated());

        return redirect()->route('admin.post.index')->with('success-swal', 'Post created successfully.');
    }
}
