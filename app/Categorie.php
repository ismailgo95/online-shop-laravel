<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
  protected $primaryKey = 'id';
  public function product()
  {
    return $this->hasMany("App\Product");
  }
}
