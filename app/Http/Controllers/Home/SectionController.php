<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Moderator;
use App\Http\Model\Section;
use App\Http\Model\Theme;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Post;
use App\Http\Model\Confirmsection;
use App\Http\Model\Reply;
use DB;

class SectionController extends Controller
{
    /**
     * 功能：加载板块详情页
     * @return 返回板块详情页视图
     * @auther wangchunlong
     * @date 2017-07-06
     */

    public function index(Request $request)
    {
    	// 每页显示数据条数
    	$pieces = 10;
        $params = Input::get();
       
        $section = Section::where('id', $params['id']) -> first();
        $themes = Section::find($section['id']) -> themes;
        foreach ($themes as $theme){
            $theme['count'] = Theme::find($theme['id']) -> posts -> count();
        }
        $moderators = Confirmsection::where('sid', $params['id']) -> get();
        $res1 = Confirmsection::where('moderator', session('user')['id']) -> first();
        $res2 = Moderator::where('sid', $params['id']) -> where('moderator', session('user')['id']) -> first();
        $isModerator = true;
        if($res1 == null && $res2 == null){
        	$isModerator = false;
        }
        foreach ($moderators as $moderator){
            $moderator['user'] = User::find($moderator['moderator']) -> userDetail;
        }
        if(Input::has('tid')){
	        $posts = Post::where('sid', $params['id']) -> where('tid', $params['tid']) -> where('status', 0) -> paginate($pieces);
        }else{
	        $posts = Post::where('sid', $params['id']) -> where('status', 0) -> paginate($pieces);
        }
        foreach ($posts as $post){
            $post['auther'] = User::find($post['uid']) -> userDetail;
            $post['theme'] = Theme::where('sid', $section['id']) -> where('id', $post['tid']) -> first()['name'];
            $post['lastReply'] = Reply::where('pid', $post['id']) -> orderby('ctime', 'desc') -> first();
            $rid = $post['lastReply']['id'];
//             dump($rid);
            $post['lastUser'] = Reply::find($rid) -> user;
        }
        // 获取排名
        $res = DB::select('select sid,count(id) count from posts group by sid');
        $tmp = [];
        foreach ($res as $k => $v){
        	$tmp[$v['count']] = $v['sid'];
        }
        krsort($tmp);
        $res = [];
        $i = 1;
        foreach ($tmp as $v){
        	$res[$i] = $v;
        	$i++;
        }
        $ranking = array_search($section['id'], $res);
//         dd($ranking);
        // 获取广告
        $adverts = $this -> getAdverts();
        // 获取友情链接
        $links = $this -> getLinks();
        // 获取网站信息
        $website = $this -> getWeb();
        $data = [
            'section' => $section,
        	'ranking' => $ranking,
            'themes' => $themes,
            'moderators' => $moderators,
        	'isModerator' => $isModerator,
            'posts' => $posts,
        	'adverts' => $adverts,
        	'links' => $links,
        	'website' => $website,
        ];
        return view('home.section.index', $data);
    }
    
    /**
     * 申请版主
     */
    public function moderator()
    {
    	$input = Input::all();
    	$res = Moderator::insert($input);
    	return redirect('home/section?id='.$input['sid']);
    }
}
