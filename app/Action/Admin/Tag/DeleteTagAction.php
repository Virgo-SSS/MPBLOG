<?php 

namespace App\Action\Admin\Tag;

use App\Models\Tag;

class DeleteTagAction
{
    public function execute(Tag $tag): void
    {
        $tag->delete();
    }
}