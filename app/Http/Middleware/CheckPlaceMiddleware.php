<?php

namespace App\Http\Middleware;

use Closure;
use App\Place;

class CheckPlaceMiddleware
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
		if (Place::count()<1) {
			return redirect('/');
		}
        return $next($request);
    }
}
