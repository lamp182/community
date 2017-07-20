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
use App\Http\Model\Post;

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
        $params = Input::get();
       
        $section = Section::where('id', $params['id']) -> first();
        $themes = Section::find($section['id']) -> themes;
        foreach ($themes as $theme){
            $theme['count'] = Theme::find($theme['id']) -> posts -> count();
        }
        $moderators = Moderator::where('sid', $params['id']) -> get();
        foreach ($moderators as $moderator){
            $moderator['user'] = User::find($moderator['moderator']) -> userDetail;
        }
        $posts = Post::where('sid', $params['id']) -> where('status', 0) -> paginate(2);
        foreach ($posts as $post){
            $post['auther'] = User::find($post['uid']) -> userDetail;
            $post['theme'] = Theme::where('sid', $section['id']) -> where('id', $post['tid']) -> first()['name'];
        }
        // 获取广告
        $adverts = $this -> getAdverts();
        $data = [
            'section' => $section,
            'themes' => $themes,
            'moderators' => $moderators,
            'posts' => $posts,
        	'adverts' => $adverts,
        ];
        return view('home.section.index', $data);
    }
}
