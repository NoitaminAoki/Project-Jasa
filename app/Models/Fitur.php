<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fitur extends Model
{
    protected $table = 'fitur';
    protected $fillable = ['id', 'fitur', 'harga_id', 'ada', 'menu', 'tampilkan'];

    public function GetHarga() {
      return $this->belongsTo('App\Models\Harga', 'harga_id', 'id');
    }
}
