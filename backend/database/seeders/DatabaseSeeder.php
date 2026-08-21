<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            ServerSeeder::class,
            ChannelSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            ServerMemberSeeder::class,
            ConversationSeeder::class,
            ConversationMemberSeeder::class,
            MessageSeeder::class,
            FriendshipSeeder::class,
            RolePermissionSeeder::class,
            AttachmentSeeder::class,
            ServerInviteSeeder::class
        ]);
    }
}
