<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;

    public function theme()
    {
    	return $this -> hasOne('App\Http\Model\Theme', 'id', 'tid');
    }
    public function replies()
    {
    	return $this -> hasMany('App\Http\Model\Reply', 'pid', 'id');
    }
    public function user()
    {
    	return $this -> belongsTo('App\Http\Model\User', 'uid', 'id');
    }
    public function section()
    {
    	return $this -> belongsTo('App\Http\Model\Section', 'sid', 'id');
    }
}
