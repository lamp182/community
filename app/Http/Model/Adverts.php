<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Adverts extends Model
{
    protected $table = 'adverts';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;
}
