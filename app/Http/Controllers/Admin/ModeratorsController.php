<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Moderator;
use App\Http\Model\Confirmsection;
use App\Http\Model\Userdetail;
use App\Http\Model\Section;



class ModeratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $moderator = Moderator::orderBy('id','asc') -> paginate(2);

        // dd($moderator);
        foreach($moderator as $k=>$v){
            $v['username'] = Userdetail::where('uid',$v['moderator'])->first()['username'];
            $v['section'] = Section::where('id',$v['id'])->first()['name'];
        }
        
        return view('admin.section_moderators.index',['data'=>$moderator]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $res = $request -> all();
        // dd($res);
        $id = $res['id'];
        // dd($id);
        $moderator = Moderator::where('id',$id) -> first();
        $res['id'] = $moderator['id'];
        $res['sid'] = $moderator['sid'];
        $res['moderator'] = $moderator['moderator'];
        $re = Confirmsection::create($res);
        Moderator::destroy($id);
        return back();


        // $userdetail = Moderator::find($id) -> userDetail;
        
        // return view('admin.confirmsection.index',['data'=>$confirmsection]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
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
        $res = Moderator::where('id',$id)->delete();
     // 0表示成功 其他表示失败
       if($res){
           $data = [
                'status'=>0,
                'msg'=>'驳回成功！'
           ];
       }else{
           $data = [
               'status'=>1,
               'msg'=>'驳回失败！'
           ];
       }
       return $data;
    }

   

   public function kankan()
   {
    $moderator = Confirmsection::orderBy('id','asc') -> paginate(2);

        // dd($moderator);
        foreach($moderator as $k=>$v){
            $v['username'] = Userdetail::where('uid',$v['moderator'])->first()['username'];
            $v['section'] = Section::where('id',$v['id'])->first()['name'];
        }

    return view('admin.confirmsection.index',['data'=>$moderator]);
   }
}
