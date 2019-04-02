<?php

namespace App\Http\Middleware;

use Closure;

class checkstatus
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
        try {
    DB::connection()->getPdo();
    $response->send();
} catch (\Exception $e) {
   return view('auth.verify');
}
        return $next($request);
    }
}
