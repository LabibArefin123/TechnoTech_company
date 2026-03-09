<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactCard;

class ContactCardSeeder extends Seeder
{
    public function run(): void
    {
        ContactCard::insert([
            [
                'title' => 'Make A Quote',
                'image' => 'uploads/images/welcome_page/contact_page/image_1.webp',
                'value' => 'info@technotechengineering.com',
                'type'  => 'email',
                'status' => 1,
            ],
            [
                'title' => 'Call Us 24/7',
                'image' => 'uploads/images/welcome_page/contact_page/image_2.webp',
                'value' => '(+880) 1754327566',
                'type'  => 'phone',
                'status' => 1,
            ],
            [
                'title' => 'Work Station',
                'image' => 'uploads/images/welcome_page/contact_page/image_3.webp',
                'value' => '106/A, Green Road (3rd Floor), Farmgate, Corner Place Super Market, Dhaka-1205',
                'type'  => 'address',
                'status' => 1,
            ]
        ]);
    }
}