<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Column;
use App\Http\Model\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Post;
use App\Http\Model\User;
use App\Http\Model\UserDetail;

class ColumnController extends Controller
{
    /**
     * 功能：加载栏目详情页
     * @return 返回栏目详情页视图
     * @auther wangchunlong
     * @date 2017-07-05
     */
    public function index(Request $request)
    {
        $id = $request -> all()['id'];
        $column = Column::where('id', $id) -> first();
        $sections = Section::where('cid', $column['id']) -> get();
        $postCount = Post::all() -> count();
        $user['count'] = User::all() -> count();
        $user['new'] = UserDetail::orderBy('ctime', 'desc') -> limit(1) -> get()[0];
        // 获取广告
        $adverts = $this -> getAdverts();
        $data = [
        		"column" => $column,
        		"sections" => $sections,
        		'postCount' => $postCount,
        		'user' => $user,
        		'adverts' => $adverts,
        ];
        return view('home.column.index', $data);
    }
}
