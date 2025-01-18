<?php 

namespace App\Action\Admin\Tag;

use App\Models\Tag;

class CreateTagAction
{
    public function execute(string $name): void
    {
        Tag::query()->create([
            'name' => $name,
        ]);
    }
}

