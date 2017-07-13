<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * 功能：加载帖子页面
     * @return 返回帖子页面视图
     * @auther wangchunlong
     * @date 2017-07-10 
     */
    public function index(Request $request)
    {
        $id = $request -> only('id')['id'];
        
        $post = Post::where('id', $id) -> first();
        // dd($post); 
        return view('home.post.index', ['post' => $post]);
    }

}
