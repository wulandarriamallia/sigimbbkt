<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public static $rules = [];

  protected $table = 'roles';
  public $timestamps = false;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  protected $fillable = ['*'];

}
