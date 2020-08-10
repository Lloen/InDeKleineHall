<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;

class DaySession
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
        $midnightDate = new DateTime(date('Y-m-d H:i:s', strtotime('11.59pm')));
        $midnightString = $midnightDate->format('Y-m-d H:i:s');


        $response = $next($request);
        $response->header('Cache-Control', 'no-cache, no-store');
        $response->header('Expire', $midnightString);

        return $response;
    }
}
