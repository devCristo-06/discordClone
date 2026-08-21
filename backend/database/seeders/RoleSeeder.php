<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'priority' => 100,
                'color' => '#910303'
            ],
            [
                'name' => 'Moderator',
                'priority' => 70,
                'color' => '#0A6091'
            ],
            [
                'name' => 'Member',
                'priority' => 50,
                'color' => '#0A6091'
            ],
            [
                'name' => 'Guest',
                'priority' => 0,
                'color' => '#535252'
            ],
        ]);
    }
}
