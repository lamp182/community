<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    //
    protected $table = 'columns';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;
}
