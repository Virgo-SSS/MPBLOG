<?php

namespace App\Http\Controllers\Admin;

use App\Action\Admin\Post\CreatePostAction;
use App\Action\Admin\Post\DeletePostAction;
use App\Action\Admin\Post\EditPostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Category;
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
        $categories = Category::query()->pluck('name', 'id');
        return view('admin.post.create', compact('categories'));
    }

    public function store(StorePostRequest $request, CreatePostAction $action): RedirectResponse
    {
        $action->execute($request->validated());

        return redirect()->route('post.index')->with('success-swal', 'Post created successfully.');
    }

    public function edit(Post $post): View
    {
        $categories = Category::query()->pluck('name', 'id');
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post, EditPostAction $action): RedirectResponse
    {
        $action->execute($post, $request->validated());

        return redirect()->route('post.index')->with('success-swal', 'Post updated successfully.');
    }

    public function delete(Post $post, DeletePostAction $action): RedirectResponse
    {
        $action->execute($post);

        return redirect()->route('post.index')->with('success-swal', 'Post deleted successfully.');
    }
}
