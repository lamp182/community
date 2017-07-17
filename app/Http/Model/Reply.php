<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;
    
    public function user()
    {
    	return $this -> belongsTo('App\Http\Model\User', 'uid', 'id');
    }
}
