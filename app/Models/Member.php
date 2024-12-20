<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = [
        'fullname',
        'gender',
        'birthdate',
        'region',
        'login',
        'password',
        'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
