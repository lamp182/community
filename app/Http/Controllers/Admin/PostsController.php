<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Model\section;
use App\Http\Model\Columns;
use App\Http\Model\post;
use App\Http\Model\Theme;
use App\Http\Model\Userdetail;



use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function details($id)
    {
        dump($id);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // 获取主页所有需要的数据
        $section = section::get();
        $post = Post::orderBy('ctime','desc')->paginate(10);
        // 把需要的数据加到$post中
        foreach($post as $k=>$v){
            $v['sname'] = Section::where('id',$v['sid']) -> first()['name'];
            $v['cname'] = Columns::where('id',Section::where('id',$v['sid']) -> first()['cid']) -> first()['name'];
            $v['tname'] = Theme::where('id',$v['tid']) -> first()['name'];
            $v['vname'] = Userdetail::where('uid',$v['uid']) -> first()['username'];
        }

        return view('admin.post.index',['section'=>$section,'post'=>$post]);

        // dump($column);
        // dump($section);
        // dump($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //获取传过来的数据
        $data = $request ->all();
        // 如果分类和关键字都为空
        if(empty($data['section']) && empty($data['zkey'])){
            return redirect('admin/posts');
        }

        // 只有分类有值
        if($data['section'] && empty($data['zkey'])){
            $section = section::get();
            // 把需要的数据加到$post中
            $post = Post::where('sid',$data['section'])->orderBy('ctime','desc')->paginate(10);
            foreach($post as $k=>$v){
                $v['sname'] = Section::where('id',$v['sid']) -> first()['name'];
                $v['cname'] = Columns::where('id',Section::where('id',$v['sid']) -> first()['cid']) -> first()['name'];
                $v['tname'] = Theme::where('id',$v['tid']) -> first()['name'];
                $v['vname'] = Userdetail::where('uid',$v['uid']) -> first()['username'];
            }
            // dump($data['section']);die;
        return view('admin.post.sect',['section'=>$section,'post'=>$post,'id'=>$data['section']]);
        }

        // 只有关键字有值
        if(empty($data['section']) && $data['zkey']){
            $section = section::get();
            // 去除关键字两边的空格
            $key = trim($data['zkey']) ;
            // echo $key;
            $post = Post::where('title','like',"%".$key."%")->orderBy('ctime','desc')->paginate(10);
            foreach($post as $k=>$v){
                $v['sname'] = Section::where('id',$v['sid']) -> first()['name'];
                $v['cname'] = Columns::where('id',Section::where('id',$v['sid']) -> first()['cid']) -> first()['name'];
                $v['tname'] = Theme::where('id',$v['tid']) -> first()['name'];
                $v['vname'] = Userdetail::where('uid',$v['uid']) -> first()['username'];
            }
            // dump($key);
            return view('admin.post.key',['section'=>$section,'post'=>$post,'key'=>$key]);
        }


        // 分类和关键字都有值
        if($data['section'] && $data['zkey']){
            $section = section::get();
            // 去除关键字两边的空格
            $key = trim($data['zkey']) ;
            // 按照要求查出数据
            $post = Post::where('sid',$data['section'])->where('title','like',"%".$key."%")->orderBy('ctime','desc')->paginate(10);
            foreach($post as $k=>$v){
                $v['sname'] = Section::where('id',$v['sid']) -> first()['name'];
                $v['cname'] = Columns::where('id',Section::where('id',$v['sid']) -> first()['cid']) -> first()['name'];
                $v['tname'] = Theme::where('id',$v['tid']) -> first()['name'];
                $v['vname'] = Userdetail::where('uid',$v['uid']) -> first()['username'];
            }

            return view('admin.post.sekey',['section'=>$section,'post'=>$post,'key'=>$key,'id'=>$data['section']]);
         }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // 获取主页所有需要的数据
        $post = Post::where('id',$id)->first();
        // 把需要的数据加到$post中
        $post['sname'] = Section::where('id',$post['sid']) -> first()['name'];
        $post['cname'] = Columns::where('id',Section::where('id',$post['sid']) -> first()['cid']) -> first()['name'];
        $post['tname'] = Theme::where('id',$post['tid']) -> first()['name'];
        $post['vname'] = Userdetail::where('uid',$post['uid']) -> first()['username'];

        return view('admin.post.details',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //通过接受的id获取详细信息
        $post = Post::where('id',$id)->first();
        // dump($post['status']);
        // die;
        if($post['status'] == 1){
            $sta['status'] = 0;
            Post::where('id',$id)->update($sta);
            return back();
        }else{
            $sta['status'] = 1;
            Post::where('id',$id)->update($sta);
            return back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
