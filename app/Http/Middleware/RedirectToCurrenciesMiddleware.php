<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToCurrenciesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->path() === 'admin') {
            return redirect('/admin/currencies');
        }

        return $next($request);
    }
}
