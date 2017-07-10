<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Column;
use App\Http\Model\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('home.column.index', ['column' => $column, 'sections' => $sections]);
    }
}
