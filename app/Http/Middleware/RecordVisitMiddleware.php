<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RecordVisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $page)
{
    app('App\Http\Controllers\VisitController')->recordVisit($page);
    return $next($request);
}
}
