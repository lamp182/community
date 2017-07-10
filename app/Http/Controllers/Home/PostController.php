<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * 功能：加载帖子详情页
     * @return 返回板块详情页视图
     * @auther wangchunlong
     * @date 2017-07-10
     */
    public function index(Request $request)
    {
        
        return view('home.post.index');
    }

}
