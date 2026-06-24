<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}