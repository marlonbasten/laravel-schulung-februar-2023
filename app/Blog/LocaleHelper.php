<?php

namespace App\Blog;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class LocaleHelper
{
    public function transf(string $key, array $replace = [], string $locale = null): string
    {
        if (!Lang::has($key)) {
            Log::error('Missing translation for key: ' . $key);
        }
        if (!Lang::has($key, config('app.fallback_locale'))) {
            Log::channel('general')->error(
                'Missing translation for key: ' . $key . ' in fallback locale: ' . config('app.fallback_locale')
            );
            return '';
        }

        return Lang::get($key, $replace, $locale);
    }
}
