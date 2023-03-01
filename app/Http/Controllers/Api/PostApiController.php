<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostApiController extends Controller
{
    public function index()
    {
        return \CacheHelper::handleCache('api.posts', function () {
            $posts = Post::with('user')->get();
            return PostResource::collection($posts);
        });
    }
}
