<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servers')->insert([
            [
                'owner_id' => 1,
                'name_server' => "TITLE TEST 1",
                'description_server' => "DESCRIPTION TEST 1",
                'genre' => null
            ],
            [
                'owner_id' => 1,
                'name_server' => "GAMING",
                'description_server' => "SERVER DEDICATED TO GAMING",
                'genre' => "Videogames"
            ],
            [
                'owner_id' => 2,
                'name_server' => "STREAMING",
                'description_server' => "SERVER DEDICATED TO STREAMING",
                'genre' => null
            ],
        ]);
    }
}
