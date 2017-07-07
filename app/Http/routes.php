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

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    // 栏目路由
    Route::controller('columns','ColumnsController');
    // 板块路由

    Route::resource('sections','SectionsController');
    Route::any('upload','SectionsController@upload');
});
