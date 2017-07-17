<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Link;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    public function getIndex()
    {
        return view('admin.link.index');
    }

    public function postAdd(Request $request)
    {
       $input  =  Input::except('_token');
       // dd($input);
       $role =[
            'title'=>'required',
            'url'=>'required',
            'etime'=>'required',
        ];

         $mess =[
            'title.required'=>'链接标题必填',
            'url.required'=>'链接地址必填',
            'etime.required'=>'截止日期必选',
        ];
        $v = Validator::make($input,$role,$mess);
        if($v->passes()){
            $res = $request -> except('_token');
            // dd($res);
            $link = new Link();
            $link -> title = $res['title'];
            $link -> url = $res['url'];
            $link -> ctime = $res['ctime'];
            $link -> etime = $res['etime']; 

                // dd($link);
                $re = $link -> save();
                if($re)
                {
                    return redirect('admin/link/index');
                }else{
                    return back()->with('error','添加失败');
                }
            }else{
            return back()->withErrors($v);
        }

    }
}
