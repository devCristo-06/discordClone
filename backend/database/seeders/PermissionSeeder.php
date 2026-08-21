<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'Manage Server',
                'slug' => 'manage_server',
            ],

            [
                'name' => 'Manage Channels',
                'slug' => 'manage_channels',
            ],

            [
                'name' => 'Manage Members',
                'slug' => 'manage_members',
            ],

            [
                'name' => 'Manage Roles',
                'slug' => 'manage_roles',
            ],

            [
                'name' => 'Manage Permissions',
                'slug' => 'manage_permissions',
            ],

            [
                'name' => 'Create Invite',
                'slug' => 'create_invite',
            ],

            [
                'name' => 'Send Messages',
                'slug' => 'send_messages',
            ],

            [
                'name' => 'Delete Messages',
                'slug' => 'delete_messages',
            ],

            [
                'name' => 'Edit Messages',
                'slug' => 'edit_messages',
            ],

            [
                'name' => 'Attach Files',
                'slug' => 'attach_files',
            ],
        ]);
    }
}
