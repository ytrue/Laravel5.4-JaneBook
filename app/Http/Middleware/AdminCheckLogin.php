<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheckLogin
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
        $key=\Auth::guard('admin')->id();
        if ($key){
            return redirect('admin/index');
        }
        return $next($request);
    }
}
