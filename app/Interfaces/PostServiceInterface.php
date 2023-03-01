<?php

namespace App\Interfaces;

use App\Data\PostData;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;

interface PostServiceInterface
{
    public function store(PostData $data): Post;
}
