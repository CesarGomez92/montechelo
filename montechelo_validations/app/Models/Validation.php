<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    protected $fillable = [
        'field_name',
        'required',
        'data_type',
        'min',
        'max',
    ];

    protected $dates = ['created_at', 'updated_at',];

    protected $hidden = ['created_at', 'updated_at'];
}
