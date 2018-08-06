<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImbPemohon extends Model
{
  use SoftDeletes;

  public static $rules = [];

  protected $table = 'imb_pemohon';
  public $timestamps = false;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  protected $fillable = ['*'];
  protected $dates = ['deleted_at'];

  public function imbs()
  {
    return $this->hasMany(Imb::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

}
