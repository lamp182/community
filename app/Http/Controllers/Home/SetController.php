<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\Userdetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Post;
use App\Http\Model\Reply;
use App\Http\Model\User;

class SetController extends Controller
{   
    //设置
   public function getSet()
   {
   	// 获取广告
   	$adverts = $this -> getAdverts();
   	// 获取友情链接
   	$links = $this -> getLinks();
   	// 获取网站信息
   	$website = $this -> getWeb();
   	$user = User::find(session('user')['id']) -> userdetail;
   	$data = [
   			'adverts' => $adverts,
   			'links' => $links,
   			'website' => $website,
   			'user' => $user,
   	];
    return view('home.set.grzl', $data);
   }
   
   public function postDoset(Request $requset)
   {
    $input = $requset->except('_token');
  	UserDetail::where('id', session('user')['id']) -> update($input);
  	$user = session('user');
  	$user['detail'] = User::find(session('user')['id']) -> userDetail;
  	session(['user' => $user]);
    return redirect('home/set/set');
     // $user = Userdetail::where('username',$input['username'])->first();
     // dd($user);
   }



   //主题
   public function getZhuti()
   {
   	// 获取广告
   	$adverts = $this -> getAdverts();
   	// 获取友情链接
   	$links = $this -> getLinks();
   	// 获取网站信息
   	$website = $this -> getWeb();
   	$posts = Post::where('uid', session('user')['id']) -> get();
   	foreach ($posts as $post) {
   		$post['section'] = Post::find($post['id']) -> section;
   		$post['reply'] = Reply::where('pid', $post['id']) -> orderBy('ctime', 'desc') -> limit(1) -> first();
   	}
//    	dd($posts);
   	$data = [
   			'adverts' => $adverts,
   			'links' => $links,
   			'website' => $website,
   			'posts' => $posts,
   	];
    return view('home.set.zhuti', $data);
   }




   //回复
   public function getHuifu()
   {
   	// 获取广告
   	$adverts = $this -> getAdverts();
   	// 获取友情链接
   	$links = $this -> getLinks();
   	// 获取网站信息
   	$website = $this -> getWeb();
   	$replies = Reply::where('uid', session('user')['id']) -> get();
   	foreach ($replies as $reply) {
   		$reply['post'] = Reply::find($reply['id']) -> post;
   		$reply['section'] = Post::find($reply['post']['id']) -> section;
   		$reply['last'] = Reply::where('pid', $reply['post']['id']) -> orderBy('ctime', 'desc') -> limit(1) -> first();
   	}
   	$data = [
   			'adverts' => $adverts,
   			'links' => $links,
   			'website' => $website,
   			'replies' => $replies,
   	];
   	return view('home.set.huifu', $data);
   }


   //头像

   public function getTou()
   {
   	// 获取广告
   	$adverts = $this -> getAdverts();
   	// 获取友情链接
   	$links = $this -> getLinks();
   	// 获取网站信息
   	$website = $this -> getWeb();
   	$data = [
   			'adverts' => $adverts,
   			'links' => $links,
   			'website' => $website,
   	];
   	return view('home.set.tou', $data);
   }
	
   /**
    *图片上传
    */
   public function postUpload()
   {
   	//        将上传文件移动到制定目录，并以新文件名命名
   	$file = Input::file('file_upload');
   	if($file->isValid()) {
   		$entension = $file->getClientOriginalExtension();//上传文件的后缀名
   		$newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
   		
   		//            将图片上传到本地服务器
   		$path = $file->move(public_path() . '/uploads', $newName);
   		//        返回文件的上传路径
   		$filepath = 'uploads/' . $newName;
   		return $file;
   		return $filepath;
   	}
   }

   //积分
   public function getJifen()
   {
	   	// 获取广告
	   	$adverts = $this -> getAdverts();
	   	// 获取友情链接
	   	$links = $this -> getLinks();
	   	// 获取网站信息
	   	$website = $this -> getWeb();
	   	$data = [
	   			'adverts' => $adverts,
	   			'links' => $links,
	   			'website' => $website,
	   	];
	   	return view('home.set.jifen', $data);
   }

   //积分规则
   public function getGuize()
   {
	   	// 获取广告
	   	$adverts = $this -> getAdverts();
	   	// 获取友情链接
	   	$links = $this -> getLinks();
	   	// 获取网站信息
	   	$website = $this -> getWeb();
	   	$data = [
	   			'adverts' => $adverts,
	   			'links' => $links,
	   			'website' => $website,
	   	];
    	return view('home.set.guize', $data);
   }
}
