<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAuthenticatedFront
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $response = $next($request); //please see what is going on here.

        $user = $request->user();

        if ($user) {
            if ($user->role == 0) {
                return redirect('/home');
            } else {
                return $response;
            }
        }

        return redirect('/');
    }
}
