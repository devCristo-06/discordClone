<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('messages')->insert([
            [
                'channel_id' => 1,
                'conversation_id' => null,
                'user_id' => 1,
                'content' => 'Hello World!'
            ],
            [
                'channel_id' => null,
                'conversation_id' => 1,
                'user_id' => 1,
                'content' => 'Hello World!'
            ],
        ]);
    }
}
