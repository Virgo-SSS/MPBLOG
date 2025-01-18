<?php

namespace App\Action\Admin\Category;

use App\Models\Category;

class DeleteCategoryAction
{
    public function execute(Category $category): void
    {
        $category->delete();
    }
}