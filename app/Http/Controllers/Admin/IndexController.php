<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Model\section;
use App\Http\Model\Columns;
use App\Http\Model\post;
use App\Http\Model\Userdetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $section = Section::orderBy('pvs','desc')->take(5)->get();
        foreach($section as $k=>$v){
            $v['cname'] = Columns::where('id',$v['cid'])->first()['name'];
            $v['count'] = Post::where('sid',$v['id'])->count();
        } 


        $post = Post::orderBy('pvs','desc')->take(5)->get();
        foreach($post as $k=>$v){
            $v['sname'] = Section::where('id',$v['sid'])->first()['name'];
            $v['uname'] = Userdetail::where('uid',$v['uid']) -> first()['username'];
        }

        // dump($post);
        return view('admin.index.index',['section'=>$section,'post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
