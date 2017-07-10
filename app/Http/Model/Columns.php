<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    //
    protected $table = 'columns';
    protected $primaryKey="id";
//    protected $fillable = ['user_name', 'user_pass'];
    protected $guarded = [];
    public $timestamps = false;
}
