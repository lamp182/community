<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use App\Http\Model\login;
use App\Http\Model\UserDetail;
use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;
class LoginController extends Controller
{
    public function getLogin()
    { 

        return view('home.login.login');
    }
   
    public function postInsert(Request $request)
    {    

      $request -> flash(); 
       $re = $request -> except('_token');
    
       
       // dd($re);

       $user = login::where('email', $re['email'])->orwhere('phone',$re['email']) -> first(); 
       $statu =  UserDetail::where('id',$user['id'])->select('status')->first();
       
        $user['password']  = Crypt::decrypt($user['password']); 
        

               if($user['password'] == $re['password']){
                  if($statu['status'] != '1'){
                      echo '请您去邮箱激活或验证码错误!';
                  }else{
                  

                 
                  //  //将用户信息添加到session中
                      session(['user'=>$user]);


                      echo '登录成功';
                      }
                 }else{
                     // echo '登录失败'; 
                    return back()->with('errors','密码错误')->withInput();
                }
                  
    

    }

     public function postDologin(Request $request)
    {
            $res = $request -> except('_token');

            $em = login::where('email', $res['email'])->orwhere('phone',$res['email']) -> first();
         if($em){
              echo '1';
         }else{
              echo '2';
         }    
            
 
    }
   
  //退出登录
      public function getQuit()
      {
        //清空session
        session(['user'=>null]);
        return view('home.login.login');
      }

}