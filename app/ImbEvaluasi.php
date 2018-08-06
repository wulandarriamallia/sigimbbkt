<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\Model;

class ImbEvaluasi extends Model
{
  public static $rules = [];

  protected $table = 'imb_evaluasi';
  public $timestamps = false;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  protected $fillable = ['*'];

  public function imb()
  {
    return $this->belongsTo(Imb::class);
  }

}
