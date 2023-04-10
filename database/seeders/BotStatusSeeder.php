<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BotStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // if exist delete all
        DB::table('bot_status')->delete();
        // insert new
        DB::table('bot_status')->insert([
            'id' => 1,
            'is_run' => false,
            'run_at' => null,
        ]);
        DB::table('bot_status')->insert([
            'id' => 2,
            'is_run' => false,
            'run_at' => null
        ]);
    }
}
