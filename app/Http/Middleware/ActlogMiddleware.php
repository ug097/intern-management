<?php

namespace App\Http\Middleware;

use Closure;
use App\Actlog;
use \Route;

class ActlogMiddleware
{/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $this->actlog($request, $response->status());

        return $response;
    }

    public function actlog($request, $status)
    {
        $user = $request->session()->get('login_staff');
        $data = [
            'staff_id' => $user ? $user->id : null,
            'route' => Route::currentRouteName(),
            'url' => $request -> path(),
            'method' => $request -> method(),
            'status' => $status,
            'message' => count($request->toArray()) != 0 ? json_encode($request->toArray()) : null,
            'remote_addr' => $request -> ip(),
            'user_agent' => $request -> userAgent(),
        ];
        Actlog::create($data);
    }
}
