<?php

namespace App\Http\Middleware;

use App\Models\Report;
use Closure;
//use DB;

class VisitLog
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
        $report = new Report();
        $report->url = $request->url();
        $report->save();
        return $next($request);
    }
}
