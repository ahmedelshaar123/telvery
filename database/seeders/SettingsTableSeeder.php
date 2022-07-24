<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            [
                'name_ar' => 'فيسبوك',
                'name_en' => 'Facebook',
                'value_ar' => 'https://www.facebook.com',
                'value_en' => 'https://www.facebook.com',
                'type' => 'url',
                'key' => 'facebook_url',

            ],
            [
                'name_ar' => 'تويتر',
                'name_en' => 'Twitter',
                'value_ar' => 'https://www.twitter.com',
                'value_en' => 'https://www.twitter.com',
                'type' => 'url',
                'key' => 'twitter_url',

            ],
            [
                'name_ar' => 'انستجرام',
                'name_en' => 'Instagram',
                'value_ar' => 'https://www.instagram.com',
                'value_en' => 'https://www.instagram.com',
                'type' => 'url',
                'key' => 'instagram_url',
            ],
            [
                'name_ar' => 'جوجل',
                'name_en' => 'Google',
                'value_ar' => 'https://www.google.com',
                'value_en' => 'https://www.google.com',
                'type' => 'url',
                'key' => 'google_url',
            ],

            [
                'name_ar' =>  'البريد الالكتروني',
                'name_en' => 'Email',
                'value_ar' => 'example@gmail.com',
                'value_en' => 'example@gmail.com',
                'type' => 'email',
                'key' => 'email',
            ],
            [
                'name_ar' => 'الجوال',
                'name_en' => 'Phone',
                'value_ar' => '0200055667',
                'value_en' => '0200055667',
                'type' => 'number',
                'key' => 'phone',
            ],

            [
                'name_ar' => 'عنوان الموقع',
                'name_en' => 'Address',
                'value_ar' => 'شارع جيهان المنصورة آخر شارع المنصورة',
                'value_en' => 'Gehan Street, End Of Mansoura Street',
                'type' => 'text',
                'key' => 'address',
            ],

            [
                'name_ar' => 'عنوان الصفحة',
                'name_en' => 'Title',
                'value_ar' => 'العنوان',
                'value_en' => 'Title',
                'type' => 'text',
                'key' => 'title',
            ],
            [
                'name_ar' => 'وصف ذيل الصحة',
                'name_en' => 'Footer Description',
                'value_ar' => 'الذيل',
                'value_en' => 'Footer',
                'type' => 'text',
                'key' => 'footer_desc',
            ],
            [
                'name_ar' => 'خط العرض',
                'name_en' => 'Latitude',
                'value_ar' => '24.774265',
                'value_en' => '24.774265',
                'type' => 'map',
                'key' => 'lat',

            ],
            [
                'name_ar' => 'خط الطول',
                'name_en' => 'Longitude',
                'value_ar' => '46.738586',
                'value_en' => '46.738586',
                'type' => 'map',
                'key' => 'lng',

            ],


        ];
        foreach ($values as $value) {
            \App\Models\Setting::create($value);

        }
    }
}
