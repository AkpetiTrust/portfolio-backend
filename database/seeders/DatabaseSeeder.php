<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => "Akpeti Trust",
            'email' => "akpetitrust@gmail.com",
            'password' => Hash::make('password'),
        ]);
        \App\Models\Settings::create([
            "currently" => "I'm currently learning product design. When I'm not working you can find me watching a movie. Or I'm probably just sleeping 😴 .",
            "is_available" => false,            
        ]);
    }
}
