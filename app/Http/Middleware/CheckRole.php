<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
  /*  public function handle(Request $request, Closure $next,string $role)
    {
        if (! $request->user()->hasRole($role)) {
            abort(401, 'This action is unauthorized.');
        }
        return $next($request);
        if ($request->user()->roles()->where('name', '=', $role)->exists()) {
            return $next($request);
        }

        abort(403);
    }*/

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'Admin'){
             return $next($request);
        } else {
        return redirect('/home');
        }
    }

}
