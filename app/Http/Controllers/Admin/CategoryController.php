<?php

namespace App\Http\Controllers\Admin;

use App\Action\Admin\Category\CreateCategoryAction;
use App\Action\Admin\Category\DeleteCategoryAction;
use App\Action\Admin\Category\EditCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function store(StoreCategoryRequest $request, CreateCategoryAction $action): RedirectResponse
    {
        $action->execute($request->validated()['name']);

        return redirect()->route('category.index')->with('success-swal', 'Category created successfully');
    }

    public function update(UpdateCategoryRequest $request, Category $category, EditCategoryAction $action): RedirectResponse
    {
        $action->execute($category, $request->validated()['name']);

        return redirect()->route('category.index')->with('success-swal', 'Category updated successfully');
    }

    public function delete(Category $category, DeleteCategoryAction $action): RedirectResponse
    {
        $action->execute($category);

        return redirect()->route('category.index')->with('success-swal', 'Category deleted successfully');
    }
}
