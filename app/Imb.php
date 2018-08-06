<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imb extends Model
{
  use SoftDeletes;

  public static $rules = [];

  protected $table = 'imb';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  protected $fillable = ['*'];
  protected $dates = ['deleted_at'];

  public function imbPemohon()
  {
    return $this->belongsTo(ImbPemohon::class)->withTrashed();
  }

  public function imbCheck()
  {
    return $this->hasOne(ImbCheck::class);
  }

  public function imbEvaluasi()
  {
    return $this->hasOne(ImbEvaluasi::class);
  }

  public function imbRetribusi()
  {
    return $this->hasOne(ImbRetribusi::class);
  }

  public function imbSpasial()
  {
    return $this->hasOne(ImbSpasial::class);
  }

}
