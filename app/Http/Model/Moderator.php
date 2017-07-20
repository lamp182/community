<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Moderator
 * @功能：版主模型
 * @package App\Http\Model
 */
class Moderator extends Model
{
    //
    protected $table = 'section_moderators';
    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;
    public function user()
    {
        return $this -> hasMany('App\Http\Model\User', 'uid', 'uid');
    }

    public function userDetail()
    {
        return $this->hasMany('App\Http\Model\UserDetail', 'uid', 'id');
    }
}
