<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
//use App\Http\Model;

use App\Http\Model\Columns;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ColumnsController extends Controller
{
    // 浏览分类
    public function getIndex()
    {   

        $columns = Columns::orderBy('id')->paginate(10);
        // dump($columns);
        return view('admin.columns.index',['data'=>$columns]);
    }
    // 引入添加栏目的模板
    public function getAdd()
    {
        return view('admin.columns.add');
    }

    // 处理添加模板的数据
    public function getDoadd(Request $request)
    {       

        $user = $request -> all();
        // 把数组拼接完成
        // $user['name'];
        $user['ctime'] = time();
        $user['ltime'] = time();

// //        dump($columns);
        $res = Columns::create($user);
        // echo $res;
        if($res){
            echo '添加成功';
        }
        
    }

    // 查询该栏目是否存在
    public function getSelect(Request $request)
    {
        $res = $request -> all();

        $re = Columns::where('name',$res['rename'])->first();

        if($re){
            echo 2;
        }else{
            echo 1;
        }

      
    }

    // 修改栏目名称
    public function getEdit($id,$name)
    {   
        // dump($id);
        // dump($name);
        return view('admin.columns.edit',['id'=>$id,'name'=>$name]);
    }

    public function getData(Request $request)
    {
        $a = $request -> all();
      
        $re = Columns::where('name',$a['name'])->first();
        // echo $a['name'];
        // echo $re;
        if($re){
            echo 2;
        }else{
            echo 1;
        }
        
    }
    // 进行修改
    public function getUpdata(Request $request)
    {
         $user = $request -> all();
            
         $data['name'] = $user['name'];
         $data['ltime'] = time();
         $res = Columns::where('id',$user['id']) -> update($data);
         // echo $res;
        // echo $user['name'];
        if($res){
            echo '修改成功';
        }
        
    }

    // 删除
    public function getDel(Request $request)
    {
        $user = $request -> all();
        // echo 111;
        $res = Columns::destroy($user['id']);

        // echo $res;
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

}
