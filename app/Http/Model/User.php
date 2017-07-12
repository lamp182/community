<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey="id";

    // protected $fillable = ['user_name', 'user_pass'];
   
    //限制哪些字段不能添加
    protected $guarded = [];

    //关闭自动维护字段
    public $timestamps = false;

    public function detail()
    {
    	return $this -> hasMany('App\Http\Model\Userdetail', 'uid', 'id');
    }

    public function operate()
    {
        return $this -> hasMany('App\Http\Model\Operate','uid','id');

    }
}
