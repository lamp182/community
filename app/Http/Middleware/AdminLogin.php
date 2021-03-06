<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
       //后台的登录中间插件 
       //if(用户没有登录){
            // 跳转到登录页面
        // }
        if(!session('admin')){
            return redirect('admin/login/login');
        }
        return $next($request);
    }
}
