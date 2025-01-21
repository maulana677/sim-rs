<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage patients',
            'view patients',
        ];

        // Membuat permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminRole->syncPermissions($permissions);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminPermissions = ['manage patients'];
        $adminRole->syncPermissions($adminPermissions);

        $nurseRole = Role::firstOrCreate(['name' => 'nurse']);
        $nursePermissions = ['view patients'];
        $nurseRole->syncPermissions($nursePermissions);

        // Membuat Super Admin (Admin Utama)
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        $user = User::create([
            'name' => 'Super Admin RS',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($superAdminRole);
    }
}
