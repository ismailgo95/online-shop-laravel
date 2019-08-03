<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
  public function saleItem()
  {
    return $this->belongsTo("App\SaleItem");
  }
}
