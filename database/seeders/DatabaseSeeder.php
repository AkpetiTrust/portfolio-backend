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
    }
}
