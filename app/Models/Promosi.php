<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Promosi;

class Promosi extends Model
{
    protected $table = 'promosi';
    protected $dates = ['startDate', 'endDate'];

    // public function getCreatedAtAttribute($timestamp) {
      // return Carbon::parse($timestamp)->format('d F Y');
    // }

}
