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
}
