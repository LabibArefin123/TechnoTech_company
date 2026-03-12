<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'name',
        'percent',
        'serial',
        'status'
    ];
}
