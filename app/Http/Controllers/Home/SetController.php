<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\Userdetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SetController extends Controller
{   
    //设置
   public function getSet()
   {

    return view('home.set.grzl');
   }
   public function postDoset(Request $requset)
   {
    $input = $requset->except('_token');
    dump($input);
    
     // $user = Userdetail::where('username',$input['username'])->first();
     // dd($user);
   }



   //主题
   public function getZhuti()
   {
    return view('home.set.zhuti');
   }




   //回复
   public function getHuifu()
   {
     return view('home.set.huifu');
   }


   //头像

   public function getTou()
   {
    return view('home.set.tou');
   }

}
