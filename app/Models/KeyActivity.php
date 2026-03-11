<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyActivity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'status',
        'serial'
    ];
}