<?php

namespace App\Action\Admin\Category;

use App\Models\Category;

class CreateCategoryAction
{
    public function execute(string $name): void
    {
        Category::query()->create([
            'name' => $name,
        ]);
    }
}
