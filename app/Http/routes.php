<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//后台登录
Route::controller('admin/login','Admin\LoginController');
// 验证码的路由
Route::get('/code','CodeController@code');
//忘记密码
Route::controller('home/default','Home\DefaultController');





//前台注册
 Route::Controller('home/zhuce','Home\ZhuceController');
//前台登录
 Route::controller('home/login','Home\LoginController');






