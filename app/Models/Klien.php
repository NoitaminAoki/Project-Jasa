<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'kliens';
    protected $fillable = ['idHarga', 'idMember', 'nama', 'tempatTinggal', 'noTelp', 'email', 'status'];

    public function harga()
    {
        return $this->belongsTo('App\Models\Harga', 'idHarga', 'id')->withDefault([
            'tingkat' => 'Tidak ada!',
            'harga' => 0
        ]);
    }

    public function penghasilan()
    {
        return $this->belongsTo('App\Models\Penghasilan', 'idHarga', 'idHarga')->withDefault([
            'point' => 0,
            'fee' => 0
        ]);
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'idMember', 'id')->withDefault([
            'name' => '(tidak ada)'
        ]);
    }
}
