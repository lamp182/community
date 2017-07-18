<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Model\Root;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;



class RootController extends Controller
{
    public function getIndex(Request $request)
    {
        // dd($request -> all());
        if($request->has('keywords')){
            $key = trim($request->input('keywords')) ;
            // echo $key;
            $root = Root::where('name','like',"%".$key."%")->paginate(5);
            // dd($root);
            return view('admin.root.index',['data'=>$root,'key'=>$key]);
            // return $key;
        }else{
             $root = Root::orderBy('id','asc') -> paginate(5);
             // dd($root);
             return view('admin.root.index',['data'=>$root]);
        }
       
    }


    /**
    *添加页面
    */
    public function getAdd()
    {
        return view('admin.root.add');
    }

    /**
    *
    *处理添加
    */
    public function postDoadd(Request $request)
    {
        // $data = $request -> except('_token');
        $input  =  Input::except('_token','file_upload');
        // dd($input);
        //表单验证
         $role =[
            'name'=>'required|unique:admin',
            'password'=>'required|between:6,18',
            'realname'=>'required',
            'cid'=>'regex:/^[1-9]{1}[0-9]{16}([0-9xX])$/|required',
            'phone'=>'regex:/^1[34578][0-9]{9}$/|required',
            'email'=>'required|email',
            'faceico'=>'required',

        ];

        $mess =[
            'name.required'=>'用户名必填',
            'name.unique'=>'该用户名已经存在',
            'password.required'=>'密码必填',
            'password.between'=>'密码必须在6-18位之间',
            'realname.required'=>'真实姓名必填',
            'cid.required'=>'身份证号码必填',
            'cid.regex'=>'身份证号码不正确',
            'phone.required'=>'手机号码必填',
            'phone.regex'=>'手机号码不正确',
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式不正确',
            'faceico.required'=>'头像必选',
            
        ];
        $v = Validator::make($input,$role,$mess);
        if($v->passes()){
        $res = $request -> except('_token','file_upload');
        // dd($res);
        $user = new Root();
        $user -> name = $res['name'];
        $user -> password = Crypt::encrypt($res['password']);
        $user -> realname = $res['realname'];
        $user -> cid = $res['cid'];
        $user -> phone = $res['phone'];
        $user -> email = $res['email'];
        $user -> faceico = $res['faceico'];

        // dd($user);
        $re = $user -> save();
        if($re)
        {
            return redirect('admin/root/index');
        }else{
            return back()->with('error','添加失败');
        }
        }else{
            return back()->withErrors($v);
        }
    }
    /**
    *图片上传
    */
    public function postUpload()
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
    *处理修改
    */
    public function getUpdate($id)
    {
        //接收要修改的用户记录
        $data = Root::where('id',$id)->first(); 
        // dd($data);
        return view('admin.root.update',['data'=>$data]);
    }

    /**
    *将修改后的值更新到数据库
    */
   public function postDoupdate(Request $request)
   {
    //接受修改后的值
    $data = $request -> except('_token');
    // dd($data);
    //将修改后的值存入数据库
    $res = Root::where('id',$data['id']) -> update($data);
    if($res){
        return redirect('admin/root/index');
    }else{
        return back()->with('errors','修改失败');
    }
   }

   public function postDelroot($id)
   {
    // echo 1111111;
    $res = Root::where('id',$id)->delete();
     // 0表示成功 其他表示失败
       if($res){
           $data = [
                'status'=>0,
                'msg'=>'删除成功！'
           ];
       }else{
           $data = [
               'status'=>1,
               'msg'=>'删除失败！'
           ];
       }
       return $data;
   }

   /**
    *修改密码
    */
    public function getChangepass($id)
    {
        $data = Root::where('id',$id)->first();
        $res = $data->password;
       
        // dd($res);
        // eyJpdiI6ImljMlZ4alIreERIdTJsZFo4bHVsbGc9PSIsInZhbHVlIjoiWCswRmxabDhPWWljZTluNlpIQVdwUT09IiwibWFjIjoiNzE4ZjNhYzc0OGMxYmMzY2VmM2YyOGQwMWUxNTZjMWYzMmQ4OTY1MjBkNjBhMjQyN2RjYzk2MmY5ZDYwZThkYyJ9
        return view('admin.root.changepass',['id'=>$id]);
    }

    /**
    *更新密码
    */

    public function postUppass(Request $request)
    {
        // dd($id);
        $res = $request ->all();
        // dd($res);
        // 1234

        //用户id
        $id = $res['hidden'];
        // dd($id);
        //用户输入的密码
        $old = $res['oldname'];
        // dd($old);
        $relnew = $res['relnew'];
        // dd($relnew);
        // dd($old);
        // 1234
        $data = Root::where('id',$id)->first();
        // dd($data);
        $pass = $data->password;
        // dd($pass);
        //数据库中的密码
        $pass1 = Crypt::decrypt($pass);
        // echo 11111;
        // dd($pass1);  
        // $old = $pass;
        // 判断用户输入的密码是否正确
        if($old != $pass1){
            // 1234  123
            echo '原密码错误!';
            die;
        }else if($res['new'] !=$res['relnew']){
            echo '新密码输入不一致!';
            die;
        }
        $data = [];
        $data['password'] = Crypt::encrypt($relnew);
        // $data['password'] = $relname;
        // dd($data);
        $flag = Root::where('id',$id) -> update($data);
        if($flag){
            return redirect('admin/root/index');
        }else{
            return back()->with('errors','修改失败');
        }
    }

}
