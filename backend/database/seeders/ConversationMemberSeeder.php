<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConversationMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conversation_members')->insert([
            [
                'conversation_id' => 1,
                'user_id' => 1,
                'joined_at' => now()
            ],
            [
                'conversation_id' => 1,
                'user_id' => 2,
                'joined_at' => now()
            ],
            [
                'conversation_id' => 1,
                'user_id' => 3,
                'joined_at' => now()
            ],
            [
                'conversation_id' => 2,
                'user_id' => 1,
                'joined_at' => now()
            ],
            [
                'conversation_id' => 2,
                'user_id' => 2,
                'joined_at' => now()
            ],
        ]);
    }
}
