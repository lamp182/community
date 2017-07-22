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

Route::get('/', 'IndexController@index');



Route::group(['prefix' => 'home', 'namespace' => 'Home','middleware'=>['home.login.login']], function ()
{
	Route::get('/index', 'IndexController@index');
	Route::get('/column', 'ColumnController@index');
	Route::get('/section', 'SectionController@index');
	// 帖子路由
	Route::resource('post', 'PostController');
	// 查询路由
	Route::post('query', 'PostController@query');
	// 回复路由
	Route::post('reply', 'ReplyController@store');
    Route::get('reply/add', 'ReplyController@add');
	Route::get('reply/doadd', 'ReplyController@doadd');
	Route::any('estimate', 'ReplyController@estimate');
	// 用户路由
	// 关注好友
	Route::get('user/follow', 'UserController@follow');
});




Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin.login.login']],function(){
    // 栏目路由
    Route::controller('columns','ColumnsController');
    // 板块路由
    Route::resource('sections','SectionsController');
    Route::any('upload','SectionsController@upload');
    Route::any('select','SectionsController@select');
    // 帖子路由
    Route::resource('posts','PostsController');
    // 后台首页
    Route::resource('index','IndexController');


    //后台管理员
    Route::controller('root','RootController');
    Route::post('root/upload','RootController@upload');

    //用户管理
    Route::controller('user','UserController');

    //网站配置
    Route::resource('web','WebController');
    Route::any('upload','WebController@upload');

    // 友情链接
    Route::controller('link','LinkController');

    //广告申请
    // Route::controller('adverts','AdvertsController');
    Route::resource('adverts','AdvertsController');
    Route::any('upload','AdvertsController@upload');

    //版主申请
    Route::resource('moderators','ModeratorsController');
    Route::any('kankan','ModeratorsController@kankan');

    //版主申请后
    Route::controller('confirmsection','ConfirmController');

    //轮播图
    Route::controller('carousel','CarouselController');
    Route::post('carousel/upload','CarouselController@upload');
    




});
    //前台用户个人中心
    Route::controller('home/personal','Home\PersonalController');
    //前台设置个人资料
    Route::controller('home/set','Home\SetController');
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

