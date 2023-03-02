<?php

use App\Blog\Facades\LocaleHelper;

function transf(string $key, array $replace = [], string $locale = null): string
{
    return LocaleHelper::trans($key, $replace, $locale);
}
