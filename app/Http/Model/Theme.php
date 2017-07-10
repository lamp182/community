<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    //
    protected $table = 'section_themes';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;

    public function posts()
    {
        return $this -> hasMany('\App\Http\Model\Post', 'tid', 'id');
    }
}
