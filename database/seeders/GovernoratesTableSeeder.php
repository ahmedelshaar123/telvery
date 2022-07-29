<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Seeder;

class GovernoratesTableSeeder extends Seeder
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
              'name_ar' => "الدقهلية",
              'name_en' => "Addakahleyya",
          ],
          [
              'name_ar' => "الغربية",
              'name_en' => "Algharbeyya",
          ]
        ];
        foreach ($values as $value) {
            Governorate::create($value);
        }
    }
}
