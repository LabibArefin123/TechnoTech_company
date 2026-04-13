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

    public function subProjects()
    {
        return $this->hasMany(SubProjectSection::class, 'project_id')
            ->where('is_active', 1)
            ->latest();
    }
}
