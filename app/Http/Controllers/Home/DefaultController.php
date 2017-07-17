<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HttpController;
use Illuminate\Http\Request;
use App\Http\Model\login;
use App\Http\Model\UserDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Mail;
use DB;
class DefaultController extends Controller
{
    public function getDefault()
    {
        return view('home.login.default');
    }
//邮箱验证
     public function postDodefault(Request $request)
     {  

        $input = $request -> except('_token');
          $name = $input['name']; 
          // dd($name);
         
       if(strTolower(session('code')) != strTolower(Input::get('email_code'))){
       // if(session('code') != Input::get('email_code')){
      
        return back()->with('error','验证码错误');
       }

       $em1 =  login::where('email',$input['name'])->first();

      if($em1){
         return view('home.login.wangji',compact('name'));
        }else{
         return view('home.login.phoneyan',compact('name'));
        }
       
     }



     public function postEmail(Request $request)
     {  
        $input = $request -> except('_token');
         $em = login::where('email',$input['name'])->orwhere('phone',$input['name'])->first();
            if($em){
                echo '1';
            }else{
                 echo '2';
            }
     }

     public function postInsert(Request $request)
     {
        
       $input = $request -> except('_token');
        $res = login::where('email',$input['email'])->first();
        session(['res'=>$res['email']]);
        $id = $res['id'];
        $token = UserDetail::where('uid', $res['id']) ->first()['token'];
        // dd($token);
        if($id){
                self::mailto($input['email'],$id, $token);
             }
       
         return view('home.login.email',['em'=>$input['email']]);
     }

     public function postInsert1(Request $request)
     {
       
           $input = $request -> except('_token'); 
        $res = login::where('email',$input['name'])->first();
         
            if($res){
                echo '3'; 

            }else{
                echo '4';
            } 
     }

       public function getYanzheng(Request $request){
       $arr =  $request -> all();
      
       // token
       $token = UserDetail::where('id',$arr['id'])->select('token')->first(); 
      
        if($arr['token'] == $token['token']){
           
            // 修改数据库
           
             $res =  UserDetail::where('id',$arr['id'])->update(['status'=>1,'token'=>str_random(50)]);
             
            if($res){
                return redirect("/home/default/update?id=".$arr['id']);
                // echo '修改成功';
            }else{
                echo '修改失败';
            }
        }else{
             return redirect('/home/default/insert')->with('error','修改失败');
        }
       
    }

    public static function mailto($email,$id,$token){
        Mail::send('home.mail.edit', ['id' => $id,'token'=>$token,'email'=>$email], function ($m) use ($email) {
           
            $m->to($email)->subject('这是一封验证邮件!');
        });
    }

    public  function getUpdate(Request $request)
    {   
        $re = input::get();
          // dd($re);
         return view('home.login.update',compact('re'));   

    }

    public  function postDoupdate(Request $request)
    {
        $put =  $request -> except('_token');
       
          if($put['password'] == $put['repassword']){
             $pass = Crypt::encrypt($put['password']);
            
            $res = login::where('id',$put['id'])->update(['password'=>$pass]);
               return redirect('/home/login/login');
          }else{
            return back()->with('error','密码不一致');
          }
    }


   //手机验证



    public function postPhonetian(Request $request)
    {   
      $res = $request -> except('_token');
      // dd($res);
        $code = session('phone_code');
        $code2= Input::get('phone_code');
        // dump($code,$code2);
        if($code != $code2)
            return view('home.login.phoneyan',['name'=>$res['phone']]);

       return view('home.login.phupdate',['name'=>$res['phone']]);
       

    }


        public function postShouji(Request $request)
        {
          
           $phone = $request -> input('phone'); 
        // return $phone;die;
        $res = self::phoneto($phone);
        // echo $res;
        
    }   


       public static function phoneto($phone){
        // echo 'ljkl';
        // $phone = '15205280731';
        $phone_code = rand(1000,9999);
        session(['phone_code'=>$phone_code]);
        
        $str = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C70832526&password=8421c94b5db4208928237c0ab5466d34&format=json&mobile='.$phone.'&content=您的验证码是：'.$phone_code.'。请不要把验证码泄露给其他人。';
        $res = HttpController::get($str);
        return $res;
    }


        public function postPhyan(Request $request)
        {
             $re = input::get();  
         return view('home.login.phupdate',['phon'=>$re['phone']]);
        }
        public function postDophyan(Request $request)
        {
              $put =  $request -> except('_token');
             // dd($put);
          if($put['password'] == $put['repassword']){
             $pass = Crypt::encrypt($put['password']);
            
            $res = login::where('phone',$put['phone'])->update(['password'=>$pass]);
               return redirect('/home/login/login');
          }else{
            return back()->with('error','密码不一致');
          }
          
        }

}
