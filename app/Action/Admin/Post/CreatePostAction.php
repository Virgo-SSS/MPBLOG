<?php

namespace App\Action\Admin\Post;

use App\Models\Post;

class CreatePostAction
{
    public function execute(array $data): void
    {
        dd($data);
        // Create post
        Post::query()->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $data['image'] ?? null,
            'category_id' => $data['category_id'],
        ]);
        
    }

    private function uploadImage($image): string
    {
        $imagePath = $image->store('images', 'public');

        return $imagePath;
    }
}