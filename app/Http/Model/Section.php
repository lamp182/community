<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    //
     protected $table = 'sections';
    protected $primaryKey="id";
//    protected $fillable = ['user_name', 'user_pass'];
    protected $guarded = [];
    public $timestamps = false;

}
