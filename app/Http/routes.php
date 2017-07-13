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
Route::group(['prefix' => 'home', 'namespace' => 'Home'], function ()
{
	Route::get('/index', 'IndexController@index');
	Route::get('/column', 'ColumnController@index');
	Route::get('/section', 'SectionController@index');
	Route::get('/post', 'PostController@index');
});


	Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    // 栏目路由
    Route::controller('columns','ColumnsController');
    // 板块路由
    Route::resource('sections','SectionsController');
    Route::any('upload','SectionsController@upload');
    Route::any('select','SectionsController@select');


    //后台管理员
    Route::controller('root','RootController');
    Route::post('root/upload','RootController@upload');

    //用户管理
    Route::controller('user','UserController');

    //网站配置
    Route::controller('web','WebController');

});


