<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\carousel;
use Illuminate\Support\Facades\Validator;

class CarouselController extends Controller
{
    /**
    *图片上传
    */
    public function postUpload()
    {
        // $aa = $request -> all();
        // dd($aa);
        // die;
        // return $request;
//        将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        // dd($file);
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

//            将图片上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);

//            将图片上传到七牛云
//            \Storage::disk('qiniu')->writeStream('uploads/'.$newName, fopen($file->getRealPath(), 'r'));

//            oss上传

//            $result = OSS::upload('uploads/'.$newName, $file->getRealPath());

//        返回文件的上传路径
            $filepath = 'uploads/' . $newName;
            return $filepath;
        }
    }

    
    public function getIndex()
    {
        return view('admin.carousel.index');
    }

    public function postDoadd(Request $request)
    {
        $input  =  Input::except('_token','file_upload');
        // dd($input['picture']);
         $role =[
            'url'=>'required',
            'picture'=>'required',

        ];

        $mess =[
            'url.required'=>'请填写URL地址',
            'picture.required'=>'请选择图片',
            
        ];

        $v = Validator::make($input,$role,$mess);

        if($v->passes()){
             $data = new Carousel();
             $data -> url = $input['url'];
             $data -> picture = $input['picture'];

              $re = $data -> save();
              if($re)
              {
                  return redirect('admin/carousel/index');
              }else{
                  return back()->with('error','添加失败');
              }
              }else{
                  return back()->withErrors($v);
              }

        }
        // $data = new Carousel();
        // $data -> url = $input['url'];
        // $data -> picture = $input['picture'];

    //     $re = $data -> save();

    //     if($re)
    //     {
    //         return redirect('admin/carousel/index');
    //     }else{
    //         return back()->with('error','添加失败');
    //     }
    // }
}
