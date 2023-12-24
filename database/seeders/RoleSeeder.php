<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles
        app()['cache']->forget('spatie.permission.cache');

        // Define roles
        $roles = [
            'Super Admin',
            'Admin',
            'Company',
            'Approver',
            'Data Entry Admin',
            'User',
        ];

        // Create roles or update if they already exist
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }
    }
}
