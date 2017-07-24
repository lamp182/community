<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use App\Http\Model\Section;
use App\Http\Model\Theme;
use App\Http\Model\Post;
use App\Http\Model\Reply;
use DB;
use App\Http\Model\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
    	$query = Input::only('query')['query'];
//         dd($query);
        $posts = Post::where('title', 'like', '%'.$query.'%') -> paginate(10);
		foreach($posts as $post){
			$post['user'] = Post::find($post['id']) -> user -> userDetail;
			$post['replies'] = Post::find($post['id']) -> replies -> count();
			$post['last'] = Post::find($post['id']) -> orderBy('ctime', 'desc') -> limit(1) -> first();
			$post['theme'] = Post::find($post['id']) -> theme;
			$post['section'] = Post::find($post['id']) -> section;
		}
		// 获取广告
		$adverts = $this -> getAdverts();
		// 获取友情链接
		$links = $this -> getLinks();
		// 获取网站信息
		$website = $this -> getWeb();
		$data = [
			'adverts' => $adverts, 
			'posts' => $posts,
			'query' => $query,
			'links' => $links,
			'website' => $website,
		];
        return view('home.post.query', $data);
    }
	
    public function index()
    {
    	return view('errors.404');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    	$params = Input::all();
    	$section = Section::where('id', $params['id']) -> first();
    	$themes = Section::find($params['id']) -> themes;
    	foreach ($themes as $theme){
    		$theme['count'] = Theme::find($theme['id']) -> posts -> count();
    	}
		$column = Section::find($params['id']) -> column;
    	$data = [
    		'sid' => $params['id'],
    		'section' => $section,
    		'themes' => $themes,
    			'column' => $column,
    	];
//     	dd($section);
		// 获取广告
    	$adverts = $this -> getAdverts();
    	// 获取友情链接
    	$links = $this -> getLinks();
    	// 获取网站信息
    	$website = $this -> getWeb();
    	$datas = [
    			'adverts' => $adverts,
    			'links' => $links,
    			'website' => $website,
    			'data' => $data,
    	];
//     	dd($params);
    	return view('home.post.add', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证规则
    	$rules = [
    			'tid' => 'required',
    			'sid' => 'required',
    			'uid' => 'required',
//     			'title' => 'requried|max:80',
    	];
        //       提示信息
        $mess=[
        		'tid.required'=>'必须选择主题',
        		'sid.required'=>'必须输入版块',
//         		'uid.required'=>'必须输入用户',
//         		'title.required'=>'必须输入标题',
//         		'title.max'=>'标题不能超过80个字',
        		'content.required' => '必须输入标题'
        ];
        // 表单验证
        $this -> validate($request, $rules, $mess);
		
        // 插入帖子
        $post = Input::except(['_token', 'content']);
        $pid = Post::insertGetId($post);
        // 插入留言
        $reply = Input::except(['_token', 'title', 'sid', 'tid']);
        $reply['pid'] = $pid;
        $replyRes = Reply::insert($reply);
        return redirect('home/post/'.$pid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pieces = 5;
    	$input = Input::all();
        $post = Post::where('id', $id) -> first();
        $section = Section::where('id', $post -> sid) -> first();
        if(Input::has('uid')){
        	$replies = Reply::where('pid', $id) -> where('rid', '<>', '1') -> where('uid', $input['uid']) -> paginate($pieces);
        		$uid = $input['uid'];
        }else {
        	$replies = Reply::where('pid', $id) -> where('rid', '<>', '1') -> paginate($pieces);
        	$uid = '';
        }

        $i = 0;
        $page = Input::has('page') ? $input['page'] : 1; 
        foreach($replies as $reply) {
        	$reply['user'] = Reply::find($reply['id']) -> user;
//         	dump($reply);
        	$reply['user']['detail'] = User::find($reply['uid']) -> userdetail;
        	$reply['user']['operate'] = User::find($reply['uid']) -> userOperate;
        	$reply['user']['replies'] = User::find($reply['uid']) -> replies -> count();
        	$reply['count'] = ++$i + ($page - 1) * 3;
        	$reply['sons'] = $this -> getSons($reply, $reply['id']);
        }
//         die;
        // 获取广告
        $adverts = $this -> getAdverts();
        // 获取友情链接
        $links = $this -> getLinks();
        // 获取网站信息
        $website = $this -> getWeb();
        $data = [
        	'section' => $section,
        	'post' => $post,
        	'replies' => $replies,
        	'uid' => $uid,
        	'adverts' => $adverts,
        	'links' => $links,
        	'website' => $website,
        ];
        Post::where('id', $id) -> increment('pvs');
        Section::where('id', $post['sid']) -> increment('pvs');
        return view('home.post.index', $data);
    }
	
    public function getSons($reply, $fid)
    {
    	$grandsons = Reply::where('rid', $reply['id']) -> get();
    	if($reply['rid'] != 0) {
    		$sons = '<div style="margin: 5px ; border: solid 1px #999;">';
    		$user = Reply::find($reply['id']) -> user;
    		$sons .= '
				<div >
					<div style="background: #eee;">
						<h3>
							&nbsp;&nbsp;<a href="/home/user/'.$user['uid'].'">'.$user['username'].'</a>
							<span style="float: right; margin-left: 10px;">发表于'.date('Y-m-d H:i:s', $reply['ctime']).'&nbsp;&nbsp;</span>
						</h3>
					</div>
					<div style="font-size: 14px; margin: 0 10px 0 10px; border-bottom: dashed 1px #999;">'.$reply['content'].'</div>
				</div>';
    	}else {
    		if(count($grandsons) == 0) {
    			$sons = '<div style="">';
    		}else {
    			$sons = '<div style="border: solid 1px #666;">';
    		}
    	}
    	$sons .= '
			<div class="pob cl" style="padding: 0 10px 0 10px;">
				<em>
					<a class="fastre" href="/home/reply/add?fid='.$fid.'&rid='.$reply['id'].'" >回复</a>
				</em>
				<div id="" style="float: right;">
					<a id="" href="/home/estimate?fid='.$fid.'&est=1&id='.$reply['id'].'"  onmouseover="this.title = $(\'recommendv_add_'.$reply['id'].'\').innerHTML + \' 人支持\'" title="顶一下">
						<i>
							<img src="/home/picture/rec_add.gif" alt="支持" />支持
							<span id="recommendv_add_'.$reply['id'].'" style="display:none">'.$reply['support'].'</span>
						</i>
					</a>
					<a id="" href="/home/estimate?fid='.$fid.'&est=-1&id='.$reply['id'].'"  onmouseover="this.title = $(\'recommendv_subtract_'.$reply['id'].'\').innerHTML + \' 人反对\'" title="踩一下">
						<i>
							<img src="/home/picture/rec_subtract.gif" alt="反对" />反对
							<span id="recommendv_subtract_'.$reply['id'].'" style="display:none">'.$reply['oppose'].'</span>
						</i>
					</a>
				</div>
			';
    	$sons .= '</div>';
    	
    	if(count($grandsons) != 0) {
    		foreach ($grandsons as $grandson) {
    			$sons .= $this -> getSons($grandson, $fid);
    		}
		}
    	$sons .= '</div>';
    	return $sons;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
