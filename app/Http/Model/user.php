<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'admin';
    protected $primaryKey = "id";
    protected $fillable = ['name', 'password'];

//    protected $guarded = [];

    public $timestamps = false;
}
