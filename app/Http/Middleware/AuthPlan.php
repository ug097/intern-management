<?php

namespace App\Http\Middleware;

use Closure;

class AuthPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $plan)
    {
        if($plan == 'S') {
            if($request->session()->get('login_user.clients.plan_id') == 3) {
                return $next($request);
            }
        }else if($plan == 'E') {
            if($request->session()->get('login_user.clients.plan_id') >= 2 && 
                    $request->session()->get('login_user.clients.plan_id') <= 3) {
                return $next($request);
            }
        }else {
            return $next($request);
        }
        
        return redirect('login');
    }
}
