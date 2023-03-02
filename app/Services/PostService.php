<?php

namespace App\Services;

use App\Data\PostData;
use App\Events\PostCreatedEvent;
use App\Http\Requests\Post\StorePostRequest;
use App\Interfaces\PostServiceInterface;
use App\Jobs\GeneratePostImageJob;
use App\Models\Post;
use Illuminate\Database\QueryException;

class PostService implements PostServiceInterface
{
    public function store(PostData $data): Post
    {
        $post = Post::create($data->except('categories')->toArray());
        $post->categories()->attach($data->categories);

        event(new PostCreatedEvent($post));
        dispatch(new GeneratePostImageJob($post));

        return $post;
    }
}
