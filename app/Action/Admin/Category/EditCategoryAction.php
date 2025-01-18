<?php 

namespace App\Action\Admin\Category;

use App\Models\Category;

class EditCategoryAction
{
    public function execute(Category $category, string $name): void
    {
        $category->update([
            'name' => $name,
        ]);
    }
}