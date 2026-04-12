<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class CacheHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Get the file extension of the requested resource
        // $extension = pathinfo($request->getPathInfo(), PATHINFO_EXTENSION);

        // // Set cache headers based on the file extension
        // if (in_array($extension, ['css', 'jpg', 'jpeg', 'png', 'gif','css','js','webp'])) {
        //     // Set a longer TTL for CSS, JPG, PNG, and GIF files (7 days)
        //     $response->header('Cache-Control', 'public, max-age=604800');
        // } else {
        //     // Set a shorter TTL for other asset types (1 day)
        //     $response->header('Cache-Control', 'public, max-age=86400');
        // }

        return $response;
    }
}
