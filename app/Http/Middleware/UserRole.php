<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\UserRole as Middleware;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        $user = Auth::user();
        if (!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($user->role == $role){
            return $next($request);
        }
        return redirect()->route('login');
    }
}
