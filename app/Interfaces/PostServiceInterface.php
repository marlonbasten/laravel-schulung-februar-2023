<?php

namespace App\Interfaces;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;

interface PostServiceInterface
{
    public function store(StorePostRequest $request): Post;
}
