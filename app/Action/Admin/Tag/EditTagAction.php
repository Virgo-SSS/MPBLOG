<?php 

namespace App\Action\Admin\Tag;

use App\Models\Tag;

class EditTagAction
{
    public function execute(Tag $tag, string $name): void
    {
        $tag->update([
            'name' => $name,
        ]);
    }
}