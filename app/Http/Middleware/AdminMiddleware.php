<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        // if ($user->role->id === 1) {
        if ($user->role_id === 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
