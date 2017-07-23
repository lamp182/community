<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Reply;
use App\Http\Model\Post;
use App\Http\Model\Section;

class ReplyController extends Controller
{
    public function store()
    {
    	$input = Input::except('_token', 'page', 'fid');
    	
    	Reply::insert($input);
    	$count = Post::where('id', $input['pid']) -> update(['count' => Post::find($input['pid']) -> count + 1]);
		
    	$input2 = Input::only('page', 'fid');
    	$page = $input2['page'];
    	$fid = $input2['fid'];
//     	dd($input2);
    	$params = '';
    	if($page != null){
    		$params .= 'page='.$page;
    	}
    	if($fid != null) {
    		$params .= '#reply_'.$fid;
    	}
    	if($params != null) {
    		$params = '?'.trim($params, '&');
    	}
//     	dd($params);
    	return redirect('home/post/'.$input['pid'].$params);
    }
    /**
     * 评价：支持/反对
     */
    public function estimate() {
    	$input = Input::all();
    	if($input['est'] == 1)
    		Reply::where('id', $input['id']) -> increment('support');
    	else
    		Reply::where('id', $input['id']) -> increment('oppose');
    	$post = Reply::find($input['id']) -> post;
    	return redirect('home/post/'.$post['id'].'#reply_'.$input['fid']);
    }
    
    public function add()
    {
        // 获取广告
        $adverts = $this -> getAdverts();
        // 获取友情链接
        $links = $this -> getLinks();
        // 获取网站信息
        $website = $this -> getWeb();
    	$input = Input::all();
    	// 楼层id
    	$fid = $input['fid'];
    	$rid = $input['rid'];
    	$reply = Reply::where('id', $rid) -> first();
    	$reply['user'] = Reply::find($rid) -> user;
    	$post = Reply::find($rid) -> post;
        $section = Post::find($post -> id) -> section;
        $column = Section::find($section -> id) -> column;
        $data = [
            'adverts' => $adverts,
        	'links' => $links,
        	'website' => $website,
        	'fid' => $fid,
            'reply' => $reply,
        	'post' => $post,
        	'section' => $section,
        	'column' => $column,
        ];
//         dd($data);
        return view('home.reply.add', $data);
    }
}
