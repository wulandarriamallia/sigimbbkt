<?php

namespace sigimbbkt;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ImbRetribusi extends Model
{
  public static $rules = [];

  protected $table = 'imb_retribusi';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  protected $fillable = ['*'];

  public function imb()
  {
    return $this->belongsTo(Imb::class);
  }

}
