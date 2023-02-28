<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $name = auth()->user()?->name;

        if ($name !== 'Marlon') {
            abort(403);
        }

        return $next($request);
    }
}
