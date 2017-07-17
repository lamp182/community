<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
     protected $table = 'users';
    protected $primaryKey = "id";
   // protected $fillable = ['email', 'password'];

 	protected $guarded = [];

    public $timestamps = false;
}
