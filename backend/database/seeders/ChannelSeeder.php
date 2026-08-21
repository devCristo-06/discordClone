<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('channels')->insert([
            [
                'server_id' => 1,
                'user_id' => 1,
                'name_channel' => 'TITLE CHANNEL TEST 1',
                'description_channel' => 'DESCRIPTION CHANNEL TEST 1',
                'position' => 1,
                'type' => 'public',
                'visibility' => true
            ],
            [
                'server_id' => 2,
                'user_id' => 1,
                'name_channel' => 'Gaming reports',
                'description_channel' => 'DESCRIPTION CHANNEL FOR GAMING REPORTS',
                'position' => 2,
                'type' => 'public',
                'visibility' => true
            ],
            [
                'server_id' => 3,
                'user_id' => 2,
                'name_channel' => 'Famous streamers',
                'description_channel' => 'DESCRIPTION CHANNEL FOR TIER LIST',
                'position' => 3,
                'type' => 'private',
                'visibility' => false
            ],
        ]);
    }
}
