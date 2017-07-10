<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Column;
use App\Http\Model\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    /**
     * 功能：加载主页
     * @return 返回主页视图
     * @auther wangchunlong
     * @date 2017-07-05
     */
    public function index()
    {
        $columns = Column::all();
        $sections = Section::all();
        return view('home.index.index', ["columns" => $columns, "sections" => $sections]);
   }



    public function section(Request $request)
    {
        dd(Input::get());
//        return view('home.index.section');
   }
}
