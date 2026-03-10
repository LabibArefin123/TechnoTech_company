<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectSection;

class ProjectSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        ProjectSection::insert([

            [
                'title' => 'Factory Consulting',
                'category' => 'Building, Renovation',
                'image' => 'uploads/images/welcome_page/projects/image_1_factory-consulting.JPG',
            ],

            [
                'title' => 'Building Construction',
                'category' => 'Building',
                'image' => 'uploads/images/welcome_page/projects/image_2_building-construction.JPG',
            ],

            [
                'title' => 'Factory Building Design',
                'category' => 'Building',
                'image' => 'uploads/images/welcome_page/projects/image_3_factory_building.JPG',
            ],

            [
                'title' => 'Oil Mill Construction',
                'category' => 'Building, Renovation',
                'image' => 'uploads/images/welcome_page/projects/image_4_oil_mill.JPG',
            ],

        ]);
    }
}
