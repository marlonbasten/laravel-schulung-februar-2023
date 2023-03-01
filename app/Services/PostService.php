<?php

namespace App\Services;

use App\Http\Requests\Post\StorePostRequest;
use App\Interfaces\PostServiceInterface;
use App\Models\Post;
use Illuminate\Database\QueryException;

class PostService implements PostServiceInterface
{
    public function store(StorePostRequest $request): Post
    {
        $post = Post::create(['user_id' => auth()->id(), ...$request->only(['text', 'title'])]);
        $post->categories()->attach($request->get('categories'));

        return $post;
    }
}
