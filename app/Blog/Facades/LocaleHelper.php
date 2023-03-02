<?php

namespace App\Blog\Facades;

use Illuminate\Support\Facades\Facade;

/** @mixin \App\Blog\LocaleHelper */
class LocaleHelper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Blog\LocaleHelper::class;
    }
}
