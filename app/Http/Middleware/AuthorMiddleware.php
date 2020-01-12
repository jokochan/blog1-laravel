<?php

namespace App\Http\Middleware;

use Closure;

class AuthorMiddleware
{

    public function handle($request, Closure $next)
    {
        // return $next($request);
        $user = $request->user();
        if ($user->role_id === 1 || $user->role_id === 2) {
            return $next($request);
        }
        return redirect('/');

    }
}
