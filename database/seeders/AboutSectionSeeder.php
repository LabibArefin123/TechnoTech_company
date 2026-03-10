<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AboutSection::create([

            'title' => 'About TechnoTech Engineering Ltd',

            'tagline' => 'Engineering Excellence • Industrial Expertise • Trusted Since 1995',

            'paragraph_1' => 'TechnoTech Engineering Ltd was established in 1995 by a group of highly qualified engineers from diverse disciplines. What began as a mechanical construction firm has grown into a trusted name in Bangladesh’s energy and industrial sectors.',

            'paragraph_2' => 'Over the years, we have successfully executed complex projects in gas pipelines, power plants, oil refineries, and large-scale industrial facilities. Some projects were delivered independently, while others were completed in collaboration with reputable local and international partners.',

            'paragraph_3' => 'As a certified industrial boiler license holder, we specialize in fabrication, installation, refractory & insulation works, welding, heavy equipment handling, and construction management. Our commitment is simple — deliver quality work, on time, with professionalism and technical excellence.',

            'mission_title' => 'Our Mission',
            'mission_text' => 'To provide reliable, high-quality engineering solutions through innovation, safety, and technical expertise.',

            'vision_title' => 'Our Vision',
            'vision_text' => 'To be a leading engineering and construction partner in Bangladesh and beyond, recognized for integrity and excellence.',

            'image_1' => 'uploads/images/welcome_page/about/about_1.jpg',
            'image_2' => 'uploads/images/welcome_page/about/about_2.jpg',

            'status' => 1
        ]);
    }
}
