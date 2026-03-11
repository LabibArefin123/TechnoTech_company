<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrontendSetting extends Model
{
    protected $fillable = [
        'theme_color',
        'text_size',
        'navbar_layout',
        'about_layout',
        'dark_mode',
        'animations',
        'back_to_top'
    ];
}
