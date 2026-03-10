<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'tagline',
        'paragraph_1',
        'paragraph_2',
        'paragraph_3',
        'mission_title',
        'mission_text',
        'vision_title',
        'vision_text',
        'image_1',
        'image_2',
        'status'
    ];
}
