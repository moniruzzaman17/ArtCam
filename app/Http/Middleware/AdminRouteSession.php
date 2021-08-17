<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminRouteSession
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
        // return dd(Auth::guard('admin')->check());
        // $user_id = Auth::guard('admin')->user()->user_id;
        if (Auth::guard('admin')->check() == true) {
            if ($request->session_id == session()->getId()) {
                return $next($request);
        // return dd(session()->getId(), $request->session_id);
            }
            else {
                $request->session()->flush();
                return redirect()->route('admin.login')->with('error','Session has been expired!!');
            }
        }
        // return $next($request);
        else {
            $request->session()->flush();
            return redirect()->route('admin.login')->with('error','Session has been expired!!');
        }
    }
}
