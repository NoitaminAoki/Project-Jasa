<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $fillable = ['nama', 'logo'];
}
