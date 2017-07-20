<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Confirmsection;

class ConfirmController extends Controller
{
    public function getIndex()
    {
        echo 12345;
    }

     public function postDel($id)
    {
       $res = Confirmsection::where('id',$id)->delete();
     // 0表示成功 其他表示失败
       if($res){
           $data = [
                'status'=>0,
                'msg'=>'版主取消成功！'
           ];
       }else{
           $data = [
               'status'=>1,
               'msg'=>'版主取消失败！'
           ];
       }
       return $data;
    }
}
