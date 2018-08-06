<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
  public static $rules = [];

  protected $table = 'pengaturan';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  protected $fillable = ['*'];

}
