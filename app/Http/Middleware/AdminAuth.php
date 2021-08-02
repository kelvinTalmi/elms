<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;


class AdminAuth
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
        $path=  $request->path();
      

        // echo $path;
        //  if (!$request->session()->exists('adminLogin')) {
        //     // user value cannot be found in session
        //     return redirect('/');
        // }



if($path=='admin/login' && $request->session()->exists('adminSession')){
    return redirect ('admin');
}

else if($path!='admin/login' && !$request->session()->exists('adminSession')){

    return redirect ('admin/login');
}


        return $next($request);
    }
}
