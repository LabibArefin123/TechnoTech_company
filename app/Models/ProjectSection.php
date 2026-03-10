<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSection extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image',
        'status'
    ];
}
