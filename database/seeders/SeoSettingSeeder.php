<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoSetting;

class SeoSettingSeeder extends Seeder
{
    public function run(): void
    {
        SeoSetting::create([
            'page_name' => 'home',

            'meta_title' => 'TechnoTech Engineering Ltd | Industrial Engineering & Construction Company in Bangladesh',

            'meta_description' => 'TechnoTech Engineering Ltd, established in 1995, is a leading engineering and construction company in Bangladesh specializing in gas pipelines, power plants, oil refineries, boiler installation, heavy equipment erection, fabrication, and industrial construction services.',

            'meta_keywords' => 'TechnoTech Engineering Ltd, engineering company Bangladesh, boiler installation Bangladesh, power plant construction Bangladesh, gas pipeline engineering, industrial fabrication, refractory insulation works, construction management Bangladesh',

            'og_title' => 'TechnoTech Engineering Ltd – Engineering Excellence Since 1995',

            'og_description' => 'TechnoTech Engineering Ltd delivers professional engineering services including boiler installation, power plant erection, refinery construction, heavy equipment installation, and industrial fabrication across Bangladesh.',

            'og_image' => 'uploads/images/seo/technotech-og.jpg',
        ]);
    }
}
