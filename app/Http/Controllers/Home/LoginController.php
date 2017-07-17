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
class LoginController extends Controller
{
    public function getLogin()
    { 

        return view('home.login.login');
    }
   
    public function postInsert(Request $request)
    {    
       $re = $request -> except('_token');
     // dd($re);
         // $re['email']
       // SetCookie("WithExpire","Expire in 1 hour",time()+3600);//3600秒=1小时
       // setcookie("TestCookie", $value, time()+3600); 
      

       $user = login::where('email', $re['email'])->orwhere('phone',$re['email']) -> first(); 
       $statu =  UserDetail::where('id',$user['id'])->select('status')->first();
       
        $user['password']  = Crypt::decrypt($user['password']); 
        

               if($user['password'] == $re['password']){
                  if($statu['status'] != '1'){
                      echo '请您去邮箱激活或验证码错误!';
                  }else{
                      // if($re['persistentcookie'] == 'on'){

                      //  $user_info = array(['name'=>$re['email'],'password'=>$re['password']]);

                      //   $use = Cookie::make('user',$user_info,60);

                        // return Response::make()->withCookie($use);
                        // return response($content)->header('Content-Type', $type)->withCookie('name', 'value');
                        
                      //将用户信息添加到session中
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
   
  

}