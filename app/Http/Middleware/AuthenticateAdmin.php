<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Config;

/**
 * Class AuthenticateAdmin
 * @package App\Http\Middleware
 */
class AuthenticateAdmin
{
    /**
     * AuthenticateAdmin constructor.
     * 5.1只能在构造器中注入 而无法在handle中注入
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  Guard $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if ($request->is("admin/auth/*") || $this->auth->check()) {
            return $next($request);
        } else {
            return redirect()->guest('/admin/auth/login');
        }
    }
}
