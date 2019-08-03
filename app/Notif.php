<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
  protected $primaryKey = 'id';
  public function sale()
  {
    return $this->belongsTo('App\Sale');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }


}
