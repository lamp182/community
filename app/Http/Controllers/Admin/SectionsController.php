<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Model\section;
use App\Http\Model\Columns;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SectionsController extends Controller
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

    public function select(Request $request)
    {
        $res = $request -> all();
        echo $res['value'];
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Columns::all();
         $section = Section::orderBy('id')->paginate(10);
         foreach($section as $k=>$v){
            $v['cname'] = Columns::where('id',$v['cid'])->first()['name'];
         }
         // dump($section);
        return view('admin.sections.index',["data"=>$res,'section'=>$section]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $res = Columns::all();
        // dump($res);
        return view('admin.sections.add',['data'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // 自动验证
        $this->validate($request, [
            'name' => 'required',
            'characteristic' => 'required',
            'icon' => 'required',
          
        ],[
            'name.required' => '用户名必填',
            'characteristic.required' => '密码必填',
            'icon.required' => '必须选择一张图片',
          
        ]);

        $user = $request -> except('_token','file_upload');
        $user['ctime'] = time();
        $user['ltime'] = time();
        $res = Section::create($user);
        if($res){
            return redirect('/admin/sections')->with('保存成功');
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
