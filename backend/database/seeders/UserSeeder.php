<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Cristo',
                'last_name' => 'Cristo',
                'username' => 'cristo',
                'email' => 'you@example.com',
                'birth_date' => '2000-10-10',
                'password' => Hash::make('example123!?*'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mario',
                'last_name' => 'Rossi',
                'username' => 'rossi49',
                'email' => 'mariorossi@email.com',
                'birth_date' => '1999-09-09',
                'password' => Hash::make('example123!?*'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Luca',
                'last_name' => 'Bianchi',
                'username' => 'bianchi57',
                'email' => 'lucabianchi@email.com',
                'birth_date' => '1999-08-08',
                'password' => Hash::make('example123!?*'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
