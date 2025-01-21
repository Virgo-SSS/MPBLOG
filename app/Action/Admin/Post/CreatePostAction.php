<?php

namespace App\Action\Admin\Post;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreatePostAction
{
    public function execute(array $data): void
    {
        DB::transaction(function () use ($data) {
            if(isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $image = $this->uploadImage($data['image']);
            }
    
            $post = Post::query()->create([
                'title' => $data['title'],
                'content' => $data['content'],
                'image' => $image ?? null,
                'category_id' => $data['category_id'],
            ]);
    
            if(isset($data['tags']) && is_array($data['tags']) && count($data['tags']) > 0) {
                $post->tags()->createMany(array_map(function (string $tag) {
                    return ['name' => $tag];
                }, $data['tags']));
            }
        });

    }

    private function uploadImage(UploadedFile $image): string
    {
        // generate a unique name for the image
        $imageName = md5(uniqid() . Carbon::now()->format('Y-m-d H:i:s')) . '.' . $image->getClientOriginalExtension();
        
        Storage::disk('public')->put('post/images/' . $imageName, file_get_contents($image->getRealPath()));
        
        return $imageName;
    }
}