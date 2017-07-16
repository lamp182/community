<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\user;
use DB;
use Illuminate\Http\Request;
use Validator;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
class LoginController extends Controller
{
   public function getLogin()
   {
      return view('admin.login.login');
   }

   public function postDologin(Request $request)
    {
      //第二种获取请求数据的方法
       $input = Input::except('_token');
       // dd($input['password']);
        //验证规则
       $role =[
           'name'=>'required|between:4,18',
           'password'=>'required|between:5,18'
       ];
//       提示信息
        $mess=[
            'name.required'=>'必须输入用户名',
            'name.between'=>'用户名长度必须在4-18位之间',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码长度必须在5-18位之间'
        ];
//       表单验证
      $validator =  Validator::make($input,$role,$mess);
      if($validator->passes()){
          //验证验证码
          if($input['code'] !=  session('code')){
              return back()->with('errors','验证码错误')->withInput();
          }
     
          //用户名
          $user = User::where('name',$input['name'])->first();
          if(!$user){
              return back()->with('errors','无此用户')->withInput();
          }
         
          //密码
          if($input['password']  != Crypt::decrypt($user['password'])){
              return back()->with('errors','密码错误')->withInput();
          }

          //将用户信息添加到session中
          session(['user'=>$user]);
          //登录
           return view('admin.layout.index');
           // return redirect('admin/layout/index');
      }else{
//          如果没有通过表单验证
          return back()->withErrors($validator);
      }
  }


    public function getCrypt()
    {

        // $str = '123456';
        // echo Crypt::encrypt($str);die;
       
        $str1 ='eyJpdiI6IlwvWWJJUTkydGc0c1RXN1pUTVVyXC9HUT09IiwidmFsdWUiOiJSNzlDYlJRUGpTU1dLaXhKNVwvdjZKZz09IiwibWFjIjoiNjY4YzQyOGEzY2Q2ZjhlN2I4YzEwZGVmMDRmZDc4MjFhMThhYWFjOGQ2YTdlODFhZGFlNmQwYmUxY2Y3Njk1MiJ9';
        echo Crypt::decrypt($str1);
    }

   
}
