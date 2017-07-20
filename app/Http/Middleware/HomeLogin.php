<?php

namespace App\Http\Middleware;

use Closure;

class HomeLogin
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
        //前台登录中间插件间
        //if(用户没有登录){
            // 跳转到登录页面
        // }
        if(!session('user')){
            
            return redirect('home/login/login');
        }
        return $next($request);
    }
}
