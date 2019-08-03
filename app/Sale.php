<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SaleItem;

class Sale extends Model
{
  protected $primaryKey = 'id';
  public function saleItem()
  {
    return $this->hasMany('App\SaleItem');
  }
  public function notif()
  {
    return $this->hasMany('App\Notif');
  }

}
