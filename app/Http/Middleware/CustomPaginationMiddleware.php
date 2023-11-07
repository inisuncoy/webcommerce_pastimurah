<?php

namespace App\Http\Middleware;

use Closure;

class CustomPaginationMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->has('page')) {
            $content = $response->content();
            $content = str_replace('href="?page=', 'href="?toko&page=', $content);
            $response->setContent($content);
        }

        return $response;
    }
}
