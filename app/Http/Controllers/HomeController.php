<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function data(): JsonResponse
    {
        $posts = Post::query()->with(['category', 'tags'])->orderBy('created_at', 'desc')->paginate(5);
        return response()->json(['data' => $posts]);
    }
}
