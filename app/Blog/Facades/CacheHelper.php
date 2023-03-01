<?php

namespace App\Blog\Facades;

use Illuminate\Support\Facades\Facade;

/** @mixin \App\Blog\CacheHelper */
class CacheHelper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        // Alternativ: return \App\Blog\CacheHelper::class; - Dann muss auch nicht in service container gebindet werden
        return \App\Blog\CacheHelper::NAME;
    }
}
