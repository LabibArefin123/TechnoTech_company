<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactCard extends Model
{
    protected $fillable = [
        'title',
        'image',
        'value',
        'type',
        'status'
    ];
}
