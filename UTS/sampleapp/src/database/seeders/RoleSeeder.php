<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);

        // Membuat permissions
        $permissions = [
            'view_activity_log', 'view_any_activity_log', 'create_activity_log', 'update_activity_log', 'delete_activity_log', 'delete_any_activity_log',
            'view_role', 'view_any_role', 'create_role', 'update_role', 'delete_role', 'delete_any_role',
            'view_user', 'view_any_user', 'create_user', 'update_user', 'delete_user', 'delete_any_user',
        ];

        // Menambahkan permissions ke database
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assigning permissions to roles
        $superAdmin->givePermissionTo(Permission::all()); // Super Admin mendapat semua permissions
    }
}