<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
  use Notifiable;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = ['username', 'password', 'permissions', 'first_name', 'last_name', 'photo', 'no_telepon', 'alamat'];
  protected $loginNames = ['username'];
  protected $dates = ['deleted_at'];

  /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  protected $hidden = ['password', 'remember_token'];

  public static function byUsername($username)
  {
    return static::whereUsername($username)->first();
  }

  public function imbPemohon()
  {
    return $this->hasOne(ImbPemohon::class);
  }

}
