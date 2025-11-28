<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if ($request->user() && in_array($request->user()->role_user()->where('status', '1')->first()->role->nama_role, $roles)) {
            return $next($request);
        }

        return abort(403, 'Unauthorized');
    }
}
