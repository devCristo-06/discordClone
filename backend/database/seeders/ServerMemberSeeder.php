<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('server_members')->insert([
            [
                'server_id' => 1,
                'user_id' => 1,
                'role_id' => 1,
                'joined_at' => now()
            ],
            [
                'server_id' => 1,
                'user_id' => 2,
                'role_id' => 2,
                'joined_at' => now()
            ],
            [
                'server_id' => 1,
                'user_id' => 3,
                'role_id' => 3,
                'joined_at' => now()
            ],
            [
                'server_id' => 2,
                'user_id' => 2,
                'role_id' => 1,
                'joined_at' => now()
            ],
            [
                'server_id' => 2,
                'user_id' => 3,
                'role_id' => 3,
                'joined_at' => now()
            ],
            [
                'server_id' => 2,
                'user_id' => 1,
                'role_id' => 3,
                'joined_at' => now()
            ],
        ]);
    }
}
