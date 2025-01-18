<?php

namespace App\Http\Controllers\Admin;

use App\Action\Admin\Tag\CreateTagAction;
use App\Action\Admin\Tag\DeleteTagAction;
use App\Action\Admin\Tag\EditTagAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreTagRequest;
use App\Http\Requests\Admin\Tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::all();

        return view('admin.tag.index', compact('tags'));
    }

    public function store(StoreTagRequest $request, CreateTagAction $action): RedirectResponse
    {
        $action->execute($request->name);

        return redirect()->route('tag.index')->with('success-swal', 'Tag created successfully');
    }

    public function update(UpdateTagRequest $request, Tag $tag, EditTagAction $action): RedirectResponse
    {
        $action->execute($tag, $request->name);

        return redirect()->route('tag.index')->with('success-swal', 'Tag updated successfully');
    }

    public function delete(Tag $tag, DeleteTagAction $action): RedirectResponse
    {
        $action->execute($tag);

        return redirect()->route('tag.index')->with('success-swal', 'Tag deleted successfully');
    }
}
