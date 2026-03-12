<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SkillSection;

class SkillSectionSeeder extends Seeder
{
    public function run(): void
    {

        SkillSection::insert([

            [
                'title' => 'We Make Finest Design With Great Passion',
                'subtitle' => 'Great Quality Skills',
                'description' => 'Architecture refers to the design and planning of buildings and structures and the spaces around them.',
                'image' => 'uploads/images/welcome_page/skill/image_1.jpg',
                'name' => 'Architecture',
                'percent' => 87,
                'serial' => 1,
                'status' => 1
            ],

            [
                'title' => 'We Make Finest Design With Great Passion',
                'subtitle' => 'Great Quality Skills',
                'description' => 'Architecture refers to the design and planning of buildings and structures and the spaces around them.',
                'image' => 'uploads/images/welcome_page/skill/image_1.jpg',
                'name' => 'Development',
                'percent' => 80,
                'serial' => 2,
                'status' => 1
            ],

            [
                'title' => 'We Make Finest Design With Great Passion',
                'subtitle' => 'Great Quality Skills',
                'description' => 'Architecture refers to the design and planning of buildings and structures and the spaces around them.',
                'image' => 'uploads/images/welcome_page/skill/image_1.jpg',
                'name' => 'Design',
                'percent' => 90,
                'serial' => 3,
                'status' => 1
            ]

        ]);
    }
}