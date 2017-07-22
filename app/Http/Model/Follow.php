<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
	protected $table = 'follows';
	protected $primaryKey="id";
	protected $guarded = [];
	public $timestamps = false;
}
