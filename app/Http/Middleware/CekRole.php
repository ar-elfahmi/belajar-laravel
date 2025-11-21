<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next, ...$namas): Response
    {
        if ($request->user() && in_array($request->user()->nama, $namas)) {
            return $next($request);
        }

        return abort(403, 'Unauthorized');
    }
}
