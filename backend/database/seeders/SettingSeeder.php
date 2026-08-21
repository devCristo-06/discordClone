<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'user_id' => 1,
                'theme' => 'dark',
                'language' => 'en'
            ],
            [
                'user_id' => 2,
                'theme' => 'light',
                'language' => 'en'
            ],
            [
                'user_id' => 3,
                'theme' => 'dark',
                'language' => 'it'
            ],
        ]);
    }
}
