<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AlreadyLoggedin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('loginId') && (url('/')==$request->url()) ||
            (url('register')==$request->url()))
            {
                Toastr::success('You Are Already Logged In.','Success');
                return back();
            }
        return $next($request);
    }
}
