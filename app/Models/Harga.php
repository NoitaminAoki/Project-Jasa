<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'harga';

    public function GetFitur() {
      return $this->hasMany('App\Models\Fitur', 'harga_id', 'id');
    }
}
