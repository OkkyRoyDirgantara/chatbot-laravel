<?php

namespace Database\Seeders;

use App\Models\ChatAdmin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'Admin',
            'email' => 'okkyroydirgantara@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
