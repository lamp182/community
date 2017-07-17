<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
      protected $table = 'links';
    protected $primaryKey="id";
//    protected $fillable = ['user_name', 'user_pass'];
    protected $guarded = [];
    public $timestamps = false;
}
