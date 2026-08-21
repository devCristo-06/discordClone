<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('friendships')->insert([
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'status' => 'accepted'
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 3,
                'status' => 'pending'
            ]
        ]);
    }
}
