<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Reply;
use App\Http\Model\Post;
use App\Http\Model\Follow;

class PersonalController extends Controller
{
    public function  getPersonal()
    {
    	// 获取广告
    	$adverts = $this -> getAdverts();
    	// 获取友情链接
    	$links = $this -> getLinks();
    	// 获取网站信息
    	$website = $this -> getWeb();
    	$replies = Reply::where('uid', session('user')['id']) -> count();
    	$posts = Post::where('uid', session('user')['id']) -> count();
    	$friends = Follow::where('follower_id', session('user')['id']) -> orWhere('concern_id') -> count();
    	$sex = [
    			'm' => '男',
    			'w' => '女',
    			'x' => '保密',
    	];
    	$data = [
    			'adverts' => $adverts,
    			'links' => $links,
    			'website' => $website,
    			'posts' => $posts,
    			'replies' => $replies,
    			'friends' => $friends,
    			'sex' => $sex,
    	];
        return view('home.personal.index', $data);
    }

    public function postDopersonal(Request $request)
    {
    		dd($request->all());
    }
}
