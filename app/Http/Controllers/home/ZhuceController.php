<?php

namespace App\Http\Controllers\home;
use App\Http\Model\zhuce;
use App\Http\Model\UserDetail;
use Illuminate\Support\Facades\Input;
use Hash;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use session;
use App\Http\Controllers\HttpController;
use Illuminate\Support\Facades\Crypt;
class ZhuceController extends Controller
{
   public function getZhuce()
   {
    return view('home.zhuce.zhuce');
   }
   public function postDozhuce(Request $request)
   {    
         
         $input =  $request->except('_token','code','agreement');
          // 验证码
        $code = session('code');

        $code2= Input::get('code');
        
        if(strTolower($code)!=strTolower($code2)){
            return back() -> with('error','验证码错误');
            exit;
        }
         // $input['password'] = Hash::make($input['password']);
         // dd($request -> all());
        $input['password']  = Crypt::encrypt( $input['password']);

           $id= DB::table('users')->insertGetId($input);
           
            
          $token = str_random(50);
          $time = time();
          $data = ['uid' => $id, 'token' => $token,'ctime'=>$time];
          $res= DB::table('userdetails')->insert($data);
             
        if($id){
           self::mailto($input['email'],$id,  $token );
        }
       
        return redirect('/home/login/login');
         // return redirect('post/create')
   }

    public function getJihuo(Request $request){
       $arr =  $request -> all();
    
       // token
     
       $token =  UserDetail::where('id',$arr['id'])->select('token')->first();
        if($arr['token'] == $token['token']){
            // 修改数据库
            $res =  UserDetail::where('id',$arr['id'])->update(['status'=>1,'token'=>str_random(50)]);
            if($res){
                echo '激活成功';
            }else{
                // echo '激活失败';
                 return redirect('/home/zhuce/zhuce')->with('error','激活失败，请重新激活!');
            }
        }else{
             return redirect('/home/zhuce/zhuce')->with('error','验证失败，请注册');
        }
       
    }

    public static function mailto($email,$id,$token){
        Mail::send('home.mail.index', ['id' => $id,'token'=>$token,'email'=>$email], function ($m) use ($email) {
           
            $m->to($email)->subject('这是一封注册邮件!');
        });
    }

    public function postInsert1(Request $request)
    {
     // echo 'sfd';
        $em = DB::table('users')->where('email',$request -> email)->get();
        if($em)
          echo '1';
        else
          echo '2';
       
    }
   
    public function postInsert2(Request $request)
    {
        $input =  $request->except('_token','code','phone_code','agreement');
         $code = session('phone_code');
         $code2= Input::get('phone_code');
         if($code != $code2){
          return back()->with('error','验证码错误');
         }
      
         
          $input['password']  = Crypt::encrypt($input['password']);
          $id= DB::table('users')->insertGetId($input);
          $token = str_random(50);
          $time = time();
          $data = ['uid' => $id, 'token' => $token,'ctime'=>$time,'status'=>'1'];
          $res1= DB::table('userdetails')->insert($data);
          
          return redirect('/home/login/login');
    }

     public function postInsert(Request $request)
    { 
      $phone = $request -> input('phone');
      
       $res = DB::table('users')->where('phone',$phone)->get();
    if($res){
        return '1';
       }else{
        return '2';
       }
      }
 
    
    public function postPhone(Request $request){
       
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

   
}
