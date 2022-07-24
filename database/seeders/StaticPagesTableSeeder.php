<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use Illuminate\Database\Seeder;

class StaticPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaticPage::create([
           'name_ar' => 'عن الموقع',
           'name_en' => 'About Site',
           'value_ar' => 'اختبار',
           'value_en' => 'Test',
           'type' => "textarea",
           'key' => 'about',
        ]);
    }
}
