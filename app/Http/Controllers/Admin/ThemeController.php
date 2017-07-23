<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ThemeController extends Controller
{
    /**
     * 添加主题
     */
	public function add()
	{
		$input = Input::all();
		$res = DB::table('section_themes') -> insert($input);
		// 0表示成功 其他表示失败
		if($res){
			$data = [
					'status'=>0,
					'msg'=>'添加成功！'
			];
		}else{
			$data = [
					'status'=>1,
					'msg'=>'添加失败！'
			];
		}
		return $data;
	}
}
