<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use App\Http\Model\Userdetail;

class UserController extends Controller
{
     /**
    *用户列表
    */
    public function getIndex(Request $request)
    {

      if($request->has('keywords')){
            $key = trim($request->input('keywords')) ;
            // echo $key;
            $root = User::where('phone','like',"%".$key."%")->paginate(5);
            // dd($root);
            return view('admin.users.index',['data'=>$root,'key'=>$key]);
            // return $key;
        }else{
            $user = User::orderBy('id','asc') -> paginate(2);
      // // dd($user);
            return view('admin.users.index',['data'=>$user]);
        }
    	

    }

     /**
    *用户修改
    */
    public function getUpdate($id)
    {
    	$data = User::where('id',$id)->first();
    	// dd($data);
    	return view('admin.users.update',['data'=>$data]);
    }

    public function postDoupdate(Request $request)
    {
    	$data = $request -> except('_token');
    	// dd($data);
    	 //将修改后的值存入数据库
    	 $res = User::where('id',$data['id']) -> update($data);
    	 if($res){
        return redirect('admin/user/index');
	    }else{
	        return back()->with('errors','修改失败');
	    }
    }
    /**
    *用户删除
    */
    public function postDeluser($id)
   {
    // echo 1111111;
    $res = User::where('id',$id)->delete();
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
    *用户详情
    */
   public function getDetails($id)
   {
   	$data = User::find($id) -> userDetail;
    $data2 = User::find($id) -> operate;
      
   	return view('admin.users.usersdetails',['data'=>$data,'oper'=>$data2]);
   }

    

}
