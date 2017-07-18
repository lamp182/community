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
    public function index()
    {
        //
        return view('home.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    	$params = Input::get();
    	$section = Section::find($params['id']) -> name;
    	$themes = Section::find($params['id']) -> themes;
    	foreach ($themes as $theme){
    		$theme['count'] = Theme::find($theme['id']) -> posts -> count();
    	}
		
    	$data = [
    		'sid' => $params['id'],
    		'section' => $section,
    		'themes' => $themes
    	];
//     	dd($section);
    	return view('home.post.add', ['data' => $data]);
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
//     			'uid' => 'required',
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
    	$input = Input::all();
        $post = Post::where('id', $id) -> first();
        $section = Section::where('id', $post -> id) -> first();
        if(!empty($input)&&array_key_exists('uid', $input)){
        		$replies = Reply::where('pid', $id) -> where('uid', $input['uid']) -> paginate(3);
        		$uid = $input['uid'];
        }else {
        	$replies = Reply::where('pid', $id) -> paginate(3);
        	$uid = '';
        }
//         dd($input);
        $i = 0;
        $page = array_key_exists('page', $input) ? $input['page'] : 1; 
        foreach($replies as $reply) {
        	$reply['user'] = Reply::find($reply['uid']) -> user;
        	$reply['user']['detail'] = User::find($reply['uid']) -> userdetail;
        	$reply['user']['operate'] = User::find($reply['uid']) -> userOperate;
        	$reply['user']['replies'] = User::find($reply['uid']) -> replies -> count();
        	$reply['count'] = ++$i + ($page - 1) * 3;
        }
        $data = [
        	'section' => $section,
        	'post' => $post,
        	'replies' => $replies,
        	'uid' => $uid
        ];
//         dd($replies);
        return view('home.post.index', $data);
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
