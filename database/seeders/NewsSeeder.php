<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsSection;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run()
    {

        NewsSection::create([
            'title' => 'Latest Updates',
            'subtitle' => 'Articles & project updates with useful information'
        ]);


        News::create([
            'category' => 'Project Update',
            'title' => 'Hydraulic Testing & Chemical Cleaning of HRSG Boiler',
            'description' => 'Successful execution of hydraulic testing and chemical cleaning works for HRSG boiler ensuring safety, efficiency, and compliance with international standards.',
            'video_url' => 'https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/reel/4372354089701572&show_text=false&width=560',
            'type' => 'featured',
            'status' => 1
        ]);


        News::create([
            'category' => 'Construction',
            'title' => 'One of the World’s Largest Passive House Buildings Construction',
            'author' => 'TechnoTech Engineering Ltd',
            'news_date' => '2023-04-03',
            'type' => 'list'
        ]);


        News::create([
            'category' => 'Engineering',
            'title' => 'Boiler Erection & Commissioning Completed at Industrial Plant',
            'author' => 'Project Team',
            'news_date' => '2023-05-18',
            'type' => 'list'
        ]);


        News::create([
            'category' => 'Logistics',
            'title' => 'Heavy Equipment Transportation Successfully Delivered On Site',
            'author' => 'Operations',
            'news_date' => '2023-06-02',
            'type' => 'list'
        ]);
    }
}
