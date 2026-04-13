<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubProjectSection extends Model
{
    protected $fillable = [
        'project_id',
        'image',
        'title',
        'is_active'
    ];
    
    public function project()
    {
        return $this->belongsTo(ProjectSection::class, 'project_id');
    }

}
