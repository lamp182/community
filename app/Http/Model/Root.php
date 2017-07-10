<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Root extends Model
{
    protected $table = 'admin';
    protected $primaryKey="id";

    // protected $fillable = ['user_name', 'user_pass'];
   
    //限制哪些字段不能添加
    protected $guarded = [];

    //关闭自动维护字段
    public $timestamps = false;
}
