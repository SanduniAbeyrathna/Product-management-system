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
            'todo view',
            'todo create',
            'todo edit',
            'todo delete',
            'todo status update',
            'Add Sub Task',

            //banner
            'banner view',
            'banner create',
            'banner edit',
            'banner delete',
            'banner status update',

            //product
            'product view',
            'product create',
            'product edit',
            'product delete',

            //users
            'user view',
            'user create',
            'user edit',
            'user delete',
            'user status update',
            'edit password',

            //audit trail
            'audit trail view',

            //role Management
            'Permission Management',

        ];

        // Create or update permissions
        foreach ($permissionNames as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }
    }
}
