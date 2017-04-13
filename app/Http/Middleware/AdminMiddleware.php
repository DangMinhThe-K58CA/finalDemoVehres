<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->role === config('common.user.role.admin')) {
                return $next($request);
            }
        }

        return redirect()->action('Home\HomeController@index')->with('error', trans('layout.page_access_permission_not_allowed', ['site' => 'administration site']));
    }
}
