<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Reply;
use App\Http\Model\Post;

class ReplyController extends Controller
{
    public function store()
    {
    	$input = Input::except('_token', 'page');
    	Reply::insert($input);
//     	$count = Post::find($input['pid']) -> count;
    	$count = Post::where('id', $input['pid']) -> update(['count' => Post::find($input['pid']) -> count + 1]);
//     	dd($count);
    	$page = Input::only('page')['page'];
    	if($page == null) {
    		return redirect('home/post/'.$input['pid']);
    	}else{
    		return redirect('home/post/'.$input['pid'].'?page='.$page[0]);
    	}
//     	dd($page);
    }
    
    public function reply()
    {
    	echo 111111111111;
    }
}
