<?php

namespace App\Http\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $primaryKey="id";
    protected $guarded = [];
    public $timestamps = false;

    public function userDetail()
    {
        return $this->hasOne('App\Http\Model\UserDetail', 'uid', 'id');
    }

    public function userOperate()
    {
        return $this->hasOne('App\Http\Model\UserOperate', 'uid', 'id');
    }
    
    public function replies()
    {
    	return $this -> hasMany('App\Http\Model\Reply', 'uid', 'id');
    }

     public function Operate()
    {
        return $this->hasOne('App\Http\Model\Operate', 'uid', 'id');
    }
}
