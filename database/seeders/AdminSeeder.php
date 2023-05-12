<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // if exist delete all
        User::truncate();
        // insert new
        User::create([
            'name' => 'Admin',
            'email' => 'okkyroydirgantara@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
