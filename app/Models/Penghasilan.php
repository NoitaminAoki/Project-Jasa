<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    protected $table = 'penghasilans';
    protected $fillable = ['idHarga', 'point', 'fee'];
    
    public function harga()
    {
        return $this->belongsTo('App\Models\Harga', 'idHarga', 'id')->withDefault([
            'harga' => 0,
            'tingkat' => 'Tidak ada!'
        ]);
    }
}
