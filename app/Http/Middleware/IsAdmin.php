<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() &&  auth()->user()->is_admin) {
            return $next($request);
        }

        return redirect()->route('user.home')->with('error','Oops ! seems that you are not supposed to go there !');

    }
}
