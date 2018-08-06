<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\Model;

class ImbCheck extends Model
{
  public static $rules = [];

  protected $table = 'imb_check';
  public $timestamps = false;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  protected $fillable = ['*'];

  public function imb()
  {
    return $this->belongsTo(Imb::class);
  }

}
