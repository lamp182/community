<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $table = 'website';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;
}
