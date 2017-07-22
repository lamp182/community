<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Follow;

class UserController extends Controller
{
    /**
     * 关注好友
     * 
     */
	public function follow()
	{
		$input = Input::all();
		$data = [
			'concern_id' => $input['concern_id'],
			'follower_id' => session('user')['id'],
		];
		$res = Follow::where('concern_id', $data['concern_id']) -> where('follower_id', $data['follower_id']) -> first();
		if($res == null)
			Follow::insert($data);
		return redirect('home/post/'.$input['pid'].'#reply_'.$input['fid']);
	}
}
