<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    protected $table = 'promosi';
    protected $dates = ['startDate', 'endDate'];
}
