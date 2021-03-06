<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Adverts;
use Illuminate\Support\Facades\Validator;

class AdvertsController extends Controller
{
     public function upload(Request $request)
    {
        // $aa = $request -> all();
        // dump($aa);
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
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.adverts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input  =  Input::except('_token','file_upload');
       // dd($input);
       $role =[
            'name'=>'required',
            'url'=>'required',
            'etime'=>'required',
            'picture'=>'required',
            'position_id'=>'required',
        ];

         $mess =[
            'name.required'=>'链接名必填',
            'url.required'=>'链接地址必填',
            'etime.required'=>'截止日期必选',
            'picture.required'=>'图片必选',
            'position_id.required'=>'广告id必选',
        ];
        $v = Validator::make($input,$role,$mess);
        if($v->passes()){
            $res = $request -> except('_token');
            // dd($res);
            $adverts = new Adverts();
            $adverts -> name = $res['name'];
            $adverts -> url = $res['url'];
            $adverts -> ctime = $res['ctime'];
            $adverts -> etime = $res['etime']; 
            $adverts -> picture = $res['picture']; 
            $adverts -> position_id = $res['position_id']; 
            $tmp = Adverts::where('position_id', $res['position_id']) -> first();
            Adverts::where('id', $tmp['id']) -> update(['position_id' => 0]);
                // dd($link);
                $re = $adverts -> save();
                if($re)
                {
                    return redirect('admin/adverts');
                }else{
                    return back()->with('error','添加失败');
                }
            }else{
            return back()->withErrors($v);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
