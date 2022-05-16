<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    protected $fillable = [
        'description',
        'data',
    ];

    protected $dates = ['created_at', 'updated_at',];

    protected $hidden = ['updated_at'];
}
