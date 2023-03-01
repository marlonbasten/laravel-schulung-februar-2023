<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function saved(Post $post): void
    {
        Cache::delete('api.posts');
    }

    public function deleted(Post $post): void
    {
        Cache::delete('api.posts');
    }
}
