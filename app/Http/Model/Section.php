<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $table = 'sections';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;

    public function themes()
    {
        return $this -> hasMany('\App\Http\Model\Theme', 'sid', 'id');
    }
    public function posts()
    {
        return $this -> hasMany('\App\Http\Model\Post', 'sid', 'id');
    }
    public function column()
    {
    	return $this -> belongsTo('\App\Http\Model\Column', 'cid', 'id');
    }
}
