<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'code','email', 'noTelp','password', 'status'
    ];

    protected $hidden = [
      'password','remember_token',
    ];
}
