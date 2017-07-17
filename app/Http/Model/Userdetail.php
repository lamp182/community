<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    protected $table = 'userdetails';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;
}
