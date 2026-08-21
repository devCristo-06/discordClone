<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conversations')->insert([
            [
                'created_by' => 1,
                'type' => 'group'
            ],
            [
                'created_by' => 1,
                'type' => 'private'
            ],
        ]);
    }
}
