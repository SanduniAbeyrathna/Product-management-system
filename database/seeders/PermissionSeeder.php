<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached permissions
        app()['cache']->forget('spatie.permission.cache');

        // Define permission names
        $permissionNames = [
            //todo
            'todo_view',
            'todo_create',
            'todo_edit',
            'todo_delete',
            'todo_status_update',
            'add_sub_task',

            //banner
            'banner_view',
            'banner_create',
            'banner_edit',
            'banner_delete',
            'banner_status_update',

            //product
            'product_view',
            'product_create',
            'product_edit',
            'product_delete',

            //users
            'user_view',
            'user_create',
            'user_edit',
            'user_delete',
            'user_status_update',
            'change_password',

            //audit trail
            'audit_trail_view',

            //role Management
            'permission_management',

        ];

        // Create or update permissions
        foreach ($permissionNames as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }
    }
}