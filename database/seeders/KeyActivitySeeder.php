<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\KeyActivity;

class KeyActivitySeeder extends Seeder
{
    public function run()
    {
        $activities = [

            [
                'title' => 'Power Plant Erection & Commissioning',
                'description' => 'Captive power plant erection, commissioning, and revamping including boilers, HRSG, steam and gas turbines.',
                'icon' => 'bi-lightning-charge',
                'image' => 'image_1.jpg',
                'serial' => 1
            ],

            [
                'title' => 'Boiler & Turbine Installation',
                'description' => 'Installation, commissioning, maintenance, and repair of industrial boilers, turbines, generators, and auxiliaries.',
                'icon' => 'bi-gear',
                'image' => 'image_2.jpeg',
                'serial' => 2
            ],

            [
                'title' => 'Industrial Structures & Sheds',
                'description' => 'Design, fabrication, and erection of factory sheds, steel structures, silos, tanks, and chimneys.',
                'icon' => 'bi-building',
                'image' => 'image_3.JPG',
                'serial' => 3
            ],

            [
                'title' => 'Furnace & Refractory Works',
                'description' => 'Furnace, reformer, and refractory lining works including insulation systems for high-temperature equipment.',
                'icon' => 'bi-fire',
                'image' => 'image_4.jpg',
                'serial' => 4
            ],

            [
                'title' => 'Utility & Treatment Plants',
                'description' => 'Design, installation, and commissioning of ETP plants, boiler feed water treatment, and cooling towers.',
                'icon' => 'bi-water',
                'image' => 'image_5.jpg',
                'serial' => 5
            ],

            [
                'title' => 'Heavy Lifting & Transportation',
                'description' => 'Inland transportation, heavy equipment handling, loading, unloading, and site positioning services.',
                'icon' => 'bi-truck',
                'image' => 'image_6.jpeg',
                'serial' => 6
            ],

        ];

        foreach ($activities as $activity) {
            KeyActivity::create($activity);
        }
    }
}
