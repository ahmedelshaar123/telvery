<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name"=>"Ahmed",
            "email"=>"elshaar85@gmail.com",
            "password"=>bcrypt("123"),
            'is_active'=>1
        ]);
        $admin->attachRole('admin');
    }

}
