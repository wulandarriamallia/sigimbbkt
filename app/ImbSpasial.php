<?php

namespace sigimbbkt;

use Illuminate\Database\Eloquent\Model;

class ImbSpasial extends Model
{
  public static $rules = [];

  protected $table = 'imb_spasial';
  public $timestamps = false;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
//  protected $fillable = ['*'];
  protected $fillable = ['imb_id', 'area', 'polygon', 'geom'];

  public function imb()
  {
    return $this->belongsTo(Imb::class);
  }

}
