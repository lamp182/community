<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Column;
use App\Http\Model\Section;
use App\Http\Model\Post;
use App\Http\Model\User;
use App\Http\Model\UserDetail;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Carousel;
use App\Http\Model\Adverts;
use App\Http\Model\Reply;
use DB;
use App\Http\Model\Follow;

class IndexController extends Controller
{
    
    public function index()
    {
    	$input = Input::all();
    	if(empty($input['id'])) {
    		$columns = Column::all();
    	}else{
    		$columns = Column::where('id', $input['id']) -> get();
    	}
    	
    	$sections = Section::all();
    	$postCount = Post::all() -> count();
    	$user['count'] = User::all() -> count();
    	$user['new'] = UserDetail::orderBy('ctime', 'desc') -> limit(1) -> get()[0];
    	
//     	dd($top);
    	// 获取轮播图
    	$carouels = Carousel::all();
    	// 获取回复量top8 帖子
    	$tops = Post::orderBy('count', 'desc') -> limit(8) -> get();
    	foreach ($tops as $top) {
    		$section = Post::find($top['sid']) -> section;
    	}
    	// 获取广告
    	$adverts = $this -> getAdverts();
    	// 获取用户明星(回复最多)
    	$res = DB::select('select uid,count(id) count from replies group by uid');
    	$tmp = [];
    	foreach($res as $v) {
    		$tmp[$v['uid']] = $v['count'];
    	}
    	natsort($tmp);
    	$j = 1;
    	$top = [];
    	foreach($tmp as $k => $v) {
    		if($j == count($tmp))
    			$top['uid'] = $k;
    			$top['replies'] = $v;
    			$j++;
    	}
    	$topUser['detail'] = User::find($top['uid']) -> userDetail;
    	$topUser['operate'] = User::find($top['uid']) -> userOperate;
    	$topUser['followers'] = Follow::where('concern_id', $top['uid']) -> count();
    	$topUser['replies'] = $top['replies'];
// 		dd($adverts[0]);
    	$data = [
    		"columns" => $columns,
    		"sections" => $sections,
    		'postCount' => $postCount,
    		'user' => $user,
    		'carouels' => $carouels,
    		'tops' => $tops,
    		'adverts' => $adverts,
    		'topUser' => $topUser,
    	];
    	return view('home.index.index', $data);
    }
}
