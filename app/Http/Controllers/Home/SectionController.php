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
        $id = Input::get();
        $section = Section::where('id', $id) -> first();
        $themes = Section::find($section['id']) -> themes;
        foreach ($themes as $theme){
            $theme['count'] = Theme::find($theme['id']) -> posts -> count();
        }
        $moderators = Moderator::where('sid', $id) -> get();
        foreach ($moderators as $moderator){
            $moderator['user'] = User::find($moderator['moderator']) -> userDetail;
        }
//        dd($moderators);
        $data = [
            'section' => $section,
            'themes' => $themes,
            'moderators' => $moderators,
//            'users' => $users
        ];
        return view('home.section.index', $data);
    }
}
