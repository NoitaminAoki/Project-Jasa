<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';
    protected $fillable = ['email', 'subjek', 'status_terbalas', 'pertanyaan'];
}
