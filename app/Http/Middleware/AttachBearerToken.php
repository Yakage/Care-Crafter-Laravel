<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttachBearerToken
{

    public function handle($request, Closure $next)
    {
        if ($token = $request->bearerToken()) {
            // Token exists, attach it to the request headers
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }

        return $next($request);
    }
}
