<?php 

namespace App\Action\Admin\Post;

use App\Models\Post;

class DeletePostAction
{
    public function execute(Post $post): void
    {
        $post->delete();
    }
}