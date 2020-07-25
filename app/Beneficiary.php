<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $fillable = [
        'document',
        'name',
        'pay',
        'referenced_by',
    ];

    protected $casts = [
        'pay' => 'boolean',
    ];
}
