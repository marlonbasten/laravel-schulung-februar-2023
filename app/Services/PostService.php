<?php

namespace App\Services;

use App\Data\PostData;
use App\Http\Requests\Post\StorePostRequest;
use App\Interfaces\PostServiceInterface;
use App\Models\Post;
use Illuminate\Database\QueryException;

class PostService implements PostServiceInterface
{
    public function store(PostData $data): Post
    {
        $post = Post::create($data->except('categories')->toArray());
        $post->categories()->attach($data->categories);

        return $post;
    }
}
