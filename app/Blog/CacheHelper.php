<?php

namespace App\Blog;

use Closure;
use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public const NAME = 'CacheHelper';

    public function handleCache(string $key, Closure $function): mixed
    {
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = $function();
            Cache::put($key, $data);
        }

        return $data;
    }
}
